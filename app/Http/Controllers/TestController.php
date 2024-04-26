<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            $user = Auth::user();
            // print_r($user);
            $subject = 'Test Logged User Mail';
            $body = ' Hello ' . $user->name . ' You Logged in ' . $user->email;
            Mail::to($user->email)->send(new TestMail($subject, $body));
        } else {
            $body = 'No User';
            $subject = 'No User MAil';
            Mail::to('noMail@gmail.com')->send(new TestMail($subject, $body));
        }
    }
}
