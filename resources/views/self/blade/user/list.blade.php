@extends('default.layout.layout')
@section('content')
<div class="row mt">
	<div class="col-md-8 col-md-offset-2">
		<div class="content-panel">	
			<h4><i class="fa fa-angle-right"></i> User List</h4><hr>
			<table class="table table-striped table-advance table-hover">
			  <thead>
			  <tr>
			      <th><i class="fa fa-bullhorn"></i> User ID</th>
			      <th class="hidden-phone"><i class="fa fa-question-circle"></i>Name</th>
			      <th><i class="fa fa-bookmark"></i> Usergroup</th>
			      <th><i class=" fa fa-edit"></i> Status</th>
			      <th></th>
			  </tr>
			  </thead>
			  <tbody>
			  @foreach($users as $user)
			  <tr>
			      <td><a href="{{route('user.show' , [$user->id,    str_replace(' ', '-', $user->getNAme())])}}">{{$user->id}}</a></td>
			      <td class="hidden-phone">{{$user->getName()}}</td>
			      <td>{{$user->getUserGroupName()}}</td>
			      <td>
			      	<span class="label label-info label-mini">Due</span>
			      </td>
			      <td>
			      	  @if($user->userbarcode && $user->userphoto)
			          <a href="{{route('user.id' , $user->id)}}" class="btn btn-success btn-sm"><i class="fa fa-user"></i> Create ID</a>
			          @elseif($user->userbarcode && $user->userphoto)
				          @if($user->useridcard)
				          <img src="{{URL::asset('img-idcard')}}/{{$user->useridcard->filename}}" />
				          @endif
			          @endif
			           <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
			          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>

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
