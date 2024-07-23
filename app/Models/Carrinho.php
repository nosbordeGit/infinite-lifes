<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'carrinho';
    protected $fillable = [
       'cliente_id',
       'status'
    ];

    protected $hidden = [
        'cliente_id',
     ];

     protected function casts(): array{
        return [
            'status' => 'boolean'
        ];
     }

     public function cliente() : BelongsTo {
        return $this->belongsTo(Cliente::class);
     }

     public function livros() : BelongsToMany{
        return $this->belongsToMany(Livro::class);
     }

}
