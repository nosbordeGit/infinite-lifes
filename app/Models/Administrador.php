<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administrador';
    protected $fillable = [
        'empresa',
        'cnpj',
        'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function usuario() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function generos() : HasMany {
        return $this->hasMany(Genero::class);
    }

    public function transportadoras() : HasMany {
        return $this->hasMany(Transportadora::class);
    }
}
