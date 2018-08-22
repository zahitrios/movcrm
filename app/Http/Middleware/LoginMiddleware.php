<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get('logged') != true) { //SI NO HAY SESIÓN ACTIVA
          return redirect()->route('login.form'); 
        }
        
        //VALIDO QUE EL USUARIO TENGA PERMISOS DE ENTRAR AL MODULO QUE ESTA HACIENDO REQUEST
        if($this->validaUsuarioModulo()){
            return $next($request);
        }
        else{
            return redirect()->route('handsup');    
        }
    }


    public function validaUsuarioModulo(){

        $user_id=session()->get('user_id');

        $moduloActual=Route::getFacadeRoot()->current()->action["as"];
        $moduloActual=strtolower($moduloActual);


        if($moduloActual=="" || $moduloActual=="home" || $moduloActual=="logout")
            return true;

        //VALIDO QUE LA RUTA SEA UN MODULO
        $queryDB = DB::table('tModulo')
                ->select('*')                
                ->where('nombre','=',$moduloActual)
                ->get();

        if(count($queryDB)<=0)//ESTÁ ENTRANDO A UNA SUBRUTA QUE YA FUE VALIDADA
            return true;


        //HAGO EL QUERY PARA SABER SI EL USUARIO TIENE EL MODULO
        $queryDB = DB::table('tRol_has_tModulo')
                ->select('*')                
                ->join('tRol','rol_id','tRol_has_tModulo.tRol_rol_id')
                ->join('tUsuario','rol_id','tUsuario.tRol_rol_id')
                ->join('tModulo','modulo_id','tModulo_modulo_id')
                ->where(DB::raw("md5(usuario_id)"),'=',$user_id)                
                ->where('tModulo.nombre','=',$moduloActual)
                ->get();
        
        if(count($queryDB)>0) //SI TIENE PERMISOS
            return true;

        //NO TIENE PERMISOS
        return false;

        return true;

    }


}
