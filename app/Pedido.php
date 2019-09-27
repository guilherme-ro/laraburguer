<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'endereco', 'tamanho', 'adicional', 'instrucoes', 'status_id', 'admin_id'];

    /**
     * Obter o cliente que fez o pedido.
     */
    public function cliente()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Obter o status do pedido.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}