@extends('frontLayout')
@section('content')
<html>
<body class="bg-primary">



<div class="container p-5 mt-2 w-75" >
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login Now!</h1>
                    </div>

                       @if(Session::has('error'))
                                        <p class="text-danger ml-3">{{session('error')}}</p>
                              @endif
                    
                    
                    <form class="user" method="post" action="{{url('customer/login')}}">
                        @csrf
                        <!-- Email -->
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" 
                                placeholder="Email Address" name="email">
                        </div>

                        <!-- Password -->
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user"
                                 placeholder="Password" name="password">
                            </div>
            
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                           Login
                        </button>

                        <div class="text-center">
                                <a class="small" href="{{url('register')}}">Don't have an account? Register Now!</a>
                            </div>
                    </form>

                           
    
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