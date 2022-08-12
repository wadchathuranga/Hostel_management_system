@extends('layouts.students_layout')

@section('content')
    <br>

    <div class="container">

        <div class="container-fluid" align="center" style="height: auto;">

            <h2><b>Mission</b></h2>

            <p class="mission">Easy to request & receiving hostel for any students</p>
            <hr>

            <div class="row">
                <div class="col"></div>
                @foreach(\App\Admin::all() as $admin)
                    @if($admin->job_title != 1)
                        <div class="col">
                            <div class="card col m-2">
                                <img src="/images/no_pic.jpg" class="mt-3" style="width:100%">
                                <div class="h4 mb-0 font-weight-bold text-gray-800 mt-2">{{$admin->name}}</div>
                                <div class="h5 panel-body ml-3 mr-3 mt-1 mb-1" align="center">
                                    @if($admin->job_title == 'REG')
                                        <div class="badge badge-success">Register</div>
                                    @elseif($admin->job_title == 'SAR')
                                        <div class="badge badge-success">Senior Assistant Register</div>
                                    @endif
                                </div>
                                <a href="#" class="h4 mb-0 mt-3">{{$admin->email}}</a>
                                <div style="margin: 10px 0px;" class="btn-lg">
                                    <a href="#"><i class="fa fa-phone"> Phone : {{$admin->phone}}</i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="col"></div>
            </div>



        </div>

        <br>

    </div>
@endsection
