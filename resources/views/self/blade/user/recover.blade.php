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
				{!! Form::open(['route' => 'auth.recover' , 'method' => 'post']) !!}
				<br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/>
				<br style="clear:both;"/>
				<br style="clear:both;"/>
				<h3 class="text-center shadow">Account security settings</h3>
				<h4 class="text-center">Fill up the following fields to protect your account.</h3>
				<br style="clear:both;"/>
				
				<input type="hidden" value="{{$user->id}}" name="id" readonly>
				<input type="password"  name="password" class="form-control input input-lg input-white text-center" placeholder="New password"  required="true"/>
				<br style="clear:both;"/>
				<input type="password"  name="confirmpassword" class="form-control input input-lg input-white text-center" placeholder="Confirm new password"  required="true"/>
				
				
				<br style="clear:both;"/>
				<div class="btn-group btn-group-justified">
						  <div class="btn-group">
						    <button type="submit" class="btn btn-theme btn-lg"><i class="fa fa-sign-in"></i> Save</button>
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