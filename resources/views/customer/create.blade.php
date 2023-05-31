@extends('layouts/layout')
@section('content')


<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Customer
            <a href="{{url('/admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('admin/customer')}}">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td><input type="text" class="form-control" name="full_name"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="email" class="form-control" name="email"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" class="form-control" name="password"></td>
                    </tr>
                    <tr>
                        <th>Mobile No.</th>
                        <td><input type="text" class="form-control" name="mobile"></td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><input type="file" name="photo"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input type="text" class="form-control" name="address"></td>
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