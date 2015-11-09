@extends('default.layout.cleanlayout')

@section('script')
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

<div class="blurlogin">
	<div class="col-md-12 col-md-12 login-header">
		<div class="row mt">
			<div class="col-md-6 col-md-6 col-md-offset-3">
				<div>
					{!! Form::open(['route' => 'auth.login' , 'method' => 'post' , 'autocomplete' => 'off']) !!}
					<br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/>
					<br style="clear:both;"/>
					<br style="clear:both;"/>
					<h1 class="text-center shadow">User Login</h2>
					<h4 class="text-center">{{env('APP_TITLE')}}</h3>
					<br style="clear:both;"/>
					<input type="text" name="username" autocomplete="off" class="form-control input input-lg input-white text-center" placeholder="Username" />	
					<br style="clear:both;"/>
					<input type="password"  name="password" autocomplete="off" class="form-control input input-lg input-white text-center" placeholder="Password" />
					<br style="clear:both;"/>	
					<div class="btn-group btn-group-justified">
						<div class="btn-group">
						    <button type="submit" class="btn btn-theme btn-lg"><i class="fa fa-sign-in"></i> Login</button>
						</div>
						<div class="btn-group">
						    <a href="{{route('user.forgotpassword')}}" class="btn btn-theme btn-lg"><i class="fa fa-send"></i> Forgot Password</a>
						</div>
						<div class="btn-group">
						    <a  href="{{route('user.create')}}"	class="btn btn-theme btn-lg"><i class="fa fa-user"></i> Register</a>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop