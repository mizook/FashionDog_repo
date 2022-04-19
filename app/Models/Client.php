<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
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
        'address',
        'email',
        'phone',
    ];
}
