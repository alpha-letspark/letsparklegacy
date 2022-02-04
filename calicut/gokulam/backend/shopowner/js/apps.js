$(function() {
    $.ajax({

        url: 'http://jch.in/food/food_chat.php',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Category Wise Report",
                "xAxisName": "Category Wise Report",
                "yAxisName": "In Numbers",
                "rotatevalues": "1",
                "theme": "zune"
            };

            apiChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-containernew',
                width: '400',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});