@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Students Add Form</h1>

        <!-- Page Body -->
        <div class="card shadow mb-4">
            <div class="row">
                <div class="col-md">
                    <div class="card-header py-3 bg-dark">
                        <h5 class="m-0 font-weight-bold text-white">Student Details</h5>
                        @if(\Session::has('added'))
                            <div class="alert alert-success" role="alert">
                                {{ \Session::get('added') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body table-dark">
                <!-- Form -->
                <form action="{{route('students_details_save')}}" method="post">
                {{csrf_field()}}

                    <!-- Grid row 1 -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="std_first_name" name="std_first_name" value="{{ old('std_first_name') }}" placeholder="First Name" autofocus>
                            @if($errors->has('std_first_name'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_first_name') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="std_last_name" name="std_last_name" value="{{ old('std_last_name') }}" placeholder="Last Name" >
                            @if($errors->has('std_last_name'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_last_name') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label align="left">Gender</label>
                            <select name="std_gender" class="form-control">
                                <option selected disabled hidden>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @if($errors->has('std_gender'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_gender') }}</span>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.Grid row 1 -->

                    <!-- Grid row 2 -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>NIC No.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="std_nic_no" name="std_nic_no" value="{{ old('std_nic_no') }}" placeholder="National Identity Card No." >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><b>V</b></span>
                                </div>
                            </div>
                            @if($errors->has('std_nic_no'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_nic_no') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label>UIC No.</label>
                            <input type="text" class="form-control" id="std_uic_no" name="std_uic_no" value="{{ old('std_uic_no') }}" placeholder="University Identity Card No." >
                            @if($errors->has('std_uic_no'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_uic_no') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password" >
                            @if($errors->has('password'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('password') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Mobile No.</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" name="std_mobile_no" value="{{ old('std_mobile_no') }}" class="form-control" placeholder="Mobile No.">
                            </div>
                            @if($errors->has('std_mobile_no'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_mobile_no') }}</span>
                                    </span>
                            @endif
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
                                <input type="date" class="form-control" name="std_birthday" value="{{ old('std_birthday') }}" placeholder="Birthday">
                            </div>
                            @if($errors->has('std_birthday'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_birthday') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date of Admission</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="std_admission_date" value="{{ old('std_admission_date') }}" placeholder="Admission">
                            </div>
                            @if($errors->has('std_admission_date'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_admission_date') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Faculty</label>
                            <select id="inputState" name="std_faculty_id" class="form-control">
                                <option selected disabled hidden>Choose...</option>
                                <option value="MGT">Management Studies</option>
                                <option value="SOLA">Social Sciences & Languages</option>
                                <option value="APP">Applied Sciences</option>
                                <option value="AGRI">Agricultural Sciences</option>
                                <option value="GEO">Geomatics</option>
                                <option value="TEC">Technology</option>
                            </select>
                            @if($errors->has('std_faculty_id'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_faculty_id') }}</span>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.Grid row 3 -->

                    <!-- Grid row 4 -->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputAddress">Distance from Home</label>
                            <input type="text" class="form-control" id="distance" name="distance" value="{{ old('distance') }}" placeholder="Distance (km)">
                            @if($errors->has('distance'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('distance') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                            @if($errors->has('email'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('email') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-7">
                            <label for="inputAddress">Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-home"></i></span>
                                </div>
                                <input type="text" name="std_address" id="std_address"  class="form-control" value="{{ old('std_address') }}" placeholder="Permanent Address">
                            </div>
                            @if($errors->has('std_address'))
                                <span class="help-block text-white badge badge-danger">
                                        <span>{{ $errors->first('std_address') }}</span>
                                    </span>
                            @endif
                        </div>

                    </div>
                    <!-- /.Grid row 4 -->

                    <hr>
                    <div align="right">
                        <button type="reset" class="btn btn-secondary btn-md">Clear</button>
                        <button type="submit" class="btn btn-primary btn-md">Add Student</button>
                    </div>
                </form>
                <!-- Form -->
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

    <!---------------------------------------------- put scripts below here related this page content ------------------------------------------>



@endsection


