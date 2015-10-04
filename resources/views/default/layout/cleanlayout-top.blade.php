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
    <link rel="shortcut icon" href="{{ asset($env) }}/img/icons/favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset($env)}}/css/bootstrap.css" rel="stylesheet" />
    <link href="{{URL::asset($env)}}/css/selectize.css" rel="stylesheet" />
    <link href="{{URL::asset($env)}}/css/bootstrap-fileupload.css" rel="stylesheet" />
    <!--external css-->
    <link href="{{URL::asset($env)}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset($env)}}/js/gritter/css/jquery.gritter.css" />   
    <!-- Custom styles for this template -->
    <link href="{{URL::asset($env)}}/css/style.css" rel="stylesheet" />
    <link href="{{URL::asset($env)}}/css/style-responsive.css" rel="stylesheet" />
    <link href="{{URL::asset('default')}}/css/table-responsive.css" rel="stylesheet" />
    <link href="{{URL::asset($env)}}/css/lightbox.css" rel="stylesheet" />
    <link href="{{URL::asset('libs')}}/css/sweetalert.css" rel="stylesheet" />

    
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
   