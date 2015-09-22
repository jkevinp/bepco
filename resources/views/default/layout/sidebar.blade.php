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
              <a href="javascript:;" class="recipe" >
                  <i class="fa fa-book"></i>
                  <span>Raw Items</span>
              </a>
              <ul class="sub">
                <li><a  href="{{route('recipe.list')}}" class="recipe-list"><i class="fa fa-navicon"></i> List Recipe</a></li>
                <li><a  href="{{route('recipe.create')}}" class="recipe-create"><i class="fa fa-plus"></i> Create Recipe</a></li>
              </ul>
          </li>
          
          
      </ul>
  </div>
</aside>
<!--sidebar end-->