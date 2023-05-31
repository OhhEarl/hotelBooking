@extends('layouts/layout')
@section('content')


<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Room Types
            <a href="{{url('/admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>
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
            <form method="POST" action="{{url('admin/rooms/'.$data->id)}}">
            @csrf
                @method('put')
                <table class="table table-bordered">
                    <tr>
                        <th>Select Room Type</th>
                             <td>
                                <select name="roomtype_id"class="form-control">
                                    <option value="0">Select Room Type</option>
                                    @foreach($roomtype as $roomType)
                                    <option @if($data->room_type_id==$roomType->id) Selected @endif 
                                        value="{{$roomType->id}}">{{ $roomType->title }}</option>
                                    @endforeach
                                </select>
                             </td>
                    <tr>
                        <th>Title</th>
                        <td><input value="{{$data->title}}" type="text" class="form-control" name="title"></td>
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