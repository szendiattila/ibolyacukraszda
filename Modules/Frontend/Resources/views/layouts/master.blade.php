<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/helper/helper.css">
    <link rel="stylesheet" href="css/helper/helper-responsive.css">
    <link rel="stylesheet" href="{{asset('modules/frontend/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('modules/frontend/css/main-responsive.css')}}">
    <link rel="stylesheet" href="{{asset('modules/frontend/css/font-awesome.css')}}">
    @yield('styles')


</head>
<body>

<div id="wrap">
    <div class="container">

        <div class="row">
            <div class="col-xs-24 header"></div>
        </div>
        <div class="row">
            <div class="col-xs-24">

                @include('frontend::layouts.partials._navbar')

            </div>


            <div class="col-xs-24">
                @yield('content')
            </div>


        </div>

    </div>
</div>

<div id="footer">

    <div class="container">
        <div class="row">
            <div class="col-xs-24">
                <div class="footer">
                    <div class="well content-title">Kapcsolat</div>
                    <div class="row">
                        <div class="col-xs-16 col-xs-offset-4">
                            <div class="col-sx-24 col-sm-12 col-md-12">
                                <i class="fa fa-facebook footerIcon" aria-hidden="true"></i>
                                <a href="https://www.facebook.com/Ibolya-Cukr%C3%A1szda-267067839996337/"
                                   target="_blank" class="footerLink">Kövess minket
                                    facebook-on</a>
                            </div>
                            <div class="col-sx-24 col-sm-12 col-md-12">
                                <i class="fa fa-map-marker footerIcon" aria-hidden="true"></i>
                                <a href="https://www.google.hu/maps/place/Debrecen,+Bercs%C3%A9nyi+Mikl%C3%B3s+u.+4,+4029/@47.5366822,21.63617,17z/data=!4m5!3m4!1s0x47470ddecb4cf17b:0x9b5e9bd339ad3b2c!8m2!3d47.536436!4d21.637833"
                                   target="_blank" class="footerLink">4029 Debrecen, Bercsény utca 4.</a>
                            </div>
                        </div>

                        <div class="col-xs-16 col-xs-offset-4">
                            <div class="col-sx-24 col-sm-12 col-md-12">

                                <span data-e0="mail" data-e1="ibolyacukraszda" data-e2="hu" class="sem">
                                    <i class="fa fa-envelope footerIcon" aria-hidden="true"></i>
                                </span>


                            </div>
                            <div class="col-sx-24 col-sm-12 col-md-12">
                                <i class="fa fa-phone footerIcon" aria-hidden="true"></i>
                                <a href="tel:+36302763480" class="footerLink">06 (30) 2763 480</a>
                            </div>
                        </div>


                    </div>
                    <div>


                    </div>
                </div>

            </div>
        </div>
    </div>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
@yield('scripts')
</body>
</html>
