/**
 * Created by Administrator on 2017/6/7.
 */
$(function () {
    var date=[];
    var rate=[];
    for(var i=0;i<$('.rate_date').length;i++){
        date.push($('.rate_date').eq(i).html());
        rate.push(parseFloat($('.rate').eq(i).html()));
    }
    $('#container').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: date
        },
        yAxis: {
            title: {
                text: '单位（%）'
            }
        },
        tooltip: {
            enabled: false,
            formatter: function() {
                return '<b>'+ this.series.name +'</b>'+this.x +': '+ this.y +'°C';
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: '七日年化收益',
            data: rate
        }]
    });
//            stroke-linejoin
});
