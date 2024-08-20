<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EvaluationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data_employe;

    public function __construct($data_employe)
    {
        $this->data_employe = $data_employe;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Evaluasi Karyawan Baru',
        );
    }


    public function content()
    {
        return new Content(
            view: 'emails.evaluasi',
        );
    }


    public function attachments()
    {
        return [];
    }
}
