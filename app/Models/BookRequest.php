<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class BookRequest extends Model
{
    use HasFactory, Uuids;

    public function book(){
        return $this->hasOne(Book::class, 'id', 'bookid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }

    protected $fillable = [
        'userid',
        'bookid',
        'date',
        'status'
    ];
}
