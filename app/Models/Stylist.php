<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stylist extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'rut';


    protected $fillable = [
        'rut',
        'password',
        'name',
        "last name",
        'email',
        'phone',
    ];
}
