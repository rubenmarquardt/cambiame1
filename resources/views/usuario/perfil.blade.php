@extends('layouts.app4')
@section('content')
@foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
<div class="container">
 <div class="row">
        <div class="col-md-8 col-md-offset-2">
  <div class="panel panel-default">
                <div class="panel-heading">Mi Perfil</div>
     <div class="panel-body form-horizontal">
     <div class="media">
                          <div class="media-left">                            
                            
                            <div class="col-md-12 col-md-offset-8">
                                <img  width="80px" height="80px" src="{{Auth::user()->pictureUrl}}" />
                            </div>                        
                            
                        </div>
      <div class="media-body">
                          <div class="form-group">
                            <label for="Nombre" class="col-md-4 control-label">Nombre:</label>
                            <div class="col-md-6">
                                <p>
                                    {{ Auth::user()->name}}
                                </p>
                            </div>
                        </div>
      <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email: </label>
                            <div class="col-md-6">
                                <p>
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                        </div>
      <div class="form-group">
                            <label for="celular" class="col-md-4 control-label">Celular: </label>
                            <div class="col-md-6">
                                <p>
                                    {{ Auth::user()->celular }}
                                </p>
                            </div>
                        </div>
      <div class="form-group">
                            <label for="creacion" class="col-md-4 control-label">Fecha ingreso:</label>
                            <div class="col-md-6">
                                <p>
        {{setlocale(LC_TIME, 'es_ES.UTF-8')}}
                                {{date_format(Auth::user()->created_at, 'jS F Y')}}
                                {{strftime("%A, %d %B %G", strtotime(Auth::user()->created_at))}}
                               
                                </p>
                            </div>
                        </div>
      <div class="form-group">
                            <label for="calificacion" class="col-md-4 control-label">Calificaci�n promedio:</label>
                            <div class="col-md-6">
        <div class="stars">
         <label class="star star-" style="color: #FD4;"></label> {{Auth::user()->rate}}
        </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="calificacion" class="col-md-4 control-label">Transacciones realizadas:</label>
                            <div class="col-md-6">
        <div class="trans">
                                <?php  
                                    $indice = 0; 
                                    $indice1 = 0; 
                                    $indice2 = 0; 
 
                                        //busco trns como vendedor 
                                    $indice1 = App\Models\Oferta::where('user_id', '=',Auth::user()->id ) 
                                    ->where('rate', '>',0)->count(); 
                            
                                    //busco trns como comprador 
                                    $indice2 = App\Models\Oferta::where('concretada', '=',Auth::user()->id) 
                                    ->where('rate2', '>',0)->count(); 
                                    $indice = $indice1 + $indice2; ?>
             
         <label class="trans trans-" style="color: #FD4;"></label>
                                <?php echo $indice ; ?>
        </div>
                            </div>
                        </div>        
 
 <br/>
 <a class="btn btn-default" style="color:white;background:orange;border:transparent;text-shadow:none;font-size:2em;" href="{{url('/home')}}">Volver</a>
     </div>
    </div>
  </div>
 </div>
</div>
@stop