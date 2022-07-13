<?php

namespace App;
use App\Pedido;
use Illuminate\Database\Eloquent\Model;

class Garrafeira extends Model
{
    protected $table = "garrafeira";
    protected $primaryKey = "idGarrafa";
    protected $fillable = array("nome", "regiao", "tipo", "ano", "descricao", "preco", "img");
    public $timestamps = true;

    public function pedidos() {
        return $this->hasMany("App\Pedido");
    }
}
