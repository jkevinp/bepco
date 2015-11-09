@extends('default.layout.layout')
@section('content')
<div class="row mt">
	<div class="col-md-12">
		<div class="content-panel">	
			<h2 class="violet"><i class="fa fa-angle-right"></i> User List</h2><hr>
			<table class="table table-striped table-advance table-hover">
			  <thead>
			  <tr>
			      <th><i class="fa fa-bullhorn"></i> User ID</th>
			      <th class="hidden-phone"><i class="fa fa-question-circle"></i>Name</th>
			      <th><i class="fa fa-bookmark"></i> Usergroup</th>
			      <th>User Credentials</th>
			      <th><i class=" fa fa-edit"></i> Status</th>
			      <th>Actions</th>
			  </tr>
			  </thead>
			  <tbody>
			  @foreach($users as $user)
			  <tr>
			      <td><a href="{{route('user.show' , [$user->id,    str_replace(' ', '-', $user->getNAme())])}}">{{$user->id}}</a></td>
			      <td class="hidden-phone">{{$user->getName()}}</td>
			      <td>{{$user->getUserGroupName()}}</td>
			    
			      <td>
			      		<div class="col-sm-4" title="">
			      			<i class="fa fa-barcode"></i>
			      		@if($user->userbarcode)
                            <i class="fa fa-check" style="color:green;"></i> 
                        @else
                          	<i class="fa fa-remove" style="color:red;"></i> 
                        @endif
                        </div>
                        <div class="col-sm-4">
                        	<i class="fa fa-credit-card"></i>
                             @if($user->useridcard)
                         	<i class="fa fa-check" style="color:green;"></i> 
                            @else
                        	<i class="fa fa-remove" style="color:red;"></i> 
                            @endif
                        </div>
                          <div class="col-sm-4">
                        	<i class="fa fa-picture-o"></i>
                             @if($user->userphoto)
                         	<i class="fa fa-check" style="color:green;"></i> 
                            @else
                        	<i class="fa fa-remove" style="color:red;"></i> 
                            @endif
                        </div>
			      </td>

			        <td>
			      	
			      		@if($user->activated == 0)
			      		<span class="label label-warning">
			      			Disabled
			      		@else
			      		<span class="label label-success">
			      			Activated
			      		@endif
			      	</span>
			      </td>
			      <td>
			      	  @if($user->userbarcode && $user->userphoto)
			          <a href="{{route('user.id' , $user->id)}}" class="btn btn-success btn-sm"><i class="fa fa-user"></i> Create ID</a>
			          @elseif($user->userbarcode && $user->userphoto)
				          @if($user->useridcard)
				          <img src="{{URL::asset('img-idcard')}}/{{$user->useridcard->filename}}" />
				          @endif
			          @endif
			          <a href="{{route('user.show' , [$user->id,    str_replace(' ', '-', $user->getNAme())])}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
			          <a 
						data-okay="Delete!" 
						data-href="{{route('user.delete', $user->id)}}" 
						data-name="Are you sure you want to DELETE {{$user->getName()}}" 
						class="changeStatus btn btn-danger btn-xs" 
						title="Delete {{$user->getName()}}"
			          ><i class="fa fa-trash-o " ></i></a>
			          @if($user->activated==0)
			          	<a data-okay="Activate" data-href="{{route('user.changeStatus', $user->id)}}" data-name="Are you sure you want to activate {{$user->getName()}}" class="changeStatus btn btn-success btn-xs" title="Activate User access"><i class="fa fa-check"></i></a>
			          @else
			          	<a data-okay="Disable" data-href="{{route('user.changeStatus', $user->id)}}" data-name="Are you sure you want to disable {{$user->getName()}}" class="changeStatus btn btn-danger btn-xs" title="Disable User access"><i class="fa fa-remove"></i></a>
			          @endif

			          @if($user->userphoto)

			          @else
			            <a href="{{route('user.upload.photo' , $user->id)}}" class="btn btn-success btn-sm"><i class="fa fa-user"></i> Upload Photo</a>
			          @endif
			          
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
	<SCRIPT TYPE="text/javascript">
	$(document).ready(function(){
		$('.changeStatus').click(function(e){
		e.preventDefault();
		var me = $(this);
		swal({   
            title: "Halt!",   
            text: me.data('name'),  
            type: "warning",   
             showCancelButton: true,   
             confirmButtonColor: "#DD6B55",   
             confirmButtonText: me.data('okay'),   
             cancelButtonText: "Cancel",   
             
         }, function(isConfirm){
            if (isConfirm) {  
             	window.location.assign(me.data('href')); 
            }
        });
	});
	});

	</SCRIPT>
@stop