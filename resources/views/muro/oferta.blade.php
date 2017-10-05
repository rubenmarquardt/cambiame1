@extends('layouts.app4')

@section('contenido del muro')
<div class="row">
  @include('muro.interbancario')
</div>
<div class="row">
  
  @include('muro.ingreso')
 
</div>
<div class="row" id="contenedorCalc2" style="display:none">
  <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 ingresosCalc text-center" id="calculador2">
    <div class="col-md-12 col-xs-12 col-lg-12 text-center" id="mostrarCalc"  >
    <div class="row">
        <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6 col-xs-offset-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 text-center" style="background:green;margin-top:3px">
            <h4 style="color:white;" id="cantF"> </h4>  
        </div>
      </div> 
      <div class="row" style="background:#494d49;margin-top:1em;margin-right:1px;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" >
          <h4 style="color:white;" id="uyu">PESOS URUGUAYOS</h4>
          <h4 style="color:white;" id="usd">DOLARES AMERICANOS</h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" >
          <font style="font-size:1.8em;color:white;" id="cantEnUyu"></font>
        </div>
      </div>
      <div class="row" style="background:green;margin-top:1em;margin-right:1px;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="color:white;">AHORRAS</h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="font-size:1.8em;color:white;" id="ahorras"></h4>
        </div>
      </div>
      <div class="row" style="background:#6e706b;margin-top:1em;margin-right:1px;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="color:white;">COTIZACION PIZARRA</h4>
          <input type="hidden" value="{{ $elPiza['compra'] or null }}" name="pizarra" id="valPizaComp" />
          <input type="hidden" value="{{ $elPiza['venta'] or null }}" name="pizarra" id="valPizaVent" />
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="font-size:1.8em;color:white;" id="pizarra"> </h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" style="margin-bottom: 3px;">
          <font style="font-size:1.2em;color:black;" > En cambios te darian <div id="enCambios"></div> </font>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6 col-xs-offset-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 text-center" style="background:green;margin-top:6px">
          @if(!Auth::check())
            <button type="button" class="sinLogin" style="margin-top: 10px;background:transparent;border:none;outline:none;"><font style="font-size:1.4em;color:white;">VENDER</font></button> 
         @else
            <button type="button" id="publicarOfer" style="margin-top: 10px;background:transparent;border:none;outline:none;"><font style="font-size:1.4em;color:white;">VENDER</font></button>
         @endif
        </div>
      </div>
    </div>
  </div>
</div>
<!--Agrego una fila de espacios xq no me toma el margen superior -->
<div class="row">
    <font style="font-size:1.3em;color:white;">'</font>
</div>

<div class="row" style="marging-top: 10px; margin-bottom: 1em;">
  <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >OFERTAS NEGOCIABLES</font></div>
</div>

<div class="row" id="page-content">
<!--cambio el concepto solo muestro ofertas no concretadas ni reservadas-->
  @foreach ($ofertas as $oferta)
  @if($oferta['concretada'] == 0) 
  @if($oferta['reserva'] == 0) 
                    
  <?php
  $tmp = App\Models\User::where('id', $oferta['user_id'])->first();
  $estado = ($tmp->activo == 1 ? 'estaOnline' : 'noestaOnline');
  ?>
  <div class="container-fluid" style="padding-left:0;padding-right:0; margin-right:-3px">
    <div class="media
    oferta 
    @if($tmp->isOnline())
    estaOnline
    @else
    noestaOnline
    @endif 
    ">
    <div class="media-left">
      @if(!Auth::check())
        <img class="media-object" src="" >
      @else         
        <div class="container-fluid" style="padding:0;"> 
          <a href="{{$tmp['linkedinProfile']}}" target="_blank">  
            <img class="media-object" title="<?php echo $tmp['name']; ?>" src="<?php echo $tmp['pictureUrl']; ?>" >
          </a>
          <div class="stars">
            <?php 
              $indice = 0;
              $indice1 = 0;
              $indice2 = 0;

              //busco trns como vendedor
              $indice1 = App\Models\Oferta::where('user_id', '=',$tmp['id'])
                     ->where('rate', '>',0)->count();
              
              //busco trns como comprador
              $indice2 = App\Models\Oferta::where('concretada', '=',$tmp['id'])
                     ->where('rate2', '>',0)->count();

              $indice = $indice1 + $indice2;
        
              $rate = (int)floor($tmp->rate);
              for($i = 1; $i <= $rate; $i++){
                echo '<label class="star star-'.$i.'" for="star-'.$i.'" style="color: #FD4;"></label>';
              }
              //echo "<label style='font-size:0.9em;color:#aaa;'> $indice trns</label>";
              //echo $indice . ' trns' 
            ?>
          </div>
          <div class="row">
             <span style="font-size:0.9em;color:#aaa;"><?php //echo ($indice > 0 ? $indice : 'Nuevo') . ' trns' ;
                                                        echo $indice ; ?></span>
          </div>        
        </div>
      @endif
    </div>
    <div class="media-body">

      <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <div class="row">
            <h5 class="media-heading" >
              <?php
              //agrego logica de los medios de pago
                  switch ($oferta['medioPago']) {
                    case '0':
                         $Intercambio = '  En Persona';
                    break;     
                    case '1':
                         $Intercambio = '  E-bank';
                    break;     
                    case '2':
                         $Intercambio = '  PayPal'; 
                    break;     
                    case '3':
                         $Intercambio = '  Red de Pagos';
                    break;     
                    break;
                    default:
                        $Intercambio = '  En Persona';
                    break;
                  }

              if ($oferta['moneda'] == "usd"){
                echo "<font style='color:orange;font-size:1.2em;'>VENDO: {$Intercambio}</font>";      
              }else if($oferta['moneda'] == "uyu"){
                echo "<font style='color:white;font-size:1.2em;'>COMPRO: {$Intercambio}</font>";
              }

              ?>
            </h5>
          </div>
          <div class="row">
            <h5 class="media-heading">
              <span class="enDolares" style="color:#aaa;font-size:1.2em;">				
                <?php
                if ($oferta['moneda'] == "usd"){
                  echo "  US$ ".$oferta['cantidad'];
                }else if($oferta['moneda'] == "uyu"){
                  echo "  US$ ".$oferta['resultado'];
                }                
                ?>
              </span>
            </h5>
          </div>
          <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
                <font class="muroOferta" style="font-size:1.3em;">
                 <span class="currencyLabel">
                  <?php

                  switch ($oferta['moneda']) {
                    case 'usd':
                    echo "$ ";
                    break;
                    default:
                    echo "$ ";
                    break;
                  }

                  switch ($oferta['moneda']) {
                    case 'usd':
                    echo $oferta['resultado'];
                    break;
                    default:
                    echo $oferta['cantidad'];
                    break;
                  }

                  ?>                  
                </span>
              </font>            
          </div><span style="font-size:1em;color:#aaa;"><?php echo  substr($oferta['updated_at'],0,10);?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="media-right" >
    <div class="row text-center botonCallToAction">
      @if(!Auth::check())
  
      <button type="button" name="contactar" data-celular="" type="button" class="sinLogin" style="background:transparent;border:transparent;">
        <font class="negociar">          
        COMPRAR
        </font>
      </button>
      @else
      @if(Auth::user()->id == $oferta['user_id'])
         
          <!-- solo muestro el dejo borrar cuando no esta reservada aun  No estaria funcionando aparentemente....-->
            <?php 
              if (trim($oferta['reserva']) =="0") 
              {
            ?> 	
                <button type="button" style="background:transparent;border:transparent;">
                  <div class="media-right" >
                      <img src="{{ url('images/close.png') }}" title="Eliminar oferta" class="deleteProduct" data-id="{{ Hashids::encode($oferta['id']) }}" data-token="{{ csrf_token() }}" height="70%" />
                  </div> 
                </button>
            <?php 
              }
              else
              {
            ?> 	
              <label class="negociar"> OFERTA RESERVADA
              </label>
            <?php	
              }
            ?>

         
      @else
      <input type="hidden" value="{{ Hashids::encode($oferta['id']) }}" id="elId"/>
      <button type="button" name="contactar" data-celular="{{$tmp['name']}}" data-prueba="O" type="button" class="whatsapp" style="background:transparent;border:transparent;">
        <font class="negociar">
          COMPRAR
        </font>
      </button>
      @endif
      @endif
    </div>
  </div>
</div>


</div>
@endif
@endif
@endforeach
</div>



@overwrite