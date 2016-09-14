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

        $elInter = rtrim($this->getInterbancario());

        $pizarra = $this->getPizarra();

        return View::make('muro.oferta')->with('elInter', $elInter)->with('ofertas', $ofertas)->with('elPiza', $pizarra);


        
    }
    

}
