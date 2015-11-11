@extends('default.layout.layout')
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
  }
  .hoverable:hover{
      animation-name: example;
      animation-duration: 1s;
       animation-direction: alternate;
       animation-timing-function: ease-in-out;

        animation-iteration-count: infinite;
        cursor: pointer;
  }
  @keyframes example {
    from {background-color:#fff;}
    to   {background-color:#79589F;}
  }
  </style>
@stop
@section('content')

<section class="selection">
  <div class="row mt">
  <div class="col-md-12">
    <div class="row mt">
      <h2 class="violet text-center">Select Customer Type</h2>
      <div class="">

      </div>
      <div class="row mt">
        <div class="col-md-3 col-md-offset-2 hoverable" data-target ="create">
        <div class="content-panel">
           <div class="panel-heading">
            <h2 style="padding-bottom:50px" class="violet text-center">New User <br/><i class="fa fa-user fa-5x" > </i></h2>
           </div>
        </div></div>
        @if(count($customers) >0)
        <div class="col-md-3 col-md-offset-1 hoverable" data-target="registered">
         <div class="content-panel">
           <div class="panel-heading">
            <h2 style="padding-bottom:50px" class="violet text-center">Existing User <br/><i class="fa fa-user fa-5x" > </i></h2>
           </div>
        </div></div>
        @endif
      </div>
    </div>
    </div>
    </div>
</section>



<section class="create">
  <div class="row mt">
  <div class="col-md-10 col-md-offset-1">
    <div class="row mt">
        <div class="form-panel">
           <h2 class="violet"><i class="fa fa-angle-right"></i> Customer Information</h2>
            <div class=" form">
              <div class="cmxform form-horizontal style-form" id="customerform">
                <div class="row" >
                  <div class="col-md-4 ">
                    <input type="text" name="firstname" class="form-control input input-lg input-white text-center" placeholder="Firstname"  required="true" /> 
                  </div>
                  <div class="col-md-4 ">
                    <input type="text" name="middlename" class="form-control input input-lg input-white text-center" placeholder="Middlename"  required="true"/>  
                  </div>
                  <div class="col-md-4 ">
                    <input type="text" name="lastname" class="form-control input input-lg input-white text-center" placeholder="Lastname" required="true" />  
                  </div>
                </div>
                <br style="clear:both;"/>
                  <input type="email" name="email" class="form-control input input-lg input-white text-center" placeholder="Email Address"  /> 
                <br style="clear:both;"/>
                  <input type="text" name="address" class="form-control input input-lg input-white text-center" placeholder="Address"  />  
                <br style="clear:both;"/>
                  <input type="text" name="telephone" class="form-control input input-lg input-white text-center" placeholder="Telephone Number"  />  
                <br style="clear:both;"/>
                  <input type="text" name="cellphone" class="form-control input input-lg input-white text-center" placeholder="Cellphone Number"  />  
                <br style="clear:both;"/>     
                   <h2 class="violet"><i class="fa fa-angle-right"></i> Order Information</h2>
                <span class="col-md-4">
                  Delivery Date
                </span>
                </span class="col-md-8"> 
                    <input class="form-control opacity5 text-center"  id="deliverydate" name="deliverydate" size="16" type="date" value="" placeholder="Delivery Date" min="{{date('Y-m-d')}}" required>
                </span>
                <br style="clear:both;"/>    
                  <textarea ="" class="form-control" style="resize:none;" id="details" placeholder="Details" name="Order Details" cols="30" rows="10"></textarea>
                <br style="clear:both;"/>  
                <div class="row">
                  <div class="col-md-6"><button class="btn-lg btn-block col-md-6 btn-theme btn_next">Next</button></div>
                  <div class="col-md-6"><button class="btn-lg btn-block col-md-6 btn-danger btn_back">Back</button></div>
                </div>
                </div>
            </div>
      </div>
    </div>
    </div>
    </div>
</section>

<section class="registered ">
<div class="row mt">
  <div class="col-md-10 col-md-offset-1">
    <div class="row mt">
      <div class="content-panel">
        <div class="content-head">
          <h2 class="violet"><i class="fa fa-angle-right"></i> Create new Customer Order</h2>
        </div>
        <ul>
          <li>*To add products to the order, drag the product into the cart.</li>
          <li>*Please set the quantity of the products ordered before submitting.</li>
          <li>*After all products and quantities are set. Press submit to process the order.</li>
        </ul>
      </div>
    </div>
    <div class="row mt">
      <div class="col-md-12">
              <div class="form-panel">
                <h4 class='violet'><i class="fa fa-angle-right"></i> Customer Information  </h4>
                  <div class=" form">
                    <div class="cmxform form-horizontal style-form">
                     <div class="form-group ">
                        <label for="name" class="control-label col-lg-2">Customer Name*</label>     
                        <div class="col-lg-10">
                            <select class="selectize" name="customer_id" id="customer_id">
                              <option value="" disabled selected>Select or Type Customer name</option>
                              @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->getName()}} [{{$customer->id}}]</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                  <div class="form-group ">
                    <label for="name" class="control-label col-lg-2">Delivery Date*</label>     
                    <div class="col-lg-10"><input class="form-control opacity5"  id="registerddeliverydate" name="deliverydate" size="16" type="date" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" required></div>
                  </div>
                   <div class="form-group ">
                      <label for="details" class="control-label col-lg-2">Description*</label>    
                        <div class="col-lg-10"><textarea ="" class="form-control" style="resize:none;" id="details" placeholder="Details" name="details" cols="50" rows="10"></textarea></div>
                        <br/>
                        <div class="col-md-6"><button class="btn-lg btn-block col-md-6 btn-theme btn_next">Next</button></div>
                        <div class="col-md-6"><button class="btn-lg btn-block col-md-6 btn-danger btn_back">Back</button></div></div>

                  </div>

            </div>

        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<section class="order">
    <div class="row mt">
      <div class="col-md-6">
        <div class="content-panel panel-info">  
          <div class="panel-heading">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              Products: Move to cart
                <span class="pull-right">
                  <button class="btn btn-theme btn-xs" id="btn_submit" >Submit</button>
                   <button class="btn btn-danger btn-xs" id="btn_back2" >Back</button>
                </span>
          </div>
          <form data-token="{{ csrf_token() }}" method="post" action="{{route('order.ajaxstore')}}" id="form" data-route="{{route('order.ajaxstore')}}">
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
          </div>
          </form>
        </div>
      </div>

    <div class="col-md-6 ">
      <div class=" content-panel panel-success">
        <div class="panel-heading">Cart: <span class="violet text-center" id="sortable2-helper"></span></div>
        <div class="panel-body"><ul id="sortable2" class="droptrue"></ul></div>
      </div>
    </div>

    </div>
</section>
@stop



@section('script')
<script type="text/javascript">
  
  $(document).ready(function(){
      var target_raw = "";
      $('.registered').hide(0);
      $('.create').hide(0);
      $('.order').hide(0);
      $('#btn_submit').click(function(e){
        e.preventDefault();
        var data = [];
        var deliverydate = $('#deliverydate').val();
        var customerdata = {};
          if(target_raw == 'create'){
              $('#customerform').find('input').each(function(index,obj){
                customerdata[$(obj).attr("name")]= $(obj).val();
              });
            }else if(target_raw == 'registered'){
              customerdata['id'] = $('#customer_id').val();
              deliverydate = $('#registerddeliverydate').val();
            }

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
              $.post(route,
                  {
                    details : $('#details').val() ,
                    data: data ,
                    deliverydate :deliverydate,
                    _token: _token,
                    type: target_raw,
                    customerdata: customerdata,
                  } ,function(e){
                    console.log(e);
                    swal(e);
               },'JSON');
               

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
             $('#sortable1').css('height' , $('#sortable2').css('height'));
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
      $('.datepicker').datepicker({minDate: '1d'});
      $('.hoverable').click(function(e){
        $('.selection').slideUp("fast");
   target_raw = $(this).data('target');
        var target = "." + $(this).data('target');
        $(target).slideDown("slow");
      });
      
      $('.btn_next').click(function(e){
           $('.' + target_raw).slideUp("fast");
          $('.order').slideDown("slow");
      });
       $('.btn_back').click(function(e){
          $('.' + target_raw).slideUp("fast");
          $('.selection').slideDown("slow");
      });
       $('#btn_back2').click(function(e){
        $('.order').slideUp("fast");

        $('.' + target_raw).slideDown("slow");
       });

      //$('#deliverydate').datepicker({"minDate": new Date()});
     // $('#deliverydate').datepicker("option", "showAnim","drop");
     //  var m = new Date().getMonth() + 1;
     //  var d = new Date().getDate();
     //  var y = new Date().getFullYear();
     //  var datestring = m +"/" + d + "/"+ y;
     // $('#deliverydate').val(datestring); 
  });
</script>
@stop
