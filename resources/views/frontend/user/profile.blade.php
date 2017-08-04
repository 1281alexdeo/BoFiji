@extends('layout.frontend.master')

@section('title')
    User Profile
@endsection

@section('styles')
    <!--styles for this page-->
@endsection

@section('content')

    <div class="container-fluid">
        @if(Session::has('success'))
            <div class="alert alert-success container" style="margin-top: 20px;">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger container" style="margin-top: 20px;">
                {{ Session::get('fail') }}
            </div>
            @endif
        <div class="page-header"><h3>Welcome user name</h3></div>

        <div class="row">

        </div>
    </div>

@endsection


@section('scripts')
    <!--scripts for the page goes in here-->

@endsection