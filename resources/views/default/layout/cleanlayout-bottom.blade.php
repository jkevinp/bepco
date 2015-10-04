
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
          $('.selectize').selectize();
          $('select.styled').customSelect();
        });
    </script>
  </body>
</html>