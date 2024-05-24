<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <h3>Expenses</h3>
    <div id="weekly-chart"></div> 
    
</div>
<script>
    $(document).ready(function() {
      

      function getWeeklyReport() {
        $.ajax({
          url: '../../PHP - process_files/weekly-report.php',
          method: 'POST',
          dataType: 'json',
          success: function(json) {
            console.log(json);
            var profit = [];
            for (var i = 0; i < json.sales.length; i++) {
              var capital = json.delivery[i] || 0;
              var result = json.sales[i] - capital;
              profit.push(result);
            }

            var options = {
              series: [{
              name: 'Sales',
              data: json.sales
            }, {
              name: 'Capital',
              data: json.delivery
            }, {
              name: 'Profit',
              data: profit
            }],
              chart: {
              type: 'bar',
              height: 350
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
              },
            },
            colors: ['#0000FF', '#FF0000', '#00FF00'],
            dataLabels: {
              enabled: false
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
            },
            xaxis: {
              categories: json.date,
            },
            fill: {
              opacity: 1
            },
            tooltip: {
              y: {
                formatter: function (val) {
                  return "₱ " + val.toLocaleString();
                }
              }
            }
            };
            
            var chart = new ApexCharts($("#weekly-chart")[0], options);
            chart.render();
          },
          error: function(xhr, status, error) {
              // Handle errors if any
              console.error("Error fetching data:", error);
          }
        });
      }

      

      getWeeklyReport();
    });
  </script>