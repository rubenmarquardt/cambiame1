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

@endforeach
<div class="row">
  <div class="row" style="margin-bottom: 1em;">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >Mis Pre-contratos:</font></div>
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
      <div class="vcenter">
        <div class="col-sm-5 col-xs-5 col-lg-5 col-md-5 text-center" style="margin-right:1em;">
          <img src="{{ url('images/negociacionconcretada.png') }}" class="concretada img-responsive" data-id="{{ $contrato['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
        </div>
        <div class="col-sm-5 col-xs-5 col-lg-5 col-md-5 text-center" style="margin-right:1em;">
          <img src="{{ url('images/liberarnegociacion.png') }}" class="liberar img-responsive" data-id="{{ $contrato['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
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