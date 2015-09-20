@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8">
        <div class="row mt">
            	<div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('product.compute')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Order Ingredients for product</h2>
                            <hr>
                          
                           
                            <div class="form-group ">
                                <label for="readingdate" class="control-label col-lg-2">Product Name*</label>     
                                <div class="col-lg-10">
                                  {!! Form::select('product_id' , $products, '' , ['class' => 'selectize ' , 'id' => 'products' ]) !!}
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="readingdate" class="control-label col-lg-2">Product Quantity</label>     
                                <div class="col-lg-10"><input name="quantity" class="form-control input-medium " size="16" type="number" min="1" value="1"></div>
                            </div>
                            
                            <input class="btn btn-theme" type="submit" value="Submit" id="btn_submit">
                            <input class="btn btn-theme04" type="submit" value="Reset">
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-4">
      <div class="row mt">
        <div class="form-panel">
          <table>

          </table>
        </div>
      </div>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
      $('#products').on('change' , function(){
        //swal($(this).val());
      });
  });
</script>
@stop