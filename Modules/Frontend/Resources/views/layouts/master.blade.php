<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('modules/frontend/css/index.css')}}">
    @yield('styles')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @yield('scripts')
</head>
<body>
<div class="row">
    {{--<div class="col-md-2 side-left">--}}
    {{--<img src="modules/frontend/images/page/b1.png" class="side-images" id="left-1">--}}
    {{--<div style="position: relative; left: 0; top: 0;">--}}
    {{--<img src="modules/frontend/images/page/b4.png" class="side-images" id="left-4"/>--}}
    {{--<img src="modules/frontend/images/page/b2.png" id="left-2"/>--}}
    {{--<img src="modules/frontend/images/page/b3.png" id="left-3"/>--}}
    {{--</div>--}}
    {{--<img src="modules/frontend/images/page/b5.png" id="left-5">--}}
    {{--<img src="modules/frontend/images/page/b6.png" id="left-6">--}}
    {{--<img src="modules/frontend/images/page/b7.png" id="left-7">--}}
    {{--<img src="modules/frontend/images/page/b8.png" id="left-8">--}}
    {{--<img src="modules/frontend/images/page/b9.png" id="left-9">--}}
    {{--</div>--}}

    <div class="container">
        <div class="col-xs-2 col-sm-8 col-md-12 col-lg-24">

            @include('frontend::layouts.partials._navbar')

        </div>


        <div class="col-xs-2 col-sm-8 col-md-12 col-lg-24">
            @yield('content')
        </div>


    </div>


    {{--<div class="col-md-2 side-right">--}}
    {{--<img src="modules/frontend/images/page/j1.png" class="side-images" id="right-1">--}}
    {{--<img src="modules/frontend/images/page/j2.png" class="side-images" id="right-2">--}}
    {{--<img src="modules/frontend/images/page/j3.png" class="side-images" id="right-3">--}}
    {{--<img src="modules/frontend/images/page/j4.png" class="side-images" id="right-4">--}}
    {{--<img src="modules/frontend/images/page/j5.png" class="side-images" id="right-5">--}}
    {{--<img src="modules/frontend/images/page/j6.png" class="side-images" id="right-6">--}}
    {{--<img src="modules/frontend/images/page/j7.png" class="side-images" id="right-7">--}}
    {{--<img src="modules/frontend/images/page/j8.png" class="side-images" id="right-8">--}}
    {{--<img src="modules/frontend/images/page/j9.png" id="right-9">--}}
    {{--</div>--}}
</div>
</body>
</html>
