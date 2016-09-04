<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambiame HappyBot</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Animate CSS framework-->
	<link rel="stylesheet" href="{{ url('css')}}/animate.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link href="{{ url('css/app2.css') }}" rel="stylesheet">

</head>
<body>
	<div class="well well-lg">
	Gracias por registrarte {!!$user->name!!} !

	Ten en cuenta que existen pasos para aumentar tu nivel de credibilidad/confianza basados en:

	<ul>
		<li>Verificacion de tu mail de trabajo; que corresponda a tu ultimo trabajo en linkedin</li>
		<li>Historico de cantidad de transacciones satisfactorias (puntuacion y feedback de otros usuarios)</li>
		<li>Verificar tu celular (si tenes contrato este punto vale doble)</li>
		<li>ingresar una tarjeta de credito (de momento solo internacional es valida)</li>
	</ul>
	</div>
</body>
</html>