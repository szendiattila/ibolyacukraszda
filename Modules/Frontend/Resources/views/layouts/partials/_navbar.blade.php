<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            {{--<li><a href="/">Home</a></li>--}}
            {{--<li><a href="rolunk">Rólunk</a></li>--}}
            {{--<li><a href="rendeles">Tortarendelés</a></li>--}}
            {{--<li><a href="cukraszda">Egyéb sütemények</a></li>--}}
            {{--<li><a href="kapcsolat">Kapcsolat</a></li>--}}
            @if(isset($menus))
                @foreach($menus as $menu)
                    <li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>
                @endforeach
            @endif

        </ul>
    </div>
</nav>