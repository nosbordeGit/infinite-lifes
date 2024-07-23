<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cartao extends Model
{
    use HasFactory;

    protected $table = 'cartao';
    protected $fillable = [
        'numero',
        'cvc',
        'validade',
        'tipo',
        'status',
        'cliente_id'
    ];

    protected $hidden = [
        'cliente_id'
    ];

    protected function casts() : array {
        return [
            'numero' => 'string',
            'cvc' => 'string',
            'validade' => 'date',
            'tipos' => 'string',
            'status' => 'boolean'
        ];
    }

    public function cliente() : BelongsTo {
        return $this->belongsTo(Cliente::class);
    }

    public function pedidos() : HasMany {
        return $this->hasMany(Pedido::class);
    }
}
