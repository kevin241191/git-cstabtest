<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPasswordMail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $fname;
    public $lname;
    public $email;
    public $remember_token;
    public function __construct($nomToSend, $prenomToSend, $sendToemail, $sendToremember_token)
    {
        $this->fname = $nomToSend;
        $this->lname = $prenomToSend;
        $this->email = $sendToemail;
        $this->remember_token= $sendToremember_token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Modification de votre mot de passe')
            ->line('Bonjour ' . $this->lname .$this->fname)
            ->line('Cliquer sur le lien ci dessous pour modifier votre
                    mot de passe')
            ->action('Modification de votre mot de passe', url('reset/'. $this->remember_token))
            ->line('Merci d\'utiliser nos services!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
