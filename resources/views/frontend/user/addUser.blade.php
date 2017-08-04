@extends('layout.frontend.master')

@section('title')
    User registration
@endsection

@section('styles')
    <!--styles for this page-->
@endsection

@section('content')
    <br>
    <div class="container-fluid"><h1 class="page-header"><i class="fa fa-user"></i> Register</h1></div>
    @if(count($errors) > 0)
        <div class="alert alert-danger container">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="container-fluid">
        <form action="{{ route('user.register') }}" method="post" class="addUser" name="" id="" >
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Personal Info</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name *" value="{{ Request::old('firstName') }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name *" value="{{ Request::old('lastName') }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="gender" id="gender" list="sex" placeholder="Gender *" value="{{ Request::old('lastName') }}" required/>
                                        <datalist id="sex">
                                            <option value="Male"></option>
                                            <option value="Female"></option>
                                            <option value="Other"></option>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" list="status" class="form-control" name="marriedStatus" id="marriedStatus" placeholder="Marital Status ">
                                        <datalist id="status">
                                            <option value="Married"></option>
                                            <option value="Living Apart"></option>
                                            <option value="Widowed"></option>
                                            <option value="Defacto"></option>
                                            <option value="Single"></option>
                                            <option value="Divorced"></option>
                                            <option value="Never Married"></option>
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tinNumber" id="tinNumber" placeholder="Tin Number (Fj residents only)" value="{{ Request::old('tinNumber') }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation" value="{{ Request::old('occupation') }}" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Contact Info</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email *" value="{{ Request::old('email') }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="phone" pattern="[0-9]{7}" placeholder="Phone Number" value="{{ Request::old('phone') }}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="houseNumber" id="houseNumber" placeholder="House Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="street" id="street" placeholder="Street Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="town" id="town" placeholder="Town">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="suburb" id="suburb" placeholder="Suburb">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Register">
                        <input type="reset" class="btn btn-default" value="Clear">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </form>
    </div>

@endsection


@section('scripts')
    <!--scripts for the page goes in here-->

@endsection