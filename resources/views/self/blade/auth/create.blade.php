@extends('default.layout.cleanlayout')

@section('header')
<style type="text/css">
.shadow{
	  text-shadow: -2px 2px #DADADA;
	  color:white;
	  font-size: 100px;
}
.input-white{
	color:white;
}
</style>
@stop

@section('content')
 <div class=" blurlogin">
<div class="col-md-12 col-md-12 login-header">
	<div class="row mt">
		<div class="col-md-6 col-md-offset-3">
			<div>
				{!! Form::open(['route' => 'user.store' , 'method' => 'post']) !!}
				<br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/>
				<br style="clear:both;"/>
				<br style="clear:both;"/>
				<h1 class="text-center shadow">User Registration</h2>
				<h4 class="text-center">{{env('APP_TITLE')}}</h3>
				<br style="clear:both;"/>
				<div class="row">
					<div class="col-md-4 ">
						<input type="text" name="firstname" class="form-control input input-lg input-white text-center" placeholder="Firstname"  required="true" />	
					</div>
					<div class="col-md-4 ">
						<input type="text" name="middlename" class="form-control input input-lg input-white text-center" placeholder="Middlename"  required="true"/>	
					</div>
					<div class="col-md-4 ">
						<input type="text" name="lastname" class="form-control input input-lg input-white text-center" placeholder="Lastname" required="true" />	
					</div>
				</div>
				<br style="clear:both;"/>
				<input type="email" name="email" class="form-control input input-lg input-white text-center" placeholder="Email Address"  required="true"/>	
				<br style="clear:both;"/>
				<input type="text" name="username" class="form-control input input-lg input-white text-center" placeholder="Username"  required="true"/>	
				<br style="clear:both;"/>
				<input type="password"  name="password" class="form-control input input-lg input-white text-center" placeholder="Password"  required="true"/>
				<br style="clear:both;"/>
				<input type="password"  name="confirmpassword" class="form-control input input-lg input-white text-center" placeholder="Confirm Password"  required="true"/>
				<br style="clear:both;"/>
				<select class="form-control input input-lg text-center input-white" style="background:transparent;" name="usergroup_id">
					@foreach($usergroups as $ug)
						<option alt="{{$ug->description}}" title="{{$ug->description}}" class="form-control" style="backround:white;color:black;" value="{{$ug->id}}">{{$ug->name}}</option>
					@endforeach
				</select>
				<br style="clear:both;"/>
				<div class="btn-group btn-group-justified">
						  <div class="btn-group">
						    <button type="submit" class="btn btn-theme btn-lg"><i class="fa fa-sign-in"></i> Register</button>
						  </div>
						  <div class="btn-group">
						    <a  href="{{route('default.home')}}"	class="btn btn-theme04 btn-lg"><i class="fa fa-user"></i> Cancel</a>
						  </div>
						</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
</div>
@stop