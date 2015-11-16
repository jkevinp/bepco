@extends('default.layout.layout')

@section('content')
<section class="wrapper site-min-height">
  <div class="row mt">
    <div class="col-lg-12">
      <div class="row content-panel">
        <h2 class='violet'>Control Panel</h2>
        <hr/>
        <div class="col-md-6">
          <h4 class=''>Backup Manager <span class="pull-right violet"><a href="{{route('cpanel.git.cmd')}}" target="_newtab">Launch Cmd</a></span></h4>
            <a href="{{route('site.backup')}}" class="btn btn-lg btn-theme btn-block">Create Backup</a><br/>
            <a href="{{route('site.download')}}" class="btn btn-lg btn-theme btn-block">Download Backup</a><br/>
            <a href="{{route('cpanel.git.pull')}}" class="btn btn-lg btn-theme btn-block">Restore Repository</a>
        </div>
        <div class="col-md-6">
          <h4 class=''>Current Theme : {{strtoupper(bepc\Models\Setting::where('keyname', '=' , 'theme')->first()->value)}}</h4>
            <a href="{{route('setting.change' ,[bepc\Models\Setting::where('keyname', '=' , 'theme')->first()->id , 'violet'])}}" class="btn btn-lg btn-theme btn-block">Use Violet</a><br/>
            <a href="{{route('setting.change' ,[bepc\Models\Setting::where('keyname', '=' , 'theme')->first()->id , 'blue'])}}" class="btn btn-lg btn-theme btn-block">Use Blue</a><br/>
             <a href="{{route('setting.change' ,[bepc\Models\Setting::where('keyname', '=' , 'theme')->first()->id , 'yellow'])}}" class="btn btn-lg btn-theme btn-block">Use Yellow</a>
        </div>

      </div><!-- /row -->    
    </div><! --/col-lg-12 -->

   <div class="col-lg-12">
     <div class="row content-panel">
     <h2 class='violet'>Reports</h2>

      <form method='post' action='{{route("order.generate2")}}'>
      <input type="hidden" value="{{csrf_token()}}" name="_token">
          <div class=" form-panel">
            <div class="cmxform form-horizontal style-form" id="customerform">
              <div class="row" >
                <div class="col-md-12 ">
                  Select Report: 
                  <select class='selectize' id="report_type">
                    <option value="{{route('ajax.report.get.withdrawals')}}" >Withdrawal Report</option>
                    <option value="Deposit">Deposit Report</option>
                    <option value="Inventory">Inventory Report</option>
                    <option value="Delivery">Delivery Report</option>
                    <option value="Purchase">Purchase Report</option>
                    <option value="Summary">Summary Report</option>
                  </select>
                  <div class="param_div">

                  </div>
                  Start Date: <input class="form-control opacity5 text-center"  id="startdate" name="startdate" size="16" type="date" value="" placeholder="Delivery Date" min="" required>
                  End Date:   <input class="form-control opacity5 text-center"  id="enddate"   name="enddate"   size="16" type="date" value="" placeholder="Delivery Date" min="{{date('Y-m-d')}}" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"><button class="btn-lg btn-block col-md-6 btn-theme btn_next">Continue</button></div>
            <div class="col-md-6"><button class="btn-lg btn-block col-md-6 btn-danger btn_back" type="Reset">Reset</button></div>
          </div>
      </form>

     </div>
   </div>

  </div><! --/container -->
</section><! --/wrapper -->


@stop

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('#startdate').change(function(e){
      $('#enddate').attr('min' , $(this).val()).val($(this).val());
    });
    $('#report_type').change(function(e){
      var report_type = $(this).val();
      var report_route = $(this).data('route');
      var start_date = $('#startdate').val();
      var end_date = $('#enddate').val();
      console.log(report_route);
      
        $.get(report_type , {start_date:start_date , end_date:end_date } , function(response){
          console.log(response);
          var html_append = "<select class='selectize' id='param_select'> ";
          $.each(response , function(index, object){
            html_append += "<option value='"+ object.item_id + "'>  "+  object.name+" </option>";
          });
          html_append+= "</select>"
          $('.param_div').append(html_append);
          $('#param_select').selectize();
        } ,'JSON');
       
    }); 

  });//end docready
  

</script>
@stop
