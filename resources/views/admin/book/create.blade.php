@extends('app')
@section('content')
<div class="col-md-8">
    <div class="card">
        <h3 class="card-header">Books</h3>
        <div class="card-body">
            <form action="{{ route('admin.book.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" placeholder="Book Title" id="title" class="form-control" name="title"
                        required autofocus>
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Author" id="author" class="form-control"
                        name="author" required autofocus>
                    @if ($errors->has('author'))
                    <span class="text-danger">{{ $errors->first('author') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="ISBN" id="isbn" class="form-control"
                        name="isbn" required>
                    @if ($errors->has('isbn'))
                    <span class="text-danger">{{ $errors->first('isbn') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="date" placeholder="Published Date" id="publish_date" class="form-control"
                        name="publish_date" required>
                    @if ($errors->has('publish_date'))
                    <span class="text-danger">{{ $errors->first('publish_date') }}</span>
                    @endif
                </div>
                <div class="d-grid mx-auto">
                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

