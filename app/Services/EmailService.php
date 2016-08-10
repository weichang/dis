<?php
namespace App\Services;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class EmailService
{

    private $mail;

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    public function send($user, $data)
    {
        $subject = "論壇EMAIL確認信!!";
        $view = 'email.register';
        
        $this->mail->queue($view, $data, function (Message $message) use ($user, $subject) {
        
            $message->to($user->email)->subject($subject);
        });
    }
}