<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailableName;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate( [
            'name' => 'required',
            'mail' => 'required|Email',
            'message' => 'required',
        ]);
        $name = $request->input('name');
        $email = $request->input('mail');
        $message = $request->input('message');
        $phone = $request->input('phone');
        $data = [
            'name' =>$name,
            'email' =>$email,
            'message' =>$message,
            'phone' =>$phone
        ];
        Mail::to(env('MAIL_USERNAME'))->send(new MailableName($data));
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
