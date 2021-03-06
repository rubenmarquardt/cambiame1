@extends('layouts.app4')
@section('contenido del muro')

<?php
	if(Auth::user()->id == $transaccion['user_id'])
		$origen = 'O';
	else    
		$origen = 'N';									 			
?>	 
<input type="hidden" value="{{ Hashids::encode($transaccion['id']) }}" id="idTrans" data-token="{{ csrf_token() }}"/>
<input type="hidden" value="{{ Hashids::encode($usr['id']) }}" id="idUsr" data-token="{{ csrf_token() }}"/>
<input type="hidden" value="{{ Hashids::encode($transaccion['reserva']) }}" id="idUsrRes" data-token="{{ csrf_token() }}"/>
<input type="hidden" value="{{ Hashids::encode($transaccion['concretada']) }}" id="idUsrCon" data-token="{{ csrf_token() }}"/>
													 
<div class="container-fluid" id="contenedorCalif">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center">
				Calificación de la transacción Nro: {{$transaccion['id']}}
			</h2>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
					<div class="row">
						<div class="col-md-12">
							<div class="centerBlock">
								<dl>
									<dt>
										<?php
										if ($transaccion['moneda'] == "usd"){
											echo "Compraste: ";
											$dolares = true;
										}else if($transaccion['moneda'] == "uyu"){
											echo "Vendiste: ";
											$dolares = false;
										}
										?>
									</dt>
									<dd>
										<?php
										echo $transaccion['cantidad']." ";
										if($dolares){
											echo "dolares";
										}else{
											echo "pesos";
										}
										?>
									</dd>
									<dt>
										<?php

										if ($transaccion['moneda'] == "usd"){
											echo "Recibiste: ";

										}else if($transaccion['moneda'] == "uyu"){
											echo "Entregaste: ";

										}
										?>
									</dt>
									<dd>
										<?php 
										echo $transaccion['resultado']." ";
										if($dolares){
											echo "pesos";
										}else{
											echo "dolares";
										}
										?>
									</dd>

									<dt>
										El dólar al momento de la negociación:
									</dt>
									<dd>
										<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6" style="background:orange;">
											<div class="centerBlock">
												<h3>Interbancario</h3>
												<div class="centerBlock">
													<bold>{{$transaccion['dolarInter']}}</bold>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6" style="background:grey;">
											<div class="centerBlock">
												<h3>Pizarra</h3>
												<div class="centerBlock">
													<bold>{{$transaccion['dolarCambio']}}</bold>
												</div>
											</div>
										</div>
									</dd>

								</dl>
							</div>
						</div>
					</div>

				</div>
			</div>
			<form role="form">
			<div class="row">
				<div class="container-fluid">
					<div class="centerBlock">

						<div class="row">
							<div class="col-md-12">
								<div class="centerBlock">
								<?php 
								 if (trim($transaccion['comentario']) =="") 
								 {
								?>	 
								 <input id="input-2-ltr-star-sm" name="input-2-ltr-star-sm" class="kv-ltr-theme-fa-star rating-loading" value="2" dir="ltr" data-size="sm">
								<?php 
								 }
								 ?>

								<?php 
									if (trim($transaccion['comentario']) =="") 
									{
									?>
											<h3> <?php echo $usr['name'];?> 
											<img class="img-circle foto-perfil img-responsive" src="<?php echo $usr['pictureUrl']; ?>" title="<?php echo $usr->name;?>" alt="<?php echo $usr['name'];?>">								
											</h3>
									<?php
									}
									else
									{
										$usuariosC = App\Models\User::where('id',$transaccion->concretada)->get();  
										foreach($usuariosC as $usuarioC)
										{
											$nombreC =   $usuarioC;
										}
									?>
											<h3>Comprador: <?php echo $nombreC['name'];?> 
											<img class="img-circle foto-perfil tamanioImg" src="<?php echo $nombreC['pictureUrl']; ?>" title="<?php echo $nombreC->name;?>" alt="<?php echo $nombreC['name'];?>">								
											</h3>

										<label for="dejarComment2">
											Comentario:
										</label>
											<?php 
											if (trim($transaccion['comentario2']) !="") 
											{
											?> 					
												{{$transaccion['comentario2']}}
												&nbsp;
												Calificación Otorgada:
												{{$transaccion['rate2']}}
												<input id="rate2" name="input-name" type="number" class="rating" min=1 max=5 step=1 data-size="xs"  value="{{ $transaccion['rate2']}}" disabled="true"/>
											<?php 
											}
											else
											{
												//si vengo de ofertas puedo calificar al comprador, 
												//si vengo de negociaciones no xq me estaria calificando a mi mismo
												if(Auth::user()->id == $transaccion['user_id'])	
												{
											?> 	
												<input id="input-3-ltr-star-sm" name="input-3-ltr-star-sm" class="kv-ltr-theme-fa-star rating-loading" value="2" dir="ltr" data-size="sm">			
												&nbsp;
												<textarea rows="4" class="form-control" name="comentario2" form="form" id="dejarComment2" placeholder="Deja un comentario de la transaccion"></textarea>
											<?php	
												}
											}
											?>


											<h3>
												--------------------------------------------------------
											</h3>

											<h3>Vendedor: <?php echo $usr['name'];?> 
											<!--
											<img class="tamanioImg" src="<?php echo $usr['pictureUrl']; ?>" title="<?php echo $usr->name;?>" alt="<?php echo $usr['name'];?>">								
											Ver si esta ok aunque no queda centrado como si queda el "Comprador"
											-->												
											<img class="img-circle foto-perfil tamanioImg" src="<?php echo $usr['pictureUrl']; ?>" title="<?php echo $usr->name;?>" alt="<?php echo $usr['name'];?>">								
											
											</h3>
									<?php
									}
									?>

								</div>
							</div>
						</div>
					
						<div class="row">
							<div class="col-md-12">
									<div class="form-group">
										<!--ocultar si tiene comentarios 
										to do: pasar l calificacion a estrellas, usando el control de las pag de inicio-->

										<label for="dejarComment">
											Comentario:
										</label>
										<?php 
										  if (trim($transaccion['comentario']) !="") 
										  {
										 ?> 					
											{{$transaccion['comentario']}}
										 	&nbsp;
										   	Calificación Otorgada:
											{{$transaccion['rate']}}
											<input id="rate" name="input-name" type="number" class="rating" min=1 max=5 step=1 data-size="xs"  value="{{ $transaccion['rate']}}" disabled="true"/>
										<?php 
										}
										else
										{
 										?> 					
											<textarea rows="4" class="form-control" name="comentario" form="form" id="dejarComment" placeholder="Deja un comentario de la transaccion"></textarea>
										<?php	
										}
										?>			
												
										
									</div>

										<!--
										todo: compartir comentario en facebook
										div class="checkbox">

											<label>
												<input type="checkbox" /> Check me out
											</label>
										</div--> 
										<div class="row">
											<div class="centerBlock">
											<?php 
								 			if (trim($transaccion['comentario']) !="") 
											{	 
											?>											
											</div>											
										</div>
										<button id="cierroTrans" type="button" class="btn btn-default" style="color:white;background:orange;border:transparent;text-shadow:none;font-size:2em;"
												 data-prueba="{{$origen}}" >Cerrar
												 </button>
									 <?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

@overwrite

