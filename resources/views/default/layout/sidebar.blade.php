<!-- sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
      <ul class="sidebar-menu" id="nav-accordion">
        <h5 class="centered"><span class="glyphicon glyphicon-user"></span>
          @if(Auth::check())
          {{Auth::user()->firstname}}
          {{Auth::user()->middlename}}
          {{Auth::user()->lastname}}
          @endif
        </h5>
        <h6 class="centered">
          @if(Auth::check())
            {{Auth::user()->usergroup}}
            @endif
        </h6>
          <li class="mt">
              <a href="{{route('default.home')}}">
                  <i class="fa fa-dashboard"></i>
                  <span>Home</span>
              </a>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class="fa fa-desktop"></i>
                  <span>Barcode</span>
              </a>
              <ul class="sub">
                    <li><a  href="{{route('barcode.create')}}">Create Barcode</a></li>
              </ul>
          </li>
          
      </ul>
  </div>
</aside>
<!--sidebar end-->