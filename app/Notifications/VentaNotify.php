<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Oferta;
use App\Models\User;


class VentaNotify extends Notification
{
    use Queueable;
    protected $user;
    protected $oferta;
    protected $subset;
    protected $cantidad;
    protected $userId;
    protected $moneda;
    protected $userComprador;
    protected $compraId, $nameCompra, $emailCompra, $celCompra, $lastDate;

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
        //busca id del vendedor        
        $userId=$this->user->id;   

         //busca la ultima oferta reservada por el comprador
        $oferta = Oferta::where('user_id', $userId)->get();
        $subset=$oferta->sortByDesc('updated_at')->first();
        $cantidad=$subset->cantidad;
        $moneda=$subset->moneda;
        $resultado=$subset->resultado;

        //selecciona respuesta dependiendo la moneda
        if ($moneda=='usd'){
            $tipo='uyu';
        }
        else{
        $tipo='usd';
        }
        //busca el comprador
        $compraId=$subset->reserva;
        $userComprador=User::find($compraId);
        $nameCompra=$userComprador->name;
        $celCompra=$userComprador->celular;
        $emailCompra=$userComprador->email;

        return (new MailMessage)
                    ->subject('Te están negociando en Cambiame')
                    ->greeting('Hola ' . $this->user->name)
                    ->line('Te quieren comprar tu oferta de:')
                    ->line($moneda . ' ' . $cantidad .' a ' . $tipo . ' ' . $resultado)                    
                    /*montoOfertado*/
                    ->line('Contactate con el comprador:')
                    ->line($nameCompra)
                    ->line($celCompra)
                    ->line($emailCompra)                    
                    ->line('Una vez realizado la transacción no te olvides ir a tus Negociaciones y concretarla:')
                    ->action('Ir a la app', 'http://app.cambiame.uy/usuario/negociaciones/'.$userId)
                    ->line('Gracias por usar nuestra plataforma');
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