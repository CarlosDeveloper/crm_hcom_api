<?php

namespace App\Services;
use Illuminate\Http\Request;

class EmailService {


    public function sendEmail($email, $name) {
        \Mail::send('emails.notifications', ['name' => $name], function ($message) use($email, $name) {
            $message->from('admin@admin.com', 'Little Crm');
            $message->to($email)->subject('Notificación');
        });
    }

}