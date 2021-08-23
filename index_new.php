 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 </head>
 <body>
   <h1 class="text-center">CryptoCurrency</h1>

   <!-- <script>

var apikey = {}
    
request('GET','https://pro-api.coinmarketcap.com/v1/global-metrics/quotes/historical?CMC_PRO_API_KEY=' + apikey.key)
.then((r1) => {
    var x1 = JSON.parse(r1.target.responseText);
    console.log(x1.data.quote.USD.total_market_cap);
}).catch(
})  
    
function request(method, url) {
        return new Promise(function (resolve, reject) {
            var xhr = new XMLHttpRequest();
            xhr.open(method, url);
            xhr.onload = resolve;
            xhr.onerror = reject;
            xhr.send();
        });
}
</script> -->
<div class="container">
  <table class="table" style="text-align: center;">
    <thead>
          <tr>
              <th>Currency</th>
              <th>value in USD</th>
          </tr>
    </thead>
    <tbody id="result"></tbody>

  </table>


</div>



     <script>
         
         //CMC_PRO_API_KEY
         var url = "http://api.coinlayer.com/live?access_key=3b6de33216db489bc90a39e1445422f5&target=USD";
        // var url = " https://pro-api.coinmarketcap.com/v1/global-metrics/quotes/historical";\
        // var url = "https://api.coingecko.com/api/v3/coins/coin/market_chart?vs_currency=ind&days=11430"
         var httpRequest = new XMLHttpRequest();
         //1.make http request
         function makeRequest(){
             if(!httpRequest)
             {
                 alert("cannot make HTTP request")
                 return;
             }
             
             httpRequest.onreadystatechange = getResponse;
             httpRequest.open('GET',url);
             httpRequest.send();
        }
      
        function getResponse()
        {
            //IF RESPONSE IS READY
            if(httpRequest.readyState === XMLHttpRequest.DONE){
                      //If status is OK
                      if(httpRequest.status === 200){
                        var responseText = httpRequest.responseText; 
                        var jsonResponse = JSON.parse(responseText);
                    insertIntoHTML(jsonResponse)
                        //console.log(jsonResponse) 
                    }
            }
        }
function insertIntoHTML(jsonResponse){
  //insert data into html
 var resultBody = document.getElementById('result');
 //make sure that table is empty
 resultBody.innerHTML = "";
 var ratesObj = jsonResponse.rates;
 for(currency in ratesObj){
   resultBody.innerHTML += 
   '<tr class="table-primary">'+  
    //'<tr style="background-color:red">'+  //btc
    '<td>'+currency+'</td>'+
    '<td>'+ratesObj[currency]+'</td>'+
    '</tr>'


 }
}

        makeRequest();
         </script> 
     
 </body>
 </html>