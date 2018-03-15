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
      <p><font style="h1;font-size:1.6em;" id="mensaje1"></font></p> </center>
      
     </div>
     <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
       <center><button id="hazReserva" type="button" class="btn btn-default animated infinite pulse" style="margin-top:3em;margin-bottom:3em;">Reservar oferta!</button>
          <p><font style="h1;font-size:1.2em;" id="mensaje2"></font></p>
        </center>
       
      </div>
    </div>
    <div class="modal-footer" style="text-align:center;">
     <button id="cierroModal" type="button" class="btn " style="background:transparent;border:transparent;text-shadow:none;font-size:2em;" data-dismiss="modal">Cerrar</button>

   </div>
 </div>
</div>
</div>
</div>
  
<!-- JavaScripts -->
<script src="{{url('js')}}/jquery.min.js"></script>

<script src="{{url('js')}}/bootstrap.min.js"></script>

<script src="{{url('js')}}/clipboard.min.js"></script>
<script src="{{url('js')}}/star-rating.min.js" type="text/javascript"></script>
<script src="{{url('js')}}/theme.js" type="text/javascript"></script>
<script src="{{url('js/jquery.blockUI.js')}}" ></script>
<script src="{{url('js/hashids.min.js')}}" ></script>


<!--script src="js/app.js"></scriptque tiene este archivo que jode??? --> 

<script>


  $(document).ready(function(){
   $.unblockUI();
   new Clipboard('#copiarPPapeles');
    

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

       		$('#uyu').hide();
       		$('#usd').show();

         $pesoadolarinter2 = '' + parseFloat(pesoadolarinter).formatMoney(2, ',', '.');
			  $('#cantEnUyu').text($pesoadolarinter2);
       
	   		$('#pizarra').text('' + $dolarCambioVenta);

	   // formateo los US$ que te ahorras 			
      $pesoadolarcambios2 = '' + parseFloat(pesoadolarcambios).formatMoney(2, ',', '.');
			$('#enCambios').text($pesoadolarcambios2 + " dolares");


       	}else if($amount.val() != "" && $select.val() == 1){

       		$('#selectCambiameMone').val(1);


//formateo sin decimales los $ que ahorro - Verificar la cuenta
      var dolarapesointer = parseFloat(cantidad * dolarInter ).toFixed(0);
			var dolarapesocambios = parseFloat(cantidad * dolarCambioCompra).toFixed(0);

    		//var ahorras = parseFloat((dolarapesointer - dolarapesocambios)).toFixed(2);
//formateo sin decimales los $ que ahorro
			var ahorras = parseFloat((dolarapesointer - dolarapesocambios)).toFixed(0);

       		console.log(ahorras);

          $ahorrasF = '' + parseFloat(ahorras).formatMoney(0, ',', '.'); 
         $('#ahorras').text('$ ' + $ahorrasF);

 
       		$('#usd').hide();
       		$('#uyu').show();

         $dolarapesointer = '' + parseFloat(dolarapesointer).formatMoney(0, ',', '.');
 		      $('#cantEnUyu').text($dolarapesointer);

//le formateo el "," a la pizarra
       		$('#pizarra').text('' + $dolarCambioCompra);

        var dolarapesocambios2 = parseFloat(dolarapesocambios);
            $cambiado = '' + dolarapesocambios2.formatMoney(0, ',', '.');

       		  $('#enCambios').text($cambiado + " pesos");  

       	}
//23-11-2016: esta llamndo bien a la funcion y formteando el nro
        $amountF = '' + parseFloat(cantidad).formatMoney(0, ',', '.');
        $('#cantF').text($amountF) ;


//23-11-2016: esta llamndo bien a la funcion y formteando el nro
        $amountF = '' + parseFloat(cantidad).formatMoney(0, ',', '.');
        $('#cantF').text($amountF) ;

//07-11-2016: Fin de modificaciones de formato

       	$('#contenedorCalc2').show();
       	$('#contenedorCalc2').animate({height:'401px'});
       	$('#calculador').animate({height:'290'});
       	$('#calculador2').animate({height:'290'});
       	$('#mostrarCalc').fadeIn('fast');
       }


	//no dejo ingresar 0
       $('#contenedorCalc').click(function(){
          $amount0 = $('#exampleInputAmount');
          var cant0 = parseFloat($amount0.val());
          if (cant0 >0)
       	     calculadora();
       });


       $('#selectCambiameMone').on('change', function(){
         //corrijo el error del vacio
         $amountVacio = $('#exampleInputAmount');
         if ($amountVacio.val() != "" && $amountVacio.val() != 0) {
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

                // aqui guardo el medio de pago 
               // $('#selectIntercambio').val()

                    data += "&observacion=" + $('#observacion').val() + "&medioPago=" + $('#selectIntercambio').val() +"&moneda=" + $('#selectCambiameMone').val() + "&dolarInter=" + parseFloat($dolarInter.replace(',','.')) + "&dolarCambio=" + dolarCambio + "&resultado=" +  $('#cantEnUyu').text() + "&cantidad=" + $('#cantF').text() ;
              
              //    data += "&medioPago=" + $('#selectIntercambio').val() +"&moneda=" + $('#selectCambiameMone').val() + "&dolarInter=" + parseFloat($dolarInter.replace(',','.')) + "&dolarCambio=" + dolarCambio + "&resultado=" +  $('#cantEnUyu').text() + "&cantidad=" + $('#cantF').text() ;

             //   data += "&moneda=" + $('#selectCambiameMone').val() + "&dolarInter=" + parseFloat($dolarInter.replace(',','.')) + "&dolarCambio=" + dolarCambio + "&resultado=" +  $('#cantEnUyu').text() + "&cantidad=" + $('#cantF').text() ;
                
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

   // validando registro       
    $('#registro').on('click', function(e){   
      var condicion=$("#terms").is(':checked');
      //controla ingreso de celular en el registro    
    	if($('#celular').val()!=""&& condicion){
        $('#formRegistro').submit();
    		
    	}else if ($('#celular').val()!=""&& !condicion){
        e.preventDefault();
        alert('Debes aceptar los Términos y Condiciones');
      }      
      else{
    		e.preventDefault();
        alert('Debes ingresar celular');
    		$('#celular').addClass('shake animated');
    		$('#celular').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
    			$('#celular').removeClass('shake animated')
    		    });
    	    }              
      });            
    
    $('.sinLogin').on('click', function(){
        alert('Debes loguearte en la app para poder negociar!');
      //confirm('Debes loguearte !');
    });

    var aCeluar = "";
    var elId = "";

    $('.whatsapp').on('click', function(){
      aVengo  = $(this).data("prueba");
      //Vengo desde oferta 
      if (aVengo=="O")
      {     
        $('#mensaje1').text('Continúa presionando Reservar Oferta. Recibirás un e-mail con los datos de contacto y de la reserva. Para una mayor confianza, te recomendamos que visites el perfil en LinkedIn de la persona de contacto.');
        $('#mensaje2').text('Una vez presionado, se quita del muro temporalmente, hasta que se haya concretado la negociación.');

        $('#hazReserva').prop("disabled", false);
        $('#hazReserva').text("Reservar Oferta!");
        $('#hazReserva').addClass('animate infinite pulse');
     }else
      {     
        //Vengo desde negociaciones 
        $('#mensaje1').text('Revisa tu e-mail con los datos del Anunciante');
        $('#mensaje2').text('La Oferta fue reservada temporalmente hasta concretar la negociación');

        $('#hazReserva').prop("disabled", true);
        $('#hazReserva').attr("color", "white");
        $('#hazReserva').text("Oferta Reservada!");
        $('#hazReserva').removeClass('animate infinite pulse');
      }  
      var hashids = new Hashids("esto-es-cambiame", 16, "abcdefghijmoprxyz1236789");
    
      elId = hashids.decode($(this).prev().closest('#elId').val());

      aCelular = $(this).data("celular");
      $('#numeroCel').text(aCelular);

      $('#modal-fullscreen-negociar').modal();

    });

    $('#copiarPPapeles').on('click', function(){ 
    	$(this).text("Copiado !");
    });

    $('#hazReserva').on('click', function(){

      $botonRes = $(this);
      data = "idoferta=" + elId;
      $.ajax({ 
        type: "POST", 
        url: "reservarOferta", 
        data: data,
        success: function(result){
         if(result == 0){
		            //todo
		            $botonRes.prop("disabled", true);
		            $botonRes.attr("color", "white");
		            $botonRes.text("Reservado!");
		            $botonRes.removeClass('animate infinite pulse');
                //$.unblockUI();
                $('#elId').val(elId).closest('.container-fluid').fadeOut('slow');
                elId = '';
//ver si va aca esto

               if(confirm('Oferta Reservada con exito!. Revisa en menú Mis Compras')){
                bloqueoUI();
                location.reload();
                }
              }else{
               $botonRes.text("error");
               if(confirm('No se pudo reservar la oferta')){
                location.reload();
              }
            }
          } 
        });
    });

//Borrar oferta
    $(".deleteProduct").click(function(){
      var hashids = new Hashids("esto-es-cambiame", 16, "abcdefghijmoprxyz1236789");
    	var id =  hashids.decode($(this).data("id"));
    	var token = $(this).data("token");

    	if(confirm('Va a eliminar su oferta, ¿está seguro?')){
//confirm('Antes de Ejecutar el Ajax');
        $.ajax({
         url: "{{url('oferta/desactivar')}}/"+id,
         type: 'POST',
         dataType: "JSON",
         data: {
          "id": id,
          "_method": 'POST',      //Antes aqui decia DELETE, tambien en la url   
          "_token": token,
        },
        success: function (data){
//confirm('Antes de BloqueoUI');
          bloqueoUI();
//confirm('Despues de BloqueoUI');
          location.reload();
//confirm('Despues de Reload');
        },
        error: function(data){
          alert("No se pudo eliminar esta oferta.");
          console.log(data);
        }
      });
      }
    });

    $(".calificar").click(function(){
      var hashids = new Hashids("esto-es-cambiame", 16, "abcdefghijmoprxyz1236789");
    	var id =  hashids.decode($(this).data("id"));
      var token = $(this).data("token");

    //ver si el estilo termina pasando o como termino pasando el estlo sino ....?
    //el token apentemente no lo paso tampoco ...? ver si lo usaria


      location.href = "{{url('transaccion/calificar/')}}/"+ hashids.encode(id);
    });

    $(".liberar").click(function(){
      bloqueoUI();
      var hashids = new Hashids("esto-es-cambiame", 16, "abcdefghijmoprxyz1236789");
      var id = hashids.decode($(this).data("id"));
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
      var hashids = new Hashids("esto-es-cambiame", 16, "abcdefghijmoprxyz1236789");
      var id = hashids.decode($(this).data("id"));   
      var token = $(this).data("token");
   
      if(confirm('Has concretado la oferta, ahora deberás calificar la transacción')){
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
          location.href = "{{url('transaccion/calificar/')}}/"+ hashids.encode(id);
        }
      });
      }else{
        $.unblockUI();
      }
    });


    $(".concretada2").click(function(){
      bloqueoUI();
      var id = $(this).data("id");    
      var token = $(this).data("token");
      
      //ahistoria = $(this).data("historia");

      location.href = "{{url('transaccion/calificarh/')}}/"+id;
    });

    $(".concretada3").click(function(){
      bloqueoUI();
      var id = $(this).data("id");    
      var token = $(this).data("token");
      
      //ahistoria = $(this).data("historia");

      location.href = "{{url('transaccion/calificarc/')}}/"+id;
    });

    

    $('#contenedorCalif').find('#cierroTrans').on('click', function(){
      //bloqueoUI();

   
      aVengo  = $(this).data("prueba");
      var hashids = new Hashids("esto-es-cambiame", 16, "abcdefghijmoprxyz1236789");
       
      //Vengo desde desde negociaciones 
      if (aVengo=="N")
      {
          var idUsr = $('#idUsrCon').val();
          location.href = "{{url('usuario/negociaciones/')}}/"+idUsr;
      }
      else   // aVengo=="O"
      {
          var idUsr = $('#idUsr').val();
          location.href = "{{url('usuario/ofertas/')}}/"+idUsr;
      }
    });

      //codigo de las estrellas
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

    var comentarioSesp = comentario.trim();
  
    if (comentarioSesp == "")  
    {  
      alert('Debe dejar un comentario de la transacción');
      dejar_comment = false
    }
    else
      dejar_comment = true;     

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
            alert(result.success);
            //Va a Mis Ofertas 
            location.href = "{{url('oferta')}}";           
            
          }
        });
      }else{
        $.unblockUI();
      }
    }); 

    $('#input-3-ltr-star-sm').on('rating.change', function(event, value, caption) {
    bloqueoUI();
    idTrans = $('#idTrans').val();
    var token = $(this).data("token");
    var comentario = $('#dejarComment2').val();
    //esto otro usr lo uso para volver el menu
    idUsrBack = $('#idUsr').val();
    //el usr es el usr que concreto la transaccion
    idUsr   = $('#idUsrCon').val();
    var dejar_comment = false;

//alert('tengo ' + idUsr + ' ' + comentario + ' ' + value );

    var comentarioSesp = comentario.trim();
  
    if (comentarioSesp == "")  
    {  
      alert('Debe dejar un comentario de la transacción');
      dejar_comment = false
    }
    else
      dejar_comment = true;     

    if (dejar_comment){

      $.ajax(
      {
        url: "{{url('guardarate2')}}",
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
            alert(result.success);
            //Va a Mis Ofertas 
            location.href = "{{url('usuario/ofertas/')}}/"+ idUsrBack;           
            
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

  //esta funcion tambien tendria que hacer el formateo de la cantidad para que quede guardada ok ...
  //falta el tema del largo solamente
/*   
function soloNumeros(e) 
{ 
var key = window.Event ? e.which : e.keyCode 
return ((key >= 48 && key <= 57) || (key==8)) 
}
*/

//en proceso controlar el valor maximo permitido

 function soloNumeros(e)
    {
        // capturamos la tecla pulsada
        var teclaPulsada= window.Event ? e.which : e.keyCode 
        // capturamos el contenido del input
        var valor=document.getElementById("exampleInputAmount").value;
 
        if(valor.length<6)
        {
            // 13 = tecla enter
            // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
            // punto
            if(teclaPulsada==13)
            {
                return true;
            }
 
            // devolvemos true o false dependiendo de si es numerico o no
            return /\d/.test(String.fromCharCode(teclaPulsada));
        }else{
            return false;
        }
    }

Number.prototype.formatMoney = function(c, d, t){  
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
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