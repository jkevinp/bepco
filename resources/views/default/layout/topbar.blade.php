<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="{{route('default.home')}}" class="logo"><b>{{env('APP_TITLE')}}       </b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"  style="color:white">
                    <i class="fa fa-warning" style="color:yellow;"></i>
                    <span class="badge bg-theme">
                        {{count(bepc\Models\Item::where('quantity', '<=' ,0)->get())}}
                    </span>
                </a>
                
                <ul class="dropdown-menu extended inbox" >
                  <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">Out of stock Items</p>
                    </li>
                    @foreach(bepc\Models\Item::where('quantity', '<=' ,0)->get() as $item)
                    <li>
                        <a href="">
                            <div class="subject">
                                <div class="from">Item ID: {{$item->id}}</div>
                                <div class="from">Item Name: {{$item->name}}</div>
                                <div class="from">Quantity: {{$item->quantity}}</div>
                            </div>
                        </a>
                            <div class="time">
                                <a class="btn btn-theme04 btn-xs"  title="Deposit {{$item->name}}" href="{{route('item.deposit' , $item->id)}}" >
                                    <i class="fa fa-reply"></i> Deposit</a>
                            </div>
                        
                    </li>
                    @endforeach
                   
                    <li class="external">
                        <a href="">See All Out of stock Items</a>
                    </li>
                </ul>
            </li>
            <!-- settings end -->
            <!-- orders start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"  style="color:white">
                    <i class="fa fa-truck" style=""></i>
                    <span class="badge bg-theme">
                        {{count(bepc\Models\Order::getNotification())}}
                    </span>
                </a>
                
                <ul class="dropdown-menu extended inbox" >
                  <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">Out of stock Items</p>
                    </li>
                    @foreach(bepc\Models\Order::getNotification() as $item)
                    <li>
                        <a href="">
                            <div class="subject">
                                <div class="from">Item ID: {{$item->id}}</div>
                                <div class="from">Item Name: {{$item->name}}</div>
                                <div class="from">Quantity: {{$item->quantity}}</div>
                            </div>
                        </a>
                            <div class="time">
                                
                            </div>
                        
                    </li>
                    @endforeach
                   
                    <li class="external">
                        <a href="">See All Orders</a>
                    </li>
                </ul>
            </li>
            <!-- orders end -->
            <!-- inbox dropdown start-->
            <li  class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="color:white;">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-theme">{{count(bepc\Models\InventoryLog::all())}}</span>
                </a>
                <ul class="dropdown-menu inbox" style="padding:0px !important" >
                    <div class="notify-arrow notify-arrow-green" ></div>
                    <li  style="background-color:#68dff0;">
                        <div class="green"  style="background-color:#68dff0;color:white;padding:10px !important">Inventory Logs</div>
                    </li>
                    @foreach(bepc\Models\InventoryLog::all() as $log)
                    <li >
                    <a href="">
                            <div class="subject">
                                <div class="from"><h6>{{$log->message}}</h6></div>
                            </div>
                        </a>
                            <div class="time">
                               
                            </div>
                        </li>
                    @endforeach
                      <li class="external">
                        <a href="">See All Inventory Logs</a>
                    </li>

                </ul>
            </li>

            <!-- inbox dropdown end -->
           
        </ul>

        <!--  notification end -->
    </div>
     <div class="top-menu">
        <ul class="nav pull-right top-menu">
        <li>
            <div class="dropdown navhover">
                    <button class="btn btn-theme dropdown-toggle logout " style="background-color:transparent !important;border:0;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                   @if(Auth::check())
                      <a href="{{route('user.show' , [Auth::user()->id , str_replace(' ' , '-' ,Auth::user()->getName())])}}" class="white navhover" style="background-color:transparent !important;">
                     
                          @if(Auth::user()->userphoto)
                                <img src="{{URL::asset('img-photo')}}/{{Auth::user()->userphoto->filename}}"width="50" class="img-thumbnail img">
                                {{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} ({{Auth::user()->getUserGroupName()}})
                          @else
                                <img src="{{URL::asset('img-template')}}/id.png" width="50" class="img-thumbnail img">
                                 {{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} ({{Auth::user()->getUserGroupName()}})
                          @endif
                      </a>
                      @endif
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="{{route('user.show' , [Auth::user()->id , str_replace(' ' , '-' ,Auth::user()->getName())])}}"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a class="logout" href="" style="background-color:transparent !important;"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a class="logout" href="{{route('auth.logout')}}" style="background-color:transparent !important;"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
       
        </li>
            </ul>
    </div>
</header>
<!--header end-->