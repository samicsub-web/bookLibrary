<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $books = Book::paginate();
        return view('livewire.book.index', [
            'books' => $books
        ]);
    }
}
