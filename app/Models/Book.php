<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'summary',
        'language',
        'category',
        'type',
        'pages',
        'isbn',
        'pub_in',
        'pub_date',
        'cover_photo',
        'file',
        'file_type',
        'rent_price',
        'rentage_period',
        'is_free',
        'rent_count',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
