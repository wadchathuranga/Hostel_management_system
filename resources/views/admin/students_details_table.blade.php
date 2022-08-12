@extends('layouts.admin_layout')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Student Details Summary</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.</p>


        <!-- Analysis Row 1 -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <h5>Total Students: {{$data['all']}}</h5>

                                </div>
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Boys</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h5>Total Boys: {{$data['boy']}}</h5>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Girls</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <h5>Total Girls: {{$data['girl']}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-female fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Students of Management Studies</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <h5>Management: {{$data['mgt']}}</h5>
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
        <!-- End Analysis Row 1 -->


        <!-- Analysis Row 2 -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Students of Social Sciences & Languages</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <h5>Social Sciences: {{$data['sola']}}</h5>

                                </div>
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
                <div class="card border-left-info border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Students of Applied Sciences</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h5>Applied Sciences: {{$data['app']}}</h5>
                                </div>
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Students of Agricultural Sciences</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <h5>Agriculture: {{$data['agri']}}</h5>
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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students of Geomatics</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <h5>Geomatics: {{$data['geo']}}</h5>
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
        <!-- End Analysis Row 2 -->


        <!-- Analysis Row 3 -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students of Technology</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <h5>Technology: {{$data['tec']}}</h5>

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
        <!-- End Analysis Row 3 -->


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="custom-control-inline mt-2">
                    <h5 class="m-0 font-weight-bold text-primary">Student Details</h5>
                </div>

                @if(\Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('message') }}
                    </div>
                @endif

                <a href="{{route('NewStudent')}}"><button href="NewStudent" style="float: right" type="button" class="btn btn-primary">Add New Student</button></a>
            </div>

            <div class="card-body">

                    <form action="{{route('students_search')}}" method="post">
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
                            <th>UIC_No</th>
                            <th>First_Name</th>
                            <th>Last_Name</th>
                            <th>Gender</th>
                            <th>Date_of_Birth</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>NIC.No</th>
                            <th>Mobile_No</th>
                            <th>Distance</th>
                            <th>Date_of_Admission</th>
                            <th>Faculty</th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students_details as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->std_uic_no}}</td>
                                <td>{{$student->std_first_name}}</td>
                                <td>{{$student->std_last_name}}</td>
                                <td>{{$student->std_gender}}</td>
                                <td>{{$student->std_birthday}}</td>
                                <td>{{$student->std_address}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->std_nic_no}}</td>
                                <td>{{$student->std_mobile_no}}</td>
                                <td>{{$student->distance}}</td>
                                <td>{{$student->std_admission_date}}</td>
                                <td>{{$student->std_faculty_id}}</td>
                                <td>
                                    <div class="btn-group">
                                        <!-- ---------------------------------------------------- Edit button code start here ---------------------------------- -->
                                        <a class="btn btn-primary showStudent" data-std_first_name="{{$student->std_first_name}}" data-std_Last_name="{{$student->std_last_name}}"
                                           data-std_gender="{{$student->std_gender}}" data-std_nic_no="{{$student->std_nic_no}}" data-std_uic_no="{{$student->std_uic_no}}"
                                           data-std_mobile_no="{{$student->std_mobile_no}}" data-std_birthday="{{$student->std_birthday}}" data-std_admission_date="{{$student->std_admission_date}}"
                                           data-std_faculty_id="{{$student->std_faculty_id}}" data-distance="{{$student->distance}}" data-std_address="{{$student->std_address}}"
                                           data-email="{{$student->email}}">View</a>
                                        <!-- ---------------------------------------------------- Edit button code end here ---------------------------------- -->
                                        <a href="students_details_view_update/{{$student->id}}" type="button" class="btn btn-warning">Edit</a>
                                        <a class="btn btn-danger deleteStudent">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{$students_details->links()}}

                </div>

            </div>
            <!-- /.end card body -->
        </div>


    </div>
    <!-- /.container-fluid -->



    <!-- view hostel model button form -->
    <div class="modal fade bd-example-modal-xl" id="showStudentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h3 class="modal-title">View Student Details</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="h5 modal-body ">
                    <!-- row 1 -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>First Name:</label>&nbsp<span id="std_first_name"  class="badge badge-primary"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Last Name:</label>&nbsp<span id="std_last_name" class="badge badge-primary"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Gender:</label>&nbsp<span id="std_gender" class="badge badge-primary"></span>
                            </div>
                        </div>
                    </div>
                    <!-- row 2 -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>NIC No:</label>&nbsp<span id="std_nic_no" class="badge badge-primary"></span>V
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>UIC No:</label>&nbsp<span id="std_uic_no" class="badge badge-primary"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Mobile:</label>&nbsp<span id="std_mobile_no" class="badge badge-primary"></span>
                            </div>
                        </div>
                    </div>
                    <!-- row 3 -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Date of Birth:</label>&nbsp<span id="std_birthday"  class="badge badge-primary"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Admission Date:</label>&nbsp<span id="std_admission_date" class="badge badge-primary"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Faculty:</label>&nbsp<span id="std_faculty_id" class="badge badge-primary"></span>
                            </div>
                        </div>
                    </div>
                    <!-- row 4 -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Distance:</label>&nbsp<span id="distance"  class="badge badge-primary"></span>km
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Email:</label>&nbsp<span id="email" class="badge badge-primary"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Address:</label>&nbsp<span id="std_address" class="badge badge-primary"></span>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End view hostel model button form -->


    <!-- Delete hostel model button form -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Hostel Details Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="deleteStudentDetails" >
                        {{csrf_field()}}
                        {{method_field('delete')}}

                        <div class="modal-body">

                            <input type="hidden" id="student_id" name="student_id">
                            <p>Are You Sure !! Delete this <input class="btn btn-danger btn-icon-split btn-sm" type="text" id="std_reg_no" name="std_reg_no" disabled> Student Details..?</p>

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


    <script>
        // here we will do our view details part okay.
        $(document).on('click', '.showStudent', function(){
            $('.modal-title').text('Student Details ');
            $('.form-horizontal').show();
            $('#std_first_name').text($(this).data('std_first_name'));
            $('#std_last_name').text($(this).data('std_last_name'));
            $('#std_gender').text($(this).data('std_gender'));
            $('#std_nic_no').text($(this).data('std_nic_no'));
            $('#std_uic_no').text($(this).data('std_uic_no'));
            $('#std_mobile_no').text($(this).data('std_mobile_no'));
            $('#std_birthday').text($(this).data('std_birthday'));
            $('#std_admission_date').text($(this).data('std_admission_date'));
            $('#std_faculty_id').text($(this).data('std_faculty_id'));
            $('#distance').text($(this).data('distance'));
            $('#std_address').text($(this).data('std_address'));
            $('#email').text($(this).data('email'));
            $('#showStudentModal').modal('show');
        });
    </script>


    <!--- Delete Modal ajax Script code --->
    <script>
        $('.deleteStudent').on('click', function () {
            $('#deleteStudentModal').modal('show');
            $tr = $(this).closest('tr');
            var data =$tr.children("td").map( function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#student_id').val(data[0]);
            $('#std_reg_no').val(data[1]);
        });

        $('#deleteStudentDetails').on('submit', function (e) {
            e.preventDefault();
            var id =$('#student_id').val();
            $.ajax({
                type: "DELETE",
                url: "/admin/delete_student_details/"+id,
                data: $('#deleteStudentDetails').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#deleteStudentModal').modal('hide');
                    alert("Data Deleted");
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    </script>
    <!--- /.End Delete Modal ajax Script code --->


        <!-- Page level plugins -->
        <script src="{{asset('admin_template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin_template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('admin_template/js/demo/datatables-demo.js')}}"></script>
@endsection
