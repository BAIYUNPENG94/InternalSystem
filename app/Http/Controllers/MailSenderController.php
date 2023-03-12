<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use ZipArchive;

class MailSenderController extends Controller
{
    public function zip_file(string $sourceFilePath, string $password)
    {
        $zipFilePath = public_path('storage/pdfs/1_1.zip');
        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            Log::info('Failed to create zip archive 1.');
            throw new \RuntimeException('Failed to create zip archive.');
        }

        // Add the source file
        $zip->addFile($sourceFilePath);

        // Set password for the archive
        $zip->setPassword($password);

        // Close and save the archive
        $zip->close();
    }

    public function send_mail(Request $request)
    {
        $pdfSourcePath = public_path('storage/pdfs/1.pdf');
        $password = '11111111';

        $this->zip_file($pdfSourcePath, $password);

        $data['email'] = "baiyunpeng@mail.terabox.jp";
        $data['title'] = "Test email from laravel";
        $data['body'] = "Hello, this is test";

        $files = [
            public_path('storage/pdfs/1_1.zip')
        ];

        Mail::send('mail.Test_mail', $data, function ($message) use ($data, $files) {
            $message->to($data['email'])->subject($data['title']);
            foreach ($files as $file) {
                $message->attach($file);
            }
        });

        return redirect('/Users/index')->with('message', 'Mail sent successfully');
    }
}
