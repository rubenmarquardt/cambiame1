<div class="row" id="contenedorCalc2" style="display:none">
  <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 ingresosCalc text-center" id="calculador2">
    <div class="col-md-12 col-xs-12 col-lg-12 text-center" id="mostrarCalc"  >
      <div class="row" style="background:#494d49;margin-top:1em;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" >
          <h4 style="color:white;" id="uyu">PESOS URUGUAYOS</h4>
          <h4 style="color:white;" id="usd">DOLARES AMERICANOS</h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" >
          <font style="font-size:1.8em;color:white;" id="cantEnUyu"></font>
        </div>
      </div>
      <div class="row" style="background:green;margin-top:1em;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="color:white;">AHORRAS</h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="font-size:1.8em;color:white;" id="ahorras"></h4>
        </div>
      </div>
      <div class="row" style="background:#6e706b;margin-top:1em;">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="color:white;">COTIZACION PIZARRA</h4>
          <input type="hidden" value="{{ $elPiza['compra'] or null }}" name="pizarra" id="valPizaComp" />
          <input type="hidden" value="{{ $elPiza['venta'] or null }}" name="pizarra" id="valPizaVent" />
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
          <h4 style="font-size:1.8em;color:white;" id="pizarra">$ 123123</h4>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center" style="margin-bottom: 6px;">
          <font style="font-size:0.8em;color:black;" > En cambios te darian <div id="enCambios"></div> </font>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6 col-xs-offset-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 text-center" style="background:green;margin-top:12px">
          <button type="button" id="publicarOfer" style="margin-top: 10px;background:transparent;border:none;outline:none;"><font style="font-size:0.8em;color:white;">PUBLICAR OFERTA</font></button>
        </div>
      </div>
    </div>
  </div>
</div>