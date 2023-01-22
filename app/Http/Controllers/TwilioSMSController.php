<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use Illuminate\Http\Request;
use Exception;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class TwilioSMSController extends Controller
{

    public function index(Request $request)
    {
        $response = array();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'dob' => 'required'
        ]);
        $receiverNumber = "+91" . $request->number;
        $message = sprintf("%06d", mt_rand(1, 999999));

        $this->send_otp($receiverNumber, $message);
        $otp = Otp::updateOrCreate([
            'email' => $request->email
        ], [
            'otp_number' => $message,
            'number' => $receiverNumber
        ]);
        $student = User::where('email', '=', $request->email)->first();

        if ($student) {
            // do nothing or show message that user already exists
        } else {
            $student = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'number' => $receiverNumber,
                'role' => 1, // 0 => admin, 1 => student
                'is_verfied' => false,
                'password' => Hash::make($request->email)
            ]);
        }

        $response['code'] = 200;
        $response['otp'] = $message;
        $response['data'] = $student;

        return response()->json($response);

    }


    public function send_otp($receiverNumber, $message)
    {
        $response = array();

        $account_sid = config('app.twilio_sid');
        $auth_token = config('app.twilio_token');
        $twilio_number = config('app.twilio_from');
        try {
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message
            ]);
            $response['code'] = 200;
            $response['message'] = 'OTP sent succesfully';
            $response['message_sid'] = $client->sid;

            return response()->json($response);
        } catch (Exception $e) {
            return ('Twilio SMS Error: ' . $e->getMessage());
        }
    }

    public function verify_otp(Request $request)
    {
        $response = array();

        $request->validate([
            'otp' => 'required',
            'email' => 'required'
        ]);

       $user_entered_otp = $request->otp;
       $email = $request->email;

       $otp_from_sys = Otp::where('email','=',$email)->first();

       if($otp_from_sys->otp_number == $user_entered_otp)
       {
            $user = User::where('email','=',$email)->first();

            $user->update([
                'is_verified' => true
            ]);
            $response['message'] = 'OTP verified successfully you can login with your email ,and for now your email address is set as your password';
            $otp_from_sys->delete();
       } else {
            $response['message'] = 'OTP number didn\'t match';
       }

       return response()->json($response);

    }
}
