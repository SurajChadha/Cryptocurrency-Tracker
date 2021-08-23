<htm>
    <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(){
          var data = google.visualization.arrayToDataTable([
            'Coin', 'Capital', 'Year', 'Increase'],



          ]);

          var options = {
              chart: {
                  title: 'Company Performance',
                  subtitle:  'Coin, Capital, and Increase: 2018-2021',
              },
                bars: 'horizontal' //Required for material bar charts
          };

      var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>