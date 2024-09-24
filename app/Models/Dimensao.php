<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dimensao extends Model
{
    use HasFactory;

    protected $table = 'dimensao';
    protected $fillable = [
        'valor',
        'administrador_id'
    ];

    protected $hidden = [
        'administrador_id',
    ];

    protected function casts(): array
    {
        return [
            'valor' => 'string'
        ];
    }

    public function administrador() : BelongsTo {
        return $this->belongsTo(Administrador::class);
    }

    public function livros() : HasMany {
        return $this->hasMany(Livro::class);
    }
}
