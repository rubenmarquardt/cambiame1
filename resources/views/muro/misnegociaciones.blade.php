@extends('layouts.app4')

@section('contenido del muro')
<div class="row">
  @include('muro.interbancario')
</div>
<div class="row">
  @include('muro.ingreso')
</div>
@include('muro.calculadora')
<div class="row">
  <div class="row" style="margin-bottom: 1em;">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >Mis Contratos:</font></div>
  </div>

  @foreach ($contratos as $contrato)
  @if($oferta['reserva'] == 1)
  <div class="oferta estaOnline">
  <div class="media">
    <div class="media-left">
      <a href="{{ $tmp[0]['linkedinProfile']}}">
        <img class="media-object" src="<?php echo $tmp[0]['pictureUrl']; ?>" alt="<?php echo $tmp[0]['name'];?>">
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
      <img src="{{ url('images/close.png') }}" class="deleteProduct" data-id="{{ $oferta['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
    </div>
  </div>
</div>
</div>
@endif
@endforeach
</div>
@overwrite