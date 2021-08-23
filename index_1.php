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
         

         var url = "http://api.coinlayer.com/live?access_key=3b6de33216db489bc90a39e1445422f5&target=USD";
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