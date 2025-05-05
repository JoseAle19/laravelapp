<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
     protected $table = 'password_reset_tokens';

     protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

     public $timestamps = false;

     protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
}
