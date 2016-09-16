<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    private function dolarPizzarraInter(){
        $this->elInter = rtrim($this->getInterbancario());
        $this->pizarra = $this->getPizarra();


    }

    public function ofertasUser($id){
        $ofertasUser = Oferta::where('user_id', $id)->get();
        $this->dolarPizzarraInter();
        $usuario = User::where('id', $id)->get();

        return View::make('muro.misofertas')->with('elInter', $this->elInter)->with('ofertas', $ofertasUser)->with('elPiza', $this->pizarra)->with('tmp', $usuario);
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
    

}
