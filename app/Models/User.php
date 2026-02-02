<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'level'
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed'
    ];

    public function pengirimans()
    {
        return $this->hasMany(Pengiriman::class, 'id_user');
    }
}
