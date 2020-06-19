<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="{{ route('intranet.dashboard') }}" class="navbar-brand">
                <img src="/themes/intranet/img/logo.png" alt="Innovaweb" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text ml-5 light">Innovaweb</span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content">
            <ul class="nav navbar-top-links">

                <!--Navigation toggle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toggle button-->


                <!--Search-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Search-->

            </ul>
            <ul class="nav navbar-top-links">

                <!--Notification dropdown-->
                <!--Notification dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="demo-pli-bell"></i>
                        @if((auth('intranet')->check() or auth('customer')->check()) and count($newMessage))
                            <span class="badge badge-header badge-danger"></span>
                        @endif
                    </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End notifications dropdown-->


                <!--Config dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                @if(auth('intranet')->check())
                <li id="dropdown-config" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class=" pull-right">
                                    <i class="demo-pli-gear icon-lg icon-fw"></i>
                                </span>
                    </a>


                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            @can('intranet.roles.index')
                                <li>
                                    <a href="{{ route('intranet.roles.index') }}">
                                        <i class="ti-lock"></i>
                                        <span class="menu-title">Roles de Usuarios</span>
                                    </a>
                                </li>
                            @endcan
                            @can('intranet.users.index')
                                <li>
                                    <a href="{{ route('intranet.users.index') }}">
                                        <i class="ti-user"></i>
                                        <span class="menu-title">Usuarios del Sistema</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endif
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End config dropdown-->

                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->

                                    <img class="img-circle img-user media-object"
                                         src="{{ auth()->user()->photo  ? Storage::url(auth()->user()->photo) : '/themes/intranet/img/user-default.png'}}">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
{{--                                    <i class="demo-pli-male"></i>--}}
                                </span>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--You can also display a user name in the navbar.-->
                        <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">

                            <li>
                                <a href="{{ route('intranet.profile.update') }}"><i
                                        class="demo-pli-male icon-lg icon-fw"></i>Mi Perfil</a>
                            </li>
                            <li>
                                <a href="#" role="button" data-toggle="modal" data-target="#modalChangeColor"><i
                                        class="demo-pli-file-edit icon-lg icon-fw"></i> Cambiar Tema</a>
                            </li>
                            <li>
                                <a href="{{ route('intranet.auth.logout') }}"><i
                                        class="demo-pli-unlock icon-lg icon-fw"></i> Salir</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->

            </ul>
        </div>

    </div>
</header>
