<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Oferta;
use App\Http\Requests;
use View;
use App\Models\User;
use Goutte\Client;
use App\Notifications\CompraNotify;
use App\Notifications\VentaNotify;

class OfertaController extends Controller
{
 
    var $str = "";
    var $str2 = "";
    var $elInter ="";
    var $pizarra = "";
    var $userId= 0;
    var $user = "dummy";

    private function dolarPizzarraInter(){
        $this->pizarra = $this->getPizarra();
        $this->elInter = rtrim($this->getInterbancario());
        


    }

    public function ofertasUser($id){
        $ofertasUser = Oferta::where('user_id', $id)->get();
        $contratosNegociables = Oferta::where('reserva', $id)->get();
        $this->dolarPizzarraInter();
        $this->userId = Auth::user()->id;

        // $contratosConcretados = Oferta::where('concretada', '!==', $id)->get();
        //tendria qque hacer un and para evitar las que tienen 0
         $contratosConcretados = Oferta::where('concretada', '<>', $id)->get();    

        if($this->userId == @$ofertasUser->first()->user_id){
            $usuario = User::where('id', $id)->get();
            return View::make('muro.misofertas')->with('elInter', $this->elInter)->with('ofertas', $ofertasUser)->with('elPiza', $this->pizarra)->with('tmp', $usuario)->with('contratos', $contratosNegociables)->with('contratosC', $contratosConcretados);
        }

        return "tu vieja";
    }

    public function negociacionesUser($id){
        $ofertasUser = Oferta::where('user_id', $id)->get();
        $contratosNegociables = Oferta::where('reserva', $id)->get();
        $this->dolarPizzarraInter();
        $this->userId = Auth::user()->id;
    
    //aqui deberia cargar las trns ya conretadas
    //pero no todas sino las del usuario que estoy leyendo, o sea de quien esta mirando sus negociaciones
    //ver donde me conviene si aca o en el for each de misnegociaciones
        $contratosConcretados = Oferta::where('concretada', $id)->get();

    //ahora como cargo las del usuario que necesito     ?
    //en realidad creo que ese filtro se esta hacciendo abajo
    //hay que pensarlo al reves en el caso de mis compras
        if($this->userId == @$ofertasUser->first()->user_id){
            $usuario = User::where('id', $id)->get();
            
            return View::make('muro.misnegociaciones')->with('elInter', $this->elInter)->with('ofertas', $ofertasUser)->with('elPiza', $this->pizarra)->with('tmp', $usuario)->with('contratos', $contratosNegociables)->with('contratosC', $contratosConcretados) ;
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

        if (Auth::check()){
            $ofertasNoCalif = Oferta::where(function ($query){
                $query->where('concretada', '=', Auth::user()->id);
            })->where(function ($query){
                $query->where('rate','=', null);
            })->get()->toArray();

            if(count($ofertasNoCalif) > 0){
                return redirect('calificar/ofertas');
            }
        }


        return View::make('muro.oferta')->with('elInter', $this->elInter)->with('ofertas', $ofertas)->with('elPiza', $this->pizarra);
    }

    public function salvaroferta(Request $request)
    {

        if($request->ajax()){

            $ofertasNoCalif = Oferta::where(function ($query){
                $query->where('concretada', '=', Auth::user()->id);
            })->where(function ($query){
                $query->where('rate','=', null);
            })->get()->toArray();
      
            foreach($ofertasNoCalif as $ofertaNoCalificada){

                if(isset($ofertasNoCalif) && $ofertaNoCalificada['concretada'] !== 0){
                    return response()->json([
                        'error' => 'Debes calificar tus transacciones previas!'
                    ]);  
                }
            }

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
                $oferta->reserva = 0;
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
            
            $usrId=$this->user;
            $usr = User::where('id', $usrId)->first();
            
            //vendedor
            $idVendedor=$oferta->user_id;
            $usrVendedor=User::where('id', $idVendedor)->first();
           
                               
            if($oferta->save()){       

             //Notificacion a mail
  //aqui da error en el local               
                $usr->notify(new CompraNotify($usr));
                $usrVendedor->notify(new VentaNotify($usrVendedor));                   
                
                return 0;
                

            }else{
                return 1;
            }
        }   

    }

    public function liberar($id){
        $oferta = Oferta::find($id);

        if ($oferta->reserva == Auth::user()->id){
            $oferta->reserva = 0;
            $oferta->concretada = 0;
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
            //en el campo concretada esta grabando el id del usuario
            $oferta->concretada = Auth::user()->id;
            if($oferta->save()){
                return response()->json([
                'success' => 'concretada!'
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

    public function historicoTrans($id){
        $ofertaCon = Oferta::find($id);
        //if ($ofertaCon->concretada == Auth::user()->id){
        $usr = User::find($ofertaCon->user_id);
        return View::make('usuario.calificartrans')->with('usr', $usr)->with('transaccion', $ofertaCon);
        //}

    }

    public function transaccionesNoCalificadas(){
        
        $ofertasNoCalif = Oferta::where(function ($query){
            $query->where('concretada', '=', Auth::user()->id);
        })->where(function ($query){
            $query->where('rate','=', null);
        })->get();
        $this->dolarPizzarraInter();
        $cantidad = $ofertasNoCalif->toArray();

        if(count($cantidad) == 0){
            return redirect('oferta');
        }
        return View::make('usuario.nocalificadas')->with('usr', Auth::user())->with('contratos', $ofertasNoCalif)->with("elInter", $this->elInter)->with('elPiza', $this->pizarra);
    }

    public function guardarCalif(Request $request){
        if($request->ajax()){
            //$this->user = Auth::user()->id;
            $usrId = $request['idUsr'];
            $usrOfertas = Oferta::where('user_id', $usrId)->get();
            $rateTotalUsr = 0;
            $sumaRates = 0;
            $indice = 0;
            foreach($usrOfertas as $oferta){
                if($oferta->rate != ''){
                    $indice++;
                    $sumaRates += $oferta->rate;
                }
            }

            

            if($indice != 0){

                $usr = User::where('id', $usrId)->first();

                $rateTotalUsr = $sumaRates / $indice;

                $usr->rate = $rateTotalUsr;

                $usr->save();
            }
     
            $oferta = Oferta::where('id', $request['idTrans'])->first();
            $oferta->rate = $request['value'];
            if(isset($request['comentario'])){
                $oferta->comentario = $request['comentario'];
            }
            if($oferta->save()){
//aqui pone el campo concretada en 1, ya sea positiva o negativamente (como esta hoy en dia)
                return response()->json(["succes"=>"calificacion guardada!"]);
            }else{
                return 1;
            }
        }   
    }

}
