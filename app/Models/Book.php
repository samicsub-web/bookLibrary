<?php

namespace App\Models;

use App\Enums\BookCategory;
use App\Enums\BookFileType;
use App\Enums\BookType;
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
        'author',
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


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'rent_price' => 'float',
        'pub_date' => 'date',
        'category' => BookCategory::class,
        'type' => BookType::class,
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function book_requests()
    {
        return $this->hasMany(BookRequest::class);
    }
    
    public function unprocessed_requests()
    {
        return $this->book_requests()->where('status', 0);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user')->withPivot('return_date', 'read_at')->withTimestamps();
    }
    
    public function current_borrowers()
    {
        return $this->users()->wherePivot('returned', true);
    }
    
    public function my_request()
    {
        return $this->hasOne(BookRequest::class)->where('user_id', auth()->id());
    }
    
    public function my_review()
    {
        return $this->hasOne(Review::class)->where('user_id', auth()->id());
    }
}
