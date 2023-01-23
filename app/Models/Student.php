<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TwilioSMSController;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Board;

class Student extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable =[
        'name',
        'email',
        'number',
        'dob',
        'otp',
        'board_id'
    ];
    protected $hidden = [
        'otp'
    ];
    public function board()
{
    return $this->belongsTo(Board::class);
}
}