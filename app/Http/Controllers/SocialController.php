<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use App\Models\User;
use Mail;
use Auth;
use Socialite;
use App\Notifications\UserNotify;

class SocialController extends Controller {

    public function __construct(){
     $this->middleware('guest');
    }

       public function getSocialAuth($provider=null)
       {
           return Socialite::with('linkedin')->redirect();
       }


       public function getSocialAuthCallback($provider=null)
       {
          if($user = Socialite::driver('linkedin')->user()){

            if($elUser = User::select()->where('email', '=', $user->email)->first())
            {
            	Auth::login($elUser);
              $opcion_activar = 1;
              $this->onlineUser($elUser->id, 1);
            }else{

              //mandar a vista registro

            	return View::make('auth.register')->with('user', $user);

            }
            return redirect('/');
        
          }else{
             return '¡¡¡Algo fue mal!!!';
          }
       }

       public function registrarUser(Request $request){

            	$new_user = new User;
            	$new_user->name = $request->name;
            	$new_user->email = $request->email;
            	$new_user->celular = $request->celular;
            	$new_user->linkedinProfile = $request->linkedinProfile;
            	$new_user->pictureUrl = $request->pictureUrl;              
              
              /*Mail::send('auth.emails.welcome', ['user'=>$new_user], function($msg)use($new_user){
                $msg->subject('Bot de Cambiame');
                $msg->to($new_user->email);

              }); */

            	$new_user->save();

              //Notificacion a mail
              $new_user->notify(new UserNotify($new_user));

            	Auth::login($new_user);

              //onlineUser($new_user->id);
            	return redirect('/');

       }

       public function onlineUser($id, $op){


           $elId = $id;
            $tmp = User::where('id', $elId)->first();

          switch ($op) {
            case 1:
             $tmp->activo = 1;
              break;
            
            default:
              $tmp->activo = 0;
              break;
          }

            $tmp->save();

       }

}