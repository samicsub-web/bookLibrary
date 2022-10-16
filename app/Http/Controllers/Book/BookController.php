<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view ('admin.book.index')->with('books', Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|string',
            'publish_date' => 'required|date',
        ]);

        $book = Book::create([
            'title' => $request['title'],
            'author' => $request['author'],
            'isbn' => $request['isbn'],
            'publish_date' => $request['publish_date'],
        ]);

        return redirect('book')->with('success', 'Book Successfuly Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('admin.book.edit')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request->validate([
            'title'  => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|string',
            'publish_date' => 'required|date',
        ]);

        $book = Book::update([
            'title' => $request['title'],
            'author' => $request['author'],
            'isbn' => $request['isbn'],
            'publish_date' => $request['publish_date'],
        ]);

        return redirect('book')->with('success', 'Book Detail Successfuly Updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'  => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|string',
            'publish_date' => 'required|date',
        ]);

        $book = Book::find($id); 

        $book->title = $request['title'];
        $book->author = $request['author'];
        $book->isbn = $request['isbn'];
        $book->publish_date = $request['publish_date'];

        $book->save();
       

        return redirect('book')->with('success', 'Book Detail Successfuly Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
    
        return view ('admin.book.index')->with('books', Book::all())
                        ->with('success','Book deleted successfully');
    }

    public function user_book_list(){
        return view('user.book.index')->with('books', Book::all());
    }
}
