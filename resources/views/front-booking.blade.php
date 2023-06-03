@extends('frontlayout')

@section('content')


<html>
<body class="">


<div class="container my-4">
<h3 class="mb-3">Create Booking</h3>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('admin/booking')}}">
                @csrf
                <table class="table table-bordered">
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
                            <select class="form-control room-list" name="room_id">
                              
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
                            <input type="hidden" name="ref" value="front">
                            <input type="hidden" name="customer_id" value="{{session('data')[0]->id}}">
                            <input type="submit" class="btn btn-primary">
                        </td>
                    </tr> 
                </table>
            </form> 
        </div>
    </div>

    















    <!-- Bootstrap core JavaScript-->
    <script src="  {{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>



    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $(".checkin-date").on('blur', function(){
                var _checkindate = $(this).val();
    
                $.ajax({
                    url: "{{url('admin/booking')}}/available-rooms/"+ _checkindate,
                    dataType: 'json',
                    beforeSend:function(){
                        $(".room-list").html('<option>---Loading---</option>');
                    },
                    success:function(res){
                        var _html='';
                        $.each(res.data, function(index, row){
                            _html+='<option value="'+row.room.id+'">'+row.room.title+' - '+row.roomtype.title+'</option>';
                        });
                        $(".room-list").html(_html);
                    }
                });


            });
        });

        </script>
</body>

</html>

@endsection