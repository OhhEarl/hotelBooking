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
                                <td class="imgcol{{$image->id}}">
                                    <img width="100" src="{{asset('storage/'.$image->img_src)}}">
                <p class="mt-4">
                <button type="button" onclick= "return confirm('Are Sure You Want To Delete This Image?')"  
                class="btn btn-danger btn-sm delete-image"
                 data-image-id="{{$image->id}}">
                <i class="fa fa-trash"></i>
                    Delete</button>
                </p>    
                                 </td>
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
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function(){
         $('.delete-image').on('click', function(){
            var _img_id=$(this).attr('data-image-id');
            var _vm=$(this);
           $.ajax({
                url:"{{url('admin/roomtypeimage/delete')}}/"+_img_id,
                dataType: 'json',
                beforeSend:function(){
                    _vm.addClass('disabled');
                },
                success:function(res){
                    console.log(res);
                    $(".imgcol" +_img_id).remove();
                    _vm.removeClass('disabled');
                }
           })
        });
    });
</script>

@endsection