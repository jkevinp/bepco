@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
            	<div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('supplieritem.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Assign Supplied Item</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Supplier Name*</label>     
                                <div class="col-lg-10">
                                    <select name="supplier_id" class="selectize">
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-2">Item to supply*</label>     
                                <div class="col-lg-10">
                                    <select name="item_id" class="selectize">
                                        @foreach($items as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
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