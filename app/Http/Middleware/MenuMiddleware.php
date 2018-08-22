<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class MenuMiddleware
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
        $menus=Array();
        $user_id=session()->get('user_id');       
        session()->forget('menus');

        //HAGO EL QUERY DE LOS MENUS
        $menusDB = DB::table('tModulo')
                ->select('tModulo.modulo_id','tModulo.nombre','tModulo.class')
                ->join('tRol_has_tModulo','tModulo.modulo_id','tRol_has_tModulo.tModulo_modulo_id')
                ->join('tRol','tRol_has_tModulo.tRol_rol_id','tRol.rol_id')
                ->join('tUsuario','tRol.rol_id','tUsuario.rol_rol_id')
                ->where(DB::raw("md5(usuario_id)"),'=',$user_id)
                ->get();

        $menusDBJson = json_decode($menusDB, true);
       
        foreach($menusDBJson as $key => $menu){ //SI SE ENCONTRÓ EL USUARIO
            $menus[$menu["modulo_id"]]["nombre"] = $menu["nombre"];        
            $menus[$menu["modulo_id"]]["class"] = $menu["class"];        
        }

        session()->put('menus', $menus);
        
        return $next($request);
    }
}
