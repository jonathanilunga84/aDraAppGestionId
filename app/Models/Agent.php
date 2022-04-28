<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'postnom',
        'prenom',
        'sexe',
        'numcarteidentite',
        'idagent',
        'user_id'
    ];
}
