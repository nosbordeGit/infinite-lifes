<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'genero';
    protected $fillable = [
        'administrador_id',
        'genero'
    ];

    protected $hidden = [
        'administrador_id'
    ];

    protected function casts() : array {
        return [
            'genero' => 'string'
        ];
    }

    public function administrador() : BelongsTo {
        return $this->belongsTo(Administrador::class);
    }

    public function livros() : HasMany {
        return $this->hasMany(Livro::class);
    }
}
