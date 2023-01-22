<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Student;
use Twilio\Rest\Client;
 
class TwilioSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
public function index(Request $request)
{
    $receiverNumber = "+919361130510";
    $message = sprintf("%06d", mt_rand(1, 999999));
    try {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($receiverNumber, [
            'from' => $twilio_number,
            'body' => $message]);
            
            // dd ($client, 'OTP Sent Successfully.');
            //dd($request->input());
            
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'number' => 'required',
                'dob' => 'required'
            ]);

            
            dd($request->input());
            //Student::create($request->input(),['otp'=> $message]);
            $student = new Student;
            $student->name = $request->name; 
            $student->email = $request->email; 
            $student->number = $request->number; 
            $student->dob = $request->dob; 
            $student->otp = $message;
            $student->save();
            return response()->json(dd($student));
        }


        catch (Exception $e) {
            return("Error: ".$e->getMessage());
        }
        
        //return Student::create($request-> all());
    }
}
