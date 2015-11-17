@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('ingredient.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Create new Ingredient</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Ingredient Name*</label>     
                                <div class="col-lg-10"><input  name="name" class="form-control input-medium " required="" type="text"></div>
                            </div>
                              <div class="form-group ">
                                <label for="quantity" class="control-label col-lg-2">Quantity*</label>     
                                <div class="col-lg-10"><input  name="quantity" class="form-control input-medium " size="16" value="1" required="" type="number" min="1"></div>
                            </div>
                             <div class="form-group ">
                                <label for="product_id" class="control-label col-lg-2">Select Recipe*</label>     
                                <div class="col-lg-10">
                                    {!! Form::select('recipe_id',$recipes,'' ,['class' => 'selectize' ,'id' => 'recipe'])!!}
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="product_id" class="control-label col-lg-2">Select Item*</label>     
                                <div class="col-lg-10">
                                    {!! Form::select('item_id',$items,'' ,['class' => 'selectize'])!!}
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="details" class="control-label col-lg-2">Description*</label>        
                                <div class="col-lg-10"><textarea ="" class="form-control" style="resize:none;" id="details" placeholder="Details" name="description" cols="50" rows="10"></textarea></div>
                            </div>
                            <input class="btn btn-theme" type="submit" value="Submit">
                            <input class="btn btn-theme04" type="submit" value="Reset">
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('item.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Recipe Info</h2>
                            <div class="" id="recipe_info">
                               
                            </div>
                            <hr>
                            <div class="" id="ingredient_info">
                               
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        var recipehref = "{{route('ajax.get.recipe')}}";
        $('#recipe').change(function(e){
           $('#ingredient_info').html('<div><i class="fa fa-spinner fa-spain"></li>Loading Recipe Information..</div>');
            var me = $(this);
            var id = me.val();
             $.get(recipehref , {id : id } , function(response){
                var html2 = "";
                
                html2 += "Recipe ID:" +response.recipe.id + "<br/>";
                html2 += "Recipe Name:" +response.recipe.name + "<br/>";
                html2 += "Product ID:" +response.recipe.product_id + "<br/>";
                
           
                var html = "<table class='table table-condensed table-hover table-stripe'>";
                html += "<tr><th>Item ID</th><th>Ingredient Name</th></tr>";
                $.each(response.ingredients , function(index, object){
                    html += "<tr><td>"  + object  +"</td><td>"+ index +"</td></tr>";
                });
                html += "</table>";
                     $('#recipe_info').html(html2);
                $('#ingredient_info').html(html);
             },'JSON');
        });
    });
</script>
@stop