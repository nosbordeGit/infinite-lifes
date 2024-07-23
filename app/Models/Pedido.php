<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $fillable = [
       'valor',
       'status',
       'carrinho_id',
       'cliente_id',
       'cartao_id',
       'transportadora_id'
    ];

    protected $hidden = [
        'carrinho_id',
        'cliente_id',
        'cartao_id',
        'transportadora_id'
     ];

     protected function casts() : array {
        return [
            'valor' => 'decimal:2',
            'status' => 'string'
        ];
    }

     public function cliente() : BelongsTo {
        return $this->belongsTo(Client::class);
     }

     public function cartao() : BelongsTo {
        return $this->belongsTo(Cartao::class);
     }

     public function carrinho() : BelongsTo {
        return $this->belongsTo(Carrinho::class);
     }

     public function transportadora() : BelongsTo {
        return $this->belongsTo(Transportadora::class);
     }
}
