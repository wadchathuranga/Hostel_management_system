@extends('layouts.students_layout')

@section('content')
    <br>
    <div class="container-fluid">

        <!-- Hotel request card -->
        <div class="card text-center text-white bg-secondary">
            <div class="h3 card-header">
                Hostel List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Hostel Name</th>
                            <th>Girls / Boys</th>
                            <th>Hostel Type</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Hostel::all() as $hostel)
                            <tr>
                                <td>{{$hostel->hostel_name}}</td>
                                <td>{{$hostel->hostel_gender}}</td>
                                <td>{{$hostel->hostel_type}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>
<!------------------------------------------- put scripts below here related this page content ------------------------------------------->




    <br>
@endsection
