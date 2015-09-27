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
                <br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/>
                 <br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/><br style="clear:both;"/>
                <br style="clear:both;"/>
                <br style="clear:both;"/>
                <h1 class="text-center shadow">Error 404</h2>
                <h4 class="text-center">404 not found :/</h3>
                <br style="clear:both;"/>
                <br style="clear:both;"/>   
                <div class="btn-group btn-group-justified">
                          <div class="btn-group">
                            <a href="{{route('default.home')}}" class="btn btn-theme04 btn-lg"><i class="fa fa-home"></i> Back to Home</a>
                          </div>
                        </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop