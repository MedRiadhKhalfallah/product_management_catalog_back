<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /** @var array  */
    protected $fillable = [
        'content',
        'value',
        'produit_id'
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

}
