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


<div class="container">

    <div class="row">
        <div class="col-xs-24 header"></div>
        <div class="col-xs-24">

            @include('frontend::layouts.partials._navbar')

        </div>


        <div class="col-xs-24">
            @yield('content')
        </div>

        <div class="col-xs-24">
            <div class="footer">
                <div class="well content-title">Kapcsolat</div>
                <div class="row">
                    <div class="col-xs-16 col-xs-offset-4">
                        <div class="col-sx-24 col-sm-12 col-md-12"><i class="fa fa-facebook" aria-hidden="true"></i>
                            Kövess minket
                            facebook-on
                        </div>
                        <div class="col-sx-24 col-sm-12 col-md-12"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            4029 Debrecen,
                            bercsény utca 4.
                        </div>
                    </div>

                    <div class="col-xs-16 col-xs-offset-4">
                        <div class="col-sx-24 col-sm-12 col-md-12">
                            <i class="fa fa-envelope" aria-hidden="true"></i> mail@ibolyacukraszda.hu
                        </div>
                        <div class="col-sx-24 col-sm-12 col-md-12">
                            <i class="fa fa-phone" aria-hidden="true"></i> 06 (30) 2763 480
                        </div>
                    </div>


                </div>
                <div>


                </div>
            </div>

        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>
