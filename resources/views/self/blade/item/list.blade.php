@extends('default.layout.layout')

@section('content')
 <form action="{{route('report.generate')}}" method="post">
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel"> 
            <h2 class="violet"><i class="fa fa-angle-right"></i> Item List</h2>
            <div class='row mt'>
              <div class="col-md-12">
                  <span class="col-md-8">
                    <i class='fa fa-info '></i> 
                   Item List contains information about all Raw items and maintenance products that are used to create and maintain several products such as Chemical Agents,Eggs and Chemical Supplies
                </span>
                 <a href="{{route('item.create')}}" class="btn btn-theme btn-lg col-md-3 col-md-offset-1 pull-right"><i class="fa fa-plus"></i> Create New Item</a>
              </div>
            </div>
            <hr>
            <table class="table table-striped table-advance table-hover table-bordered">
              <thead>
              <tr>
                  <th><input type="checkbox" id="check_all"></th>
                  <th>Item ID</th>
                  <th>Item Name</th>
                  <th>Category</th>
                  <th>Item Description</th>
                  <th>Avialable  Quantity</th>
                  <th>Item Safe Stock</th>
                  <th>Reorder Quantity</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @if(count($items) === 0)
                <td colspan="8">No Items found</td>
              @endif
              @foreach($items as $item)
              <tr> 

                  <td><input type="checkbox" class="check_list_id" name="check_list[]" value="{{$item->id}}"></td>
                  <td>{{$item->id}}</td>
                  <td> <span class="">{{$item->name}}</span></td>
                  <td> <span class="">{{$item->itemgroup->name}}</span></td>
                  <td> <span class="violet"><a href="#">{{$item->description}}</a></span> </td>
                  <td>{{number_format($item->quantity)}}</td>
                  <td>{{$item->alert_quantity}}</td>
                  <td>{{$item->safe_quantity}}</td>
                  
                  <td>
                    @if(($item->quantity <= $item->safe_quantity) && $item->quantity > 0)
                      <span class="label label-warning">CRITICAL</span>
                    @elseif(($item->quantity <= $item->safe_quantity))
                      <span class="label label-danger">OUT OF STOCK</span>
                    @else
                      <span class="label label-success">GOOD</span>
                    @endif
                  </td>
                  <td>
                        <a href="{{route('item.edit' , [$item->id , $item->name])}}" class="btn btn-xs btn-primary  " title="edit {{$item->name}}"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-xs btn-danger " title="delete {{$item->name}}"><i class="fa fa-trash-o "></i></button>
                        <a class="btn btn-xs btn-theme02 ingredient  showdetails" data-id="{{$item->id}}" title="view ingredients for {{$item->name}}"  href="#showdetails{{$item->id}}" data-toggle="modal" data-target="showdetails{{$item->id}}" ><i class="fa fa-eye"></i></a>
                       @if($item->quantity <= 0 )
                        <a class="btn btn-xs btn-theme03" data-id="{{$item->id}}" disabled title="Withdraw {{$item->name}}" href="{{route('item.withdraw' , $item->id)}}"> <i class="fa fa-share"></i> </a>
                        @else
                         <a class="btn btn-xs btn-theme03" data-id="{{$item->id}}"  title="Withdraw {{$item->name}}" href="{{route('item.withdraw' , $item->id)}}"><i class="fa fa-share"></i></a>
                      @endif
                        <a class="btn btn-xs btn-theme04"  title="Deposit {{$item->name}}" href="{{route('item.deposit' , $item->id)}}"><i class="fa fa-reply"></i></a>
                        <a class="btn btn-xs btn-default"  title="Order {{$item->name}}"  href="{{route('item.deposit' , $item->id)}}" ><i class="fa fa-truck"></i></a>
                        <a class="btn btn-xs btn-default"  title="Setup reorder {{$item->name}}"  href="{{route('item.reorder' , $item->id)}}/auto" ><i class="fa fa-calculator"></i></a>
                  </td>
              </tr>
             </tbody>
             {{-- Modal--}}
              <div id="showdetails{{$item->id}}" class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="col-md-offset-3 col-md-6" style="top:150px;">
                          <div class="content-panel">
                            <div id="content-body">
                                <div class="">
                                 
                                   
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
            <div class="row mt">
           
            <div class="col-md-4 col-md-offset-1">
            Start Date:<input type="date" name="start_date" class='form-control' required/>
            End Date:  <input type="date" name="end_date"   class='form-control' required/>
            Report Type
            <select name="reporttype" class="form-control">
              <option value="Withdraw" >Withdrawal Report</option>
              <option value="Deposit">Deposit Report</option>
              <option value="Inventory">Inventory Report</option>
            </select>
            </div>
            <div class="col-md-2">
              <input type="submit" class="btn btn-theme" value="Generate report" />
            </div>
            </div>
            <input type="hidden" name="reporttarget" value="item"/>
            <input type="hidden" name="id" value="{{$item->id}}"/>
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
        </div>

    </div>

</div>

</form>
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
           $('#check_all').click(function(){
              $('.check_list_id').click();  
           });
        });
    </script>
@stop