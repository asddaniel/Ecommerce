<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produit extends Model
{
    use HasFactory;
    protected $fillable =[
        "name",
        "price",
        "image",
        "description",
        "categorie_id",
        "user_id",
        "enchere"
    ];

    /**
     * Get all of the ligne_ventes for the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ligne_ventes(): HasMany
    {
        return $this->hasMany(Ligne_vente::class);
    }

    /**
     * Get the categorie associated with the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categorie(): HasOne
    {
        return $this->hasOne(Categorie::class, 'id', 'categorie_id');
    }
}
