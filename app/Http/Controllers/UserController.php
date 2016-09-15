<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Oferta;
use App\Models\User;
use App\Http\Requests;


class UserController extends Controller
{

  public function postRegister(Request $request){

    if($request->publicProfileUrl != ""){
      $usuario = new User;
      $usuario->name = $_POST['name']. " " . $_POST['lastname'];
      $usuario->email = $_POST['email'];
      $usuario->password = $_POST['password'];
      $usuario->remember_token = $_POST['_token'];
      $usuario->whatsapp = $_POST['whatsapp'];
      $usuario->linkedinProfile = $_POST['publicProfileUrl'];
      $usuario->pictureUrl = $_POST['pictureUrl'];
      $usuario->save();
    }
  }

  public function __construct(){
    $this->middleware('auth');
  }

  public function reservarOferta(Request $request){
    if($request->ajax()){

      $oferta = Oferta::where('id', $request['idoferta'])->first();
      $oferta->reserva = 0;
      if($oferta->save()){
        return 0;
      }else{
        return 1;
      }
    }

  }

    public function salvaroferta(Request $request)
    {

          if($request->ajax()){

           $user=Auth::user();

           if (!isset($user)){
            return redirect()->route('/');
          }else{
           $oferta = new Oferta;
           $oferta->moneda = ($request['moneda'] == 1 ? 'usd' : 'uyu');
           $oferta->dolarInter = $request['dolarInter'];
           $oferta->dolarCambio = $request['dolarCambio'];
           $oferta->resultado = $request['resultado'];
           $oferta->cantidad = $request['cantidad'];
           $oferta->user_id = $request['user_id'];
           $oferta->reserva = 1;
           if($oferta->save()){
            return 1;
          }else{
            return 0;
          }

        }
      }

    }

    public function destroy($id){
      Oferta::find($id)->delete();   
      return response()->json([
        'success' => 'Record has been deleted successfully!'
        ]);   
    }

}
