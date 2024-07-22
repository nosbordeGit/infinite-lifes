<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'telefone',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function endereco() : HasOne {
        return $this->hasOne(Endereco::class);
    }

    public function feedbacks(): HasMany{
        return $this->hasMany(Feedback::class);
    }

    public function cliente() : HasOne {
        return $this->hasOne(Cliente::class);
    }

    public function vendedor() : HasOne {
        return $this->hasOne(Vendedor::class);
    }

    public function administrador() : HasOne {
        return $this->hasOne(Administrador::class);
    }

    public function transportadora() : HasOne {
        return $this->hasOne(Transportadora::class);
    }
}
