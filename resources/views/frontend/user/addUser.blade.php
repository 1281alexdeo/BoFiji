@extends('layout.frontend.master')

@section('title')
    User registration
@endsection

@section('styles')
    <!--styles for this page-->
@endsection

@section('content')
    <br>
    @include('errors.sessionGeneralErrors')
    <div class="container-fluid"><h1 class="page-header"><i class="fa fa-user-plus"></i> Register</h1></div>
    <div class="container">
        <form action="{{ route('user.register') }}" method="post" class="addUser" name="" id="" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name *" value="{{ Request::old('firstName') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name *" value="{{ Request::old('lastName') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="gender" id="gender" list="sex" placeholder="Gender *" value="{{ Request::old('gender') }}" />
                                        <datalist id="sex">
                                            <option value="Male"></option>
                                            <option value="Female"></option>
                                            <option value="Other"></option>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" list="status" class="form-control" name="marriedStatus" id="marriedStatus" value="{{ Request::old('marriedStatus') }}" placeholder="Marital Status" />
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
                                        <input type="text" class="form-control" name="tinNumber" id="tinNumber" placeholder="Tin Number (Fj residents only)" value="{{ Request::old('tinNumber') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation" value="{{ Request::old('occupation') }}" />
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
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email *" value="{{ Request::old('email') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="phone" pattern="[0-9]{7}" placeholder="Phone Number" value="{{ Request::old('phone') }}"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="houseNumber" id="houseNumber" value="{{ Request::old('houseNumber') }}" placeholder="House Number"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="street" id="street" value="{{ Request::old('street') }}" placeholder="Street Name"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="town" id="town" value="{{ Request::old('town') }}" placeholder="Town"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="suburb" id="suburb" value="{{ Request::old('suburb') }}" placeholder="Suburb"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bank account form details-->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Account Info</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="accountNumber" id="accountNumber" placeholder="BoF Account Number" value="{{ Request::old('accountNumber') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fnpfNumber" id="fnpfNumber" placeholder="FNPF Number" value="{{ Request::old('fnpfNumber') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fircID" id="fircID" placeholder="FIRC ID" value="{{ Request::old('fircID') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" list="type" class="form-control" name="accountType" id="accountType" placeholder="Account Type" value="{{ Request::old('accountType') }}"  />
                                        <datalist id="type">
                                            <option value="Savings"></option>
                                            <option value="Simple Access"></option>
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="debitCardNumber" id="debitCardNumber" placeholder="Debit Card Number" value="{{ Request::old('debitCardNumber') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" list="branchNames" name="branch" id="branch" placeholder="Branch" value="{{ Request::old('branch') }}" />
                                        <datalist id="branchNames">
                                            <option value="Laucala"></option>
                                            <option value="Suva"></option>
                                            <option value="Ba"></option>
                                            <option value="Lautoka"></option>
                                            <option value="Nausori"></option>
                                            <option value="Nadi"></option>
                                            <option value="Levuka"></option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Employment Info</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="employer" id="employer" placeholder="Employer Name" value="{{ Request::old('employer') }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{ Request::old('location') }}"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="taxFileNumber" id="taxFileNumber" placeholder="Tax File Number" value="{{ Request::old('location') }}"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="employedSince" id="employedSince" placeholder="Employed Since" value="{{ Request::old('employedSince') }}"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="employerAddress" id="employerAddress" placeholder="Employer Address" value="{{ Request::old('employerAddress') }}"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="employeePhone" id="employeePhone" placeholder="Employer Phone" value="{{ Request::old('employerAddress') }}"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--//// Bank account ends-->

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