@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel"> 
            <h2 class="violet"><i class="fa fa-angle-right"></i> Supplier List</h2>
            <div class='row mt'>
              <div class="col-md-12">
                  <span class="col-md-8">
                    <i class='fa fa-info '></i> 
                   Supplier List contains information about Suppliers where we can order our raw item/materials.
                </span>
                 <a href="{{route('supplier.create')}}" class="btn btn-theme btn-lg col-md-3 col-md-offset-1 pull-right"><i class="fa fa-plus"></i> Create new Supplier</a>
              </div>
            </div>
            <hr>
            <table class="table table-striped table-advance table-hover table-bordered">
              <thead>
              <tr>
                  <th><i class="fa fa-bullhorn"></i>Supplier ID</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Supplier Name</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Description</th>
                  <th>Items</th>
                  <th><i class="fa fa-bookmark"></i>Status</th>
                  <th><i class=" fa fa-edit"></i> Actions</th>
              </tr>
              </thead>
              <tbody>
              @if(count($suppliers) === 0)
                <td colspan="8">No Suppliers found</td>
              @endif

              @foreach($suppliers as $supplier)
              <tr>
                  <td><a href="#">{{$supplier->id}}</a></td>
                  <td> <span class="">{{$supplier->name}}</span></td>
                  <td> <span class="violet"><a href="#">{{$supplier->description}}</a></span> </td>
                  <td> 
                    @foreach($supplier->supplieritem as $item)
                      {{$item->item->name}} <br/>
                    @endforeach
                  </td>
                  <td>
                    @if($supplier->status =='activated')
                      <span class="label label-success">
                    @else
                      <span class="label label-warning">
                    @endif
                    {{$supplier->status}}
                  </span>
                  </td>
                  <td>
                    <a href='' title="add item supplied by {{$supplier->name}}" class='btn btn-xs btn-theme'><i class="fa fa-plus"></i></a>
                    <a href='' title="view {{$supplier->name}}" class='btn btn-xs btn-theme03'><i class="fa fa-eye"></i></a>
                    <a href='' title="edit {{$supplier->name}}" class='btn btn-xs btn-theme02'><i class="fa fa-edit"></i></a>
                  </td>
              </tr>
             </tbody>
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