

@extends('default.layout.layout')

@section('header')
<style type="text/css">
.console {
  font-family:Courier;
  color: #009900 !important;
  background: #000000 !important;
   outline: 0;
  padding: 10px;

}

</style>
@stop

@section('content')
<section class="wrapper site-min-height">
  <div class="row mt">
    <div class="col-lg-12">
      <div class="row content-panel">
        <h2 class='violet'>Control Panel</h2>
        <hr/>
        <div class="col-md-6 col-md-offset-3" editable="true">
          <div  class="console" style="overflow-y:scroll;height:500px;width:100%;" id="console" data-route="{{route('cpanel.shell.cmd')}}">
            
          </div>
        </div>
      </div><!-- /row -->    
    </div><! --/col-lg-12 -->
  </div><! --/container -->
</section><! --/wrapper -->
@stop

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#console').append('<input type="text" class="console-input" style=" outline: 0;border:0; background: #000000 !important;width:100%" id="console-line-1"> ');
      $('#console-line-1').focus();
      $('#console').on('keydown', function (e) {
       var key = e.keyCode;
       

       // if(key == 13)  // the enter key code
       //  {
          
       //     return false;
       //  }else if (key == 8  || key == 46){
       //    if(consoleText[consoleText.length-1].length > 8){
           
       //      return true;
       //    }
       //    return false;
       //  }
      }); 

      $('body').delegate(".console-input" ,'keydown' ,function(e){
          var key = e.keyCode;
          console.log('entered');
          var consoleLen = $('.console-input').length;
          var uri = $('#console').data('route');
          var myDiv = $('#console');
          if($(this).val() == 'clear'){
            $('.result').fadeOut();
             myDiv.animate({ scrollTop: myDiv.prop("scrollHeight") });
                 $('#console').append("\n" + ' <input type="text" class="console-input" style=" outline: 0;border:0;width:100%; background: #000000 !important;" id="console-line-'+ (consoleLen +1) + '">');
                $('#console-line-' + (consoleLen + 1) ).focus();
          }
          if(key == 13){  
              $.get(uri , {text : $(this).val()}, function(t){
                if(t.length){
                     var parse = t;
                  // var parse = t.replace('\\n' ,'<br/>');
                  // console.log(parse);
                  y = t.split("\n").length;
                  $('#console').append( "<textarea disabled class='result' rows='" + (y) + "' style='border:0;outline:0;width:100%;whitespace:pre;overflow:hidden;resize:none;background:#000000;'>" + parse);
                  myDiv.animate({ scrollTop: myDiv.prop("scrollHeight") });
                 $('#console').append("\n" + ' <input type="text" class="console-input" style=" outline: 0;border:0;width:100%; background: #000000 !important;" id="console-line-'+ (consoleLen +1) + '">');
                $('#console-line-' + (consoleLen + 1) ).focus();

                }
             
              });
             
            
              return false;
          }
      });


    });

  </script>

@stop

