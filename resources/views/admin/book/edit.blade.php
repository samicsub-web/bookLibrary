@extends('app')
@section('content')
<div class="col-md-8">
    <div class="card">
        <h3 class="card-header">Edit Book Detail</h3>
        <div class="card-body">
               <form action="{{ route('admin.book.update', ['id'=> $book->id] ) }}" method="POST">
                @csrf
                <input type="hidden" id="id" name="id">
                <div class="form-group mb-3">
                    <input type="text" placeholder="Book Title" id="title" value="{{ $book->title}}" class="form-control" name="title"
                        required autofocus>
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Author" id="author" value="{{ $book->author}}" class="form-control"
                        name="author" required autofocus>
                    @if ($errors->has('author'))
                    <span class="text-danger">{{ $errors->first('author') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="ISBN" id="isbn" value="{{ $book->isbn}}" class="form-control"
                        name="isbn" required>
                    @if ($errors->has('isbn'))
                    <span class="text-danger">{{ $errors->first('isbn') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="date" placeholder="Published Date" value="{{ $book->publish_date}}" id="publish_date" class="form-control"
                        name="publish_date" required>
                    @if ($errors->has('publish_date'))
                    <span class="text-danger">{{ $errors->first('publish_date') }}</span>
                    @endif
                </div>
                <div class="d-grid mx-auto">
                    <button type="submit" class="btn btn-dark btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection