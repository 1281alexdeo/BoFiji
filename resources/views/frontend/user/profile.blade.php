@extends('layout.frontend.master')

@section('title')
    {{ $user->first_name }}'s Profile
@endsection

@section('styles')
    <!--styles for this page-->
@endsection

@section('content')

    <div class="container">
        @include('errors.sessionGeneralErrors')
            <div class="page-header"><h3>Welcome {{ $user->first_name }}</h3></div>
            <br>
        <div class="row container">
            <div class="col-md-3"><!--left side col-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-user fa-2x pull-right" aria-hidden="true"></i> Personal Details</div>
                            <div class="panel panel-body">
                                Phone: {{ $user->phone }}<br>
                                Email: {{ $user->email }}<br>
                                TIN Number: {{ $user->tin_number }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-cc-visa fa-2x pull-right" aria-hidden="true"></i> Account Details</div>
                            <div class="panel-body">
                                Balance: $<strong>{{ $user->account->balance }}.00</strong><br>
                                Account type: <strong>{{ $user->account->account_type }}</strong><br>
                                Account number: <strong>{{ $user->account->account_number }}</strong><br>
                                FNPF Ref: <strong>{{ $user->account->fnpf_number }}</strong><br>
                                FIRC ID: <strong>{{ $user->account->firc_id }}</strong> <br>
                                Bank branch: <strong>{{ $user->account->branch }}</strong><br>
                                Registered on: <strong>{{ $user->account->created_at->formatLocalized('%A %d %B %Y') }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"><!--right side col-->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-history fa-2x pull-right" aria-hidden="true"></i> Payment History</div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sent</th>
                                        <th>To</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <p class="hidden">{{ $num = 0 }}</p>
                                    @if($payhistory)

                                        @foreach($payhistory as $receiver)
                                            <tr>
                                                <td>{{$receiver->created_at->diffForHumans()}}</td>
                                                <td><a href="">{{$receiver->name}}</a></td>
                                                <td>FJ ${{ $receiver->amount}}.00</td>
                                                <td>{{ $receiver->description }}</td>
                                            </tr>
                                            @endforeach
                                    @else
                                    <tr class="well">No Payments to show</tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-4"><!--pagination-->
                                    {{ $payhistory->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-calendar fa-2x pull-right" aria-hidden="true"></i> Scheduled Payment</div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>To</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>To</td>
                                    <td>Be</td>
                                    <td><a href="">Implemented</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bars fa-2x pull-right" aria-hidden="true"></i> Payment Summary</div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                @if($totalPay)
                                    You have made <a href=""><strong>{{ $totalPay }} Payments</strong></a> since {{ $user->account->created_at->formatLocalized('%A %d %B %Y') }}
                                    @else
                                    You haven't made any payments yet.
                                @endif
                                </thead>
                                <tbody>
                                <tr>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <!--scripts for the page goes in here-->

@endsection