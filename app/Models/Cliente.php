<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'data_nascimento',
        'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];

    protected function casts() : array {
        return [
            'nome' => 'string',
            'sobrenome' => 'string',
            'cpf' => 'string',
            'data_nascimento' => 'date'
        ];
    }

    public function usuario() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function cartoes() : HasMany {
        return $this->hasMany(Cartao::class);
    }

    public function favoritos() : HasMany {
        return $this->hasMany(Favorito::class);
    }

    public function visitados() : HasMany {
        return $this->hasMany(Visitado::class);
    }

    public function comentarios() : HasMany {
        return $this->hasMany(Comentario::class);
    }

    public function carrinhos() : HasMany {
        return $this->hasMany(Carrinho::class);
    }

    public function pedidos() : HasMany {
        return $this->hasMany(Pedido::class);
    }
}
