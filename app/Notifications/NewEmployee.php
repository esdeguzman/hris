<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewEmployee extends Notification
{
    use Queueable;

    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting("Welcome to NEWSIM {$this->user->first_name}!")
                    ->line('In connection to your recent employment, we have prepared some default credentials that you will be needing to access Electronic Quality Management System and receive company updates!')
                    ->line('Please always keep your credentials private at all times.')
                    ->line("NEWSIM email: {$this->user->email}")
                    ->line("EQMS username: {$this->user->username}")
                    ->line("Password for both credentials: your_first_name + {$this->user->id} **no spaces and all small caps**")
                    ->line('You may log-in to your email by accessing bluehost.com/hosting/webmail')
                    ->action('Log in to EQMS account', url('/'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
