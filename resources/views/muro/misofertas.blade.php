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
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >Mis Ofertas:</font></div>
  </div>

  @foreach ($ofertas as $oferta)
  <!-- todo: mostrar las ofertas propias que estan en proceso de negociacion -->
  
  <div class="oferta estaOnline">
    <div class="media">
      <div class="media-left">
          <img class="media-object" src="<?php echo $tmp[0]['pictureUrl']; ?>" alt="<?php echo $tmp[0]['name'];?>">
      </div>
      <div class="media-body">
        <div class="row">
          <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
            <div class="row">
              <h5 class="media-heading">
                <?php

                if ($oferta['moneda'] == "usd"){
                  echo "<font style='color:orange;'>vendo</font>";
                }else if($oferta['moneda'] == "uyu"){
                  echo "<font style='color:white;'>compro</font>";
                }

                ?>
              </h5>
            </div>
            <div class="row">
              <h5 class="media-heading">
                <span class="enDolares" font style="color:#aaa;">
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

@endforeach

<!-- comento todo lo de precontratos -->
<!--
<div class="row">
  <div class="row" style="margin-bottom: 1em;">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >Mis Pre-contratos:</font></div>
  </div>
</div>
-->

<!--Aqui esta el foreach de los pre-contratos -->
<!--Ver si este div overrite esta bien aca -->

</div>
@overwrite