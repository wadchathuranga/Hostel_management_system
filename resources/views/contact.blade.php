@extends('layouts.students_layout')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div style="text-align:center">
                    <h3><b>Contact Us</b></h3>
                    <p>if you have any question, Please leave us a message, <br> we will response as soon as immediate!</p>
                    <h5>Email</h5>
                    <p class="text-primary">hmsofsusl@gmail.com</p>
                    <h5>Phone</h5>
                    <p class="text-primary">0351264789</p>
                </div>
            </div>
            <div class="col-md-6">
                @if(\Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ \Session::get('message') }}
                    </div>
                @endif
                    <form action="{{route('request.submit')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="uic_no">UIC No.</label>
                            <input type="text" class="form-control" id="uic_no" name="uic_no" value="{{ old('uic_no') }}" placeholder="University ID Card No.">
                            @if($errors->has('uic_no'))
                                <span class="help-block text-danger">
                                        <span>{{ $errors->first('uic_no') }}</span>
                                    </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                                @if($errors->has('first_name'))
                                    <span class="help-block text-danger">
                                        <span>{{ $errors->first('first_name') }}</span>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                                @if($errors->has('last_name'))
                                    <span class="help-block text-danger">
                                        <span>{{ $errors->first('last_name') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Address">Message:</label>
                            <textarea type="text" class="form-control" id="message" name="message" value="{{ old('message') }}" placeholder="Message here..."></textarea>
                            @if($errors->has('message'))
                                <span class="help-block text-danger">
                                        <span>{{ $errors->first('message') }}</span>
                                    </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Send Msg</button>
                    </form>
            </div>
{{--            <div class="col-m-4"></div>--}}
        </div>


    </div>
<!------------------------------------------- put scripts below here related this page content ------------------------------------------->




    <br>
@endsection
