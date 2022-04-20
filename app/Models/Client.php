<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
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
        'name',
        'last_name',
        'email',
        'address',
        'phone',
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
