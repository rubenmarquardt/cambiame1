<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Oferta;
use App\Models\User;


class CompraNotify extends Notification
{
    use Queueable;
    
    protected $user;
    protected $oferta;
    protected $subset;
    protected $cantidad;
    protected $userId;
    protected $moneda;
    protected $userVendedor;
    protected $vendeId, $nameVende, $emailVende, $celVende, $linkedinVende, $lastDate;


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
        //busca id del comprador        
        $userId=$this->user->id;    

        //busca la ultima oferta reservada por el comprador
        $oferta = Oferta::where('reserva', $userId)->get();
        $subset=$oferta->sortByDesc('updated_at')->first();
        $cantidad=$subset->cantidad;
        $moneda=$subset->moneda;
        $resultado=$subset->resultado;        
        
        //busca la primer reserva del comprador en la tabla (deberia ser la última q se actualizó)   
        /*$oferta = Oferta::where('reserva', $userId)->first();
        $cantidad=$oferta->cantidad;
        $moneda=$oferta->moneda;*/

        //selecciona respuesta dependiendo la moneda (solamente permite ahora dolares o pesos)
       if ($moneda=='usd'){
            $tipo1='U$S';
            $tipo2='UY$';
        }
        else{
            $tipo1='UY$';
            $tipo2='US$';
        }

        //busca el vendedor
        $vendeId=$subset->user_id;
        $userVendedor=User::find($vendeId);
        $nameVende=$userVendedor->name;
        $celVende=$userVendedor->celular;
        $emailVende=$userVendedor->email;
        $linkedinVende=$userVendedor->linkedinProfile;
        
        return (new MailMessage)
                    ->success()
                    ->subject('Estás negociando en Cambiame')
                    ->greeting('Hola ' . $this->user->name . ' ya estás negociando')
                    ->line('Quieres comprar: ' . $tipo1 . ' ' . $cantidad .' a ' . $tipo2 . ' ' . $resultado)                  
                    /*montoOfertado*/
                    ->line('Revisa el perfil de LinkedIn del vendedor:')
                    ->line($linkedinVende)
                    ->line('Contactate con el usuario: ' .$nameVende . ' ' . $celVende . ' ' . $emailVende)
                    /*datos: nombre, email y celular*/
                    ->line('Una vez realizado la transacción no te olvides de cerrarla y calificarla')
                    ->action('Ir a la app', 'http://app.cambiame.uy')
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
