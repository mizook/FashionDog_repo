<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//extends Model

class Administrator extends Authenticatable
{
    use HasFactory;

    // protected $keyType = 'string';
    // public $incrementing = false;
    // protected $primaryKey = 'rut';

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'rut',
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
