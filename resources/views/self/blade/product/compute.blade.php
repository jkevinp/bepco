@extends('default.layout.layout')

@section('content')
<div class="row mt">
  <div class="col-md-12">
    <div class="row mt">

      <div class="col-md-6">
        <div class="panel panel-info">
          <div class="panel-heading">Products: Move to cart 
            <span class="pull-right"><button class="btn btn-theme btn-xs" id="btn_submit" data-route="{{route('product.processcomputation')}}">Submit</button></span>
          </div>
            <div class="panel-body">
              <ul id="sortable1" class="droptrue">
              @foreach($products as $id=>$name)
                <li class="list-success productlistitem" data-route="{{route('ajax.recipe')}}" data-id="{{$id}}" data-quantity="10" >
                  <input name="quantity" class=" col-lg-3 text-center" size="16" id="quantity" type="number" min="1" value="1">{{$name}}
                  <span class="btn btn-theme btn-xs pull-right">
                    <i class="fa fa-eye"></i> 
                  </span>
                </li>
              @endforeach
              </ul>
            </div>
        </div>
      </div>
    
    <div class="col-md-6 ">
      <div class=" panel panel-success">
        <div class="panel-heading">Cart</div>
        <div class="panel-body">
          <ul id="sortable2" class="droptrue"></ul>
        </div>
      </div>
    </div>


    </div>
  </div>
</div>

</div>
  <div class="row mt" >
    <div class="col-md-6">
      <div class="row mt">
        <div class="form-panel" >
          <table  class="table table-hover table-striped">
            <thead>
              <th>Recipe</th>
            </thead>
            <tbody id="recipe-result">
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row mt">
        <div class="form-panel" >
          <table id="" class="table table-hover table-striped">
            <thead>
              <th>Ingredient</th>
            </thead>
            <tbody id="ingredient-result">
            
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row mt">
        <div class="form-panel" >
          <table id="" class="table table-hover table-striped">
            <thead>
              <th>Required Items</th>
            </thead>
            <tbody id="computation-result">
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

<div class="row mt">
    <div class="col-md-6">
      <div class="form-panel">
            <div class=" form">
                <div class="cmxform form-horizontal style-form" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h2 class="violet">Compute/Order Ingredients for product</h2>
                    <h5 class=""><b>Only products with recipe will be loaded.</b></h5>
                    <hr>


                    <div  id="product-items">
                      <div class="col-lg-4">
                        <input name="quantity" class="form-control input-medium " size="16" id="quantity" type="number" min="1" value="1">
                          {!! Form::select('product_id' , $products, '' , ['class' => 'selectize ' , 'id' => 'products' ,'data-route' => route('ajax.recipe') ]) !!}      
                        </div>        
                    </div>





                    </div>
                    <button class="btn btn-theme" id="btn_submit" data-route="{{route('product.processcomputation')}}">Submit</button>
                    <input class="btn btn-theme04" type="submit" value="Reset">
                </div>
            </div>
        </div>
    </div>
@stop



@section('script')
<script type="text/javascript">
  $(document).ready(function(){
      
      $('#products').on('change' , function(){
          $('#computation-result').html('');
          var div_recipe = $('#recipe-result');
          var div_ingredient= $('#ingredient-result');
          div_recipe.html('<i class="fa fa-spinner fa-pulse bg-black"></i>Fetching recipe...');
          div_ingredient.html('<i class="fa fa-spinner fa-pulse bg-black"></i>Fetching Ingredients');
          $.get( $(this).data('route') , { product_id: $(this).val()} )
          .done(function( data ) {
            console.log(data);
              div_recipe.html('');
              div_ingredient.html('');
               var html = "<tr>";
              //loop recipe
              $.each(data.recipe, function(i,o){
                $.each(o, function(x,y){
                    html += "<td>" + y;
                });
              });
               div_recipe.append(html);
              var html = "";
              if(data.ingredient.length == 0){
                 html = "The recipe has no ingredient";
                 $('#btn_submit').attr('disabled' , 'true');
                }
                else{
                  $('#btn_submit').removeAttr('disabled');
                  $.each(data.ingredient, function(i, o){
                    html += "<tr>";
                    html += "<td>" + i + " x" + o;
                  });
                }
              
              div_ingredient.append(html);
              //end loop

             
          });
      });
  
      $('.productlistitem').mousedown(function(){

           $('#computation-result').html('');
           $('.list-info').removeClass('list-info').addClass('list-success');
           $(this).addClass('list-info');
          var div_recipe = $('#recipe-result');
          var div_ingredient= $('#ingredient-result');
          div_recipe.html('<i class="fa fa-spinner fa-pulse bg-black"></i>Fetching recipe...');
          div_ingredient.html('<i class="fa fa-spinner fa-pulse bg-black"></i>Fetching Ingredients');
          $.get( $(this).data('route') , { product_id: $(this).data('id')} )
          .done(function( data ) {
            console.log(data);
              div_recipe.html('');
              div_ingredient.html('');
               var html = "<tr>";
              //loop recipe
              $.each(data.recipe, function(i,o){
                $.each(o, function(x,y){
                    html += "<td>" + y;
                });
              });
               div_recipe.append(html);
              var html = "";
              if(data.ingredient.length == 0){
                 html = "The recipe has no ingredient";
                 $('#btn_submit').attr('disabled' , 'true');
                }
                else{
                  $('#btn_submit').removeAttr('disabled');
                  $.each(data.ingredient, function(i, o){
                    html += "<tr>";
                    html += "<td>" + i + " x" + o;
                  });
                }
              
              div_ingredient.append(html);
              //end loop

             
          });
      });//end click productlist item




      $('#btn_submit').click(function(e){
        var data = [];
        $('#sortable2').each(function(){
            $(this).find('li').each(function(i){
            var id=$(this).data('id');
            var quantity = $(this).find('input').val();
                data[i] = [id,quantity];
            });
        });//end each sortable2
        console.log(data);
        e.preventDefault();
        var div_result = $('#computation-result');
         $.get( $(this).data('route') , {data : data })
         //  $.get( $(this).data('route') , { product_id: $('#products').val(), quantity : $('#quantity').val() })
          .done(function( data ) {
              div_result.html('');
              $.each(data, function(i,o){
                var html = "<tr>";
                  
                  $.each(o, function(x,y){
                    html += "<td>" + y;
                  });
                     div_result.append(html);
              });
      });
        });
      $('#products').change();
      $('#product-items').draggable();
      $("ul.droptrue" ).sortable({ 
          connectWith: "ul", 
          placeholder: "listhighlight",
          helper: "clone",
          revert: "valid"
        });
      $('#sortable1').sortable({
        remove: function(event, ui) {
                ui.item.clone().appendTo('#sortable2');
                $(this).sortable('cancel');
            }
      });
      $("#sortable1, #sortable2" ).disableSelection();
      
  });
</script>
@stop

@section('header')
 <style>
  .listhighlight{
    border:5px;
    border-color: black;
    padding: 100px;
    background-color:#797979; 
    width: 100%;
  }
  ul#sortable2 ,#sortable1{
    list-style-type: none; 
    width: 100%;
    background: #5D468C;
    padding-top: 10px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 100px;
  }
  #sortable1 li, #sortable2 li{ 
      width: 100% !important;
     
      border-left-width: 10px;
     /* border-left-color: #2ECC71;
       border-left: 1;
      border-left-style: solid;
      #424a5d*/
  }
  </style>
@stop