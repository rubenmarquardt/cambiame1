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
      <center><button id="copiarPPapeles" type="button" class="btn btn-default" data-clipboard-target="#numeroCel" style="background:transparent;border:solid 0px black;text-shadow:none;margin-top:3em;width:50%;">Copiar al portapapeles!</button>
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

       	if($amount.val() != "" && $select.val() == 0){
       		$('#selectCambiameMone').val(0);


       		var ahorras = parseFloat((pesoadolarinter - pesoadolarcambios));
       		ahorras = parseFloat(ahorras * dolarCambioVenta).toFixed(0);


       		$('#ahorras').text('$ ' + ahorras);
       		$('#uyu').hide();
       		$('#usd').show();
       		$('#cantEnUyu').text(pesoadolarinter);
       		$('#pizarra').text(dolarCambioVenta);
       		$('#enCambios').text(pesoadolarcambios + "dolares");

       	}else if($amount.val() != "" && $select.val() == 1){

       		$('#selectCambiameMone').val(1);

       		var dolarapesointer = parseFloat(cantidad * dolarInter ).toFixed(2);
       		var dolarapesocambios = parseFloat(cantidad * dolarCambioCompra).toFixed(2);

       		var ahorras = parseFloat((dolarapesointer - dolarapesocambios)).toFixed(2);

       		console.log(ahorras);

       		$('#ahorras').text('$ ' + ahorras);
       		$('#usd').hide();
       		$('#uyu').show();
       		$('#cantEnUyu').text(dolarapesointer);
       		$('#pizarra').text(dolarCambioCompra);
       		$('#enCambios').text(dolarapesocambios + "pesos");
       	}
       	$('#contenedorCalc2').show();
       	$('#contenedorCalc2').animate({height:'401px'});
       	$('#calculador').animate({height:'290'});
       	$('#calculador2').animate({height:'290'});
       	$('#mostrarCalc').fadeIn('fast');
       }

       $('#contenedorCalc').click(function(){
       	calculadora();
       });

       $('#selectCambiameMone').on('change', function(){
       	calculadora();
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
                data += "&moneda=" + $('#selectCambiameMone').val() + "&dolarInter=" + parseFloat($dolarInter.replace(',','.')) + "&dolarCambio=" + dolarCambio + "&resultado=" +  parseFloat($('#cantEnUyu').text());
                
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

    var aCeluar = "";
    var elId = "";

    $('.whatsapp').on('click', function(){
      
      $('#hazReserva').prop("disabled", false);
      $('#hazReserva').text("Reservar Oferta!");
      $('#hazReserva').addClass('animate infinite pulse');

      elId = $(this).prev().closest('#elId').val();

      aCelular = $(this).data("celular");
      $('#numeroCel').text(aCelular);

      $('#modal-fullscreen-negociar').modal();

    });

    $('#copiarPPapeles').on('click', function(){ 
    	$(this).text("Copiado !");
    });

    $('#hazReserva').on('click', function(){
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
          bloqueoUI();
          location.reload();
        }
      });
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
  </script>
</div>
</body>
</html>