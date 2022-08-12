@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Bank Record Details</h1>

        <!-- Content Row -->
        <div class="row">

            <!-- Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Student Paid</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">All: {{$all_rec}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-university fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Boc Paid Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">BOC: {{$boc}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-university fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Card Example -->

            <!-- Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger border-bottom-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">People's Paid Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">People's: {{$pb}}</div>
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
                    <h5 class="m-0 font-weight-bold text-primary">Bank Record Details</h5>
                </div>

                <!-- new fac add successful message -->
                {{--@if(\Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('message') }}
                    </div>
                @endif--}}

            </div>

            <div class="card-body">

                {{--<form action="record_search" method="post">
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
                            <th>transaction_no</th>
                            <th>amount_of_paid</th>
                            <th>bank_name</th>
                            <th>paid_date</th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bank_record as $bank)
                            <tr>
                                <td>{{$bank->id}}</td>
                                <td>{{$bank->transaction_no}}</td>
                                <td>{{$bank->amount_of_paid}}</td>
                                <td>{{$bank->bank_name}}</td>
                                <td>{{$bank->paid_date}}</td>
                                <td><center>
                                        <a class="btn btn-danger deleteBankRecord">Delete</a>
                                    </center></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{$bank_record->links()}}

                </div>

            </div>
            <!-- /.end card body -->
        </div>
        <!-- /.End Page Body -->


    </div>
    <!-- /.container-fluid -->


    <!-- Delete hostel model button form -->
    <div class="modal fade" id="deleteBankRecordModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Bank Record Details Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteBankRecordDetails">
                    {{csrf_field()}}
                    {{method_field('delete')}}

                    <div class="modal-body">

                        <input type="hidden" id="bankRecord_id" name="bankRecord_id">
                        <p>Are You Sure !! Delete this <input class="btn btn-danger btn-sm" type="text" id="record_id" name="record_id" disabled> Record Details..?</p>

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


    <!--- Delete Modal ajax Script code --->
    <script>

        $('.deleteBankRecord').on('click', function () {
            $('#deleteBankRecordModal').modal('show');
            $tr = $(this).closest('tr');
            var data =$tr.children("td").map( function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#bankRecord_id').val(data[0]);
            $('#record_id').val(data[1]);
        });

        $('#deleteBankRecordDetails').on('submit', function (e) {
            e.preventDefault();
            var id =$('#bankRecord_id').val();
            $.ajax({
                type: "DELETE",
                url: "/admin/delete_bank_record_details/"+id,
                data: $('#deleteBankRecordDetails').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#deleteBankRecordModal').modal('hide');
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
