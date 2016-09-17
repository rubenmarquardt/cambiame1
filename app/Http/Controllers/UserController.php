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

}
