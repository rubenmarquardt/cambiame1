@extends('layouts.app4')
@section('contenido del muro')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Califica la transaccion.
			</h3>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
					<div class="row">
						<div class="col-md-12">
							<img class="img-circle foto-perfil img-responsive" src="<?php echo $usr['pictureUrl']; ?>" alt="<?php echo $usr['name'];?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="centerBlock">
								<!--input id="rate" name="input-name" type="number" class="rating" min=1 max=5 step=1 data-size="xs" ><br /-->
								<input id="input-2-ltr-star-sm" name="input-2-ltr-star-sm" class="kv-ltr-theme-fa-star rating-loading" value="2" dir="ltr" data-size="sm">
								<input type="hidden" value="{{ $transaccion['id']}}" id="idTrans" data-token="{{ csrf_token() }}"/>
							</div>
						</div>
					</div>
				</div>
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
										El dolar al momento de la negociacion:
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
					<div class="row">
						<div class="col-md-12">
							<p>
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@overwrite