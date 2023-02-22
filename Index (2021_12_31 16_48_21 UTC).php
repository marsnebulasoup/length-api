<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<meta name="Description" content="Lengthapi.win is a free JSON API for converting units of length. 100% Free and easy to use. Sign up now at lengthapi.win/getapikey">

<body>
    <?php include("layout.php"); ?>
    <div class="container">
		<center>

        <h1 style="padding-top:100px">Welcome to LengthAPI.win!</h1>
        <h2 style="padding-top:30px;padding-bottom:50px">A free JSON API for length conversions</h2>
        <a href="getAPIkey.php"><button  type="button" class="btn btn-outline-primary btn-lg">Get API Key</button></a>
    </div>
    <div style="padding-top:70px;">
        <center><h3 >Here are some examples</h3></center>
    </div>
		</center>
    <div class="container" style="margin-bottom:75px;margin-top:50px;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">
        <code>
Example conversion from Fathoms to Feet
http://lengthAPI.win/convert.php?api_key={API-key}&from=Fathoms&to=Feet&amount=845

JSON response:        
        
{
    "response": "success",
    "error": "None",
    "help_msg": "None",
    "requests_left": "499",	
    "convert_from": "Fathoms", 
    "convert_amt": "845", 
    "convert_to": "Feet", 
    "output": "5070" 
    
}
    
        </code>
        </pre>
                </div>
                <div class="carousel-item">
                    <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">
        <code>
Example conversion from Parsecs to Light Years
http://lengthAPI.win/convert.php?api_key={API-key}&from=Parsecs&to=Light_Years&amount=7

JSON response:        
        
{
    "response": "success",
    "error": "None",
    "help_msg": "None",
    "requests_left": "499",	
    "convert_from": "Parsecs", 
    "convert_amt": "7", 
    "convert_to": "Light_Years", 
    "output": "22.8309482049" 
    
}
    
        </code>
        </pre>
                </div>
                <div class="carousel-item">
                    <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">
        <code>
Example conversion from Picas to Nanometers 
http://lengthAPI.win/convert.php?api_key={API-key}from=Picas&to=Nanometers&amount=57

JSON response:        
        
{
    "response": "success",
    "error": "None",
    "help_msg": "None",
    "requests_left": "499",	
    "convert_from": "Picas", 
    "convert_amt": "57", 
    "convert_to": "Nanometers", 
    "output": "241300000" 
    
}

    
        </code>
        </pre>
                </div>
                <div class="carousel-item">
                    <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">
        <code>
Example error message 
http://lengthAPI.win/convert.php?API-key={api_key}from=Pigs&to=Miles&amount=417

JSON response:        
        
{        
    "response": "error",
    "error": "Invalid input. Check the URL to make sure that the parameters are formatted correctly, and the units are cAPItalized.",
    "help_msg": "An example would be lengthAPI.win/convert.php?from=Inches&amount=10&to=Centimeters" 
    "requests_left": "unknown",	
    "convert_from": "Pigs", 
    "convert_amt": "417", 
    "convert_to": "Miles", 
    "output": "error"
}

    
        </code>
        </pre>
                </div>
            </div>
            <a class="carousel-control-prev-icon" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next-icon" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
		<center>
        <div >
            <a href="getAPIkey.php"><button  type="button" class="btn btn-outline-primary btn-lg">Get API Key</button></a>
        </div>
			</center>

    </div>
    <?php 
         include("footer.php");
         ?>
</body>

</html>