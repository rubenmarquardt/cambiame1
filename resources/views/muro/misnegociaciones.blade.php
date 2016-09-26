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
      <a href="{{ $usuario->linkedinProfile}}">

        <img class="media-object" src="<?php echo $usuario->pictureUrl; ?>" alt="<?php echo $usuario->name;?>">
      </a>
    </div>
    <div class="media-body">
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <div class="row">
            <h5 class="media-heading">
              <?php

              if ($contrato['moneda'] == "usd"){
                echo "vendo";
              }else if($contrato['moneda'] == "uyu"){
                echo "compro ";
              }

              ?>
            </h5>
          </div>
          <div class="row">
            <h5 class="media-heading">
              <span class="enDolares">
                <?php

                if ($contrato['moneda'] == "usd"){
                  echo "  us$ ".$contrato['cantidad'];
                }else if($contrato['moneda'] == "uyu"){
                  echo "  us$ ".$contrato['resultado'];
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
    <div class="row text-center botonCallToAction " style="background:#ffa500;" >
      <div class="blockCenter">
        <div class="btn-group btn-group-lg btn-group-sm btn-group-xs btn-group-md">
          <button type="button" class="btn btn-primary"><i class="concretada fa fa-btn glyphicon glyphicon-star" data-id="{{ $contrato['id'] }}" data-token="{{ csrf_token() }}" height="100%" ></i></button>
          <button type="button" class="btn btn-primary"><i class="liberar fa fa-btn glyphicon glyphicon-star" data-id="{{ $contrato['id'] }}" data-token="{{ csrf_token() }}" height="100%" ></i></button>
          <button type="button" class="btn btn-primary"><i class="whatsapp fa fa-btn glyphicon glyphicon-star"></i></button>
        </div>
        <!--div class="col-sm-4 col-xs-4 col-lg-4 col-md-4 text-center" style="margin-right:1em;">
          <img src="{{ url('images/negociacionconcretada.png') }}" class="concretada img-responsive" data-id="{{ $contrato['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
        </div>
        <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4 text-center" style="margin-right:1em;">
          <img src="{{ url('images/liberarnegociacion.png') }}" class="liberar img-responsive" data-id="{{ $contrato['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
        </div>
        <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4 text-center" style="margin-right:1em;">
          <div class="whatsapp"><i class="fa fa-btn glyphicon glyphicon-star"></i>mis ofertas</div>
        </div-->
      </div>
    </div>
  </div>
</div>
</div>
<?php }?>
@endforeach
</div>
@overwrite