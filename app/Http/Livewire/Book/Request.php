<?php

namespace App\Http\Livewire\Book;

use App\Models\BookRequest;
use Livewire\Component;

class Request extends Component
{
    public function render()
    {
        $requests = BookRequest::with(['user'])->orderBy('status', 'ASC')->get();
        return view('livewire.book.request', ['requests' => $requests]);
    }

    public function AcceptRequest(BookRequest $req, $status)
    {
        if ($req->book->is_free && ($status == 1)) {
            $req->update(['status' => 3]);
            $req->user->books()->attach($req->book_id, ['return_date' => now()->addDays($req->book->rentage_period)]);
        } else {
            $req->update(['status' => $status]);
        }

        session()->flash('success', 'Request Status Changed Successfully');
    }
}
