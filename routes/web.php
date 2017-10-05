<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
/*
Route::get('oferta',  ['uses' => 'OfertaController@index', 'middleware'=>'auth']);
Route::post('oferta', ['uses' => 'OfertaController@index', 'middleware'=>'auth']);
*/

Route::get('oferta',  'OfertaController@index');
Route::post('oferta', 'OfertaController@index');

/* mis ofertas/contratos */

Route::get('usuario/ofertas/{id}',  ['uses' => 'OfertaController@ofertasUser', 'middleware'=>'auth']);
Route::post('usuario/ofertas/{id}', ['uses' => 'OfertaController@ofertasUser', 'middleware'=>'auth']);

/* mis negoaciaciones */

Route::get('usuario/negociaciones/{id}',  ['uses' => 'OfertaController@negociacionesUser', 'middleware'=>'auth']);
Route::post('usuario/negociaciones/{id}', ['uses' => 'OfertaController@negociacionesUser', 'middleware'=>'auth']);

/* home */

Route::get('/', ['middleware' => 'auth', function () {

    	return Redirect::action('OfertaController@index');

}]);

Route::get('/home', ['middleware' => 'auth', function () {

    	return Redirect::action('OfertaController@index');

}]);

Route::auth();

Route::resource('mail', 'MailController');


Route::get('usuario/logout/{user}', function(App\Models\User $user) {	
	
	$user->activo = "0";
	$user->save();
	Auth::logout();
	return redirect('oferta');
});

Route::get('usuario/logout/{id?}', 'SocialController@logoutActivo');

Route::get('login', function(){
	return view('auth.login');
});

//borrar oferta
Route::delete('/oferta/delete/{id}', 'OfertaController@destroy');
//liberar oferta
Route::post('/oferta/liberar/{id}', 'OfertaController@liberar');
//concretar oferta concretada
Route::post('/oferta/concretar/{id}', 'OfertaController@concretar');
//salvar oferta
Route::post('salvaroferta', 'OfertaController@salvaroferta');

Route::get('social/linkedin', 'SocialController@getSocialAuth');
Route::get('social/linkedin/callback', 'SocialController@getSocialAuthCallback');

Route::post('registraruser', 'SocialController@registrarUser');


Route::post('reservarOferta', 'OfertaController@reservarOferta');
Route::get('reservarOferta', 'OfertaController@reservarOferta');

//calificar transaccion
Route::get('transaccion/calificar/{id}',  ['uses' => 'OfertaController@calificarTrans', 'middleware'=>'auth'])->name('calificar');
Route::post('transaccion/calificar/{id}', ['uses' => 'OfertaController@calificarTrans', 'middleware'=>'auth'])->name('calificar');

Route::get('guardarate',  ['uses' => 'OfertaController@guardarCalif', 'middleware'=>'auth']);
Route::post('guardarate', ['uses' => 'OfertaController@guardarCalif', 'middleware'=>'auth']);

Route::get('calificar/ofertas',  ['uses' => 'OfertaController@transaccionesNoCalificadas', 'middleware'=>'auth'])->name('nocalificadas');
Route::post('calificar/ofertas', ['uses' => 'OfertaController@transaccionesNoCalificadas', 'middleware'=>'auth'])->name('nocalificadas');

//historicoTransaccion
Route::get('transaccion/calificarh/{id}',  ['uses' => 'OfertaController@historicoTrans', 'middleware'=>'auth'])->name('calificarh');

//por ahora dejo la llamada al historico
Route::get('transaccion/calificarc/{id}',  ['uses' => 'OfertaController@historicoTrans', 'middleware'=>'auth'])->name('calificarc');

Route::get('guardarate2',  ['uses' => 'OfertaController@guardarCalifComp', 'middleware'=>'auth']);
Route::post('guardarate2', ['uses' => 'OfertaController@guardarCalifComp', 'middleware'=>'auth']);

