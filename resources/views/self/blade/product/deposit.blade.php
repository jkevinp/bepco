@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <h2 class="violet"><i class="fa fa-angle-right"></i> Deposit Product</h2>
                <div class='row mt'>
                    <div class="col-md-12">
                        <span class="col-md-8"> <i class="fa fa-info "></i> Deposit product stores the given quantity of item to the storage.</span>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <div class="cmxform form-horizontal style-form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">{{$item->name}}</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Item Code*</label>     
                                <div class="col-lg-10"><input value="{{$item->id}}" readonly name="name" class="form-control input-medium " required="" type="text"></div>
                            </div>
                            <div class="form-group ">
                                <label for="quantity" class="control-label col-lg-2">Available Quantity*</label>     
                                <div class="col-lg-10"><input  name="quantity" id="available_quantity" readonly class="form-control input-medium " size="16" value="{{$item->quantity}}" required="" type="number" min="1" max="{{$item->quantity}}"></div>
                            </div>
                            <div class="form-group ">
                                <label for="details" class="control-label col-lg-2">Description*</label>        
                                <div class="col-lg-10"><textarea readonly class="form-control" style="resize:none;" id="details" placeholder="Details" name="details" cols="50" rows="10">{{$item->description}}</textarea></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
        </div>
    </div>
      <div class="col-md-6">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form" id="form_withdraw"  method="post" action="{{route('product.process.deposit')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Deposit Information</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Item Name*</label>     
                                <div class="col-lg-10"><input id="deposit_item" value="{{$item->name}}" readonly name="name" class="form-control input-medium " required="" type="text"></div>
                            </div>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Item Code*</label>     
                                <div class="col-lg-10"><input value="{{$item->id}}" readonly=""  name="id" class="form-control input-medium " required="" type="text"></div>
                            </div>
                              <div class="form-group ">
                                <label for="quantity" class="control-label col-lg-2">Deposit Quantity*</label>     
                                <div class="col-lg-10"><input id="deposit_quantity"  name="quantity" class="form-control input-medium " size="16" value="0" required="" type="number" min="1" ></div>
                            </div>
                            <div class="form-group ">
                                <label for="details" class="control-label col-lg-2">Description/Purpose*</label>        
                                <div class="col-lg-10"><textarea required  class="form-control" style="resize:none;" id="details" placeholder="Details" name="details" cols="50" rows="8" min="10"></textarea></div>
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value="">
                            <input class="btn btn-theme" type="submit" value="Deposit" id="btn_submit">
                            <input class="btn btn-theme04" type="submit" value="Reset">

                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@stop


@section('script')
<SCRIPT TYPE="text/javascript">
    $(document).ready(function(){
        var ajaxUserUrl = "{{route('ajax.get.user')}}";

        $('#btn_submit').click(function(e){
            var form = $(this);
            e.preventDefault();
            swal({   
                title: "Halt! We need your Id and password",   
                text: "Please scan your Identification card barcode",   
                type: "input",   
                showCancelButton: true,   
                closeOnConfirm: false,   
                animation: "slide-from-top",   
                inputPlaceholder: "Scan your barcode ID" }
                , function(inputValue){   
                    if (inputValue === false) return false;      
                    if (inputValue === "") { swal.showInputError("Please scan your barcode ID to continue");     return false   }      
                    $.get(ajaxUserUrl , {id: inputValue} ,function(data){
                        console.log(data.status);
                        if(data.status === "error")
                        {
                            swal('User not found!' , "The user identification code you provided does not match with any user registered in the system" , "error");
                        }else
                        {
                            var remaningQty = parseInt( $('#available_quantity').val()) + parseInt($('#deposit_quantity').val()) ;
                            $('#user_id').val(data.result.id);
                            swal({   
                                title: "User found: " + data.result.firstname + " " + data.result.middlename + " " + data.result.lastname ,   
                                text: "Continue Deposit of " + $('#deposit_item').val() + "? \n New Quantity : " + remaningQty,  
                                type: "warning",   
                                 showCancelButton: true,   
                                 confirmButtonColor: "#DD6B55",   
                                 confirmButtonText: "Deposit",   
                                 cancelButtonText: "Cancel",   
                                 closeOnConfirm: false,   
                                 closeOnCancel: false 
                             }, function(isConfirm){
                                if (isConfirm) {  
                                    $('#form_withdraw').unbind('submit').submit();
                                } 
                                else {     swal("Cancelled", "The Deposit proccess has been cancelled", "error");   } 
                            });
                        }
                    });//end get
                });
        });//end btn_submit
    });//end docready

</SCRIPT>
@stop