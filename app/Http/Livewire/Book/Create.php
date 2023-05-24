<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    // Form fields
    public $title;
    public $description;
    public $summary = false;
    public $is_free = false;
    public $language = true;
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

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:250'],
            'description' => ['required', 'email', 'max:250', 'unique:users,email'],
            'summary' => ['nullable', 'image', 'max:1024'],
            'language' => ['nullable', 'date'],
            'category' => ['required', 'boolean'],
            'type' => ['required', 'boolean'],
            'pages' => ['required', 'string', 'max:250'],
            'isbn' => ['required', 'string', 'max:250'],
            'pub_in' => ['required', 'string', 'max:250'],
            'pub_date' => ['required', 'string', 'max:14'],
            'cover_photo' => ['required', 'string', 'max:14'],
            'file' => ['required', 'string', 'max:14'],
            'file_type' => ['required', 'string', 'max:14'],
            'rent_price' => ['required', 'string', 'max:14'],
            'rentage_period' => ['required', 'string', 'max:14'],
        ];
    }

    public function render()
    {
        return view('livewire.book.create');
    }

    public function submit()
    {
        $data = $this->validate();

        if ($this->photo) {
            $path = $this->photo->store('cover_photo');
        }

        $all = array_merge($data, [
            'cover_photo' => $path,
            'file_type' => $this->cover_photo->extension(),
        ]);

        $user = Book::create($all);

        

        toast('User Account Created Successfully', 'success');
        return redirect()->route('admin.teachers.show', $user);
    }

    public function resetFile()
    {
        $this->reset('photo');
    }
}
