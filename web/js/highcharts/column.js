$(function () {
    $('#column').highcharts({
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
            text: 'Achats par fournisseurs Juin 2016'
        },
        xAxis: {
            categories: ['Amazon', 'Cdiscount', 'Priceminister', 'Ikea', 'Conforama']
        },
        yAxis: {
            labels: {
                formatter: function () {
                    return this.value + 'K';
                }
            },
            stackLabels: {
                enabled:true,
                align: 'center',
            },
            min: 0,
            title: {
                text: ' '
            },
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    'Depenses' + ': ' + this.y + 'K' + '<br/>';
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                pointPadding: 0.2,
                groupPadding: 0,
            }
        },

        series: [{
            name: 'Fournisseurs',
            data: [129, 71, 106, 29, 44]
        }]
    });
});