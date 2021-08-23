<?php include "db.php";?>
<html>
  <head>
    <title>Google Line Chart using php mysql by Yourphpguru</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data=google.visualization.arrayToDataTable([
          ['coins', 'capital', 'year'],
           
          ['Bitcoin', 2100, 2018],
            
            ['Ethereum', 3300, 2019],
             
            ['Cardano', 2110, 2020],
             
            ['Stellar', 100, 2021],
             
          
 
        ]);

        var options = {
          title:'Coin Performance',
          curveType:'function',
          legend:{ position: 'bottom' }
        };

        var chart=new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>