<script>
Highcharts.chart('bar-chart', {

    chart: {
        type: 'column'
    },
    
    title: {
        text: 'Total Athlete by Age'
    },
    
    xAxis: {
        categories: <?= $bymkustitle;?>
    },
    
    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'Total Athlete by Age'
        }
    },
    
    tooltip: {
        formatter: function () {
            return '<b> GROUP AGE ' + this.x + '</b><br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },
    
    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },
    
    series: [{
		showInLegend: false, 
        data: <?= $bymkus; ?>
		}]
    });
    
    
    
    // Build the chart
    Highcharts.chart('by-sex-chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Total Athlete by Sex'
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
            name: 'Brands',
            colorByPoint: true,
            data: <?= $bysexs; ?>
        }]
    });

</script>