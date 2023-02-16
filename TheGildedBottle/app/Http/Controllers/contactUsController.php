<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactUsController extends Controller
{
    public function showForm()
    {
        return view('Contactus');
    }

    public function sendForm(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::send('emails.contact', $data, function ($message) {
            $message->to('210097072@aston.ac.uk')
                ->subject('New message from Contact Us form');
        });

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
