@extends('layout.frontend.master')

@section('title')
    Signin
@endsection

@section('styles')
    <!--styles for this page-->
@endsection

@section('content')

    <div class="row container">
        @include('errors.sessionGeneralErrors')
        <div class="col-md-5 col-md-offset-5 well" style="margin-top: 100px;">
            <h3>Login credentials</h3>
            <form action="{{ route('user.signin') }}" method="post">
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group"><br>
                    <button type="submit" class="btn btn-primary" >Login</button>
                    <button type="reset" class="btn btn-default" >Clear</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
            </form>
        </div>
    </div>

@endsection


@section('scripts')
    <!--scripts for the page goes in here-->

@endsection