<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'produit_id',
        'commentaire',
        'livreur_id',

    ];

    /**
     * Get the user associated with the Commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
