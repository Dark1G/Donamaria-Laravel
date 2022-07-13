<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentario";
    protected $primaryKey = "idComentario";
    protected $fillable = array("user", "mensagem");
    public $timestamps = true;

    public function user() {
        return $this->belongsTo("App\User");
    }
}
