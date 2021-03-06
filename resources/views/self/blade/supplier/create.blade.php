@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
            	<div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('supplier.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Create new Supplier</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Supplier Name*</label>     
                                <div class="col-lg-10"><input  name="name" class="form-control input-medium " required="" type="text"></div>
                            </div>
                            <div class="form-group ">
                                <label for="details" class="control-label col-lg-2">Description*</label>		
                                <div class="col-lg-10"><textarea ="" class="form-control" style="resize:none;" id="details" placeholder="Details" name="details" cols="50" rows="10"></textarea></div>
                            </div>
                            <div class="form-group ">
                                <label for="barcodekey" class="control-label col-lg-2">Status*</label>     
                                <div class="col-lg-10">
                                    <select name="status" class="selectize">
                                        <option value="activated">Activated</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <input class="btn btn-theme" type="submit" value="Submit">
                            <input class="btn btn-theme04" type="submit" value="Reset">
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@stop