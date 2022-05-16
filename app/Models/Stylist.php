<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//extends Model

class Stylist extends Authenticatable
{
    use HasFactory;

    protected $guard = 'stylist';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'rut';
    public $timestamps = false;

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'rut',
        'password',
        'name',
        'last_name',
        'email',
        'phone',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
