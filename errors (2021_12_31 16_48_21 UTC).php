<?php include("layout.php"); ?>
<div style="margin-top:30px;" class="container">
   <h1>Errors</h1>
   <p style="font-size:15pt">
      Errors in the JSON API are most likely caused by invalid <a href="requests.php">parameters</a>. However, it is also possible that the API key is invalid, or you have run out of requests for the day.
      <br>
      <br>
   </p>
   
   <h2>Common Errors</h2>
   <br>
   <hr>
   <br>
   <h3>Invalid Parameters. </h3>
   <p style="font-size:15pt">	
      Invalid Parameters are caused usually by misspelling the conversion units. The conversion units must be capitalized. <a href="unitlist.php">Here</a> is a list of how the conversion units should be inputted to the API.
      This error will appear in the JSON response like so,
   </p>
   <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">
        <code>
Example error message 
http://lengthAPI.win/convert.php?api_key={api_key}from=Pigs&to=Miles&amount=417

JSON response:        
        
{        
    "response": "error",
    "error": "Invalid input. Check the URL to make sure that the parameters are formatted correctly, and the units are capitalized.",
    "help_msg": "An example would be lengthAPI.win/convert.php?from=Inches&amount=10&to=Centimeters",
    "requests_left": "unknown",	
    "convert_from": "Pigs", 
    "convert_amt": "417", 
    "convert_to": "Miles", 
    "output": "error"
}

    
        </code>
        </pre>
   <br>
   <hr>
   <br>
   <h3>Invalid API key.</h3>
   <p style="font-size:15pt">	
      If you get this error message, then check your API key. If you lost your API key, you can get a new one <a href="lostapikey.php">here<a>.		
   </p>
   <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">

	        <code>
Example error message 
http://lengthAPI.win/convert.php?api_key={badAPIKey}from=Inches&to=Miles&amount=417

JSON response:        
        
{        
    "response": "error",
    "error": "Invalid API Key. Check your API key.",
    "help_msg": "To request a new API key go to lengthAPI.win/lostAPIkey.php",  
    "requests_left": "unknown",
    "convert_from": "Inches", 
    "convert_amt": "417", 
    "convert_to": "Miles", 
    "output": "error"
}

    
        </code>
        </pre>
   <br>
   <hr>
   <br>
   <h3>Missing API key.</h3>
   <p style="font-size:15pt">	
      If you get this error message, then make sure that the API key is appended to the URL.		
   </p>
   <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">

	        <code>
Example error message 
http://lengthAPI.win/convert.php?from=Inches&to=Miles&amount=417

JSON response:        
        
{        
    "response": "error",
    "error": "Missing API Key. ",
    "help_msg": "Make sure that the API key is appended to the URL",     
    "requests_left": "unknown",
    "convert_from": "Inches", 
    "convert_amt": "417", 
    "convert_to": "Miles", 
    "output": "error"
}

    
        </code>
        </pre>
   <br>
   <hr>
   <br>
   <h3>No more requests left.</h3>
   <p style="font-size:15pt">	
      If you get this error message, then you have run out of requests for the day.		
   </p>
   <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">

	        <code>
Example error message 
http://lengthAPI.win/convert.php?api_key={API-KEY}&from=Inches&to=Miles&amount=417

JSON response:        
        
{
	"response": "error",
	"error": "No more requests allowed ",
	"help_msg": "You have used up all your requests",  
	"requests_left": "0",
	"convert_from": "Inches", 
	"convert_amt": "50", 
	"convert_to": "Centimeters", 
	"output": "error"
}

    
        </code>
        </pre>		
</div>
<?php include("footer.php"); ?>