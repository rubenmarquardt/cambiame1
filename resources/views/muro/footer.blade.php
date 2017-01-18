    <!-- Modal oferta publicada-->
    <div class="modal modal-fullscreen fade" id="modal-fullscreen-ofertapublicada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
            <div class="row">
              <div class="centerBlock">
                <h4 class="modal-title" id="myModalLabel">Oferta Publicada</h4>
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="centerBlock">
              Oferta Publicada con Exito!
            </div>
          </div>
          <div class="modal-footer">
            <div class="centerBlock">
              <button id="cierroModal" type="button" class="btn btn-default" data-dismiss="modal" style="color:white;background:orange;border:transparent;text-shadow:none;font-size:2em;">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--
    <div class="modal modal-fullscreen fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="backgroudn:#494e48;color:white;">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content" style="background:#494e48;color:white;    height: 359px;">
          
           <div class="modal-header" style="    margin-top: 5%;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="centerBlock" style="margin-top: 5%;">
            <h4 class="modal-title" id="myModalLabel">Oferta publicada</h4>
         </div>
          <div class="modal-body">
          <div class="centerBlock">
           <p style="margin-top:5%"> Oferta publicada con Exito! </p>
          </div>
          <div class="modal-footer">
            <div class="centerBlock" style="    margin-top: 55px;">
              <button id="cierroModal" type="button" class="btn btn-default" data-dismiss="modal" style="background:transparent;border:transparent;text-shadow:none;font-size:2em;">Cerrar</button>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
-->
<div class="modal modal-fullscreen fade" id="modal-fullscreen-negociar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:#494e48;color:white;">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Datos del Anunciante</h4>
    </div>
    <div class="modal-body">
      <div class="row">
       <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
        <center><font style="font-size:2em" id="numeroCel"></font></center>
      </div>
    </div>
    <div class="row">
     <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12" style="background:orange">
      <center>
      <p><font style="h1" id="mensaje1"></font></p> </center>
      <!--
        <h1>Continua la transaccion presionado Reservar oferta. Recbiras un e-mail con los datos de la misma</h1>

      <button id="copiarPPapeles" type="button" class="btn btn-default" data-clipboard-target="#numeroCel" style="background:transparent;border:solid 0px black;text-shadow:none;margin-top:3em;width:50%;">Copiar al portapapeles!</button>
      -->
     </div>
     <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
       <center><button id="hazReserva" type="button" class="btn btn-default animated infinite pulse" style="margin-top:3em;margin-bottom:3em;">Reservar oferta!</button>
          <p><font style="h1" id="mensaje2"></font></p>
        </center>
        <!--
        <p>Presionando Reservar Oferta, la misma se quita del muro temporalmente hasta concretar la negociación</p>
        -->
      </div>
    </div>
    <div class="modal-footer" style="text-align:center;">
     <button id="cierroModal" type="button" class="btn " style="background:transparent;border:transparent;text-shadow:none;font-size:2em;" data-dismiss="modal">Cerrar</button>

   </div>
 </div>
</div>
</div>
</div>
  <!-- Modal Negociar
  <div class="modal modal-fullscreen fade" id="myModalNegociar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="backgroudn:#494e48;color:white;">
   <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:#494e48;color:white;">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Datos del Anunciante</h4>
    </div>
    <div class="modal-body">
      <div class="row">
       <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
        <center><font style="font-size:2em" id="numeroCel"></font></center>
      </div>
    </div>
    <div class="row">
     <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12" style="background:orange">
      <center><button id="copiarPPapeles" type="button" class="btn btn-default" data-clipboard-target="#numeroCel" style="background:transparent;border:solid 1px black;text-shadow:none;margin-top:3em;">Copiar al portapapeles!</button>
       <h1>Continua la transaccion por whatsapp</h1></center>
     </div>
     <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
       <center><button id="hazReserva" type="button" class="btn btn-default animated infinite pulse" style="margin-top:3em;margin-bottom:3em;">Reservar oferta!</button>
        <p>Haz la reserva para que la oferta se quite del muro temporalmente hasta concretar la negociación</p></center>
      </div>
    </div>
    <div class="modal-footer" style="text-align:center;">
     <button id="cierroModal" type="button" class="btn " style="background:transparent;border:transparent;text-shadow:none;font-size:2em;" data-dismiss="modal">Cerrar</button>

   </div>
 </div>
</div>
</div>
</div>
-->
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
<script src="{{url('js')}}/star-rating.min.js" type="text/javascript"></script>
<script src="{{url('js')}}/theme.js" type="text/javascript"></script>
<script src="{{url('js/jquery.blockUI.js')}}" ></script>


<!--script src="js/app.js"></scriptque tiene este archivo que jode??? --> 

<script>


  $(document).ready(function(){
   $.unblockUI();
   new Clipboard('#copiarPPapeles');
    /*   $(".currencyLabel").text();
       $(".currencyLabel").formatCurrency({region : 'es-UY'});
       
       $(".enDolares").formatCurrency();
       */

       $dolarInter = $('.aaa').text();
       

       $dolarCambioCompra = $('#valPizaComp').val();

       $dolarCambioVenta = $('#valPizaVent').val();


       $('#mostrarCalc').hide();
       $select = $('#selectCambiameMone');

       function calculadora(){
       	$amount = $('#exampleInputAmount');
       	$dolarInter = $('.aaa').text();

       	var dolarCambioCompra = parseFloat($dolarCambioCompra.replace(',','.'));
       	var dolarCambioVenta = parseFloat($dolarCambioVenta.replace(',','.'));

       	var cantidad = parseFloat($amount.val());
       	var dolarInter = parseFloat($dolarInter.replace(',','.'));

       	var pesoadolarinter = parseFloat(cantidad / dolarInter ).toFixed(2);
       	var pesoadolarcambios = parseFloat(cantidad / dolarCambioVenta).toFixed(2);

         //07-11-2016: SE CORRIGE EL TEMA DEL FORMATEO, HAY QUE VER BIEN QUE NO IMPACTE EN LOS CALCULOS, EL TEMA DE FIXED SOBRE TODO		
       	if($amount.val() != "" && $select.val() == 0){
       		$('#selectCambiameMone').val(0);

       		var ahorras = parseFloat((pesoadolarinter - pesoadolarcambios));
       		ahorras = parseFloat(ahorras * dolarCambioVenta).toFixed(0);

       		$ahorrasF = '' + parseFloat(ahorras).formatMoney(0, ',', '.'); 
          $('#ahorras').text('$ ' + $ahorrasF);
//     		$('#ahorras').text('$ ' + ahorras);

       		$('#uyu').hide();
       		$('#usd').show();
       	//$('#cantEnUyu').text(pesoadolarinter);
         $pesoadolarinter2 = '' + parseFloat(pesoadolarinter).formatMoney(2, ',', '.');
			  $('#cantEnUyu').text($pesoadolarinter2);
       //	$('#pizarra').text(dolarCambioVenta);
	   		$('#pizarra').text('' + $dolarCambioVenta);

	   // formateo los US$ que te ahorras 			
      $pesoadolarcambios2 = '' + parseFloat(pesoadolarcambios).formatMoney(2, ',', '.');
			$('#enCambios').text($pesoadolarcambios2 + " dolares");
     //	$('#enCambios').text(pesoadolarcambios + " dolares");

       	}else if($amount.val() != "" && $select.val() == 1){

       		$('#selectCambiameMone').val(1);

//     		var dolarapesointer = parseFloat(cantidad * dolarInter ).toFixed(2);
//			var dolarapesocambios = parseFloat(cantidad * dolarCambioCompra).toFixed(2);

//formateo sin decimales los $ que ahorro - Verificar la cuenta
      var dolarapesointer = parseFloat(cantidad * dolarInter ).toFixed(0);
			var dolarapesocambios = parseFloat(cantidad * dolarCambioCompra).toFixed(0);

    		//var ahorras = parseFloat((dolarapesointer - dolarapesocambios)).toFixed(2);
//formateo sin decimales los $ que ahorro
			var ahorras = parseFloat((dolarapesointer - dolarapesocambios)).toFixed(0);

       		console.log(ahorras);

          $ahorrasF = '' + parseFloat(ahorras).formatMoney(0, ',', '.'); 
         $('#ahorras').text('$ ' + $ahorrasF);
//        $('#ahorras').text('$ ' + ahorras);
 
       		$('#usd').hide();
       		$('#uyu').show();

         $dolarapesointer = '' + parseFloat(dolarapesointer).formatMoney(0, ',', '.');
 		      $('#cantEnUyu').text($dolarapesointer);
    // 		$('#cantEnUyu').text(dolarapesointer);

//le formateo el "," a la pizarra
//    		$('#pizarra').text(dolarCambioCompra);
       		$('#pizarra').text('' + $dolarCambioCompra);

        var dolarapesocambios2 = parseFloat(dolarapesocambios);
            $cambiado = '' + dolarapesocambios2.formatMoney(0, ',', '.');

       		  $('#enCambios').text($cambiado + " pesos");  
  //     		$('#enCambios').text(dolarapesocambios + " pesos");

       	}
//23-11-2016: esta llamndo bien a la funcion y formteando el nro
        $amountF = '' + parseFloat(cantidad).formatMoney(0, ',', '.');
        $('#cantF').text($amountF) ;
//     el tema que si lo asingo como texto no hace nada y como valor no lo asigna a la textbox, 
//     una opcion podria ser mostrarlo como label debajo 
//        $('#exampleInputAmount').text($amountF) ; 
//        $('#exampleInputAmount').val($amountF) ;



//23-11-2016: esta llamndo bien a la funcion y formteando el nro
        $amountF = '' + parseFloat(cantidad).formatMoney(0, ',', '.');
        $('#cantF').text($amountF) ;
//     el tema que si lo asingo como texto no hace nada y como valor no lo asigna a la textbox, 
//     una opcion podria ser mostrarlo como label debajo 
//        $('#exampleInputAmount').text($amountF) ; 
//        $('#exampleInputAmount').val($amountF) ;

//07-11-2016: Fin de modificaciones de formato

       	$('#contenedorCalc2').show();
       	$('#contenedorCalc2').animate({height:'401px'});
       	$('#calculador').animate({height:'290'});
       	$('#calculador2').animate({height:'290'});
       	$('#mostrarCalc').fadeIn('fast');
       }

       $('#contenedorCalc').click(function(){
       	calculadora();
       });

      /*
       $('#selectCambiameMone').on('change', function(){
       	calculadora();
      */ 

       $('#selectCambiameMone').on('change', function(){
         //corrijo el error del vacio
         $amountVacio = $('#exampleInputAmount');
         if ($amountVacio.val() != "") {
           calculadora();
         }

       });

       function bloqueoUI(){
       	$.blockUI({ message: '<img src="{{url('images/ripple.svg')}}" />', css: { backgroundColor: 'transparent', border: 'none'} });

       }

       $('#modal-fullscreen-negociar').find('#cierroModal').on('click', function(){

       	$('#hazReserva').prop("disabled", false);

        $('#hazReserva').text("Reservar Oferta!");
        $('#hazReserva').addClass('animate infinite pulse');
      });

       $('#modal-fullscreen-ofertapublicada').find('#cierroModal').on('click', function(){

        bloqueoUI();
        location.reload();

      });

       $('#publicarOfer').one('click', function(e){
        $.blockUI({ message: '<img src="images/ripple.svg" />', css: { backgroundColor: 'transparent', border: 'none'} });
        $('#publicarOfer').attr("disable", true);
        $('#exampleInputAmount').attr("disable", true);
        $form.submit();
      });

       $(function() {

        var $body = $(document);
        $body.bind('scroll', function() {
        // "Disable" the horizontal scroll.
        if ($body.scrollLeft() !== 0) {
        	$body.scrollLeft(0);
        }
      });

      }); 

       /*   $selectAccion = $('#selectCambiameAccion');*/


       $form = $('#salvadorOferta');
       $form.submit(function(e){

                //todo si valor de accion es calcular algo salio mal
                e.preventDefault();
                var data = $form.serialize();
                
                if($('#selectCambiameMone').val()==0){
                	var dolarCambio = parseFloat($dolarCambioVenta.replace(',','.'));
                }else{
                	var dolarCambio = parseFloat($dolarCambioCompra.replace(',','.'));
                }
                // data += "&moneda=" + $('#selectCambiameMone').val() + "&dolarInter=" + parseFloat($dolarInter.replace(',','.')) + "&dolarCambio=" + dolarCambio + "&resultado=" +  parseFloat($('#cantEnUyu').text());
    // 24/11: le grabo la cantidad ya formateada
                data += "&moneda=" + $('#selectCambiameMone').val() + "&dolarInter=" + parseFloat($dolarInter.replace(',','.')) + "&dolarCambio=" + dolarCambio + "&resultado=" +  $('#cantEnUyu').text() + "&cantidad=" + $('#cantF').text() ;
                
                $.ajax({ 
                	method: "POST", 
                	url: "{{url('salvaroferta')}}", 
                	data: data,
                	success: function(result){
                		$.unblockUI();
                		$('#publicarOfer').attr("disable", false);
                		$('#exampleInputAmount').attr("disable", false);
                		if(result == 1){
                			$('#contenedorCalc2').animate({height:'0px'});
                			$('#calculador').animate({height:'0'});
                			$('#calculador2').animate({height:'0'});
                			$('#mostrarCalc').fadeOut();
                			window.scrollTo(0, 0);
                			$('#modal-fullscreen-ofertapublicada').modal();
                		}else{
                			alert(result.error);
                		}
                	}

                });
              });

    $('#registro').on('click', function(e){
    	if($('#celular').val()!=""){
    		$('#formRegistro').submit();
    	}else{
    		e.preventDefault();
    		$('#celular').addClass('shake animated');
    		$('#celular').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
    			$('#celular').removeClass('shake animated')
    		});

    	}

      });

    $('.sinLogin').on('click', function(){
        alert('Debes Loguearte para poder negociar!');
      //confirm('Debes loguearte !');
    });

    var aCeluar = "";
    var elId = "";

    $('.whatsapp').on('click', function(){
      aVengo  = $(this).data("prueba");
      //Vengo desde oferta 
      if (aVengo=="O")
      {     
        $('#mensaje1').text('Continua la transaccion presionado Reservar oferta. Recbiras un e-mail con los datos de la misma');
        $('#mensaje2').text('Presionando Reservar Oferta, la misma se quita del muro temporalmente hasta concretar la negociación');

        $('#hazReserva').prop("disabled", false);
        $('#hazReserva').text("Reservar Oferta!");
        $('#hazReserva').addClass('animate infinite pulse');
     }else
      {     
        //Vengo desde negociaciones 
        //aVengo=="N"
        $('#mensaje1').text('Chequea tu e-mail con los datos del Anunciante');
        $('#mensaje2').text('La Oferta fue reservada temporalmente hasta concretar la negociación');

        $('#hazReserva').prop("disabled", true);
        $('#hazReserva').attr("color", "white");
        $('#hazReserva').text("Reservado!");
        $('#hazReserva').removeClass('animate infinite pulse');
      }  

      elId = $(this).prev().closest('#elId').val();

      aCelular = $(this).data("celular");
      $('#numeroCel').text(aCelular);

      $('#modal-fullscreen-negociar').modal();

    });

    $('#copiarPPapeles').on('click', function(){ 
    	$(this).text("Copiado !");
    });

    $('#hazReserva').on('click', function(){
//alert('entro a reservar...');      
      bloqueoUI();
      $botonRes = $(this);
      data = "idoferta=" + elId;
      $.ajax({ 
        method: "POST", 
        url: "reservarOferta", 
        data: data,
        success: function(result){
         if(result == 0){
		            //todo
		            $botonRes.prop("disabled", true);
		            $botonRes.attr("color", "white");
		            $botonRes.text("Reservado!");
		            $botonRes.removeClass('animate infinite pulse');
                $.unblockUI();
                $('#elId').val(elId).closest('.container-fluid').fadeOut('slow');
                elId = '';
              }else{
               $botonRes.text("error");
               if(confirm('No se pudo reservar la oferta')){
                location.reload();
              }
            }
          } 
        });

    });


    $(".deleteProduct").click(function(){
    	var id = $(this).data("id");
    	var token = $(this).data("token");
    	if(confirm('seguro que desea eliminar oferta?')){
//confirm('Antes de Ejecutar el Ajax');
        $.ajax(
        {
         url: "{{url('oferta/delete')}}/"+id,
         type: 'DELETE',
         dataType: "JSON",
         data: {
          "id": id,
          "_method": 'DELETE',
          "_token": token,
        },
        success: function ()
        {
//confirm('Antes de BloqueoUI');
          bloqueoUI();
//confirm('Despues de BloqueoUI');
          location.reload();
//confirm('Despues de Reload');
        }
      });
//llega hasta este mensaje, no se ven los mensajes intermedios o sea no entra a "success"      
//confirm(' Despues de Ejecutar el Ajax');
      }


    });

    $(".calificar").click(function(){
      var id = $(this).data("id");
      var token = $(this).data("token");
      location.href = "{{url('transaccion/calificar/')}}/"+id;
    });

    $(".liberar").click(function(){
      bloqueoUI();
      var id = $(this).data("id");
      var token = $(this).data("token");
      if(confirm('seguro que desea liberar negociacion?')){
        $.ajax(
        {
         url: "{{url('oferta/liberar')}}/"+id,
         type: 'POST',
         dataType: "JSON",
         data: {
          "id": id,
          "_method": 'POST',
          "_token": token,
        },
        success: function ()
        {

          location.reload();
        }
      });
      }else{
        $.unblockUI();
      }

    });

    $(".concretada").click(function(){
      bloqueoUI();
      var id = $(this).data("id");
      var token = $(this).data("token");
      if(confirm('luego de concretar la oferta deberas calificar la transaccion')){
        $.ajax(
        {
         url: "{{url('oferta/concretar')}}/"+id,
         type: 'POST',
         dataType: "JSON",
         data: {
          "id": id,
          "_method": 'POST',
          "_token": token,
        },
        success: function ()
        {
          location.href = "{{url('transaccion/calificar/')}}/"+id;
        }
      });
      }else{
        $.unblockUI();
      }


    });

    $('.kv-ltr-theme-fa-star').rating({
      hoverOnClear: false,
      showCaption:false,
      theme: 'krajee-fa'
    });
    
    $('#input-2-ltr-star-sm').on('rating.change', function(event, value, caption) {
     bloqueoUI();
     idTrans = $('#idTrans').val();
     var token = $(this).data("token");
     var comentario = $('#dejarComment').val();
     idUsr = $('#idUsr').val();
     var dejar_comment = false;
     if($('#dejarComment').val() == ""){
      dejar_comment = confirm('Seguro que no quiere dejar un comentario?');

    } 
    if($('#dejarComment').val() !== "" ){
      dejar_comment = true;
    }
    if (dejar_comment){

      $.ajax(
      {
        url: "{{url('guardarate')}}",
        type: 'POST',
        dataType: "JSON",
        data: {
          "idUsr": idUsr,
          "value": value,
          "comentario": comentario,
          "idTrans":idTrans,
          "_method": 'POST',
          "_token": token,
        },
        success: function (result)
        {

          /*todo: modal para voto satisfactorio mostrando las estrellas y el comment del usuario y los otros comments y el promedio del usuario */
           /* $('#myModal').find('#modal-body').html('Voto enviado con exito');
            $('#myModal').find('#myModalLabel').text('Transaccion Exitosa');
            $('#myModal').modal();*/
            alert(result.succes);
            location.href = "{{url('oferta')}}";
          }
        });
    }else{
      $.unblockUI();
    }
  }); 

    $(".modal-transparent").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-transparent");
      }, 0);
    });
    $(".modal-transparent").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-transparent");
    });

    $(".modal-fullscreen").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
      }, 0);
    });
    $(".modal-fullscreen").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
    });

    $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

  });

  //esta funcion tambien tendria que hacer el formateo de la cantidad para que quede guardada ok ?
function soloNumeros(e) 
{ 
var key = window.Event ? e.which : e.keyCode 
return ((key >= 48 && key <= 57) || (key==8)) 
}


Number.prototype.formatMoney = function(c, d, t){  
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    //d = d == undefined ? "." : d, 
    //t = t == undefined ? "," : t, 
    d = d == undefined ? "," : d, 
    t = t == undefined ? "." : t,
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };

  </script>
</div>
</body>
</html>