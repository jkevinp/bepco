<!-- sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
      <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered">
          @if(Auth::check())
          <a href="{{route('user.show' , [Auth::user()->id , str_replace(' ' , '-' ,Auth::user()->getName())] )}}">
         
              @if(Auth::user()->userphoto)
                    <img src="{{URL::asset('img-photo')}}/{{Auth::user()->userphoto->filename}}"width="60" class="img-circle">
              @else
                    <img src="{{URL::asset('img-template')}}/id.png" width="60" class="img-circle">
              @endif
          </a>
           @endif
        </p>
        <h5 class="centered">
          @if(Auth::check())
            {{Auth::user()->firstname}}
            {{Auth::user()->middlename}}
            {{Auth::user()->lastname}}
          @endif
        </h5>
        <h6 class="centered">
          @if(Auth::check())
            {{Auth::user()->getUserGroupName()}}
          @endif

        </h6>
          <li class="mt">
              <a href="{{route('default.home')}}">
                  <i class="fa fa-dashboard"></i>
                  <span>Home</span>
              </a>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="barcode" >
                  <i class="fa fa-barcode"></i>
                  <span>Barcodes</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('barcode.list')}}" class=" barcode-list"><i class="fa fa-navicon"></i> List Barcode</a></li>
                <li><a  href="{{route('barcode.create')}}" class="  barcode-create"><i class="fa fa-plus"></i> Create Barcode</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="product" >
                  <i class="fa fa-beer"></i>
                  <span>Products</span>
              </a>  
              <ul class="sub">
                <li><a  href="{{route('product.list')}}" class="product-list"><i class="fa fa-navicon"></i> List Products</a></li>
                <li><a  href="{{route('product.create')}}" class="product-create"><i class="fa fa-plus"></i> Create Product</a></li>
                <li><a  href="{{route('product.compute')}}" class="product-compute"><i class="fa fa-calculator"></i> Compute Ingredients</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="recipe" >
                  <i class="fa fa-book"></i>
                  <span>Recipe</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('recipe.list')}}" class="recipe-list"><i class="fa fa-navicon"></i> List Recipe</a></li>
                <li><a  href="{{route('recipe.create')}}" class="recipe-create"><i class="fa fa-plus"></i> Create Recipe</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="ingredients" >
                  <i class="fa fa-book"></i>
                  <span>Ingredients</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('ingredient.list')}}" class="ingredient-list"><i class="fa fa-navicon"></i> List Ingredients</a></li>
                <li><a  href="{{route('ingredient.create')}}" class="ingredient-create"><i class="fa fa-plus"></i> Create Ingredient</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="item" >
                  <i class="fa fa-book"></i>
                  <span>Raw Items</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('item.list')}}" class="item-list"><i class="fa fa-navicon"></i> List Item</a></li>
                <li><a  href="{{route('item.create')}}" class="item-create"><i class="fa fa-plus"></i> Create Item</a></li>
              </ul>
          </li>
           <li class="sub-menu">
              <a href="javascript:;" class="order" >
                  <i class="fa fa-book"></i>
                  <span>Orders</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('order.list')}}" class="order-list"><i class="fa fa-navicon"></i> List Orders</a></li>
                <li><a  href="{{route('order.create')}}" class="order-create"><i class="fa fa-plus"></i> Create Customer Order</a></li>
                <li><a  href="{{route('order.generate')}}" class="order-generate"><i class="fa fa-plus"></i> Generate Order</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="user" >
                  <i class="fa fa-user"></i>
                  <span>User</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('user.list')}}" class="user-list"><i class="fa fa-navicon"></i> List User</a></li>
                <li><a  href="{{route('user.create')}}" class="user-create"><i class="fa fa-plus"></i> Create User</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="supplier" >
                  <i class="fa fa-supplier"></i>
                  <span>Suppliers</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('supplier.list')}}" class="supplier-list"><i class="fa fa-navicon"></i> List Suppliers</a></li>
                <li><a  href="{{route('supplier.create')}}" class="supplier-create"><i class="fa fa-plus"></i> Create Supplier</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" class="supplieritem" >
                  <i class="fa fa-supplier"></i>
                  <span>Suppliers Items</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('supplieritem.list')}}" class="supplieritem-list"><i class="fa fa-navicon"></i> List Supplier Items</a></li>
                <li><a  href="{{route('supplieritem.create')}}" class="supplieritem-create"><i class="fa fa-plus"></i> Create Supplier Item</a></li>
              </ul>
          </li>
           <li class="sub-menu">
              <a href="{{route('cpanel.index')}}" class="controlpanel" >
                  <i class="fa fa-user"></i>
                  <span>Control Panel</span>
              </a>
          </li>
          
          
      </ul>
  </div>
</aside>
<!--sidebar end-->