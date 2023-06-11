<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Book extends Component
{
    public function render()
    {
        $books =  Auth::user()->load(['books', 'rented_books']);
        return view('livewire.user.book', ['books' => $books]);
    }
}
