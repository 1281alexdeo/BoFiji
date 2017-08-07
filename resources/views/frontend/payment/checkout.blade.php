@extends('layout.frontend.master')

@section('title')
    Checkout Payment
    @endsection

@section('styles')

    @endsection


@section('content')

<div class="container-fluid">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 well" style="margin-top:80px;">
        <h2 class="page-header text-center">Checkout</h2>
        @include('errors.sessionGeneralErrors')
        <h4>Send total: ${{ $total ? $total : '00.00' }}</h4>
        <form action="{{ route('checkout') }}" method="post" id="checkout-form">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-name">Card Holder Name</label>
                        <input type="text" id="card-name" name="card-name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card-expiry-month">Expiration Month</label>
                                <input type="text" id="card-expiry-month" name="card-expiry-month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card-expiry-year">Expiration Year</label>
                                <input type="text" id="card-expiry-year" name="card-expiry-year" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-cvc">CVC</label>
                        <input type="text" id="card-cvc" name="card-cvc" class="form-control" required>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success"><i class="fa fa-cc-visa" aria-hidden="true"></i> Confirm payment</button>

        </form>
    </div>
</div>
<br>
@endsection

@section('scripts')
    <?php /*<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('/js/checkout.js') }}"></script>*/?>
    @endsection

