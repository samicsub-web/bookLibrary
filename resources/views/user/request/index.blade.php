@extends('usermain')
@section('content')
<div class="col-md-8">
    <div class="card">
        <h3 class="card-header">Requests List</h3>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Requested</th>
                    <th scope="col">Author</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1; 
                    @endphp
                    @if($Requests->count() != 0)
                        @foreach ($Requests as $request)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $request->book->title }}</td>
                                <td>{{ $request->book->author }}</td>
                                <td>{{ $request->date }}</td>
                                <td>{{ $request->status }}</td>
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