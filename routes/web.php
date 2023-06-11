<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Book\Create;
use App\Http\Livewire\Book\Edit;
use App\Http\Livewire\Book\Index;
use App\Http\Livewire\Book\Market;
use App\Http\Livewire\Book\Request;
use App\Http\Livewire\Book\Show;
use App\Http\Livewire\Transaction\Index as TransactionIndex;
use App\Http\Livewire\User\Book;
use App\Http\Livewire\User\Index as UserIndex;
use App\Models\Book as ModelsBook;
use App\Models\BookRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $books = ModelsBook::all();
    return view('dashboard', [
        'user' => Auth::user()->load(['books', 'my_requests' => fn($q) => $q->where('status', 0)]),
        'users' => User::where('role', 2)->get(),
        'requests' => BookRequest::where('status', 0)->get(),
        'books' => $books, 
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users', UserIndex::class)->name('users.index')->middleware(['can:admin']);
    Route::get('/user/{user}', [ProfileController::class, 'show'])->name('users.show');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Book routes
    Route::get('/books', Index::class)->name('book.index');
    Route::get('/books/create', Create::class)->name('book.create')->middleware(['can:admin']);
    Route::get('/books/{book}/show', Show::class)->name('book.show');
    Route::get('/books/{book}/edit', Edit::class)->name('book.edit')->middleware(['can:admin']);

    // My collection
    Route::get('/books/requests', Request::class)->name('book.request');
    Route::get('/books/market', Market::class)->name('book.market');
    Route::get('/books/collection', Book::class)->name('book.collection');
    Route::get('/payments', TransactionIndex::class)->name('book.payments');
    Route::get('/books/{book}/read', function(ModelsBook $book) {
        return redirect(asset($book->file));
    })->name('book.read');
});

// Payment Routes
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

require __DIR__.'/auth.php';
