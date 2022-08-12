@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Students Update Form</h1>



        <!-- Page Body -->
        <div class="card shadow mb-4">
            <div class="row">
                <div class="col-md">
                    <div class="card-header py-3 ">
                        <h5 class="m-0 font-weight-bold text-primary">Student Details</h5>
                        @if(\Session::has('updated'))
                            <div class="alert alert-success" role="alert">
                                {{ \Session::get('updated') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body table-dark">
                <!-- Form -->
                <form action="{{route('students_details_update')}}" method="post">
                    {{ csrf_field() }}

                    <!-- Grid row 1 -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="hidden" name="id" value="{{$std_record->id}}">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="std_first_name" name="std_first_name"  value="{{$std_record->std_first_name}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="std_last_name" name="std_last_name" value="{{$std_record->std_last_name}}">
                        </div>
                        <div class="form-group col-md-4" align="center">
                            <label align="left">Gender</label>
                            <select name="std_gender" class="form-control">
                                    <option value="Male" @if($std_record->std_gender=='Male')
                                                                selected
                                                          @endif >Male</option>
                                    <option value="Female" @if($std_record->std_gender=='Female')
                                                                    selected
                                                            @endif >Female</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.Grid row 1 -->

                    <!-- Grid row 2 -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>NIC No.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="std_nic_no" name="std_nic_no" value="{{$std_record->std_nic_no}}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><b>V</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>UIC No.</label>
                            <input type="text" class="form-control" id="std_uic_no" name="std_uic_no" value="{{$std_record->std_uic_no}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Mobile No.</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" name="std_mobile_no" id="std_mobile_no"  class="form-control" value="{{$std_record->std_mobile_no}}">
                            </div>
                        </div>
                    </div>
                    <!-- /.Grid row 2 -->

                    <!-- Grid row 3 -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Date of Birth</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input  type="date" class="form-control" name="std_birthday" value="{{$std_record->std_birthday}}" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date of Admission</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input  type="date" class="form-control" name="std_admission_date" value="{{$std_record->std_admission_date}}" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Faculty</label>
                            <select name="std_faculty_id" class="form-control">
                                @foreach($fac_record as $fac)
                                <option value="{{$fac->faculty_code}}"
                                    @if($fac->faculty_code == $std_record->std_faculty_id)
                                        selected
                                    @endif
                                >{{$fac->faculty_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.Grid row 3 -->

                    <!-- Grid row 4 -->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputAddress">Distance from Home</label>
                            <input type="text" class="form-control" id="distance" name="distance" value="{{$std_record->distance}}" placeholder="Distance (km)" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$std_record->email}}" required placeholder="Email Address">
                        </div>
                        <div class="form-group col-md-7">
                            <label for="inputAddress">Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-home"></i></span>
                                </div>
                                <input type="text" name="std_address" id="std_address"  class="form-control" value="{{$std_record->std_address}}">
                            </div>
                        </div>

                    </div>
                    <!-- /.Grid row 4 -->
                    <hr>
                    <div align="right">
                        <button type="submit" class="btn btn-warning btn-md">Update Student</button>
                    </div>

                </form>
                <!-- Form -->
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

    <!---------------------------------------------- put scripts below here related this page content ------------------------------------------>



@endsection


