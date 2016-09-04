<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('oferta',  ['uses' => 'OfertaController@index', 'middleware'=>'auth']);
Route::post('oferta', ['uses' => 'OfertaController@index', 'middleware'=>'auth']);

Route::get('/', ['middleware' => 'auth', function () {

    	return Redirect::action('OfertaController@index');

}]);

Route::auth();

Route::resource('mail', 'MailController');


Route::get('usuario/logout/{user}', function(App\User $user) {
	
	$user->activo = "0";
	$user->save();
	Auth::logout();
	return Redirect::action('OfertaController@index');
});

Route::get('usuario/logout/{id?}', 'SocialController@logoutActivo');

Route::get('login', function(){
	return view('auth.login');
});

Route::post('salvaroferta', 'UserController@salvaroferta');

Route::get('social/linkedin', 'SocialController@getSocialAuth');
Route::get('social/linkedin/callback', 'SocialController@getSocialAuthCallback');

Route::post('registraruser', 'SocialController@registrarUser');


Route::post('reservarOferta', 'UserController@reservarOferta');
//Route::get('muro.oferta', 'OfertaController@index');


