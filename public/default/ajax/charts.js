var url = "http://localhost:8000/ajax/";

var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'bar-chart',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Reservations'], // Set the label when bar is rolled over,
    resize : ['true']
  });
var chart1 = Morris.Bar({
    // ID of the element in which to draw the chart.
    barGap: 10,
    barSizeRation:['0.55'],
    element: 'bar-chart-week',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Reservations'], // Set the label when bar is rolled over
    resize : ['true'],
    barColors: ['#4DA74D','#646464'],
    hideHover: ['auto']
});

var chart2 = Morris.Bar({
    // ID of the element in which to draw the chart.
    barGap: 10,
    barSizeRation:['0.55'],
    element: 'bar-chart-year',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Reservations'], // Set the label when bar is rolled over
    resize : ['true'],
    barColors: ['#f75b68','#4DA74D','#646464'],
    hideHover: ['auto']
});

 $.ajax({
    type: "GET",
    url : url + 'reservations/7',
    dataType: 'json',
    success : function(data){
    	chart1.setData(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
         alert(errorThrown);
      }
    });

 $.ajax({    
    type: "GET",
    url : url + 'reservationss/30',
    dataType: 'json',
    success : function(data){
        chart.setData(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
         alert(errorThrown);
      }
    }); 
 $.ajax({    
    type: "GET",
    url : url + 'reservationss/366',
    dataType: 'json',
    success : function(data){
        chart2.setData(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
         alert(errorThrown);
      }
    }); 