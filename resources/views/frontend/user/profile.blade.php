@extends('layout.frontend.master')

@section('title')
    User Profile
@endsection

@section('styles')
    <!--styles for this page-->
@endsection

@section('content')

    <div class="container-fluid">
        @include('errors.sessionGeneralErrors')
            <div class="page-header"><h3>Welcome {{ $user->first_name }}</h3></div>
            <br>
        <div class="row container">
            <div class="col-md-4"><!--left side col-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">Personal Details</div>
                            <div class="panel panel-body">
                                Phone: {{ $user->phone }}<br>
                                Email: {{ $user->email }}<br>
                                TIN Number: {{ $user->tin_number }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">Account Details</div>
                            <div class="panel-body">
                                Account type: <strong>{{ $user->account->account_type }}</strong><br>
                                Account number: <strong>{{ $user->account->account_number }}</strong><br>
                                FNPF Ref: <strong>{{ $user->account->fnpf_number }}</strong><br>
                                FIRC ID: <strong>{{ $user->account->firc_id }}</strong> <br>
                                Bank branch: <strong>{{ $user->account->branch }}</strong><br>
                                Registered on: <strong>{{ $user->account->created_at->diffForHumans() }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8"><!--right side col-->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">Payment History</div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>To</th>
                                        <th>Amount</th>
                                        <th>Payment purpose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($user)
                                    <p class="hidden">{{ $num = 0 }}</p>
                                    @foreach($user->payReceiver as $receiver)
                                        <tr>
                                            <td>{{++$num}}</td>
                                            <td>{{$receiver->created_at->diffForHumans()}}</td>
                                            <td>{{$receiver->name}}</td>
                                            <td>${{ $receiver->amount}}.00</td>
                                            <td>{{ $receiver->description }}</td>
                                        </tr>
                                        @endforeach
                                @else
                                <tr class="well">No Payments to show</tr>
                                @endif
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