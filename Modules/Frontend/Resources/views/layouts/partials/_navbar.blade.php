<nav class="navbar navbar-default">
    <div class="container-fluid" id="mainMenuContainer">
        <ul class="nav navbar-nav">
            {{--<li><a href="rolunk">Rólunk</a></li>--}}
            {{--<li><a href="/">Tortarendelés</a></li>--}}
            {{--<li><a href="/#suti">Sütemények</a></li>--}}
            {{--<li><a href="kapcsolat">Kapcsolat</a></li>--}}

            @if(isset($menus))
            @foreach($menus as $menu)
            <li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>
            @endforeach
            @endif

        </ul>
    </div>
</nav>