<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = ['stylist_rut', 'request_id'];
    public $timestamps = false;

    protected $fillable = [
        'stylist_rut',
        'request_id',
        'comment',
    ];
}
