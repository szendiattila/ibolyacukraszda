<nav class="navbar navbar-default">
    <div class="container-fluid" id="mainMenuContainer">
        <ul class="nav navbar-nav">
            <li><a href="rolunk">Rólunk</a></li>
            <li><a href="/">Tortarendelés</a></li>

            @if(url()->current() == url('/'))

                <li><a href="#suti">Sütemények</a></li>
            @else

                <li><a href="/#suti">Sütemények</a></li>
            @endif
            <li><a href="kapcsolat">Kapcsolat</a></li>
            {{--@if(isset($menus))--}}
            {{--@foreach($menus as $menu)--}}
            {{--<li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>--}}
            {{--@endforeach--}}
            {{--@endif--}}

        </ul>
    </div>
</nav>