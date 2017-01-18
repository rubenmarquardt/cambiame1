<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserNotify extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\Models\User $user)
    {
        $this->user=$user;
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
                    ->subject('Registro app de Cambiame.uy')
                    ->greeting('Hola ' . $this->user->name . ' te has registrado en la app de Cambiame!')
                    ->line('Puedes ingresar en el siguiente link:')
                    ->action('Ir a la app', 'http://app.cambiame.uy')
                    ->line('Gracias por usar nuestra plataforma');
    }

     public function toMailVendedor($notifiable)
    {
        return (new MailMessage)
                    ->subject('Te están negociando en Cambiame')
                    ->greeting('Hola ' . $this->user->name . ' te quieren comprar')
                    ->line('Te quieren comprar tu oferta de:')
                    /*montoOfertado*/
                    ->line('Contactate con el usuario:')
                    /*datos: nombre, email y celular*/
                    ->line('Una vez realizado la transacción no te olvides de cerrar y calificar:')
                    ->action('Ir a la app', 'http://app.cambiame.uy')
                    ->line('Gracias por usar nuestra plataforma');
    }

    public function toMailComprador($notifiable)
    {
        return (new MailMessage)
                    ->subject('Estás negociando en Cambiame')
                    ->greeting('Hola ' . $this->user->name . ' ya estás negociando')
                    ->line('Te quieren comprar tu oferta de:')
                    /*montoOfertado*/
                    ->line('Contactate con el usuario:')
                    /*datos: nombre, email y celular*/
                    ->line('Una vez realizado la transacción no te olvides de cerrar y calificar:')
                    ->action('Ir a la app', 'http://app.cambiame.uy')
                    ->line('Gracias por usar nuestra plataforma');
    }

    
}
