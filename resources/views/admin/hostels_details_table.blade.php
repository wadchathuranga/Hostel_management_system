@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Hostel Details Summary</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.</p>


        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Students Hostels</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <h4>Total Hostels: {{$all}}</h4>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success border-bottom-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Boys Hostels</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h5>Boys Hostels: {{$boy}}</h5>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Girls Hotels</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <h5>Girls Hostels: {{$girl}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" >
                <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Rented Hostels</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h5>Rented Hostels: {{$rent}}</h5>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total University Hostels</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <h5>University Hostels: {{$university}}</h5>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Available Spaces of Hotels</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <h5>Total Spaces: {{$sum}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="custom-control-inline mt-2">
                    <h5 class="m-0 font-weight-bold text-primary">Hostel Details</h5>
                </div>

                @if(\Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('message') }}
                    </div>
                @endif

                <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addhostel">Add New Hostel</button>
            </div>

            <div class="card-body">

                    <form action="{{route('hostels_search')}}" method="post">
                        {{csrf_field()}}

                        <div class="input-group">
                            <input style="padding: 5px;" type="text" name="search" id="search" placeholder=" Search Here...">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                    </form>

                <hr>

                <div class="table-responsive">
                         <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hostel Name</th>
                                <th>Hostel Type</th>
                                <th>No. of Students</th>
                                <th>Hostel Gender</th>
                                <th>Hostel Reserve Year</th>
                                <th>Hostel Location</th>
                                <th>Hostel Warden ID.</th>
                                <th><center>Action</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotels_details as $hostels)
                                <tr>
                                    <td>{{$hostels->id}}</td>
                                    <td>{{$hostels->hostel_name}}</td>
                                    <td>{{$hostels->hostel_type}}</td>          {{--can use badge instead of label <span class="badge badge-primary"></span>--}}
                                    <td>{{$hostels->no_of_students}}</td>
                                    <td>{{$hostels->hostel_gender}}</td>        {{--can use badge instead of label <span class="badge badge-primary"></span>--}}
                                    <td>{{$hostels->hostel_reserve_year}}</td>
                                    <td>{{$hostels->hostel_location}}</td>
                                    <td>{{$hostels->hostel_warden_id}}</td>
                                    <td><center>
                                            <a class="btn btn-warning editHostel">Edit</a>
                                            <a class="btn btn-danger deleteHostel">Delete</a>
                                        </center></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    {{$hotels_details->links()}}

                </div>

            </div>
            <!-- /.end card body -->
        </div>


    </div>
    <!-- /.container-fluid -->

    <!-- Add new hostel model button form -->
    <div class="modal fade" id="addhostel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Hostel Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    <!-------------------- Here select dropdown commented otherwise edit ajax function not work proper ----------------------->
                <form id="addForm">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Hostel Name</label>
                            <input type="text" name="hostel_name" class="form-control" placeholder="Enter here...">
                        </div>
                        <div class="form-group">
                            <label>Hostel Type</label>
                            <input type="text" name="hostel_type" class="form-control" placeholder="Enter here...">
                            {{--<select id="hostel_type" name="hostel_type" class="form-control">
                                <option selected disabled hidden>Choose...</option>
                                <option value="Rent">Rent</option>
                                <option value="University">University</option>
                            </select>--}}
                        </div>
                        <div class="form-group">
                            <label>Students Allocated Count</label>
                            <input type="text" name="no_of_students" class="form-control" placeholder="Enter here...">
                        </div>
                        <div class="form-group">
                            <label>Hostel Gender</label>
                            <input type="text" name="hostel_gender" class="form-control" placeholder="Enter here...">
                            {{--<select id="hostel_gender" name="hostel_gender" class="form-control">
                                <option selected disabled hidden>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>--}}
                        </div>
                        <div class="form-group">
                            <label>Hostel Allocated Year</label>
                            <input type="text" name="hostel_reserve_year" class="form-control" placeholder="Hostel here...">
                            {{--<select id="hostel_reserve_year" name="hostel_reserve_year" class="form-control">
                                <option selected disabled hidden>Choose...</option>
                                <option value="1st year">1st Year</option>
                                <option value="2nd year">2nd Year</option>
                                <option value="3rd year">3rd Year</option>
                                <option value="4th year">4th Year</option>
                            </select>--}}
                        </div>
                        <div class="form-group">
                            <label>Hostel Location</label>
                            <input type="text" name="hostel_location" class="form-control" placeholder="Hostel here...">
                        </div>
                        <div class="form-group">
                            <label>Hostel Warden ID.</label>
                            <input type="text" name="hostel_warden_id" class="form-control" placeholder="Hostel here...">
                            {{--<select id="hostel_warden_id" name="hostel_warden_id" class="form-control">
                                <option selected disabled hidden>Choose...</option>
                                @foreach($wardens as $warden)
                                <option value="{{$warden->id}}">{{$warden->warden_name}}</option>
                                @endforeach
                            </select>--}}
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="reset" name="clear" class="btn btn-secondary">Clear</button>
                        <button type="submit" name="registerbtn" class="btn btn-primary">Add Hostel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End Add new hostel model button form -->


    <!-- Edit hostel model button form -->
    <div class="modal fade" id="editHostelModal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Hostel Details Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="hostels_details_edit" method="POST" id="editForm">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="hostel_id" name="hostel_id">
                            <label>Hostel Name</label>
                            <input type="text" name="hostel_name" id="hostel_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hostel Type</label>
                            <input type="text" name="hostel_type" id="hostel_type" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Students Allocated Count</label>
                            <input type="text" name="no_of_students" id="no_of_students" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hostel Gender</label>
                            <input type="text" name="hostel_gender" id="hostel_gender" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hostel Allocated Year</label>
                            <input type="text" name="hostel_reserve_year" id="hostel_reserve_year" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hostel Location</label>
                            <input type="text" name="hostel_location" id="hostel_location" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hostel Warden ID.</label>
                            <input type="text" name="hostel_warden_id" id="hostel_warden_id" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="editModel" type="submit" name="updatebtn" class="btn btn-warning">Update Details</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End edit hostel model button form -->


    <!-- Delete hostel model button form -->
    <div class="modal fade" id="deleteHostelModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Hostel Details Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteHostelDetails" >
                    {{csrf_field()}}
                    {{method_field('delete')}}

                    <div class="modal-body">

                        <input type="hidden" id="hostel_id" name="hostel_id">
                        <p>Are You Sure !! Delete this <input class="btn btn-danger btn-sm" type="text" id="htl_name" name="htl_name" disabled> Hostel Details..?</p>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End edit hostel model button form -->

<!---------------------------------------------- put scripts below here related this page content ---------------------------------------------------->

    <!-- Ajax scripts link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!--- Add Modal ajax Script code --->
    <script>
        $(document).ready( function () {

            $('#addForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/admin/hostels_details_save",
                    data: $('#addForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#addhostel').modal('hide');
                        alert("Data Added");
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Data Not Added");
                    }
                });
            });
        });
    </script>
    <!--- End Add Modal ajax Script code --->


    <!--- Edit/Update Modal ajax Script code --->
    <script>
        $(document).ready( function () {
            $('.editHostel').on('click', function () {
                $('#editHostelModal').modal('show');
                $tr = $(this).closest('tr');
                var data =$tr.children("td").map( function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#hostel_id').val(data[0]);
                $('#hostel_name').val(data[1]);
                $('#hostel_type').val(data[2]);
                $('#no_of_students').val(data[3]);
                $('#hostel_gender').val(data[4]);
                $('#hostel_reserve_year').val(data[5]);
                $('#hostel_location').val(data[6]);
                $('#hostel_warden_id').val(data[7]);
            });

            $('#editForm').on('submit', function (e) {
                e.preventDefault();
                var id =$('#hostel_id').val();
                $.ajax({
                    type: "PUT",
                    url: "/admin/hostels_details_update/"+id,
                    data: $('#editForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#editHostelModal').modal('hide');
                        alert("Data Updated");
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <!--- End Edit/Update Modal ajax Script code --->


    <!--- Delete Modal ajax Script code --->
    <script>

        $('.deleteHostel').on('click', function () {
            $('#deleteHostelModal').modal('show');
            $tr = $(this).closest('tr');
            var data =$tr.children("td").map( function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#hostel_id').val(data[0]);
            $('#htl_name').val(data[1]);
        });

        $('#deleteHostelDetails').on('submit', function (e) {
            e.preventDefault();
            var id =$('#hostel_id').val();
            $.ajax({
                type: "DELETE",
                url: "/admin/delete_hostel_details/"+id,
                data: $('#deleteHostelDetails').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#deleteHostelModal').modal('hide');
                    alert("Data Deleted");
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    </script>
    <!--- End Delete Modal ajax Script code --->


    <!-- Page level plugins -->
    <script src="{{asset('admin_template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin_template/js/demo/datatables-demo.js')}}"></script>

@endsection
