Highcharts.chart('bar-chart', {

    chart: {
        type: 'column'
    },
    
    title: {
        text: 'Total Athlete by Group Age'
    },
    
    xAxis: {
        categories: ['Male', 'Female']
    },
    
    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'Number of fruits'
        }
    },
    
    tooltip: {
        formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
                this.series.name + ': ' + this.y + '<br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },
    
    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },
    
    series: [{
        name: 'John',
        data: [5, 3, 4, 7, 2]
    }, {
        name: 'Joe',
        data: [3, 4, 4, 2, 5]
    }, {
        name: 'Jane',
        data: [2, 5, 6, 2, 1]
    }, {
        name: 'Janet',
        data: [3, 0, 4, 4, 3]
    }]
    });
    
  var url      = window.location.href;     // Returns full URL


  // alert(data.sex);  // Build the chart
    Highcharts.chart('pie-chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ' '
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,

            data: 

            [{
                name: 'Male',
                y: 61.41
                ,
                sliced: true,
                selected: true
            }, 

            {
                name: 'Female',
                y: 11.84
            }]
        }]
    });

         	$.ajax({
					type: 'GET',
				    url: url+'/data_picchart',
				    contentType: 'application/json',
				    dataType: 'json',
				    response : function(data){
				console.log(data);
				    }
				})