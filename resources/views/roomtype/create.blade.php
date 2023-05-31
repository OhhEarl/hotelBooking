@extends('layouts/layout')
@section('content')


<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Room Type
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
            <form method="POST" enctype="multipart/form-data" action="{{url('admin/roomtype')}}">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td><input type="text" class="form-control" name="title"></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><input type="number" class="form-control" name="price"></td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td><textarea class="form-control" name="detail"></textarea></td>
                    </tr>
                    <tr>
                        <th>Gallery</th>
                        <td><input type="file" multiple name="imgs[]" /></td>
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