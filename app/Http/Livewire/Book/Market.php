<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class Market extends Component
{
    public function render()
    {
        $books = Book::all();
        return view('livewire.book.market', ['books' => $books]);
    }
}
