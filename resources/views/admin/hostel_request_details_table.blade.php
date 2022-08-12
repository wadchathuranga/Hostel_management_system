@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Hostel Request Details</h1>

        <!-- Content Row -->
        <div class="row">

            <!-- Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Request</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Requests: {{$req_count}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Card Example -->

            <!-- Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pending Request</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Pending: {{$pending_count}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Card Example -->

            <!-- Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success border-bottom-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Accepted Request</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Accepted: {{$accepted_count}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
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
                    <h5 class="m-0 font-weight-bold text-primary">Hostel Request Details</h5>
                </div>

                <!-- new fac add successful message -->
                @if(\Session::has('admin_reqSuccess'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('admin_reqSuccess') }}
                    </div>
                @endif

            <!-- new fac add successful message -->
                @if(\Session::has('admin_req'))
                    <div class="alert alert-danger" role="alert">
                        {{ \Session::get('admin_req') }}
                    </div>
                @endif

            </div>

            <div class="card-body">

                <form action="{{route('request_search')}}" method="post">
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
                            <th>UIC_No.</th>
                            <th>NIC_No.</th>
                            <th>Academic_Year</th>
                            <th>Email</th>
                            <th>Method</th>
                            <th>Bank_Name</th>
                            <th>Transaction_No.</th>
                            <th>Transaction_amount</th>
                            <th>Transaction_Date</th>
                            <th><center>Request_Process</center></th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($req_all as $req)
                            <tr>
                                <td>{{$req->id}}</td>
                                <td>{{$req->std_uic_no}}</td>
                                <td>{{$req->std_nic_no}}</td>
                                <td>{{$req->academic_year}}</td>
                                <td>{{$req->email}}</td>
                                <td>{{$req->method}}</td>
                                <td>{{$req->bank_name}}</td>
                                <td>{{$req->transaction_number}}</td>
                                <td>{{$req->transaction_amount}}</td>
                                <td>{{$req->transaction_date}}</td>
                                <td><center>
                                    @if(!$req->process)
                                        <a href="/admin/req_accepting/{{$req->id}}" class="btn btn-warning">Pending</a>
                                    @else
                                        <a class="btn btn-success">Accepted</a>
                                    @endif
                                    </center></td>
                                <td><center>
                                        {{--<a class="btn btn-warning editRequest">Edit</a>--}}
                                        <a class="btn btn-danger deleteRequest">Delete</a>
                                    </center></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{$req_all->links()}}

                </div>

            </div>
            <!-- /.end card body -->
        </div>
        <!-- /.End Page Body -->
    </div>
    <!-- /.container-fluid -->


    <!-- Delete hostel model button form -->
    <div class="modal fade" id="deleteRequestModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Hostel Request Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteRequestDetails">
                    {{csrf_field()}}
                    {{method_field('delete')}}

                    <div class="modal-body">

                        <input type="hidden" id="request_id" name="request_id">
                        <p>Are You Sure !! Delete this <input class="btn btn-danger btn-sm" type="text" id="uic_id" name="uic_id" disabled> Request Details..?</p>

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

<!------------------------------------------------ put scripts below here related this page content ---------------------------------------->

    <!-- Ajax scripts link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!--- Delete Modal ajax Script code --->
    <script>

        $('.deleteRequest').on('click', function () {
            $('#deleteRequestModal').modal('show');
            $tr = $(this).closest('tr');
            var data =$tr.children("td").map( function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#request_id').val(data[0]);
            $('#uic_id').val(data[1]);
        });

        $('#deleteRequestDetails').on('submit', function (e) {
            e.preventDefault();
            var id =$('#request_id').val();
            $.ajax({
                type: "DELETE",
                url: "/admin/delete_hostel_request/"+id,
                data: $('#deleteRequestDetails').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#deleteRequestModal').modal('hide');
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

@endsection
