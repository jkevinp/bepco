<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <title>@yield('title'){{env('APP_TITLE', 'BEPC')}}</title>
    <?php 
      $env = 'default';
      if(Auth::user()){
        if(Auth::user()->usergroup == 'admin')
            $env = 'default';
        else if(Auth::user()->usergroup == 'homeowner')
            $env = 'homeowner';

      }
    ?>
    <link rel="shortcut icon" href="{{ asset($env) }}/img/icons/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset($env)}}/css/bootstrap.css" rel="stylesheet">
    <link href="{{URL::asset($env)}}/css/selectize.css" rel="stylesheet">
    <link href="{{URL::asset($env)}}/css/bootstrap-fileupload.css" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::asset($env)}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset($env)}}/js/gritter/css/jquery.gritter.css" />   
    <!-- Custom styles for this template -->
    @if(bepc\Models\Setting::where('keyname', '=' , 'theme')->first()->value == 'yellow')
    <link href="{{URL::asset($env)}}/css/style-yellow.css" rel="stylesheet">
    @elseif(bepc\Models\Setting::where('keyname', '=' , 'theme')->first()->value == 'blue')
    <link href="{{URL::asset($env)}}/css/style-blue.css" rel="stylesheet">
    @else
    <link href="{{URL::asset($env)}}/css/style.css" rel="stylesheet">
    @endif
    <link href="{{URL::asset($env)}}/css/style-responsive.css" rel="stylesheet">
    <link href="{{URL::asset('default')}}/css/table-responsive.css" rel="stylesheet">
    <link href="{{URL::asset($env)}}/css/lightbox.css" rel="stylesheet">
    <link href="{{URL::asset('libs')}}/css/sweetalert.css" rel="stylesheet">
     <link href="{{URL::asset('libs')}}/css/custom.css" rel="stylesheet">

    
    @yield('header')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <section id="container" >
    @include('default.layout.topbar')
    @include('default.layout.sidebar')
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-12 col-md-6 col-sm-12">
            @yield('content')
            @yield('modal')
          </div>
        </div>
      </section>
    </section>
    <!--footer start-->
       <footer class="site-footer black-bg" style="position:fixed;bottom:0;left:0;right:0;">
          <div class="text-center">{{env('APP_TITLE' ,'BEPC')}}
             
              <a href="" class="go-top">
                <i class="fa fa-angle-up"></i>
              </a>
               <span class="pull-left" style="margin-left:10px;" id="time">
                 
                 </span>
          </div>
      </footer>
      <!--footer end-->
  </section>
    <!-- footer js-->
    <script type="text/javascript" src="{{URL::asset($env)}}/js/jquery.js"></script>
    <script type="text/javascript" src="{{URL::asset($env)}}/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="{{URL::asset($env)}}/js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="{{URL::asset($env)}}/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="{{URL::asset($env)}}/js/jquery.nicescroll.js"></script>

    <!--common script for all pages-->
    <script type="text/javascript" src="{{URL::asset($env)}}/js/common-scripts.js"></script>
    <!--script for this page-->
    <script type="text/javascript" src="{{URL::asset($env)}}/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="{{URL::asset($env)}}/js/gritter-conf.js"></script>
    <!--script for this page-->
    <script type="text/javascript" src="{{URL::asset($env)}}/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!--custom switch-->
    <script type="text/javascript" src="{{URL::asset($env)}}/js/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script type="text/javascript" src="{{URL::asset($env)}}/js/selectize.min.js"></script>
    <script type="text/javascript" src="{{URL::asset($env)}}/js/jquery.tagsinput.js"></script>
    <script type="text/javascript" src="{{URL::asset($env)}}/js/bootstrap-fileupload.js"></script> 
    <script src="{{URL::asset($env)}}/js/lightbox.min.js"></script>
    <script src="{{URL::asset($env)}}/js/bootbox.min.js"></script>
    <script type="text/javascript" src="{{URL::asset($env)}}/js/form-component.js"></script>
    {!! Html::script('links.js')  !!}
    <!-- dates -->
    {!! Html::script($env.'/js/date/date.js')  !!}
    {!! Html::script($env.'/js/date/bootstrap-datepicker.js')  !!}
    {!! Html::script($env.'/js/date/bootstrap-datetimepicker.js')  !!}
    {!! Html::script($env.'/js/date/daterangepicker.js')  !!}
    {!! Html::script($env.'/js/date/moment.min.js')  !!}
    {!! Html::script($env.'/js/date/bootstrap-timepicker.js')  !!}
    {!! Html::script($env.'/js/advanced-form-components.js')  !!}
    {!! Html::script('libs/js/sweetalert.min.js')  !!}
    
    <!--footer js end-->
    @if(isset($errors) && ($errors->first()))
      <script type="text/javascript">
        var x= "{{$errors->first()}}";
        if(x !== "")
        {
        $(document).ready(function () {
          var unique_id = $.gritter.add({
            title: '<font color="red">Error!</font><hr>',
            text: x,
            image: '{{URL::asset("homeowner/img/icons/")}}/close.png',
            sticky: false,
            time: '',
            class_name: 'my-sticky-class'
            });
        });
        }
       
    </script>
    @endif

     @if(Session::get('flash_message'))
        <script type="text/javascript">
        var xx= "{{Session::pull('flash_message')}}";
        $(document).ready(function () {
          var iunique_id = $.gritter.add({
            title: '<font color="yellow">Notification</font><hr>',
            text: xx,
            image: '{{URL::asset("homeowner/img/icons/")}}/notification.png',
            sticky: false,
            time: '',
            class_name: 'my-sticky-class'
            });
        });
    </script>
    @endif

    @yield('script')





    
     <script type="text/javascript">
   
       $(document).ready(function () {  
        
        setInterval(function(){$('#time').text("DateTime: " +new Date($.now()).toUTCString());}, 1000);


          if($('.selectize').length)$('.selectize').selectize();
         if($('select.styled').length) $('select.styled').customSelect();
          
        });
    </script>
  </body>
</html>