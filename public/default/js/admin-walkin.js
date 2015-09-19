  var $root = $('html, body');



    $('#custom').hide();
    $('#date_start').keypress(function(e){
     e.preventDefault();
    });
    $('#date_end').keypress(function(e){
     e.preventDefault();
    });

     $( "#date_start" ).datepicker({
      defaultDate: "0",
      changeMonth: false,
      numberOfMonths: 1,
      minDate: 0,  //Date + 1
      onClose: function( selectedDate ) {
        //$("#date_end" ).datepicker( "option", "minDate", selectedDate );
         var isToday = checkToday($('#date_start').val());
        if(isToday){
          $('#morning').hide();
        }else{
          $('#morning').show();
        }
        $('#custom').fadeIn();
      }
    });
     $('#timeofday').on('change', function(){
        if($('#timeofday').val() == '0')
        {
           $('#lenofstay').prop('disabled', true);
        }
        else
        {
          $('#lenofstay').removeAttr('disabled');
        }
     });
      $('#lenofstay').on('change',function(){
        //('2011','01','02');
          var lendays = $('#lenofstay').val();
          var actualDate = new Date($('#date_start').val().split('/')[2] , $('#date_start').val().split('/')[0] -1 ,$('#date_start').val().split('/')[1], $('#timeofday').val(), 0, 0,0);
          var nd = addDays(actualDate, lendays);
          $('#date_end').datepicker('setDate', nd);
          $('#date_end').datepicker('update');
      });

     $("#date_end").datepicker({
      defaultDate: "0",
      changeMonth: false,
      numberOfMonths: 1,
      onClose: function( selectedDate ) 
      {
        $( "#date_start" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    $('#btn_submit_date').click(function(){
        $('#date_end').removeAttr('disabled');
    });


function addDays(theDate, days) {
    return new Date(theDate.getTime() + days*24*60*60*1000);
}
function checkToday(datepicker){
        var datepickerDay =  new Date(datepicker); //creating date object from string 'mm/dd/yyyy'
        var d = new Date(); // date object
      
        if(d.getDate() == datepickerDay.getDate() && d.getMonth() == datepickerDay.getMonth() && d.getYear()==datepickerDay.getYear()){
            return true;
        }
        else{
          return false;
        }
    }