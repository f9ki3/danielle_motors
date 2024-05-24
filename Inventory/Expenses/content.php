<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <h3>Expenses</h3>
    <div id="barChartContainer" style="height: 500px;"></div>
    
</div>
<script type="text/javascript">
    // Initialize the ECharts instance based on the prepared DOM
    var myChart = echarts.init(document.getElementById('barChartContainer'));

    // Specify the configuration items and data for the chart
    var option = {
        title: {
            text: 'Basic Bar Chart'
        },
        tooltip: {},
        legend: {
            data: ['Sales']
        },
        xAxis: {
            data: ['Shirts', 'Cardigans', 'Chiffons', 'Pants', 'Heels', 'Socks']
        },
        yAxis: {},
        series: [{
            name: 'Sales',
            type: 'bar',
            data: [5, 20, 36, 10, 10, 20]
        }]
    };

    // Use the specified chart configuration item and data to show the chart
    myChart.setOption(option);
</script>