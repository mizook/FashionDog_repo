<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//extends Model

class Stylist extends Authenticatable
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'rut';

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'rut',
        'password',
        'name',
        "last name",
        'email',
        'phone',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
