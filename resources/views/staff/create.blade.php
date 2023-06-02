@extends('layouts/layout')
@section('content')


<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Staff
            <a href="{{url('/admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('admin/staff')}}">
                @csrf
                <table class="table table-bordered">
                     <tr>
                        <th>Full Name</th>
                        <td><input type="text" class="form-control" name="full_name"></td>
                    </tr>
                    <tr>
                        <th>Select Department</th>
                        <td>
                            <select name="department_id"class="form-control" id="">
                                <option value="0">Select Department</option>
                                @foreach($departs as $dp)
                                <option value="{{$dp->id}}">{{ $dp->title }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><input type="file"  name="photo"></td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td><textarea name="bio" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <th>Salary Type</th>
                        <td>
                            <input type="radio" name="salary_type" value="daily">Daily
                            <input type="radio" name="salary_type" value="monthly">Monthly
                        </td>
                    </tr>
                    <tr>
                        <th>Salary Amount</th>
                        <td><input type="number" class="form-control" name="salary_amt"></td>
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