
<!--Profile Widget-->
<!--================================-->
<div id="mainnav-profile" class="mainnav-profile">
    <div class="profile-wrap text-center">
        <div class="pad-btm">
            @if(is_null(auth()->user()->avatar))
                <img class="img-circle img-md" src="/img/profile-photos/1.png" alt="Foto de perfil">
            @else
                <img class="img-circle img-md" src="{{ '/avatar/'.auth()->user()->id }}" alt="Foto de perfil">
            @endif

        </div>
        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
            <span class="pull-right dropdown-toggle">
                <i class="dropdown-caret"></i>
            </span>
            <p class="mnp-name">{{ auth()->user()->name }}</p>
            <span class="mnp-desc"><b>{{ auth()->user()->roles->first()->display_name }}</b></span><br>
            <span class="mnp-desc">{{ auth()->user()->email }}</span>

        </a>
    </div>
    <div id="profile-nav" class="collapse list-group bg-trans">
        <a href="{{ route('usuarios.edit', auth()->user()->id) }}" class="list-group-item">
            <i class="icon-usuarios"></i> Ver perfil
        </a>
        {{-- <a href="#" class="list-group-item">
            <i class="pli-gear icon-lg icon-fw"></i> Configuración
        </a>
        <a href="#" class="list-group-item">
            <i class="pli-information icon-lg icon-fw"></i> Ayuda
        </a> --}}
        <a href="{{ url('/logout') }}" class="list-group-item">
            <i class="icon-salir"></i> Salir
        </a>
    </div>
</div>



<ul id="mainnav-menu" class="list-group">

    <!--Category name-->
    <li class="list-header">Menú</li>

    <!--Menu list item-->
    {{--<li>
        <a href="#" class="active-sub">
            <i class="icon-inicio"></i>
            <span class="menu-title">Principal</span>
			<i class="arrow"></i>
        </a>

        <!--Submenu-->
        <ul class="collapse">
            <li><a href="index.html">Dashboard 1</a></li>
			<li><a href="dashboard-2.html">Dashboard 2</a></li>
			<li><a href="dashboard-3.html">Dashboard 3</a></li>

        </ul>
    </li>--}}

    @foreach(Session::get('Current.menu') as $key => $menu)
        <li{!! $menu['active'] !!}>
            <a href="{{ $menu['url'] }}"{{ isset($menu['target'])?$menu['target']:'' }}>
                <i class="{{ $menu['icon'] }}"></i>
                <span class="menu-title">{{ $key }}</span>
                @if(isset($menu['submenu']))
                    <i class="arrow"></i>
                @endif
            </a>
            @if(isset($menu['submenu']))
                <ul class="collapse">
                @foreach($menu['submenu'] as $submenu)
                    <li>
                        <a href="{{ $submenu['url'] }}"{{ isset($submenu['target'])?$submenu['target']:'' }}>
                            {!! $submenu['name'] !!}
                            @if(isset($submenu['subsubmenu']))
                                <i class="arrow"></i>
                            @endif
                        </a>
                        @if(isset($submenu['subsubmenu']))
                        <ul class="collapse">
                            @foreach($submenu['subsubmenu'] as $subsubmenu)
                                <li>
                                    <a href="{{ $subsubmenu['url'] }}"{{ isset($subsubmenu['target'])?$subsubmenu['target']:'' }}>
                                        {!! $subsubmenu['name'] !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
                </ul>
            @endif
        </li>
    @endforeach
   	<li class="list-divider"></li>
    <li>
        <a href="{{ url('/logout') }}">
            <i class="icon-salir"></i>
            <span class="menu-title">Salir</span>
        </a>
    </li>
</ul>
<!--================================-->
<!--End widget-->
