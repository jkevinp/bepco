@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel"> 
            <h2 class="violet"><i class="fa fa-angle-right"></i> Recipe List</h2>
            <div class='row mt'>
              <div class="col-md-12">
                  <span class="col-md-8">
                    <i class='fa fa-info '></i> 
                    Recipe contains a list of ingredients or items that are required to produce a specific product.
                </span>
                 <a href="{{route('recipe.create')}}" class="btn btn-theme btn-lg col-md-3 col-md-offset-1 pull-right"><i class="fa fa-plus"></i> Create New recipe</a>
              </div>
            </div>
            <hr>
            <table class="table table-striped table-advance table-hover table-bordered">
              <thead>
              <tr>
                  <th><i class="fa fa-bullhorn"></i> Recipe ID</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Recipe Name</th>
                  <th><i class="fa fa-bookmark"></i>Recipe for Product</th>
                  <th><i class=" fa fa-edit"></i> Actions</th>
                 
              </tr>
              </thead>
              <tbody>
              @foreach($recipe as $r)
              <tr>
                  <td><a href="{{route('recipe.show' , $r->id)}}">{{$r->id}}</a></td>
                  <td>
                    <span class="">{{$r->name}}</span>
                  </td>
                  <td>
                    <span class="violet"><a href="{{route('product.show' , $r->product->id)}}">{{$r->product->name}}</a></span>
                  </td>
                  <td>
                        <button class="btn btn-primary btn-xs" title="edit {{$r->name}}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btn-xs" title="delete {{$r->name}}"><i class="fa fa-trash-o "></i></button>
                        <a class="btn btn-theme02 ingredient btn-xs showdetails" data-id="{{$r->id}}" title="view ingredients for {{$r->name}}"
                             href="#showdetails{{$r->id}}" data-toggle="modal" data-target="showdetails{{$r->id}}"
                            ><i class="fa fa-eye"></i></a>
                  </td>
              </tr>
             </tbody>
             {{-- Modal--}}
              <div id="showdetails{{$r->id}}" class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="col-md-offset-3 col-md-6" style="top:150px;">
                          <div class="content-panel">
                            <div id="content-body">
                                <div class="">
                                    
                                    <h4>Recipe for {{$r->product->name}}</h4>
                                        @if(count($r->ingredient) == 0)
                                            <span class="red">No ingredients found for this recipe</span>
                                        @endif
                                        @foreach($r->ingredient as $i)
                                         <div class="accordion col-md-12" style="background:rgba(255,255,255,0.7)">
                                            <div class="row mt">
                                              <div class="col-md-12">
                                                <div class="white" style="background:#79589F;">Ingredient Name: {{$i['name']}}</div>
                                                <div>Quantity: {{$i['quantity']}}</div>
                                                <div>Item to use: {{$i->item->name}}</div>
                                              </div>
                                            </div>
                                          </div>
                                        @endforeach
                                   
                                </div>
                            </div>
                            <div class="pr2-social centered">

                                <button class="btn btn-primary btn-xs">Edit Recipe</button>
                                <button class="btn btn-theme btn-xs" data-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
             @endforeach
            </table>
        </div>
    </div>
</div>

@stop

@section('script')
    <script type="text/javascript">
         $(document).ready(function(){
             $( ".accordion" ).accordion({
                  heightStyle: "content"
              });
           $('.showdetails').click(function(e){
                var target = "#"  + $(this).data('target');
                $(target).fadeToggle().modal('toggle');
           });
        });
    </script>
@stop