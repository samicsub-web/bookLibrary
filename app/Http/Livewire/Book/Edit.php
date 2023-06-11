<?php

namespace App\Http\Livewire\Book;

use App\Enums\BookCategory;
use App\Enums\BookFileType;
use App\Enums\BookType;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $book;
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
    public $rent_price;
    public $rentage_period;

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
            'cover_photo' => ['nullable', 'image', 'max:1024'],
            'file' => ['nullable','file', 'max:10240'],
            'rent_price' => ['required_if:is_free, true', 'numeric'],
            'rentage_period' => ['required', 'integer'],
        ];
    }

    public function mount(Book $book)
    {
        $this->book = $book;

        // Defined Vars
        $this->book_category = BookCategory::asArray();
        $this->book_types = BookType::asArray();
        $this->book_file_types = BookFileType::asArray();


        // Fields
        $this->title = $book->title;
        $this->author = $book->author;
        $this->description = $book->description;
        $this->summary = $book->summary;
        $this->language = $book->language;
        $this->category = $book->category->value;
        $this->type = $book->type->value;
        $this->pages = $book->pages;
        $this->isbn = $book->isbn;
        $this->pub_in = $book->pub_in;
        $this->is_free = $book->is_free;
        $this->pub_date = $book->pub_date;
        $this->rentage_period = $book->rentage_period;
        $this->rent_price = $book->rent_price;
    }

    public function render()
    {
        return view('livewire.book.edit');
    }

    public function update()
    {
        $data = $this->validate();

        if ($this->cover_photo) {
            $data['cover_photo'] = $this->cover_photo->store('cover/photo');
        }else{
            $data['cover_photo'] = $this->book->cover_photo;
        }

        if ($this->file) {
            $data['file'] = $this->file->store('books');
            $data['file_type'] = $this->file->extension();
        }else{
            $data['file'] = $this->book->file;
        }

        if($this->is_free){
            $data['rent_price'] = 0;
        }

        $book = $this->book->update($data);

        toast('User Account Created Successfully', 'success');
        return redirect()->route('book.show', $book);
    }
}
