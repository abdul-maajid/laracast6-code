<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function home()
    {
        return view('contact');
    }

    // sending Raw Mail
    public function store()
    {
        request()->validate(['email' => 'required|email']);
        
        Mail::raw('It Works!!!!!', function($message) {
            $message->to(request('email'))
                    ->subject('Hello There!');
        });

        return redirect('/contact')->with('message', 'Mail Sent');
    }
   
    // sending Raw Mail
    public function sendmail()
    {
        request()->validate(['email' => 'required|email']);
        
        Mail::to(request('email'))
            ->send(new ContactMe('Mail Topic'));

        return redirect('/contact')->with('message', 'Mail Sent');
    }
}
