<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    //protected $primaryKey = ['client_rut', 'request_id'];
    protected $primaryKey = 'client_rut';
    public $timestamps = false;

    protected $fillable = [
        'client_rut',
        'request_id',
    ];
}
