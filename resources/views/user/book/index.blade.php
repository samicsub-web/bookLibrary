@extends('usermain')
@section('content')
<div class="col-md-8">
    <div class="card">
        <h3 class="card-header">Books</h3>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Isbn</th>
                    <th scope="col">Published Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1; 
                    @endphp
                    @if($books->count() != 0)
                        @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->publish_date }}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ route('user.book.request', ['id' => $book->id] ) }}">Request</a> </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan='6'>No record to display</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection