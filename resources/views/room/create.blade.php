@extends('layouts/layout')
@section('content')


<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Room
            <a href="{{url('/admin/rooms')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        
        @foreach ($errors->all() as $error)
         <ul>
            <li class="text-danger">{{ $error }}</li>
        </ul>
        @endforeach
        
        <div class="table-responsive">
            <form method="POST" action="{{url('admin/rooms')}}">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Select Room Type</th>
                        <td>
                            <select name="roomtype_id"class="form-control" name="" id="">
                                <option value="0">Select Room Type</option>
                                @foreach($roomtype as $roomType)
                                <option value="{{$roomType->id}}">{{ $roomType->title }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td><input type="text" class="form-control" name="title"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-primary">
                        </td>
                    </tr> 
                </table>
            </form> 
        </div>
    </div>
</div>

</div>

@endsection