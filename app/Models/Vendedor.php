<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedor';
    protected $fillable = [
        'user_id',
        'empresa',
        'cnpj'
    ];

    protected $hidden = [
        'user_id'
    ];

    protected function casts() : array {
        return [
            'empresa' => 'string',
            'cnpj' => 'string'
        ];
    }

    public function usuario() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function livros() : HasMany {
        return $this->hasMany(Livro::class);
    }
}
