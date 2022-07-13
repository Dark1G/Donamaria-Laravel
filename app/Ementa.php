<?php

namespace App;
use App\Pedido;
use Illuminate\Database\Eloquent\Model;

class Ementa extends Model
{
    protected $table = "ementa";
    protected $primaryKey = "idEmenta";
    protected $fillable = array("nome", "descricao", "preco", "img");
    public $timestamps = true;

    public function pedidos() {
        return $this->hasMany("App\Pedido");
    }
}
