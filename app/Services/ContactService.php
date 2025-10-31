<?php

namespace App\Services;

use App\Mail\ContactMessageSubmitted;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function handle(array $data): Message
    {
        $message = Message::create($data);

        if (config('mail.from.address')) {
            Mail::to(config('mail.from.address'))
                ->queue(new ContactMessageSubmitted($message));
        }

        return $message;
    }
}
