
<!--include('auth.login')-->
<form action="/salvaroferta" method="POST" id="salvadorOferta">
  <div class="row" style="height: 121px;margin-top: 1em;">
    <div class="row" style="margin-bottom: 1em;">
      <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 ingresos text-center"><font class="labeltext" style="font-size:1.2em;color:black;display: block;margin-top: 13px;">QUIERO CAMBIAR</font></div>
    </div>
    <div class="row" >
      <div class="col-sm-4 col-xs-4 col-md-4 text-center ingresos" >
        <div class="moneDiv">
          <select class="form-control select select-primary select-block mbl" id="selectCambiameMone" >
            <option value="0" style="font-weight:bold;background:#d8d9d6;color:black;font-size:1.2em;">$</option>
            <option value="1" style="font-weight:bold;background:#d8d9d6;color:black;font-size:1.2em;" selected>US$</option>
          </select>
        </div>
      </div>
      <div class="col-sm-4 col-xs-4  col-md-4  text-center ingresos" >
        <input name="cantidad" type="number" class="form-control" id="exampleInputAmount" placeholder="Monto" style="font-size: 2em;"  min="0" max="999999" maxlength="6" size="6" onKeyPress="return soloNumeros(event)">
      </div>
      <div class="col-sm-4 col-xs-4 col-md-4 text-center ingresos" style="background-color:orange;">
        <div class="row text-center" >
          <div class="col-sm-10 col-xs-10 col-lg-10 col-md-10 ingresos text-center" style="background:orange;">
            <button style="background:transparent;border:transparent;margin-top:10px;" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample" id="contenedorCalc">
              <font style="font-weight:bold;background:orange;font-size:1.2em;" >
                CALCULAR
              </font>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--El token sirve para el borrado de ofertas-->
  @if(Auth::check())
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
  @endif  
</form>  

