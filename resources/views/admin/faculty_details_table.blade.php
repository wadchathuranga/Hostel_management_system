@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Faculty Details</h1>

        <!-- Content Row -->
        <div class="row">

            <!-- Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Faculty</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Faculties: {{$fac_count}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-university fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Card Example -->

        </div>
        <!-- /.End Content Row -->

        <!-- Page Body -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="custom-control-inline mt-2">
                    <h5 class="m-0 font-weight-bold text-primary">Faculty Details</h5>
                </div>

                <!-- new fac add successful message -->
                {{--@if(\Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('message') }}
                    </div>
                @endif--}}

                <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addfaculty">Add New Faculty</button>
            </div>

            <div class="card-body">

                {{--<form action="faculty_search" method="post">
                    {{csrf_field()}}

                    <div class="input-group">
                        <input style="padding: 5px;" type="text" name="search" id="search" placeholder=" Search Here...">
                        <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                    </div>
                </form>

                <hr>--}}

                <div class="table-responsive">
                    <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Faculty Code</th>
                            <th>Faculty Name</th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fac_all as $fac)
                            <tr>
                                <td></td>
                                <td>{{$fac->id}}</td>
                                <td>{{$fac->faculty_code}}</td>
                                <td>{{$fac->faculty_name}}</td>
                                <td><center>
                                        <a class="btn btn-warning editFaculty">Edit</a>
                                        <a class="btn btn-danger deleteFaculty">Delete</a>
                                    </center></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{$fac_all->links()}}

                </div>

            </div>
            <!-- /.end card body -->
        </div>
        <!-- /.End Page Body -->


    </div>
    <!-- /.container-fluid -->


    <!-- Add new hostel model button form -->
    <div class="modal fade" id="addfaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Faculty Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="faculty_details_save" method="POST" id="addForm">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Faculty Code</label>
                            <input type="text" name="faculty_code" class="form-control" placeholder="Enter here...">
                        </div>
                        <div class="form-group">
                            <label>Faculty Name</label>
                            <input type="text" name="faculty_name" class="form-control" placeholder="Enter here...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="reset" name="clear" class="btn btn-secondary">Clear</button>
                        <button type="submit" name="registerbtn" class="btn btn-primary">Add Faculty</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End Add new hostel model button form -->


    <!-- Edit hostel model button form -->
    <div class="modal fade" id="editFacultyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Faculty Details Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Faculty Code</label>
                            <input type="text" name="faculty_code" id="faculty_code" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="faculty_id" name="faculty_id">
                            <label>Warden Name</label>
                            <input type="text" name="faculty_name" id="faculty_name" class="form-control">
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
    <div class="modal fade" id="deleteFacultyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Faculty Details Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteFacultyDetails">
                    {{csrf_field()}}
                    {{method_field('delete')}}

                    <div class="modal-body">

                        <input type="hidden" id="faculty_id" name="faculty_id">
                        <p>Are You Sure !! Delete <br> Faculty of <input class="btn btn-danger btn-sm" type="text" id="fac_name" name="fac_name" disabled> Details..?</p>

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


    <!--- Add Modal ajax Script code --->
    <script>
        $(document).ready( function () {
            $('#addForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/admin/faculty_details_save",
                    data: $('#addForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#addfaculty').modal('hide');
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
            $('.editFaculty').on('click', function () {
                $('#editFacultyModal').modal('show');
                $tr = $(this).closest('tr');
                var data =$tr.children("td").map( function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#faculty_id').val(data[1]);
                $('#faculty_code').val(data[2]);
                $('#faculty_name').val(data[3]);
            });

            $('#editForm').on('submit', function (e) {
                e.preventDefault();
                var id =$('#faculty_id').val();
                $.ajax({
                    type: "PUT",
                    url: "/admin/faculty_details_update/"+id,
                    data: $('#editForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#editFacultyModal').modal('hide');
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

        $('.deleteFaculty').on('click', function () {
            $('#deleteFacultyModal').modal('show');
            $tr = $(this).closest('tr');
            var data =$tr.children("td").map( function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#faculty_id').val(data[1]);
            $('#fac_name').val(data[2]);
        });

        $('#deleteFacultyDetails').on('submit', function (e) {
            e.preventDefault();
            var id =$('#faculty_id').val();
            $.ajax({
                type: "DELETE",
                url: "/admin/delete_faculty_details/"+id,
                data: $('#deleteFacultyDetails').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#deleteFacultyModal').modal('hide');
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
