@extends('layouts.app4')

@section('contenido del muro')
<div class="row">
  @include('muro.interbancario')
</div>


<!-- saco la calculadora de negociaciones
<div class="row">
  // include('muro.ingreso')
</div>
-->
 <!-- saco la calculadora de negociaciones
 //include('muro.calculadora')
 -->
 <!--Agrego una fila de espacios xq no me toma el margen superior -->
<div class="row">
    <font style="font-size:0.8em;color:white;">'</font>
</div>
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

    <div class="container-fluid" style="padding-left:0;">
      <div class="media
      oferta 
      @if($usuario->isOnline())
      estaOnline
      @else
      noestaOnline
      @endif 
      ">
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
                  echo "<font style='color:orange;font-size:1.2em;'>VENDO</font>";
                }else if($contrato['moneda'] == "uyu"){
                  echo "<font style='color:white;font-size:1.2em;'>COMPRO</font>";
                }

                ?>
              </h5>
            </div>
            <div class="row">
              <h5 class="media-heading">
                 <span class="enDolares" font style="color:#aaa;font-size:1.2em;">    

                  <?php

                  if ($contrato['moneda'] == "usd"){
                    echo "US$ ".$contrato['cantidad'];
                  }else if($contrato['moneda'] == "uyu"){
                    echo "US$ ".$contrato['resultado'];
                  }

                  ?>
                </span>
              </h5>
            </div>
            <div class="row">
              <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
                <p>
                  <font class="muroOferta" style="font-size:1.3em;">
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

    <div class="media-right" style="padding-right:10px;">
      <div class="row text-center botonCallToAction " style="background:#ffa500;padding:0px;">

        <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding-left:1px;padding-right:1px;">
          <div class="blockCenter">
            <img src="{{ url('images/negociacionconcretada.png') }}" class="img-responsive concretada" data-id="{{ $contrato['id'] }}" />
          </div>
        </div>
        <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding-left:1px;padding-right:1px;">
          <div class="blockCenter">
           <img src="{{ url('images/liberarnegociacion.png') }}" class="img-responsive liberar" data-id="{{ $contrato['id'] }}"/>
         </div>
       </div>
  <!-- comento el boton de wp-->     
  <!-- emprolijar para que el campo no se llame data-celular -->
       <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding-left:1px;padding-right:1px;">
        <div class="blockCenter">
             <img src="{{ url('images/email.png') }}" class="img-responsive whatsapp" data-celular="{{$usuario->name}}" data-prueba="N" />
        </div>
      </div>

  <!-- fin del boton de wp-->         
    </div>
  </div>
</div>
</div>
<?php }?>
@endforeach
</div>
@overwrite