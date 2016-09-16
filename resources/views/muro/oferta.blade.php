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
          <h4 style="font-size:1.8em;color:white;" id="pizarra">$ 123123</h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" style="margin-bottom: 6px;">
          <font style="font-size:0.8em;color:black;" > En cambios te darian <div id="enCambios"></div> </font>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6 col-xs-offset-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 text-center" style="background:green;margin-top:12px">
          <button type="button" id="publicarOfer" style="margin-top: 10px;background:transparent;border:none;outline:none;"><font style="font-size:0.8em;color:white;">PUBLICAR OFERTA</font></button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="row" style="margin-bottom: 1em;">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >OFERTAS NEGOCIABLES</font></div>
  </div>
  @foreach ($ofertas as $oferta)
  @if($oferta['reserva'] == 1)


  <?php

  $tmp = App\Models\User::where('id', $oferta['user_id'])->first();

  $estado = ($tmp->activo == 1 ? 'estaOnline' : 'noestaOnline');


  ?>

  <div class="oferta 
  @if($tmp->isOnline())
  estaOnline
  @else
  noestaOnline
  @endif 
  ">

  <div class="media">
    <div class="media-left">
      <a href="{{ $tmp['linkedinProfile']}}">
        <img class="media-object" src="<?php echo $tmp['pictureUrl']; ?>" alt="<?php echo $tmp['name'];?>">
      </a>
    </div>
    <div class="media-body">
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <div class="row">
            <h5 class="media-heading">
              <?php

              if ($oferta['moneda'] == "usd"){
                echo "vendo";
              }else if($oferta['moneda'] == "uyu"){
                echo "compro ";
              }

              ?>
            </h5>
          </div>
          <div class="row">
            <h5 class="media-heading">
              <span class="enDolares">
                <?php

                if ($oferta['moneda'] == "usd"){
                  echo "  us$ ".$oferta['cantidad'];
                }else if($oferta['moneda'] == "uyu"){
                  echo "  us$ ".$oferta['resultado'];
                }

                ?>
              </span>
            </h5>
          </div>
          <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
              <p>
                <font class="muroOferta" style="font-size:1.2em;">
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
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="media-right" >
    <div class="row text-center botonCallToAction">
      @if(Auth::user()->id == $oferta['user_id'])
      <img src="{{ url('images/close.png') }}" class="deleteProduct" data-id="{{ $oferta['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
      @else
      <input type="hidden" value="{{ $oferta['id']}}" id="elId"/>
      <button type="button" name="contactar" value="{{$tmp['celular']}}" type="button" class="whatsapp" style="background:transparent;border:transparent;">
        <font class="negociar">
          NEGOCIAR
        </font>
      </button>
      @endif
    </div>
  </div>
</div>
</div>
@endif
@endforeach
</div>
@overwrite