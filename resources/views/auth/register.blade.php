@extends('layouts.app4')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrarse en Cambiame</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="formRegistro" role="form" method="POST" action="{{ url('/registraruser') }}">
                        {{ csrf_field() }}
                        <div class="media">
                          <div class="media-left">
                             
                            
                            <div class="col-md-12 col-md-offset-8">
                                <img src="{{$user['pictureUrl']}}" />
                            </div>
                            
                            
                        </div>
                        <div class="media-body">
                          <div class="form-group">
                            <label for="Nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <p>
                                    {{ $user->name or 'error'}}
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Correo</label>
                            <div class="col-md-6">
                                <p>
                                    {{ $user->email or 'error'}}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                

                <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                    <label for="celular" class="col-md-4 control-label">celular</label>

                    <div class="col-md-6">
                        <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}">

                        @if ($errors->has('celular'))
                        <span class="help-block">
                            <strong>{{ $errors->first('celular') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" id="registro" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Registrar
                        </button>
                    </div>
                </div>
                <input type="hidden" name="name" value="{{ $user->name or 'null'}}" />
                <input type="hidden" name="email" value="{{ $user->email or 'null'}}" />
                <input type="hidden" name="linkedinProfile" value="{{ $user['publicProfileUrl'] or 'null'}}" />
                <input type="hidden" name="pictureUrl" value="{{$user['pictureUrl']}}" />
                
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
