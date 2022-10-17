@extends('app')
@section('content')
<div class="col-md-8">
    <div class="card">
        <h3 class="card-header">Request Detail</h3>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <td colspan = "4"><strong>User Datails</strong></td>
                </tr> 
                <tr>
                    <td>Name:</td>
                    <td colspan = "3">{{ $Requests->user->name }}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td colspan = "3">{{ $Requests->user->email }}</td>
                </tr>
                <tr>
                    <td>Registration Date: </td>
                    <td colspan = "3">{{ $Requests->user->created_at }}</td>
                </tr>
            </table>
            <hr>
            <table class="table table-striped">
                <tr>
                    <td colspan = "4"><strong>Book Datails</strong></td>
                </tr> 
                <tr>
                    <td>Book Name:</td>
                    <td colspan = "3">{{ $Requests->book->title }}</td>
                </tr>
                <tr>
                    <td>Author: </td>
                    <td colspan = "3">{{ $Requests->book->author }}</td>
                </tr>
                <tr>
                    <td>Isbn: </td>
                    <td colspan = "3">{{ $Requests->book->isbn }}</td>
                </tr>
                <tr>
                    <td>Publish Date: </td>
                    <td colspan = "3">{{ $Requests->book->publish_date }}</td>
                </tr>
                
            </table>
            <hr>
             <table class="table table-striped">
                <tr>
                    <td colspan = "4"><strong>Request Status</strong></td>
                </tr> 
                <tr>
                    <td>Status:</td>
                    <td colspan = "3">{{ $Requests->status }}</td>
                </tr>
                <tr>
                    <td colspan="4"> 
                        @if( $Requests->status == "Pending")
                            <a class="btn btn-success" href="{{ route('admin.request.approve', ['id' => $Requests->id] ) }}"><i class="fa-sharp fa-solid fa-square-check"></i>  Approve</a> | <a class="btn btn-danger" href="{{ route('admin.request.decline', ['id' => $Requests->id] ) }}"><i class="fa-solid fa-rectangle-xmark"></i> Decline</a>
                        @elseif ($Requests->status == "Approve")
                             <a class="btn btn-danger" href="{{ route('admin.request.decline', ['id' => $Requests->id] ) }}"><i class="fa-solid fa-rectangle-xmark"></i> Decline</a>
                        @elseif ($Requests->status == "Decline")
                            <a class="btn btn-success" href="{{ route('admin.request.approve', ['id' => $Requests->id] ) }}"><i class="fa-sharp fa-solid fa-square-check"></i>  Approve</a> 
                        @endif 

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection