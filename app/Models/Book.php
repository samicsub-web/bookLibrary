<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name','price', 'description'];

    public function rentages()
    {
        return $this->hasMany(Rentage::class, 'book_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'book_id');
    }
}
