<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Oferta;
use App\Http\Requests;
use View;
use App\Models\User;
use Goutte\Client;

class OfertaController extends Controller
{
 
    var $str = "";
    var $str2 = "";
    var $elInter ="";
    var $pizarra = "";
    var $userId= 0;
    var $user = "dummy";

    private function dolarPizzarraInter(){
        $this->elInter = rtrim($this->getInterbancario());
        $this->pizarra = $this->getPizarra();


    }

    public function ofertasUser($id){
        $ofertasUser = Oferta::where('user_id', $id)->get();
        $contratosNegociables = Oferta::where('reserva', $id)->get();
        $this->dolarPizzarraInter();
        $this->userId = Auth::user()->id;
        if($this->userId == $ofertasUser->first()->user_id){
            $usuario = User::where('id', $id)->get();
            
            return View::make('muro.misofertas')->with('elInter', $this->elInter)->with('ofertas', $ofertasUser)->with('elPiza', $this->pizarra)->with('tmp', $usuario)->with('contratos', $contratosNegociables);
        }

        return "tu vieja";
    }
    
    public function getInterbancario()
    {

        $client = new Client();
        $crawler = $client->request('GET', 'http://www.bcu.gub.uy/');
        $crawler->filter('.Cotizaciones')->each(function($node){
            $stn = (string)$node->text();
            $pos = strpos($stn, "Bill");
            $stn = substr($stn, $pos);
            $stn = explode(" ", $stn);
            
            if($stn[76]!=""){
                $this->str = $stn[76];    
            }
            
            
        });

        
        
        return $this->str;


    }

    public function getPizarra(){
        $client = new Client();
        $crawler = $client->request('GET', 'http://www.gales.com.uy/home/');
        $crawler->filter('.monedas')->each(function($node){
            $stn = (string)$node->text();
            $pos = strpos($stn, "Dólar");
            $stn = substr($stn, $pos);
            $stn = explode(" ", $stn);
            $this->str2['compra'] = $stn[12];
            $this->str2['venta'] = $stn[24];
        });
        
        return $this->str2;

    }
    
    public function index(){
        
       
        $ofertas = Oferta::all()->toArray();

        $this->dolarPizzarraInter();

        return View::make('muro.oferta')->with('elInter', $this->elInter)->with('ofertas', $ofertas)->with('elPiza', $this->pizarra);


        
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

    public function reservarOferta(Request $request){
        if($request->ajax()){
            $this->user = Auth::user()->id;
            $oferta = Oferta::where('id', $request['idoferta'])->first();
            $oferta->reserva = $this->user;
            if($oferta->save()){
                return 0;
            }else{
                return 1;
            }
        }   

    }

    public function liberar($id){
        $oferta = Oferta::find($id);
        if ($oferta->reserva == Auth::user()->id){
            $oferta->reserva = 1;
            if($oferta->save()){
                return response()->json([
                    'success' => 'Oferta liberada correctamente!'
                    ]);   
            }else{
             return response()->json([
                'success' => 'error!'
                ]);  
            }
        }else{
           return response()->json([
            'success' => 'you dont own this record brotha!'
            ]);    
        }
    }

    public function concretar($id){
        $oferta = Oferta::find($id);
        if ($oferta->reserva == Auth::user()->id){
            $oferta->reserva = 0;
            $oferta->concretada = Auth::user()->id;
            if($oferta->save()){
                return response()->json([
                    'success' => 'Oferta concretada!'
                    ]);   
            }else{
                return response()->json([
                'success' => 'error!'
                ]);  
           }
        }else{
            return response()->json([
            'success' => 'you dont own this record brotha!'
            ]);    
        }
    }

    public function destroy($id){
        $oferta = Oferta::find($id);
        if ($oferta->user_id == Auth::user()->id){
            $oferta->delete();
            return response()->json([
            'success' => 'Record has been deleted successfully!'
            ]);   
        }else{
           return response()->json([
            'success' => 'you dont own this record brotha!'
            ]);    
        }
    }

    public function calificarTrans($id){
        $ofertaCon = Oferta::find($id);
        if ($ofertaCon->concretada == Auth::user()->id){
            $usr = User::find($ofertaCon->user_id);
            return View::make('usuario.calificartrans')->with('usr', $usr)->with('transaccion', $ofertaCon);
        }

    }

    public function guardarCalif(Request $request){
        if($request->ajax()){
            //$this->user = Auth::user()->id;
            $oferta = Oferta::where('id', $request['idTrans'])->first();
            $oferta->rate = $request['value'];
            if($oferta->save()){
                return 0;
            }else{
                return 1;
            }
        }   
    }



}
