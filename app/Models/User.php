<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    use Notifiable;

    // Kolom yang dapat diisi
    protected $fillable = ['username', 'password', 'nama_lengkap', 'role', 'shift', 'no_hp', 'jenis_kelamin'];


    // Mutator untuk password
    public function setPasswordAttribute($value)
    {
       if (!Hash::needsRehash($value)) {
        $this->attributes['password'] = $value;
    } else {
        $this->attributes['password'] = Hash::make($value);
    }
    }
    public function getAuthIdentifierName()
{
    return 'username';
}

}
