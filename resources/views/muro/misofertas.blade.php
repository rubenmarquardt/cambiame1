@extends('layouts.app4')

@section('contenido del muro')
<div class="row">
  @include('muro.interbancario')
</div>
<div class="row">
  @include('muro.ingreso')
</div>
<!--
  include('muro.calculadora')
-->
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
<div class="row">
  <div class="row" style="margin-bottom: 1em;">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >Mis Ofertas</font></div>
  </div>

  <!-- mostrar las ofertas del usuario no concretadas-->
  @foreach ($ofertas as $oferta)
  
  @if($oferta['concretada'] == 0)
  @if($oferta['activa'] == 1) 

  <div class="oferta estaOnline">
    <div class="media">
      <div class="media-left">
      

       <?php 
          if (trim($oferta['reserva']) =="0") 
				  {
				?>
            <!-- width="80px" no se porque si le pongo % se pierde la imagen-->
              <a href="{{ $tmp[0]['linkedinProfile']}}" target="_blank">
                <img class="tamanioImg"  width="500%"  src="<?php echo $tmp[0]['pictureUrl']; ?>" title="<?php echo $tmp[0]['name']; ?>" alt="<?php echo $tmp[0]['name'];?>">
              </a>
      <?php 
					}
					else
					{

              $usuariosR = App\Models\User::where('id',$oferta['reserva'])->get();  
              foreach($usuariosR as $usuarioR)
              {
                $nombreR =   $usuarioR;
              }  
 				   ?> 	
           <!-- armar algo similar para calificarh (esta abierta en este editor) -->
            <a href="{{ $nombreR['linkedinProfile']}}" target="_blank">
              <img class="tamanioImg" src="<?php echo $nombreR['pictureUrl']; ?>" title="<?php echo $nombreR['name']; ?>" alt="<?php echo $nombreR['name'];?>">
            </a>
      <?php	
					}
				?>


      </div>
      <div class="media-body">
        <div class="row">
          <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
            <div class="row">
              <h5 class="media-heading">
                <?php

                if ($oferta['moneda'] == "usd"){
                  //echo "<font style='color:orange;font-size:1.2em'>VENDO</font>";
                  echo "<font class='textoOferta1'>VENDO</font>";
                }else if($oferta['moneda'] == "uyu"){
                  //echo "<font style='color:white;font-size:1.2em'>COMPRO</font>";
                  echo "<font class='textoOferta2'>COMPRO</font>";
                }
                ?>
              </h5>
            </div>
            <div class="row">

              <!--
              <h5 class="media-heading">
                <span class="enDolares" font style="color:#aaa;font-size:1.2em;">
             -->   
              <font class="textoOfertaDolar">  
              <span class="currencyLabel">				
                  <?php

                  if ($oferta['moneda'] == "usd"){
                    echo "  US$ ".$oferta['cantidad'];
                  }else if($oferta['moneda'] == "uyu"){
                    echo "  US$ ".$oferta['resultado'];
                  }
              //    echo 'tengo oferta' .  $oferta['id'] ;

                  ?>
           
                </span>
              </font>
            <!--           
              </h5>
           -->   
            </div>
            <div class="row">
              <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
                <p>
                  <!--
                  <font class="muroOferta" style="font-size:1.3em;">
                  -->  
                  <font class="textoOfertaPesos">    
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
              </p><span style="font-size:1em;color:#aaa;"><?php echo  substr($oferta['updated_at'],0,10);?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="media-right" >
      <div class="row text-center botonCallToAction">
      <!--
        <img src="{{ url('images/close.png') }}" class="deleteProduct" data-id="{{ $oferta['id'] }}" data-token="{{ csrf_token() }}" height="100%" />
      -->

      <!-- solo muestro el dejo borrar cuando no esta reservada aun -->
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

      </div>
    </div>
  </div>
</div>
@endif
@endif
@endforeach

<!-- muestro el historico de mis ofertas, donde yo quise vender -->

<div class="row">
  <div class="row" style="margin-bottom: 1em;">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 oferNegociables text-center"><font class="labeltext oferText" >Histórico de Ofertas</font></div>
  </div>
</div>

@foreach ($contratosC as $contratoC)
@if($contratoC['activa'] == 1) 
<?php

$usuarios = App\Models\User::where('id', $contratoC['user_id'])->get();
foreach($usuarios as $usuario){

//por ahora limito el array a las ofertas no concretadas del usuario logueado
if ($contratoC->concretada !== 0 && $contratoC->user_id==$tmp[0]['id'])
{
// en contratoC->concretada tengo el id del usuario que estoy precisando.......
   $usuariosC = App\Models\User::where('id',$contratoC->concretada)->get();  
    foreach($usuariosC as $usuarioC)
    {
      $nombreC =   $usuarioC;
    }  

?> 
 <!-- todo: mostrar si el usuario esta online -->
 
 <div class="oferta noestaOnline">
  <div class="media">
    <div class="media-left">
      <a href="{{$nombreC->linkedinProfile}}" target="_blank">
        <img class="tamanioImg" src="<?php echo $nombreC->pictureUrl; ?>" title="<?php echo $nombreC['name']; ?>" alt="<?php echo $nombreC->name;?>">
      </a>
    </div>
    <div class="media-body">
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <div class="row">
            <h5 class="media-heading">
              <?php

              if ($contratoC['moneda'] == "usd"){
                //echo "<font style='color:orange;font-size:1.2em;'>VENDIO</font>";
                echo "<font class='textoOferta1'>VENDIO</font>";
              }else if($contratoC['moneda'] == "uyu"){
                //echo "<font style='color:white;font-size:1.2em;'>COMPRÓ</font>";
                echo "<font class='textoOferta2'>COMPRÓ</font>";
              }

              ?>
            </h5>
          </div>
          <div class="row">
            <!--
            <h5 class="media-heading">
               <span class="enDolares" font style="color:white;font-size:1.2em;">
            -->   
              <font class="textoOfertaDolar">  
              <span class="currencyLabel">		  
                <?php

                if ($contratoC['moneda'] == "usd"){
                  echo "  US$ ".$contratoC['cantidad'];
                }else if($contratoC['moneda'] == "uyu"){
                  echo "  US$ ".$contratoC['resultado'];
                }

                ?>
              </span>
              </font>
            <!--
            </h5>
            -->
          </div>
          <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
              <p>
                <!--
                <font class="muroOferta" style="font-size:1.3em;">
                -->
                 <font class="textoOfertaPesos">     
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
            </p><span style="font-size:1em;color:#aaa;"><?php echo  substr($contratoC['updated_at'],0,10);?></span>
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
    <div class="row text-center botonCallToAction " style="background:orange;" >
      <div class="vcenter">
        <!--
        <div class="col-sm-4 col-xs-4 col-lg-5 col-md-4 text-center" style="padding-left:1px;padding-right:1px;">
            <button type="button" style="background:transparent;border:transparent;"> 
                <img src="{{ url('images/negociacionconcretada.png') }}" title="Calificar al Comprador" class="img-responsive concretada3" data-id="{{  Hashids::encode($contratoC['id']) }}" />
            </button>   
        </div>
        -->    
        <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6 text-center" style="padding-left:1px;padding-right:1px;">
            <button type="button" style="background:transparent;border:transparent;">
               <img src="{{ url('images/calificado.png') }}" title="Ver calificación de la compra y/o Calificar al comprador" class="concretada2 img-responsive" data-id="{{ Hashids::encode($contratoC['id']) }}" data-token="{{ csrf_token() }}" height="100%" />
            </button>      
         </div>     
      </div>
    </div>
  </div>
</div>
</div>
<?php 
  }

 }
?>
@endif
@endforeach

</div>
@overwrite