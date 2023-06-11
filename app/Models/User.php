<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'phone',
        'address',
        'gender',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return ($this->role == UserRole::ADMIN);
    }

    public function bookRequests()
    {
        return $this->hasMany(BookRequest::class);
    }
    
    public function my_requests()
    {
        return $this->hasMany(BookRequest::class)->where('user_id', auth()->id());
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_user')->withPivot('return_date', 'read_at')->withTimestamps();
    }

    public function rented_books()
    {
        return $this->books()->wherePivot('returned', false);
    }
}
