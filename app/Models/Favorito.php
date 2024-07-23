<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorito extends Model
{
    use HasFactory;
    protected $table = 'favorito';
    protected $fillable = [
        'cliente_id',
        'livro_id'
    ];

    protected $hidden = [
        'cliente_id',
        'livro_id'
    ];

    public function livro() : BelongsTo {
        return $this->belongsTo(Livro::class);
    }

    public function cliente() : BelongsTo {
        return $this->belongsTo(Cliente::class);
    }
}
