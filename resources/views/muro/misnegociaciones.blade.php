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
<!--sino tengo ningun contrato (oferta reservada) negociado me muestra solo el historico, o sea  var contratoC -->

  @if (!empty($contratos))
  @foreach ($contratos as $contrato)
  <?php
  //busco usuario dueño de la oferta reservada
  if (isset($contrato)&&$contrato['concretada'] == 0) {
 
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
            <button type="button" style="background:transparent;border:transparent;"> 
                <img src="{{ url('images/negociacionconcretada.png') }}" class="img-responsive concretada" data-id="{{ $contrato['id'] }}" />
            </button>   
          </div>
        </div>
        <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding-left:1px;padding-right:1px;">
          <div class="blockCenter">
           <button type="button" style="background:transparent;border:transparent;">
                <img src="{{ url('images/liberarnegociacion.png') }}" class="img-responsive liberar" data-id="{{ $contrato['id'] }}"/>
          </button>   
         </div>
       </div>
  <!-- comento el boton de wp-->     
  <!-- emprolijar para que el campo no se llame data-celular -->
       <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="padding-left:1px;padding-right:1px;">
        <div class="blockCenter">
          <button type="button" style="background:transparent;border:transparent;">
             <img src="{{ url('images/email.png') }}" class="img-responsive whatsapp" data-celular="{{$usuario->name}}" data-prueba="N" />
          </button>   
        </div>
      </div>

  <!-- fin del boton de wp-->         
    </div>
  </div>
</div>
</div>
<?php }
 }
?>
@endforeach
@endif

<!-- muestro el historico de mis negociaciones, donde yo quise comprar -->

<div class="row">
  <div class="row" style="margin-bottom: 1em;">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" > Historico de Negociaciones :</font></div>
  </div>
</div>

@foreach ($contratosC as $contratoC)
<?php
//busco usuario dueño de la oferta reservada
$usuarios = App\Models\User::where('id', $contratoC['user_id'])->get();
foreach($usuarios as $usuario){
 
?> 
 <!-- todo: mostrar si el usuario esta online -->
 
 <div class="oferta noestaOnline">
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

              if ($contratoC['moneda'] == "usd"){
                echo "<font style='color:orange;font-size:1.2em;'>VENDIO</font>";
              }else if($contratoC['moneda'] == "uyu"){
                echo "<font style='color:white;font-size:1.2em;'>COMPRÓ</font>";
              }

              ?>
            </h5>
          </div>
          <div class="row">
            <h5 class="media-heading">
              <span class="enDolares" font style="color:white;font-size:1.2em;">
                <?php

                if ($contratoC['moneda'] == "usd"){
                  echo "  US$ ".$contratoC['cantidad'];
                }else if($contratoC['moneda'] == "uyu"){
                  echo "  US$ ".$contratoC['resultado'];
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

                  switch ($contratoC['moneda']) {
                    case 'usd':
                    echo "$ ";
                    break;
                    default:
                    echo "$ ";
                    break;
                  }

                  switch ($contratoC['moneda']) {
                    case 'usd':
                    echo $contratoC['resultado'];
                    break;
                    default:
                    echo $contratoC['cantidad'];
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
<!-- 
   Ver si queda bien mostrar directamente fecha y comentario
   Y/o Cambiar el icono para que muestre la trn de calificacion en modo lectura.
-->
  <div class="media-right" >
    <div class="row text-center botonCallToAction " style="background:#ffa500;" >
      <div class="vcenter">
        <div class="col-sm-7 col-xs-7 col-lg-7 col-md-7 text-center" style="padding-left:1px">
          <font style="color:white;"> <?php echo  substr($contratoC['updated_at'],0,10);?> </font>
        </div>
        <!--
        <div class="col-sm-5 col-xs-5 col-lg-5 col-md-5 text-center" style="margin-right:1em;">
          <font style="color:white;"> <?php //echo $contratoC['comentario'];?> </font>          
        </div>
        -->
        <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4 text-center" style="padding-left:1px;padding-right:1px;">
          <!-- no se esta cargando la variable -->
          <input type="hidden" id="idHistoria" />
          <button type="button" style="background:transparent;border:transparent;">
              <img src="{{ url('images/calificado.png') }}" class="concretada2 img-responsive" data-id="{{ $contratoC['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
          </button>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
<?php 
  }

?>
@endforeach







</div>
@overwrite