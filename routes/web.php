<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if (session()->get('logged') === true) { //SI YA UNA HAY SESIÓN ACTIVA, LO ENVÍO A HOME
		  return redirect()->route('home'); 
	}
	else{ //SI NO HAY SESIÓN ACTIVA LO ENVÍO AL FORMULARIO DE LOGIN
		return redirect()->route('login.form'); 
	}
});


//LOGIN
	Route::get('login', array('as' => 'login.form','uses' => 'LoginController@formLogin')); 
	Route::post('login', array('as' => 'login','uses' => 'LoginController@doLogin')); 
	Route::get('logout', array('as'=>'logout', 'uses' => 'LoginController@doLogout')); //HACE LOGOUT
	Route::get('handsup', array('as' => 'handsup','uses' => 'LoginController@handsup')); 


//HOME
	Route::get('home', array('as' => 'home','uses' => 'HomeController@home'))->middleware('loginMiddleware'); //HOME

//MODULOS
	

	
	