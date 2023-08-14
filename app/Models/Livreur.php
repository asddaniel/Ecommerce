<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Livreur extends Model
{
    use HasFactory;
    protected $fillable = [
        'prix_par_kilo',
        'prix_par_valeur',
        'prix_par_distance',
        'delais',
        'user_id'
    ];

    /**
     * Get the user associated with the Livreur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
