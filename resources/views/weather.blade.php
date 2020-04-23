<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Compass Starter by Ariona, Rian</title>

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Loading main css file -->
    <link rel="stylesheet" href="style.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->

</head>


<body>

<div class="site-content">
    <div class="site-header">
        <div class="container">
            <a href="" class="branding">
                <img src="images/logo.png" alt="" class="logo">
                <div class="logo-type">
                    <h1 class="site-title">Weather</h1>
                </div>
            </a>

        </div>
    </div> <!-- .site-header -->

    <div class="hero" data-bg-image="images/banner.png">
        <div class="container">
            <div class="dropdown ">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Edit Condition
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item"  data-toggle="modal" data-target="#myModalTemperature" >Edit temperature</a>
                    <a class="dropdown-item"  data-toggle="modal" data-target="#myModalWind" >Edit wind</a>
                    <a class="dropdown-item"  data-toggle="modal" data-target="#myModalPressure" >Edit pressure</a>
                    <a class="dropdown-item"  data-toggle="modal" data-target="#myModalHumidity" >Edit humidity</a>
                </div>
            </div>
            <form method="post" action="{{ route('weather.store') }}" class="find-location">
                @method('POST')
                @csrf
                <input type="text" name="lat" placeholder="Enter Latitude">
                <input type="text" name="lon" placeholder="Enter Longitude">
                <input type="submit" value="Get weather">
            </form>

        </div>
    </div>
        <div class="container">
            <div class="forecast-container">
                @if($weathers)
                    @foreach($weathers as $weather)
                <div class="today forecast">
                    <div class="forecast-header">
                        <div class="day">{{ Carbon\Carbon::now()->format('l') }}</div>
                        <div class="date">{{ Carbon\Carbon::now()->format('d M') }}</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="location">{{$weather->lat}}, {{$weather->lon}}</div>
                        <div class="degree">
                            <div class="num">{{$weather->temperature}}<sup>o</sup>C</div>
                            <div class="forecast-icon">
                                <img src="images/icons/icon-1.svg" alt="" width=90>
                            </div>
                        </div>
                        <span><img src="images/icon-umberella.png" alt="">{{$weather->humidity}}%</span>
                        <span><img src="images/icon-wind.png" alt="">{{$weather->wind}}km/h</span>
                        <span><img src="images/icon-compass.png" alt="">{{$weather->pressure}}</span>
                    </div>
                </div>

                @endforeach

                @endif

            </div>
        </div>


</div>
<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-md-offset-1">
                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
        </div>

        <p class="colophon">Copyright 2020.  All rights reserved</p>
    </div>
</footer> <!-- .site-footer -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>
<div id="myModalTemperature" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Temperature</h4>
            </div>
            <div class="modal-body find-location">
                <form action="#" class="subscribe-form">
                    {{--<input type="text" placeholder="Enter your email to subscribe...">--}}
                    <input type="hidden" name="type" value="temperature">
                    <input type="text" name="above" placeholder="Enter above">
                    <input type="text" name="below" placeholder="Enter below">
                    <input type="text" name="equal" placeholder="Enter equal">
                    <input type="submit" value="Save">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="myModalWind" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Wind</h4>
            </div>
            <div class="modal-body find-location">
                <form action="#" class="subscribe-form">

                <input type="hidden" name="type" value="wind">
                <input type="text" name="above" placeholder="Enter above">
                <input type="text" name="below" placeholder="Enter below">
                <input type="text" name="equal" placeholder="Enter equal">
                <input type="submit" value="Save">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="myModalPressure" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pressure</h4>
            </div>
            <div class="modal-body find-location">
                <form action="#" class="subscribe-form">

                <input type="hidden" name="type" value="pressure">
                <input type="text" name="above" placeholder="Enter above">
                <input type="text" name="below" placeholder="Enter below">
                <input type="text" name="equal" placeholder="Enter equal">
                <input type="submit" value="Save">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="myModalHumidity" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Humidity</h4>
            </div>
            <div class="modal-body find-location">
                <form method="post" action="{{ route('condition.update') }}" class="subscribe-form">
                    @method('POST')
                    @csrf
                <input type="hidden" name="type" value="humidity">
                <input type="text" name="above" placeholder="Enter above">
                <input type="text" name="below" placeholder="Enter below">
                <input type="text" name="equal" placeholder="Enter equal">
                <input type="submit" value="Save">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>


</html>