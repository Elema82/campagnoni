<?php
namespace App\V1\Frontend\Service;

use App\V1\Settings\Model\Setting;
use Illuminate\Support\Facades\Mail;

class FrontendService
{

    public function sendContactEmail($data)
    {
        $emailData = [
            'name' => $data['fullname'],
            'email' => $data['email'],
            'phone' => $data['tel'],
            'company' => $data['company'],
            'message' => $data['message'],
        ];
        $contactEmail = Setting::getContactEmail();

        Mail::send('emails.new_contact', ["data" => $emailData], function ($message) use ($contactEmail) {

            $message->from(config('mail.from.address'), config('mail.from.name'));

            $message->to($contactEmail)->subject("Nuevo mensaje de contacto");

            });
    }
}