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
td{
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
					<br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/>
					<br style="clear:both;"/>
					<br style="clear:both;"/>
					<h1 class="text-center shadow">Back Up Manager</h2>
					<h4 class="text-center">{{env('APP_TITLE')}}</h3>
					<br style="clear:both;"/>
					<table class="table table-hover table-bordered">
					<thead>
						<th class="input-white">File <span class="label label-info label-mini">{{count($files)}}</span></th>
						<th>File Type</th>
						<th>Date Changed</th>
						<th>Size</th>
					</thead>
						
					@foreach($files as $file)
						 <tr>
						 	<td  ><a href="{{route('site.download.file' , $file->getBaseName())}}" class="btn btn-theme ">{{$file->getBaseName()}}</a></td>
						 	<td>{{$file->getExtension ()}}</td>
						 	<?php
						 	?>
						 	<td>{{ date("Y-m-d H:i:s",$file->getCTime())}}</td>
						 	<td>{{$file->getSize() }}</td>
						 </tr>
					@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop