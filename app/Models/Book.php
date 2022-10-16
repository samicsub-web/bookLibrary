<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Book extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publish_date'
    ];
    
    public function request(){
        return $this->belongsTo(BookRequest::class, 'id');
    }
}
