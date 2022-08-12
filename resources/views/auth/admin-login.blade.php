<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HMS of SUSL - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin_template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin_template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-4">

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col">
                <div class="p-4">
                    <div class="text-center">
                        <h2><span class="badge badge-danger">Admin Login Form</span></h2>
                      <a href="/"><h1 class="h4 text-gray-900 mb-3 mt-4"><b>Hostel Management System of SUSL</b></h1></a>
                    </div>
                    <br>
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                      <div class="col">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                          <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Password</label>

                      <div class="col">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                          <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                          Login
                        </button>


                      </div>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                      Forgot Your Password?
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin_template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin_template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin_template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin_template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
