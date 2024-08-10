<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        // Create a new message instance.

        $this->data = $data;
    }

    public function build(){
        $subject = 'Welcome To Resto ID';
        $address = 'restoid.official@gmail.com';
        
        return $this->view('email')->from($address, 'Resto ID Official')->subject($subject);
    }

}
