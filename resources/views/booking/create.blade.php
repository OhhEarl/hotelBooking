@extends('layouts/layout')
@section('content')


<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Booking
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
                        <th>Select Customer</th>
                        <td>
                            <select class="form-control">
                                <option value="">---Select Customer---</option>
                                @foreach($data as $customer)
                                <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>CheckIn Date <span class="text-danger">*</span></th>
                        <td><input type="date" class="form-control checkin-date" name="checkin_date"></td>
                    </tr>
                    <tr>
                        <th>CheckOut Date <span class="text-danger">*</span></th>
                        <td><input type="date" class="form-control checkinout-date" name="checkout_date"></td>
                    </tr>
                    <tr>
                        <th>Available Rooms<span class="text-danger">*</span></th>
                        <td>
                            <select class="form-control room">
                              
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Adults <span class="text-danger">*</span></th>
                        <td><input type="number" class="form-control" name="total_adults"></td>
                    </tr>
                    <tr>
                        <th>Total Children <span class="text-danger">*</span></th>
                        <td><input type="number" class="form-control" name="total_children"></td>
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

@section ('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $(".checkin-date").on('blur', function(){
                var _checkindate = $(this).val();

                $.ajax({
                    url: "url{{'admin/booking'}}/"+ _checkindate,
                    dataType: 'json',
                    success:function(res){
                        console.log(res);
                    }
                });


            });
        });


    </script>


@endsection

@endsection