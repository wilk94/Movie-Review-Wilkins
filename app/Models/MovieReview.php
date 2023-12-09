<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieReview extends Model
{
    use HasFactory;

    protected $table = 'moviereview';
    protected $primaryKey = 'MovieReviewID';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'movie_title',
        'release_date',
        'movie_rating',
        'genre',
        'studio_email',
    ];

    protected $casts = [
        'release_date' => 'date', // Cast 'release_date' attribute to a date
        'movie_rating' => 'decimal:1', // Cast 'movie_rating' attribute to a decimal with one decimal place
    ];
}
