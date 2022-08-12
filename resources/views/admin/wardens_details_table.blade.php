@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Warden Details</h1>


        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Wardens</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Wardens: {{$data['all']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Male Wardens</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Male Wardens: {{$data['wMail']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Female Wardens</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Female Wardens: {{$data['wFemale']}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.End Content Row -->

        <!-- Page Body -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="custom-control-inline mt-2">
                    <h5 class="m-0 font-weight-bold text-primary">Warden Details</h5>
                </div>

                @if(\Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('message') }}
                    </div>
                @endif

                <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addwarden">Add New Warden</button>
            </div>

            <div class="card-body">

                <form action="{{route('warden_search')}}" method="post">
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
                            <th>Warden Name</th>
                            <th>Warden Gender</th>
                            <th>Warden Mobile No.</th>
                            <th>Warden Hostel ID.</th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wardens_details as $warden)
                            <tr>
                                <td>{{$warden->id}}</td>
                                <td>{{$warden->warden_name}}</td>
                                <td>{{$warden->warden_gender}}</td>
                                <td>{{$warden->warden_mobile_no}}</td>
                                <td>{{$warden->warden_hostel_id}}</td>
                                <td><center>
                                        <a class="btn btn-info viewWarden" data-warden_name="{{$warden->warden_name}}" data-warden_gender="{{$warden->warden_gender}}"
                                           data-warden_mobile_no="{{$warden->warden_mobile_no}}" data-warden_hostel_id="{{$warden->warden_hostel_id}}">View</a>
                                        <a class="btn btn-warning editWarden">Edit</a>
                                        <a class="btn btn-danger deleteWarden">Delete</a>
                                    </center></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{$wardens_details->links()}}

                </div>

            </div>
            <!-- /.end card body -->
        </div>


    </div>
    <!-- /.container-fluid -->


    <!-- view hostel model button form -->
    <div class="modal fade" id="viewWardenModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header table-info">
                    <h3 class="modal-title">View Hostel Details</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="h5 modal-body ">

                        <div class="form-group">
                            <label>Warden Name:</label>&nbsp<span id="warden_name"  class="badge badge-primary"></span>
                        </div>
                        <div class="form-group">
                            <label>Warden Gender:</label>&nbsp<span id="warden_gender" class="badge badge-primary"></span>
                        </div>
                        <div class="form-group">
                            <label>Mobile No:</label>&nbsp<span id="warden_mobile_no" class="badge badge-primary"></span>
                        </div>

                        <div class="form-group">
                            <label>Maintaining Hostel:</label>&nbsp<span id="warden_hostel_id" class="badge badge-primary"></span>
                        </div>

                    </div>
                    <div class="modal-footer table-info">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- End view hostel model button form -->


    <!-- Add new hostel model button form -->
    <div class="modal fade" id="addwarden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Hostel Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" id="addForm">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Warden Name</label>
                            <input type="text" name="warden_name" class="form-control" placeholder="Enter here...">
                        </div>
                        <div class="form-group">
                            <label>Warden Gender</label>
                            <select name="warden_gender" class="form-control">
                                <option selected hidden>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" name="warden_mobile_no" class="form-control" placeholder="Enter here...">
                        </div>
                        <div class="form-group">
                            <label>Maintaining Hostel</label>
                            <input type="text" name="warden_hostel_id" class="form-control" placeholder="Enter here...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="reset" name="clear" class="btn btn-secondary">Clear</button>
                        <button type="submit" name="registerbtn" class="btn btn-primary">Add Warden</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End Add new hostel model button form -->


    <!-- Edit hostel model button form -->
    <div class="modal fade" id="editWardenModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Hostel Details Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" id="editForm">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" id="wdn_id" name="wdn_id">
                            <label>Warden Name</label>
                            <input type="text" name="wdn_name" id="wdn_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Warden Gender</label>
                            <input type="text" name="wdn_gender" id="wdn_gender" class="form-control">
                            {{--<select name="warden_gender" class="form-control">
                                <option selected hidden>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>--}}
                        </div>
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" name="wdn_mobile_no" id="wdn_mobile_no" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Maintaining Hostel</label>
                            <input type="text" name="wdn_hostel_id" id="wdn_hostel_id" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="editModel" type="submit" name="updatebtn" class="btn btn-warning">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End edit hostel model button form -->


    <!-- Delete hostel model button form -->
    <div class="modal fade" id="deleteWardenModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Warden Details Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteWardenDetails">
                    {{csrf_field()}}
                    {{method_field('delete')}}

                    <div class="modal-body">

                        <input type="hidden" id="warden_id" name="warden_id">
                        <p>Are You Sure !! Delete this <input class="btn btn-danger btn-sm" type="text" id="wdon_name" name="wdon_name" disabled> Warden Details..?</p>

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


<!------------------------------------------- put scripts below here related this page content ------------------------------------------->


    <!-- Ajax scripts link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!--- View Modal ajax Script code --->
    <script>
        // here we will do our view details part okay.
        $(document).on('click', '.viewWarden', function(){
            $('.modal-title').text('Warden Details ');
            $('.form-horizontal').show();
            $('#warden_name').text($(this).data('warden_name'));
            $('#warden_gender').text($(this).data('warden_gender'));
            $('#warden_mobile_no').text($(this).data('warden_mobile_no'));
            $('#warden_hostel_id').text($(this).data('warden_hostel_id'));
            $('#viewWardenModal').modal('show');
        });
    </script>
    <!--- End View Modal ajax Script code --->


    <!--- Add Modal ajax Script code --->
    <script>
        $(document).ready( function () {

            $('#addForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/admin/wardens_details_save",
                    data: $('#addForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#addwarden').modal('hide');
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
            $('.editWarden').on('click', function () {
                $('#editWardenModal').modal('show');
                $tr = $(this).closest('tr');
                var data =$tr.children("td").map( function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#wdn_id').val(data[0]);
                $('#wdn_name').val(data[1]);
                $('#wdn_gender').val(data[2]);
                $('#wdn_mobile_no').val(data[3]);
                $('#wdn_hostel_id').val(data[4]);
            });

            $('#editForm').on('submit', function (e) {
                e.preventDefault();
                var id =$('#wdn_id').val();
                $.ajax({
                    type: "PUT",
                    url: "/admin/wardens_details_update/"+id,
                    data: $('#editForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#editWardenModal').modal('hide');
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

        $('.deleteWarden').on('click', function () {
            $('#deleteWardenModal').modal('show');
            $tr = $(this).closest('tr');
            var data =$tr.children("td").map( function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#warden_id').val(data[0]);
            $('#wdon_name').val(data[1]);
        });

        $('#deleteWardenDetails').on('submit', function (e) {
            e.preventDefault();
            var id =$('#warden_id').val();
            $.ajax({
                type: "DELETE",
                url: "/admin/delete_warden_details/"+id,
                data: $('#deleteWardenDetails').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#deleteWardenModal').modal('hide');
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
