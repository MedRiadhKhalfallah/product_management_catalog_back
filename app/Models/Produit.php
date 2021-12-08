<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    /** @var array */
    protected $fillable = [
        'productName',
        'description',
        'category',
        'imageUrl',
        'price',
        'reviews',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @return array
     */
    public function format()
    {
        $averageScore = 0;
        $reviews = $this->reviews;
        /** @var Review $review */
        foreach ($reviews as $review) {
            $averageScore += $review->value;
        }
        $averageScore = $averageScore / count($reviews);
        return [
            'id' => $this->id,
            'productName' => $this->productName,
            'category' => $this->category,
            'imageUrl' => $this->imageUrl,
            'price' => $this->price,
            'averageScore' => round($averageScore, 0),
        ];
    }
    /**
     * @return array
     */
    public function formatWithReviews()
    {
        return [
            'id' => $this->id,
            'productName' => $this->productName,
            'category' => $this->category,
            'imageUrl' => $this->imageUrl,
            'price' => $this->price,
            'reviews' => $this->reviews,
            'description' => $this->description,
        ];
    }

}
