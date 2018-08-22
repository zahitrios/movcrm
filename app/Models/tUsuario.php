<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tUsuario extends Model
{
    protected $table="tUsuario";
    protected $primaryKey="usuario_id";    
    public $timestamps = false;

    protected $fillable = ['nombre','user','pss','rol_rol_id'];
}
