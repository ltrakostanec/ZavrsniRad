<?php

namespace App\Http\Controllers;

use App\Http\Requests\OTPRequest;
use Illuminate\Support\Facades\Cache;

class VerifyOTPController extends Controller
{
    public function verify(OTPRequest $request){
        if (request('OTP') == auth()->user()->OTP()){
            auth()->user()->update(['isVerified' => true]);
            return redirect('/home');
        }
        return back()->withErrors('Jednokratna lozinka je netočna ili je istekla.');
    }
    public function showVerifyForm(){
        return view('OTP.verify');
    }
}
