<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     
     public $username;
     public $password;
    public function __construct($username,$password)
    {
        $this->username=$username;
        $this->password=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@mahalijat.com')->subject("مشخصات ورود به محلی جات")->markdown('emails.user.registered');
    }
}
