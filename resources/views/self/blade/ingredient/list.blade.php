@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('barcode.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Ingredients Listing<span class="pull-right"><a href="{{route('barcode.print')}}" class="btn btn-theme"><i class="fa fa-print"></i> Print</a></span></h2>
                            <table class="table table-striped table-bordered" >
                            <thead>
                                <TH>Ingredient Id</TH>
                                <TH>Ingredient name</TH>
                                <TH>Item name</TH>
                                <TH>Item Quantity</TH>
                                <TH>Description</TH>
                                <TH>Actions</TH>
                            </thead>
                            <tbody>
                            @foreach($ingredients as $r)
                            <tr>
                                <td>{{$r->id}}</td>
                                <td>{{$r->name}}</td>
                                <td>{{$r->item->name}}</td>
                                <td>{{$r->quantity}}</td>
                                <td>{{$r->description}}</td>

                                <td> 
                                     <a class="btn btn-theme ingredient btn-xs" data-id="{{$r->id}}" title='Show More Details'><i class='fa fa-eye'></i> </a>
                                </td>

                            </tr>

                           
                            <div class="form-group ingredient{{$r->id}}" style="display:none;" >
                                    <label for="readingdate" class="control-label col-lg-2">Used for Recipe</label> 
                                    <div class="col-md-12">
                                    <ul> 
                                        @foreach($r->recipe as $recipe)
                                        <li>{{$recipe}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            </tbody>
                            </table>
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
           $('a.ingredient').click(function(){
            var id = $(this).data('id');
            $('.ingredient' + id).fadeToggle();
           });
        });
    </script>
@stop



