

$.ajax({
        url: 'fetch_sales.php', // Replace with your URL
        type: 'GET', // HTTP method
        dataType: 'json', // The type of data expected from the server
        success: function(response) {
          // This function is called if the request succeeds
          console.log(response);
          var months = response.month;
          var totalSales = response.total_sales;

          var options = {
            series: [{
                name: 'Sales',
                data: totalSales
            }],
            chart: {
                height: 350,
                type: 'bar',
                zoom: {
                    enabled: false
                }
            },
            xaxis: {
                categories: months
            },
            yaxis: {
                title: {
                    text: 'Sales'
                }
            }
            };
            
            // Create a new chart instance
            var chart = new ApexCharts(document.querySelector("#pos_bar"), options);
            chart.render();

            
            var options = {
                series: [{
                    name: 'Sales',
                    data: totalSales
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                xaxis: {
                    categories: months
                },
                yaxis: {
                    title: {
                        text: 'Sales'
                    }
                }
                };
                
                // Create a new chart instance
                var line = new ApexCharts(document.querySelector("#line"), options);
                line.render();


            
        },
        error: function(xhr, status, error) {
          // This function is called if the request fails
          console.error('Error:', error);
          // Handle the error here
        }
      });
      