<?php

namespace App;
use App\User;
use App\Ementa;
use App\Garrafeira;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedido";
    protected $primaryKey = "idPedido";
    protected $fillable = array("user", "dia", "hora", "ementa", "garrafa");
    public $timestamps = true;
    
    public function user() {
        return $this->belongsTo("App\User");
    }

    public function ementa() {
        return $this->belongsTo("App\Ementa");
    }

    public function garrafeira() {
        return $this->belongsTo("App\Garrafeira");
    }
}
