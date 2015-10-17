@extends('default.layout.layout')
@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="row mt">
            <div class="form-panel">
                <div class=" form">
                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h2 class="violet">Product Barcode List<span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                        <table class="table table-stripe table-hover">
                        <thead>
                            <th>Barcode ID</th>
                                <th>Barcode Key</th>
                                <th>Assigned Product</th>
                                <th>ImageUrl</th>
                                <th>Actions</th>
                        </thead>
                        @foreach($files as $file)
                            <tr>
                                <td>{{$file->id}}</td>
                                <td>{{$file->barcodekey}}</td>
                                <td>{{$file->product->name}}</td>
                                <td><a href="{{$file->imageurl}}" target="_blank">{{$file->imageurl}}</a></td>
                                <td>
                                    <a href="{{$file->imageurl}}" rel="lightbox" title="{{$file->barcodekey}}" class="btn btn-theme btn-xs"><i class="fa fa-eye"></i></a>
                                    <button data-route="/{{$file->id}}" title="print {{$file->barcodekey}}" class="btn btn-success btn-xs btnprint" ><i class="fa fa-print"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script TYPE="text/javascript">
        $(document).ready(function(){
            $('.btnprint').click(function(e){
                e.preventDefault();
                var me = $(this);
                swal({
                    title : "Print barcode images",
                    text  : "Enter the how many should we print?",
                    type: "input",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    animation: "slide-from-top",
                    inputPlaceholder: "Write something"
                },function(input){
                    if (input === false) return false;
                    if (input === "") {
                        swal.showInputError("Please enter quantity to be printed");
                        return false
                    }else{
                        window.location.assign(me.data('route')+ "/" + input);
                    }
                });
            });
        });
    </SCRIPT>   
@stop