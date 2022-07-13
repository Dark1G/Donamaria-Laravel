<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
	protected $table = "perfil";
	protected $primaryKey = "idPerfil";
	protected $fillable = array("admin", "mod", "client");
	public $timestamps = true;

	public function user() {
        return $this->belongsTo("App\User");
    }
}
