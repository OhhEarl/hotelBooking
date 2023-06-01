@extends('layouts/layout')
@section('content')


<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Room Types
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
            <form method="POST" enctype="multipart/form-data" action="{{url('admin/staff/'.$data->id)}}">
            @csrf
                @method('put')
                <table class="table table-bordered">
                    <tr>
                        <th>Full name</th>
                        <td><input value="{{$data->full_name}}" type="text" class="form-control" name="full_name"></td>
                    </tr>
                    <tr>
                        <th>Select Department</th>
                             <td>
                                <select name="department_id"class="form-control">
                       
                                    <option   value="0">Select Department</option>
                                  
                                    @foreach($departs as $dp)
                                   
                                    <option @if($data->id == $dp->id) selected @endif
                                        value="{{$dp->id}}">{{ $dp->title }}</option>
                                    @endforeach
                                </select>
                             </td>
                    <tr>
                        <th>Photo</th>
                        <td>
                            <input type="file" name="photo" type="file">
                            <input value="{{$data->photo}}" type="hidden"  name="prev_photo">
                            <img width="80" src="{{asset('storage/'.$data->photo)}}">
                        </td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td><textarea name="bio" class="form-control">{{$data->bio}}</textarea></td>
                    </tr>
                    <tr>
                        <th>Salary type</th>
                        <td >
                            <label for="daily">Daily</label>
                            <input @if($data->salary_type == 'daily') checked 
                            @endif value="daily" type="radio" 
                            name="salary_type"  class="mr-3">
                           
                            <label for="monthly">Monthly</label>
                            <input @if($data->salary_type == 'monthly') checked
                             @endif value="monthly" type="radio" 
                              name="salary_type">
                        </td>
                    </tr>
                    <tr>
                        <th>Salary Amount</th>
                        <td>
                            <input value="{{$data->salary_amt}}" class="form-control" name="salary_amt">
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