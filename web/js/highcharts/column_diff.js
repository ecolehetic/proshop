$(function () {
    $('#column_diff').highcharts({
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Budget autorise VS Budget utilise Juin 2016'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            labels: {
                formatter: function () {
                    return this.value + 'K';
                }
            },
            stackLabels: {
                enabled: true,
                align: 'center'
            },
            min: 0,
            title: {
                text: ' '
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + 'K' + '<br/>';
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0,
                borderWidth: 0,
            }
        },
        series: [{
            name: 'Budget autorise',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],


        },{
            name: 'Budget utilise',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });
});