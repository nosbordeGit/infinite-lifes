<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transportadora extends Model
{
    use HasFactory;

    protected $table = 'transportadora';
    protected $fillable = [
        'empresa',
        'user_id',
        'administrador_id',
        'cnpj'
    ];

    protected $hidden = [
        'user_id',
        'administrador_id'
    ];

    protected function casts() : array {
        return [
            'empresa' => 'string',
            'cnpj' => 'string'
        ];
    }

    public function usuario() : BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pedidos() : HasMany {
        return $this->hasMany(Pedido::class);
    }

}
