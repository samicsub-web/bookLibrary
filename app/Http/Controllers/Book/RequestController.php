<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.request.request')->with('Requests', BookRequest::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $book = BookRequest::create([
            'userid' => Auth::user()->id,
            'bookid' => $id,
            'date' =>Carbon::now()
        ]);

        return redirect('request-list')->with('success', 'Book Request Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requestsdetail = BookRequest::with('user', 'book')->find($id);

        return view('admin.request.detail')->with('Requests', $requestsdetail);
    }
    public function approve($id)
    {
        $requestsdetail = BookRequest::find($id);
        $requestsdetail->status = "Approve";
        $requestsdetail->save();

        return view('admin.request.detail')->with('Requests', $requestsdetail);
    }
    public function decline($id)
    {
        $requestsdetail = BookRequest::find($id);
        $requestsdetail->status = "Decline  ";
        $requestsdetail->save();

        return view('admin.request.detail')->with('Requests', $requestsdetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    
    public function user_request()
    {
        $allrequest = BookRequest::where('userid',  Auth::user()->id)->get();

        // dd($allrequest);

        return view('user.request.index')->with('Requests', $allrequest);

    }
}
