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
  <div class="centerBlock">
  <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
      <div class="alert alert-info animated infinite pulse" role="alert">
        <strong>Atención!</strong> Para poder seguir utilizando Cambiame tienes que brindar información de como te fue con la negociación.
      </div>
    </div>
  </div>
<div class="row">
  <div class="row" style="margin-bottom: 1em;">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >Mis Negociaciones:</font></div>
  </div>
</div>
@foreach ($contratos as $contrato)
<?php
//busco usuario dueño de la oferta reservada
$usuarios = App\Models\User::where('id', $contrato['user_id'])->get();
foreach($usuarios as $usuario){
?> 
 <!-- todo: mostrar si el usuario esta online -->

 <div class="oferta estaOnline">
  <div class="media">
    <div class="media-left">
         <img class="media-object" src="<?php echo $usuario->pictureUrl; ?>" alt="<?php echo $usuario->name;?>">
    </div>
    <div class="media-body">
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <div class="row">
            <h5 class="media-heading">
              <?php

              if ($contrato['moneda'] == "usd"){
                echo "<font style='color:orange;font-size:1.2em;'>VENDO </font>";
              }else if($contrato['moneda'] == "uyu"){
                echo "<font style='color:white;font-size:1.2em;'>COMPRO </font>";
              }


              ?>
            </h5>
          </div>
          <div class="row">
            <h5 class="media-heading">
              <span class="enDolares" font style="color:white;font-size:1.2em;">
                <?php

                if ($contrato['moneda'] == "usd"){
                  echo "  US$ ".$contrato['cantidad'];
                }else if($contrato['moneda'] == "uyu"){
                  echo "  US$ ".$contrato['resultado'];
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

                  switch ($contrato['moneda']) {
                    case 'usd':
                    echo "$ ";
                    break;
                    default:
                    echo "$ ";
                    break;
                  }

                  switch ($contrato['moneda']) {
                    case 'usd':
                    echo $contrato['resultado'];
                    break;
                    default:
                    echo $contrato['cantidad'];
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
    <div class="row text-center botonCallToAction " style="background:#orange;" >
      <div class="vcenter">
        <div class="col-sm-5 col-xs-5 col-lg-5 col-md-5 text-center" style="margin-right:1em;">
          <img src="{{ url('images/negociacionconcretada.png') }}" class="calificar img-responsive" data-id="{{ Hashids::encode($contrato['id']) }}" data-token="{{ csrf_token() }}" height="100%" />
        </div>

      </div>
    </div>
  </div>
</div>
</div>
<?php }?>
@endforeach
</div>
@overwrite