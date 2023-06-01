@extends('layouts/layout')
@section('content')


<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$data->full_name}} Details
            <a href="{{url('/admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="fw-bold">Full Name</th>
                        <td class="fw-bold">{{$data->full_name}}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Department</th>
                        <td class="fw-bold">{{$data->department->title}}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Photo</th>
                        <td><img width="100" src="{{asset('storage/'.$data->photo)}}" alt=""></td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Bio</th>
                        <td class="fw-bold">{{$data->bio}}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Salary Type</th>
                        <td class="fw-bold">{{$data->salary_type}}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Salary Amount</th>
                        <td class="fw-bold">{{$data->salary_amt}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>

</div>

@endsection