<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSenderController extends Controller
{
    public function send_mail(Request $request) {

        $data['email'] = "baiyunpeng@mail.terabox.jp";
        $data['title'] = "Test email from laravel";
        $data['body'] = "Hello, this is test";

        $files = [
            public_path('storage/pdfs/1.pdf')
        ];

        Mail::send('mail.Test_mail', $data, function($message)use($data, $files) {
            $message->to($data['email'])->subject($data['title']);
            foreach($files as $file) {
                $message->attach($file);
            }
        });

        return redirect('/Users/index')->with('message', 'Mail sent successfully');
    }
}
