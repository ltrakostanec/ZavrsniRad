<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\FortySixElks\FortySixElksChannel;
use NotificationChannels\FortySixElks\FortySixElksSMS;

class OTPNotification extends Notification
{
    use Queueable;

    public $via;
    public $OTP;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($via, $OTP)
    {
        $this->via = $via;
        $this->OTP = $OTP;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->via == 'sms' ? [FortySixElksChannel::class] : ['mail'];
    }


    public function to46Elks($notifiable)
    {
        $vrijeme = Carbon::now();

        return (new FortySixElksSMS())
            ->line('Vasa jednokratna lozinka za autentikaciju je ' .$this->OTP)
            ->line('Valjanost lozinke je 60 sekundi.')
            ->line("Lozinka je kreirana $vrijeme")
            ->to(auth()->user()->phone)
            ->from('+12162080434');
    }

    public function vrijemeKreiranja(){
        $vrijeme = Carbon::now();
        return $vrijeme;
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
            ->subject('Višefaktorska autentikacija')
            ->markdown('OTP',['OTP' => $this->OTP, 'vrijeme' => $this->vrijemeKreiranja()]);
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
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
