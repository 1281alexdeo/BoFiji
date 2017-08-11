@extends('layout.frontend.master')

@section('title')
    Money Transfer
@endsection

@section('styles')
    <!--styles for this page-->
@endsection

@section('content')

    <div class="container">
            <h2 class="page-header">Send</h2>
        <div class="contain-fluid">
            @include('errors.sessionGeneralErrors')
            <div class="col-md-4 col-md-offset-4 jumbotron">
                <form action="{{ route('pay.now') }}" method="post" >
                    <div class="form-group">
                        <label for="receiver_name">To</label>
                        <input type="text" name="receiver_name" id="receiver_name" class="form-control" placeholder="Receiver's name">
                    </div>
                    <div class="form-group">
                        <label for="receiver_account_number">Account Number</label>
                        <input type="text" name="receiver_account_number" id="receiver_account_number" class="form-control" placeholder="Receiver's Account Number">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">$</span>
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="e.g 100 (amount > $5 only)" aria-describedby="sizing-addon2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Summary of payment">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Send now</button>
                        <button type="reset" class="btn btn-default">Clear</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>


                </form>
            </div>
        </div>
    </div>




@endsection


@section('scripts')
    <!--scripts for the page goes in here-->

@endsection