<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Password extends Notification
{
    use Queueable;

    public function __construct(public $mailData) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Welcome to Aurelio App 🎉")
            ->greeting("Hello " . $this->mailData["name"])
            ->line("You have successfully registered to Aurelio App.")
            ->line("Your username: " . $this->mailData["username"])
            ->line($this->mailData["wish"]);
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
