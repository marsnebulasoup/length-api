<?php include("layout.php");?>
<div class='container'>
   <h1 align="center" style="padding-top:50px">Getting Started</h1>
   <p  style="padding-top:30px; font-size:20px">
      First off, to get started, you will need to get an API key. Our API keys are free and can be found over <a href="getapikey.php">here</a>. Fill out the form and a key will be emailed to you.
      <br>
      <br>
	  You can make up to 500 requests per day per API key.
      <br>
      <br>	  
      The rest is simple. Make requests in the parameters of the URL. For example, to convert 50 Inches to Centimeters, you would make a request to this URL: <br><br><code>http://www.lengthAPI.win/convert.php?api_key={API-KEY}&from=Inches&to=Centimeters&amount=50</code>.<br></br>
	  The order of the parameters doesn't matter, but make sure to keep the '&' signs between the parameters.
      <br>
      <br>
      Here is some example code to make a request with python
   <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">
        <code>
#Sample code requesting API to convert 50 inches to centimeters        
import requests
import json

response = requests.get('http://www.lengthAPI.win/convert.php?api_key={API-KEY}&from=Inches&to=Centimeters&amount=50')
jsonCode= response.json()

output = jsonCode['output']
print(output)

        </code>
        </pre>
   More info can be found in the documentation section <a href="docs.php">over here</a>.
   </p>
</div>
<?php include("footer.php");?>