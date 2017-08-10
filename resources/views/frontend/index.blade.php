@extends('layout.frontend.master')

@section('title')
    Bank of Fiji
    @endsection

@section('styles')
    <!--styles for this page-->
    @endsection

@section('content')
    <!-- Carousel================================================== -->
    <section>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="first-slide" src="/img/bkg1.gif" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-7 col-sm-4">
                                    <!--text goes in here-->
                                    <h1>Loan Deals</h1>
                                    <ul class="feature-list">
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Crazy loan interest rate</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;No monthly account service fee</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Birth certificate or passport</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Complete our 100 point identity check</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Unlimited paper and electronic deposits</li>
                                    </ul>
                                    <a href="" class="btn btn-primary btn-lg">Read more</a>
                                </div>
                                <div class="col-md-5 col-sm-3">
                                    <!--image goes in here-->
                                    <img class="ad-image" src="/img/ad1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="second-slide" src="/img/bkg2.gif" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-7 col-sm-4">
                                    <!--text goes in here-->
                                    <h1>99.99% assurance of insurance </h1>
                                    <ul class="feature-list">
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Secure your future now</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Life Insurance</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Retirement Insurance</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Debit Card Insurance Condition apply</li>
                                    </ul>
                                    <a href="" class="btn btn-primary btn-lg">Read more</a>
                                </div>
                                <div class="col-md-5 col-sm-3">
                                    <!--image goes in here-->
                                    <img class="ad-image" src="/img/ad2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="third-slide" src="/img/bkg3.gif" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-7 col-sm-4">
                                    <!--text goes in here-->
                                    <h1>We care for you</h1>
                                    <ul class="feature-list">
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Book with our travelling agent</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Book with our travelling agent</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Book with our travelling agent</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Book with our travelling agent</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Book with our travelling agent</li>
                                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Book with our travelling agent</li>
                                    </ul>
                                    <a href="" class="btn btn-primary btn-lg">Read more</a>
                                </div>
                                <div class="col-md-5 col-sm-3">
                                    <!--image goes in here-->
                                    <img class="ad-image" src="/img/ad3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- /.carousel -->
    </section>

    <section class="marketing">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        <div><i class="fa fa-user fa-5x "></i></div>
                        <h2 class="page-header">Personal Account</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Blanditiis dolorem doloremque dolorum eaque, eos eum facilis laborum mollitia quibusdam reiciendis soluta veniam, voluptate? Molestiae, qui, quia. Consectetur obcaecati quis similique?</p>
                    <p><a href="" class="btn btn-default">View Details</a></p>
                </div>

                <div class="col-md-4">
                    <div class="text-center">
                        <div><i class="fa fa-phone fa-5x text-center"></i></div>
                        <h2 class="page-header">Business Account</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Blanditiis dolorem doloremque dolorum eaque, eos eum facilis laborum mollitia quibusdam reiciendis soluta veniam, voluptate? Molestiae, qui, quia. Consectetur obcaecati quis similique?</p>
                    <p><a href="" class="btn btn-default">View Details</a></p>
                </div>

                <div class="col-md-4">
                    <div class="text-center">
                        <div><i class="fa fa-briefcase fa-5x text-center"></i></div>
                        <h2 class="page-header">Loans</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dolorem doloremque dolorum eaque, eos eum facilis laborum mollitia quibusdam reiciendis soluta veniam, voluptate? Molestiae, qui, quia. Consectetur obcaecati quis similique?</p>
                    <p><a href="" class="btn btn-default">View Details</a></p>
                </div>
            </div>
        </div>

    </section>

    @endsection


@section('scripts')
    <!--scripts for the page goes in here-->

    @endsection