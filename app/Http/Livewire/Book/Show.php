<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use App\Models\BookRequest;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Unicodeveloper\Paystack\Facades\Paystack;

class Show extends Component
{
    public $bookLoad;


    // Rating fields
    public $rating;
    public $review;

    public function rules()
    {
        return [
            'rating' => ['required', 'integer'],
            'review' => ['required', 'string', 'max:200']
        ];
    }

    public function mount(Book $book)
    {
        $this->bookLoad = $book;
    }
    
    public function render()
    {
        // From My Collection
        $book = Auth::user()->books()->with(['reviews', 'my_request', 'book_requests.user', 'book_requests', 'my_review'])->wherePivot('book_id', $this->bookLoad->id)->first();
        

        if(!$book)
            $book = Book::query()->when(auth()->user()->isAdmin(), fn($q) => $q->with(['book_requests' => fn($q) => $q->where('status', 0), 'book_requests.user']))->with(['reviews', 'my_request', 'my_review'])->where('id', $this->bookLoad->id)->first();

        
        return view('livewire.book.show', ['book' => $book]);
    }

    public function submitRequest()
    {
        $request = BookRequest::updateOrCreate([
            'user_id' => auth()->id(),
            'book_id' => $this->bookLoad->id,
        ], []);

        session()->flash('success', 'Request For Rent Submitted Successfully');
    }

    public function payNow(Book $book)
    {
        // Create transaction
        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'app_ref' => uniqid('ref_'),
            'trx_reference' => uniqid('trnx_', true),
            'amount' => $book->rent_price,
        ]);

        $data = array(
            "amount" => $transaction->amount * 100,
            "reference" => $transaction->trx_reference,
            "email" => auth()->user()->email,
            "currency" => "NGN",
        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }
    
    public function AcceptRequest(BookRequest $req, $status)
    {
        if($req->book->is_free && ($status == 1)){
            $req->update(['status' => 3]);
            $req->user->books()->attach($req->book_id, ['return_date', now()->addDays($req->book->rentage_period)]);

        }else{
            $req->update(['status' => $status]);
        }

        session()->flash('success', 'Request Status Changed Successfully');
    }

    public function saveReview()
    {
        $data = $this->validate();

        $data = array_merge($data, ['user_id' => auth()->id(), 'book_id' => $this->bookLoad->id]);

        $review = Review::create($data);

        toast('Review added successfully', 'success');
        return redirect()->route('book.show', $this->bookLoad);
    }
}
