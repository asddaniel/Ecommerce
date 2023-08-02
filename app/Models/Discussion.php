<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'produit_id',
        'message',
        'correspondant_id',
    ];
}
