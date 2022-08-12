@extends('layouts.students_layout')

@section('content')
    <br>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if(\Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{ \Session::get('message') }}
            </div>
        @endif

        <!--- hostel request form --->
        <div class="card text-white bg-dark mb-4" >
            <div class="card-header"><h3>Hostel Request Form</h3></div>

            <div class="card-body">
                <h5 class="card-title">{{--Dark card title--}}</h5>
                <div class="wrapper">

                    @if(count($errors)>0)
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif

                    <form method="post" action="{{route('hostel_request.submit')}}">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <div class="form-group col">
                                <label for="std_uic_no" class="col-form-label text-md-right">{{ __('UIC No.') }}</label>
                                <input id="std_uic_no" type="text" class="form-control" name="std_uic_no" value="{{ old('std_uic_no') }}"  autofocus>
                            </div>
                            <div class="form-group col">
                                <label for="std_nic_no" class="col-form-label text-md-right">{{ __('NIC No.') }}</label>
                                <div class="input-group">
                                    <input id="std_nic_no" type="text" class="form-control" name="std_nic_no" value="{{ old('std_nic_no') }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><b>V</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="academic_year" class="col-form-label text-md-right">{{ __('Academic Year') }}</label>
                                <select name="academic_year" class="form-control">
                                    <option selected disabled hidden>Choose...</option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3nd Year</option>
                                    <option value="4">4nd Year</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control" value="{{ old('email') }}" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-2">
                                <label for="method" class="col-form-label text-md-right">{{ __('Paid Method') }}</label>
                                <select name="method" class="form-control">
                                    <option selected disabled hidden>Choose...</option>
                                    <option value="online">Online</option>
                                    <option value="manual">Manual</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="bank_name" class="col-form-label text-md-right">{{ __('Paid Bank') }}</label>
                                <select name="bank_name" class="form-control">
                                    <option selected disabled hidden>Choose...</option>
                                    <option value="BOC">Bank of Ceylon (BOC)</option>
                                    <option value="PB">People's Bank</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="transaction_number" class="col-form-label text-md-right">{{ __('Transaction No.') }}</label>
                                <input id="transaction_number" type="text" class="form-control" value="{{ old('transaction_number') }}" name="transaction_number">
                            </div>
                            <div class="form-group col-2">
                                <label for="transaction_number" class="col-form-label text-md-right">{{ __('Paid Amount') }}</label>
                                <input id="transaction_amount" type="text" class="form-control" value="{{ old('transaction_amount') }}" name="transaction_amount">
                            </div>
                            <div class="form-group col">
                                <label for="transaction_date" class="col-form-label text-md-right">{{ __('Transaction Date') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input id="transaction_date" type="datetime-local" class="form-control" value="{{ old('transaction_date') }}" name="transaction_date">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Clear</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--- /.End hostel request form --->

    </div>
    <!-- /.End Page Content -->

<!------------------------------------------- put scripts below here related this page content ------------------------------------------->



@endsection
