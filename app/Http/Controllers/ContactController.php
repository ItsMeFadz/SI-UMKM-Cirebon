<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {

        \Log::info('Contact form submission:', $request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'messageContent' => $request->message, // Ubah dari 'message' menjadi 'messageContent'
        ];

        Mail::send('emails.contact', $data, function ($mail) use ($data) {
            $mail->to('mr954904@gmail.com')
                 ->subject($data['subject']);
        });

        return back()->with('success', 'Message sent successfully!');
    }
}
