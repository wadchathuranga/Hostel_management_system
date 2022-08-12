<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HMS of SUSL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- js scripts --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>

<div class="content bg-dark">

    <nav class="navbar navbar-dark bg-dark">

        <!-- Just an image -->

        <a class="navbar-brand" href="/">
            <img src="/images/b.png" width="30" height="30" class="d-inline-block align-top" alt="">
            HMS of SUSL
        </a>

        <ul class="nav justify-content-center">
            <!-- home -->
            <li class="nav-item">
                <div class="panel"><a href="{{route('admin.login')}}">
                    @component('components.who')
                    @endcomponent
                    </a></div>
            </li>
        </ul>


        <!-- Topbar Navbar -->
        <ul class="nav justify-content-end">
            @if(Auth::guest())
            <li class="nav-item">
                <a class="nav-link active text-light" href="login">Login</a>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link active text-light" href="{{route('home')}}">Home</a>
                </li>
            @endif
        </ul><!-- End of Topbar -->

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you want to "Logout" ?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                        <form action="logout" method="post">
                            {{csrf_field()}}

                            <button type="submit" name="logout_btn" class="btn btn-primary">Yes</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>

    </nav>

@include('layouts.slide_show')

    {{--<!-- container body -->
    <div class="container-fluid ">
        <hr>

    </div>
    <!-- /.End container -->--}}

        <!-- Footer -->
        <div class="bg-dark text-light">
            <footer class="page-footer font-small blue">
                <!-- Copyright -->
                <div class="footer-copyright text-center pb-1 mt-2">
                    <p>Copyright © 2020 - Present | Powered by <a href="#">HMS of SUSL</a> | Designed and Developed by <a href="#">Dilshan Chathuranga</a></p>
                </div><!-- Copyright -->
            </footer>
        </div>
        <!-- /.Footer -->
</div>
<!-- /.End content -->
</body>
</html>
