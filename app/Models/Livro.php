<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livro';
    protected $fillable = [
        'titulo',
        'resumo',
        'quantidade_paginas',
        'autor',
        'valor',
        'estoque',
        'isbn13',
        'idioma',
        'edicao',
        'editora',
        'idade',
        'data_publicacao',
        'imagem',
        'genero_id',
        'dimensao_id',
        'vendedor_id'
    ];

    protected $hidden = [
        'vendedor_id',
        'dimensao_id',
        'genero_id'
    ];

    protected function casts(): array
    {
        return [
            'titulo' => 'string',
            'quantidade_paginas' => 'integer',
            'autor' => 'string',
            'valor' => 'decimal:2',
            'estoque' => 'integer',
            'isbn13' => 'string',
            'idioma' => 'string',
            'edicao' => 'string',
            'editora' => 'string',
            'dimensao' => 'string',
            'idade' => 'integer',
            'data_publicacao' => 'date'
        ];
    }

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(Vendedor::class);
    }

    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class);
    }

    public function dimensao() : BelongsTo {
        return $this->belongsTo(Dimensao::class);
    }
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    public function  carrinhos(): BelongsToMany
    {
        return $this->belongsToMany(Carrinho::class);
    }

    public function favoritos(): HasMany
    {
        return $this->hasMany(Favorito::class);
    }

    public function visitados(): HasMany
    {
        return $this->hasMany(Visitado::class);
    }
}
