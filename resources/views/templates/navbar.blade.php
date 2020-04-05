<!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        {{--<img src="/img/logos/logo_min.png" alt="Nifty Logo" class="brand-icon">--}}
                        <div class="brand-title">
                            @if(Request::segment(1) != 'covid')
                            <img width="100%" src="/img/logos/logos_panel_side.png" alt="" class="">
                            {{--<span class="brand-text">SICOPI</span>--}}
                            @endif
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="icon-th-list"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->



                        <!--Search-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li style="margin-left: 10px; margin-top: -4px;">
                            <div class="text-center" >
                                @if(!isset($mainnav))
                                    @php($color = 'white')
                                @else
                                    @php($color = '#00843d')
                                @endif
                                <h3 style="color:{!! $color !!}">
                                    @if(Request::segment(1) != 'covid')
                                    {{ (strlen(Session::get('Current.dependencia')) > 50) ? substr(Session::get('Current.dependencia'),0,50).'...' : Session::get('Current.dependencia') }}
                                    @endif
                                </h3>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Search-->

                    </ul>
                    <ul class="nav navbar-top-links">

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->