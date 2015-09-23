@extends('default.layout.layout')

@section('content')
<div class="row mt">
  <div class="col-md-12">
    <div class="row mt">
      <div class="content-panel">
        <div class="content-head">
          <h2 class="violet text-center">Create new order</h2>
        </div>
        <ul>
          <li>*To add products to the order, drag the product into the cart.</li>
          <li>*Please set the quantity of the products ordered before submitting.</li>
          <li>*After all products and quantities are set. Press submit to process the order.</li>
        </ul>
      </div>
    </div>

    <div class="row mt">
      <div class="col-md-6">
        <div class="content-panel panel-info">
          <div class="panel-heading">Products: Move to cart 
            <form data-token="{{ csrf_token() }}" method="post" action="{{route('order.ajaxstore')}}" id="form" data-route="{{route('order.ajaxstore')}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            <span class="pull-right"><button class="btn btn-theme btn-xs" id="btn_submit" >Submit</button></span>
          </div>
            <div class="panel-body">
              <ul id="sortable1" class="droptrue">
              @foreach($products as $p)
                <li class="list-success productlistitem"  data-id="{{$p->id}}" style="
                  background:url({{URL::asset('img-product')}}/{{$p->imageurl}});
                  background-repeat: no-repeat;
                  background-position: right;
                  background-size: 40% 100%;
                  background-color:#fff;" data-quantity="10" >
                  <input name="quantity" class=" col-lg-3 text-center" size="16" id="quantity" type="number" min="1" value="1">{{$p->name}}
                  <span class="btn btn-theme btn-xs pull-right">
                    <i class="fa fa-eye"></i> 
                  </span>
                </li>
              @endforeach
              </ul>
            </form>
            </div>
        </div>
      </div>
    
    <div class="col-md-6 ">
      <div class=" content-panel panel-success">
        <div class="panel-heading">Cart</div>
        <div class="panel-body"> 
          <div class="content-panel">
        <div class="content-head">
          <h2 class="violet text-center" id="sortable2-helper"></h2>
        </div>
      </div>


          <ul id="sortable2" class="droptrue"></ul>

        </div>
      </div>
    </div>


    </div>
  </div>
</div>

</div>

@stop



@section('script')
<script type="text/javascript">
  $(document).ready(function(){

      


      $('#btn_submit').click(function(e){
        
        e.preventDefault();
        var data = [];
        $('#sortable2').each(function(){
            $(this).find('li').each(function(i){
            var id=$(this).data('id');
            var quantity = $(this).find('input').val();
                data[i] = [id,quantity];
            });
        });//end each sortable2
        swal({   
            title: "Continue Order Submission?",   
            text: "Pressing ok will save the current order.",  
            type: "info",   
            confirmButtonColor: "rgb(93, 70, 140)",  
            confirmButtonText: "Submit Order!",
            cancelButtonText: "Submit Order!",
            cancelButtonText: "Cancel",
            showCancelButton: true,  
            closeOnConfirm: false,   
            showLoaderOnConfirm: true, },
             function(){   

              var _token = $('#form').data('token');
              var route = $('#form').data('route');
               $.post(route,{data: data , _token: _token} ,function(e){
                  swal(e);
               });


            });//end swal
            });//end btn_submit

        
    
      $('#products').change();
      $('#product-items').draggable();

      $('.productlistitem').mousedown(function(){
        $('.productlistitem').removeClass('list-info');
       $(this).addClass('list-info');
      });
      $("ul.droptrue" ).sortable({ 
          connectWith: "ul", 
          placeholder: "listhighlight",
          helper: "clone",
          revert: "valid",
          start:function(event,ui){
            $('#sortable2-helper').text('Drop it below. ');

          },
          stop:function(){
             $('#sortable2-helper').text('');
          }
        });
      $('#sortable1').sortable({
        remove: function(event, ui) {
          setTimeout(function(){
           
           $('#sortable2-helper').text('Got it!');
           }, 200);  
           setTimeout(function(){
            $('#sortable2-helper').text('');
           }, 1000);  
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