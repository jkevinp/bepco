<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="{{route('default.home')}}" class="logo"><b>{{env('APP_TITLE')}}</b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"  style="color:white">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-theme">
                    
                    </span>
                </a>
                <ul class="dropdown-menu extended inbox" >
                  <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">pending Transactions</p>
                    </li>
                    <li>
                        <a href="">
                            <div class="subject">
                            <div class="from"></div>
                            <div class="from"></div>
                            <div class="time"></div>
                        </div>
                            <div class="message">
                            </div>
                        </a>
                    </li>
                   
                    <li class="external">
                        <a href="">See All Pending Transactions</a>
                    </li>
                </ul>
            </li>
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="color:white">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-theme"> </span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have messages</p>
                    </li>
                    <li>
                    </li>
                </ul>
            </li>

            <!-- inbox dropdown end -->
           
        </ul>

        <!--  notification end -->
    </div>
     <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="{{route('auth.logout')}}"><i class="fa fa-gear"></i> Settings</a></li>
            <li><a class="logout" href="{{route('auth.logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
</header>
<!--header end-->