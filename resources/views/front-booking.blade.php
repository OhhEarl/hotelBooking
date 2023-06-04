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
                    <td><input name="checkin_date" type="date" class="form-control checkin-date" /></td>
                </tr>
                <tr>
                    <th>CheckOut Date <span class="text-danger">*</span></th>
                    <td><input name="checkout_date" type="date" class="form-control" /></td>
                </tr>
                <tr>
                    <th>Avaiable Rooms <span class="text-danger">*</span></th>
                    <td>
                        <select class="form-control room-list" name="room_id">

                        </select>
                        <p>Price: <span class="show-room-price"></span></p>
                    </td>
                </tr>
                <tr>
                    <th>Total Adults <span class="text-danger">*</span></th>
                    <td><input name="total_adults" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <th>Total Children</th>
                    <td><input name="total_children" type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                    
                    	<input type="hidden" name="customer_id" value="{{session('data')[0]->id}}" />
              
                        <input type="hidden" name="roomprice" class="room-price" value="" />
                    	<input type="hidden" name="ref" value="front" />
                        <input type="submit" class="btn btn-primary" />
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
                            _html+='<option data-price="'+row.roomtype.price+'" value="'+row.room.id+'">'+row.room.title+' - '+row.roomtype.title+'</option>';
                        });
                        $(".room-list").html(_html);

                                var _selectedPrice=$(".room-list").find('option:selected').attr('data-price');
                                $(".room-price").val(_selectedPrice);
                                $(".show-room-price").text(_selectedPrice);
                    }
                });
            });
            $(document).on("change", ".room-list", function(){
                var _selectedPrice = $(this).find('option:selected').attr('data-price');
                $(".room-price").val(_selectedPrice);
                $(".show-room-price").text(_selectedPrice);
            });
        });

        </script>
</body>

</html>

@endsection