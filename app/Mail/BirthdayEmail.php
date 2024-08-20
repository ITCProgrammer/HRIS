<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BirthdayEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $age;
    protected $name;

    public function __construct(string $age, string $name)
    {
        $this->age = $age;
        $this->name = $name;
    }


    public function envelope()
    {
        return new Envelope(
            subject: 'Email Ulang Tahun',
        );
    }


    public function content()
    {
        return new Content(
            view: 'emails.employee_birthday',
            with: [
                'name' => $this->name,
                'age' => $this->age,
            ],
        );
    }


    public function attachments()
    {
        return [];
    }
}
