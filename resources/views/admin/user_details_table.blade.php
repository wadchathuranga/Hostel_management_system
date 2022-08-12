@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">User Details</h1>


        <!-- Page Body -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="custom-control-inline mt-2">
                    <h5 class="m-0 font-weight-bold text-primary">Users Details</h5>
                </div>

                @if(\Session::has('user'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('user') }}
                    </div>
                @endif

                <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Add New User</button>
            </div>

            <div class="card-body">
                {{--<form action="#" method="post">
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
                            <th>ID</th>
                            <th>User_Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th><center>Job_Title</center></th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_details as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td><center>
                                    @if($user->job_title==1)
                                    <span class="badge badge-danger" >Super Admin</span>
                                    @else
                                    <span class="badge badge-success" >{{$user->job_title}}</span>
                                    @endif

                                    </center></td>
                                <td><center>
                                        {{--<a class="btn btn-info viewUser" data-name="{{$user->name}}" data-email="{{$user->email}}"
                                           data-job_title="{{$user->job_title}}">View</a>--}}
                                        @if($user->job_title==1)
                                            <a class="disabled">Permission Denied</a>
                                        @else
                                            <a class="btn btn-danger deleteUser">Delete</a>
                                        @endif
                                    </center></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{$user_details->links()}}

                </div>

            </div>
            <!-- /.end card body -->
        </div>


    </div>
    <!-- /.container-fluid -->


    <!-- view hostel model button form -->
    {{--<div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h3 class="modal-title">View User Details</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="h6 modal-body ">

                        <div class="row">
                            <dic class="col">
                                <div class="form-group">
                                    <label>Name:</label>&nbsp<span id="name"  class="badge badge-primary"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>&nbsp<span id="email" class="badge badge-primary"></span>
                                </div>
                                <div class="form-group">
                                    <label>Access Level:</label>&nbsp<span id="job_title" class="badge badge-primary"></span>
                                </div>
                            </dic>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>--}}
    <!-- End view hostel model button form -->


    <!-- Add new hostel model button form -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForm">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter here..." required>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter here..." required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="text" id="password" name="password" class="form-control" placeholder="Enter here..." required>
                        </div>
                        <div class="form-group">
                            <label>Re-Password:</label>
                            <input type="text" id="repassword" name="repassword" class="form-control" placeholder="Enter here..." required>
                        </div>
                        <div class="form-group">
                            <label>Access Level</label>
                            <select id="job_title" name="job_title" class="form-control" required>
                                <option selected hidden>Choose...</option>
                                <option value="1">Super Admin</option>
                                <option value="SAR">Senior Assistant Register</option>
                                <option value="REG">Register</option>
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="reset" name="clear" class="btn btn-secondary">Clear</button>
                        <button type="submit" name="registerbtn" class="btn btn-primary">Add User</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End Add new hostel model button form -->


    <!-- Delete hostel model button form -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteUserDetails">
                    {{csrf_field()}}
                    {{method_field('delete')}}

                    <div class="modal-body">

                        <input type="hidden" id="user_id" name="user_id">
                        <p>Are You Sure !! Delete this <input class="btn btn-danger btn-sm" type="text" id="user_name" name="user_name" disabled> User Details..?</p>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End delete hostel model button form -->


<!------------------------------------------- put scripts below here related this page content ------------------------------------------->


    <!-- Ajax scripts link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!--- View Modal ajax Script code --->
    {{--<script>
        // here we will do our view details part okay.
        $(document).on('click', '.viewUser', function(){
            $('.modal-title').text('User Details ');
            $('.form-horizontal').show();
            $('#name').text($(this).data('name'));
            $('#email').text($(this).data('email'));
            $('#job_title').text($(this).data('job_title'));
            $('#viewUserModal').modal('show');
        });
    </script>--}}
    <!--- End View Modal ajax Script code --->


    <!--- Add Modal ajax Script code --->
    <script>
        $(document).ready( function () {

            $('#addForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/admin/user_details_save",
                    data: $('#addForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#addUser').modal('hide');
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


    <!--- Delete Modal ajax Script code --->
    <script>
        $('.deleteUser').on('click', function () {
            $('#deleteUserModal').modal('show');
            $tr = $(this).closest('tr');
            var data =$tr.children("td").map( function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#user_id').val(data[0]);
            $('#user_name').val(data[1]);
        });

        $('#deleteUserDetails').on('submit', function (e) {
            e.preventDefault();
            var id =$('#user_id').val();
            $.ajax({
                type: "DELETE",
                url: "/admin/delete_user_details/"+id,
                data: $('#deleteUserDetails').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#deleteUserModal').modal('hide');
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
