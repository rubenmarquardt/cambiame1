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
      <div class="row" style="background:#494d49;margin-top:1em;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" >
          <h4 style="color:white;" id="uyu">PESOS URUGUAYOS</h4>
          <h4 style="color:white;" id="usd">DOLARES AMERICANOS</h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" >
          <font style="font-size:1.8em;color:white;" id="cantEnUyu"></font>
        </div>
      </div>
      <div class="row" style="background:green;margin-top:1em;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="color:white;">AHORRAS</h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="font-size:1.8em;color:white;" id="ahorras"></h4>
        </div>
      </div>
      <div class="row" style="background:#6e706b;margin-top:1em;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="color:white;">COTIZACION PIZARRA</h4>
          <input type="hidden" value="{{ $elPiza['compra'] or null }}" name="pizarra" id="valPizaComp" />
          <input type="hidden" value="{{ $elPiza['venta'] or null }}" name="pizarra" id="valPizaVent" />
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="font-size:1.8em;color:white;" id="pizarra"> </h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" style="margin-bottom: 3px;">
          <font style="font-size:0.8em;color:black;" > En cambios te darian <div id="enCambios"></div> </font>
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
    <font style="font-size:0.8em;color:white;">'</font>
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


  <div class="container-fluid" style="padding-left:0;padding-right:0;">
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
        <img class="media-object" src="<?php echo $tmp['pictureUrl']; ?>" >

          <div class="stars">
            <?php 
              $rate = (int)floor($tmp->rate);

            
              for($i = 1; $i <= $rate; $i++){
              // echo '<input class="star star-'.$i.'" id="star-'.$i.'" type="radio" name="star"/>';
                echo '<label class="star star-'.$i.'" for="star-'.$i.'" style="color: #FD4;"></label>';
              }

            ?>
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

              if ($oferta['moneda'] == "usd"){
                echo "<font style='color:orange;font-size:1.2em;'>VENDO</font>";      
              }else if($oferta['moneda'] == "uyu"){
                echo "<font style='color:white;font-size:1.2em;'>COMPRO</font>";
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
                  //echo 'tengo oferta' .  $oferta['id'] ;
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
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="media-right" >
    <div class="row text-center botonCallToAction">
      @if(!Auth::check())
      <!--
      <input type="hidden" value="{{ $oferta['id']}}" id="elId"/>
      <button type="button" name="contactar" data-celular="{{$tmp['celular']}}" type="button" class="whatsapp" style="background:transparent;border:transparent;">
        <font class="negociar">
          NEGOCIAR
        </font>
      </button>
      -->
      <button type="button" name="contactar" data-celular="" type="button" class="sinLogin" style="background:transparent;border:transparent;">
        <font class="negociar">          
        COMPRAR
        </font>
      </button>
      @else
      @if(Auth::user()->id == $oferta['user_id'])
          <!--
          <img src="{{ url('images/close.png') }}" class="deleteProduct" data-id="{{ $oferta['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
          -->
          <!-- solo muestro el dejo borrar cuando no esta reservada aun  No estaria funcionando aparentemente....-->
            <?php 
              if (trim($oferta['reserva']) =="0") 
              {
            ?> 	
                <button type="button" style="background:transparent;border:transparent;">
                  <div class="media-right" >
                      <img src="{{ url('images/close.png') }}" class="deleteProduct" data-id="{{ $oferta['id'] }}" data-token="{{ csrf_token() }}" height="70%" />
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
      <input type="hidden" value="{{ $oferta['id']}}" id="elId"/>
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