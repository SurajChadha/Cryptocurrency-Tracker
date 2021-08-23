<!Doctype HTML>  
<html>  
<head>  
    <title>Bar Chart</title> 
    <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bar Chart</title>
    <link rel="stylesheet" href="style_chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

    <!--chart start-->
    <div class="chart">
      <ul class="numbers">
      <li><span>100%</span></li>
        <li><span>50%</span></li>
        <li><span>0%</span></li>
        <!-- <li><span>60%</span></li>
        <li><span>30%</span></li>
        <li><span>0%</span></li> -->
        <!-- <li><span>50%</span></li> -->
      </ul>
      <ul class="bars">
        <li><div class="bar" data-percentage="4.92"></div><span>Bitcoin</span></li>
        <li><div class="bar" data-percentage="6.97"></div><span>Ethereum</span></li>
        <li><div class="bar" data-percentage="57.61"></div><span>XRP</span></li>
        <li><div class="bar" data-percentage="48.69"></div><span>Cardano</span></li>
        <li><div class="bar" data-percentage="33.62"></div><span>Stellar</span></li>
      </ul>
    </div>
    <!--chart end-->

    <script type="text/javascript">
    $(function(){
      $('.bars li .bar').each(function(key, bar){
        var percentage = $(this).data('percentage');
        $(this).animate({
          'height' : percentage + '%'
        },1000);
      });
    });
    </script>

    <!-- <script src="js/Chart.min.js"></script>  
</head>  
<body>  
    <canvas id="barChartLoc" height="300" width="300"></canvas>  
    <script>  
        var barChartLocData = {  
            labels: ["January", "Feburary", "March"],  
            datasets: [{ fillColor: "lightblue", strokeColor: "blue", data: [15, 20, 35] }]  
        };  
        var mybarChartLoc = new Chart(document.getElementById("barChartLoc").getContext("2d")).Bar(barChartLocData);  
    </script>   -->
</body>  
</html>  