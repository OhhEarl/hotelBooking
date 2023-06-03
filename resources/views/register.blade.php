@extends('frontlayout')
@section('content')

<title>Register</title>
<html>
<body class="bg-primary">
    

<div class="card-body">
<div class="container d-flex justify-content-center">

<div class="card o-hidden border-0 shadow-lg my-5 w-75">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                     @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                        
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="text-danger ml-3">{{ $error }}</li>
                        </ul>
                        @endforeach
        
   
                    <form class="user" method="post"  action="{{url('admin/customer')}}"">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" 
                                    placeholder="Full Name" name="full_name">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" class="form-control form-control-user" 
                                placeholder="Email Address" name="email">
                                </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                     placeholder="Password" name="password">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user"
                                   placeholder="Mobile No." name="mobile">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                                placeholder="Address" name="address">
                        </div>
                        <input type="hidden" name="ref" value="front" />
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                    
                       
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{url('login')}}">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


    <!-- Bootstrap core JavaScript-->
    <script src="  {{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="  {{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="  {{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>


</body>

</html>
@endsection