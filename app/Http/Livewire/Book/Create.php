<?php

namespace App\Http\Livewire\Book;

use App\Enums\BookCategory;
use App\Enums\BookFileType;
use App\Enums\BookType;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $book_category;
    public $book_types;
    public $book_file_types;

    // Form fields
    public $title;
    public $author;
    public $description;
    public $summary;
    public $is_free = false;
    public $language;
    public $cover_photo = null;
    public $category;
    public $type;
    public $pages;
    public $isbn;
    public $pub_in;
    public $pub_date;
    public $file;
    public $file_type;
    public $rent_price;
    public $rentage_period;

    public function mount()
    {
        $this->book_category = BookCategory::asArray();
        $this->book_types = BookType::asArray();
        $this->book_file_types = BookFileType::asArray();                       
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:250'],
            'author' => ['required', 'max:250', 'string'],
            'description' => ['required', 'max:2000'],
            'summary' => ['nullable', 'string', 'max:1024'],
            'language' => ['required', 'string'],
            'category' => ['required', 'integer'],
            'type' => ['required', 'integer'],
            'pages' => ['required', 'integer'],
            'isbn' => ['required', 'string', 'max:250'],
            'pub_in' => ['required', 'string', 'max:250'],
            'is_free' => ['required', 'boolean'],
            'pub_date' => ['required', 'date'],
            'cover_photo' => ['required', 'image', 'max:1024'],
            'file' => ['required', 'file', 'max:10240'],
            'file_type' => ['required', 'integer'],
            'rent_price' => ['required_if:is_free, true', 'string'],
            'rentage_period' => ['required', 'integer'],
        ];
    }

    public function render()
    {
        return view('livewire.book.create');
    }

    public function submit()
    {
        $data = $this->validate();

        if ($this->cover_photo) {
            $data['cover_photo'] = $this->cover_photo->store('cover/photo');
        }
        
        if ($this->file) {
            $data['file'] = $this->file->store('books');
            $data['file_type'] = $this->file->extension();
        }
        // $data
        if ($this->is_free) {
            $data['rent_price'] = 0;
        }
        
        $book = Book::create($data);

        toast('User Account Created Successfully', 'success');
        return redirect()->route('book.show', $book);
    }

    public function resetFile()
    {
        $this->reset('photo');
    }
}
