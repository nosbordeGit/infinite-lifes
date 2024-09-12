<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $fillable = [
        'titulo',
        'corpo',
        'status',
        'user_id'
    ];

    protected $hidden = [
        'user_id'
     ];

     protected function casts() : array {
        return [
            'titulo' => 'string',
            'status' => 'string'
        ];
     }

     public function usuario() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
     }
}
