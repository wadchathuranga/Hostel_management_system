@extends('layouts.students_layout')

@section('content')
    <br>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h3>Home</h3>

        <!-- Row Example -->
        <div class="row " align="center">

            <!-- Card Example -->
            <div class="col">
                <div class="card text-white bg-primary mb-3" >
                    <div class="card-header">
                        <div class="custom-control-inline">
                        <h5 class="pt-2 mb-2">Total Faculties:</h5><h2 class="ml-3 mb-0">{{$fac_count}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Card Example -->

            <!-- Card Example -->
            <div class="col">
                <div class="card text-white bg-primary mb-3" >
                    <div class="card-header">
                        <div class="custom-control-inline">
                            <h5 class="pt-2 mb-2">Total Hostels:</h5><h2 class="ml-3 mb-0">{{$hstl_count}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Card Example -->

            <!-- Card Example -->
            <div class="col">
                <div class="card text-white bg-primary mb-3" >
                    <div class="card-header">
                        <div class="custom-control-inline">
                            <h5 class="pt-2 mb-2">Total Spaces:</h5><h2 class="ml-3 mb-0">{{$spaces}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Card Example -->

        </div>
        <!-- Row End Example -->


        <!-- Hotel request card -->
        <div class="card text-center text-white bg-secondary">
            <div class="h3 card-header">
                Hostel Request
            </div>
            <div class="card-body">
                @if(\Session::has('req'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('req') }}
                    </div>
                @endif
                <h5 class="card-title">Sabaragamuwa University Hostels Management System</h5>
                <p class="card-text">Newly student can request hostel facilities and other student can register hostel facilities which related their academic year.</p>
                <p class="card-text text-warning">when student request a hostel facilities they cannot request again without inform SAR office.</p>
                @if($req_valid=='true')
                    <a href="{{route('hostel_request')}}" class="btn btn-primary btn-lg disabled">Already Requested</a>
                @else
                    <a href="{{route('hostel_request')}}" class="btn btn-primary btn-lg">Request</a>
                @endif
            </div>
        </div>
        <!-- /.hotel request card end -->






    </div>
    <!-- /.End Page Content -->


    <br>
<!------------------------------------------- put scripts below here related this page content ------------------------------------------->



@endsection
