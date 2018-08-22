<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Redirect;
use Input;
use Form;
use Session;
use Illuminate\Html\HtmlServiceProvider;
use Laravel\Socialite\Facades\Socialite as Socialite;
use Illuminate\Http\Request;
use Exception;

use App\Models\tUsuario as tUsuario;

class LoginController extends Controller
{
    public function formLogin(){

    	$data["displayMensaje"]="none";
    	$data["mensaje"]="";

    	return view('login')->with('data', $data);
    }

    public function doLogin(){
    	$user  = Input::get('user');
		$pss = Input::get('pss');

		//CREO UN OBJETO DEL MODELO Usuario
		$usuario=new tUsuario();

		//HAGO EL QUERY DEL USUARIO
		$users = $usuario::whereRaw("user='".$user."' AND pss='".MD5($pss)."' AND activo=1")->get();


		if(count($users)===0){ //NO SE ENCONTRO EL USUARIO
			$data["displayMensaje"]="block";
	    	$data["mensaje"]="Usuario y password incorrecto";

	    	return view('login')->with('data', $data);
		}

		else if(count($users)==1){ //SI SE ENCONTRÓ EL USUARIO
			$user=$users[0]->getAttributes();
			session()->put('logged', true, 240);
			session()->put('user_name', $user['nombre'], 240);
			session()->put('user_id', MD5($user['usuario_id']), 240);

			return Redirect::to('/'); // LO DIRIJO AL HOME
		}
    }


     public function doLogout(){
    	
    	session()->forget('logged');
    	session()->forget('user_name');    	
    	session()->forget('user_id');
    	session()->forget('menus');

		return Redirect::to('/'); // LO DIRIJO AL HOME
    }

    public function handsup(){
    	return view('handsup');
    }

}
