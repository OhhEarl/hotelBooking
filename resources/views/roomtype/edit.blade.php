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
            <form method="POST" action="{{url('admin/roomtype/'.$data->id)}}">
                @csrf
                @method('put')
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td><input value="{{$data->title}}" type="text" class="form-control" name="title"></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><input value="{{$data->price}}" type="price" class="form-control" name="price"></td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td><textarea class="form-control" name="detail">{{$data->detail}}</textarea></td>
                    </tr>
                    <tr>
                        <th>Gallery Images</th>
                        <td>
                            <table class="table table-bordered">
                                @foreach($data->roomtypeimgs as $image)
                                <td><img width="200" src="{{asset('storage/'.$image->img_src)}}" alt=""></td>
                                @endforeach
                            </table>
                        </td>
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