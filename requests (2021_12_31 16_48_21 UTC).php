<?php include "layout.php"; ?>
<div style="margin-top:30px" class='container'>
   <h1>Requests</h1>
   <br>
   <h3>You can make up to 500 requests per day.</h3>
   <h4>Your requests count is refreshed every day at midnight UTC.</h4>
   <br>
   <hr>
   <style>
      table {
      border-collapse: collapse;
      width: 100%;
      }
      th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      }
      .pop {
      font-size:15pt
      }        
   </style>
   <p class="pop">Example request converting 45 inches to centimeters <br><a href="convert.php?api_key={YOUR_API_KEY}&from=Inches&amount=45&to=Centimeters"><code>http://www.lengthAPI.win/convert.php?api_key={YOUR_API_KEY}&from=Inches&amount=45&to=Centimeters</code></a><br><br>Response:</p>
   <pre style="border:1px; border-style:solid; border-color:#dbdde0; padding: 1em;">
        <code>
{
    "response": "success",
    "error": "None",
    "help_msg": "None",
    "requests_left": "499",
    "convert_from": "Inches", 
    "convert_amt": "45", 
    "convert_to": "Centimeters", 
    "output": "114.3" 
            
}
</code>
</pre>
   <div style="padding-top:30px"></div>
   <table>
      <tr>
         <th>Parameters</th>
         <th>Definition</th>
         <th>Required</th>
      </tr>
      <tr>
         <td>
            <p class="pop"><strong>api_key</strong></p>
         </td>
         <td>
            <p class="pop">This, of course is your API key, which can be obtained <a href="getAPIkey.php">here</a>.</p>
         </td>
         <td>
            <p class="pop">Yes</p>
         </td>
      </tr>
      <tr>
         <td>
            <p class="pop"><strong>from</strong></p>
         </td>
         <td>
            <p class="pop">This is the unit you are converting from</p>
         </td>
         <td>
            <p class="pop">Yes</p>
         </td>
      </tr>
      <tr>
         <td>
            <p class="pop"><strong>amount</strong></p>
         </td>
         <td>
            <p class="pop">This is the amount you are converting</p>
         </td>
         <td>
            <p class="pop">Yes</p>
         </td>
      </tr>
      <tr>
         <td>
            <p class="pop"><strong>to</strong></p>
         </td>
         <td>
            <p class="pop">This is the unit you are converting to</p>
         </td>
         <td>
            <p class="pop">Yes</p>
         </td>
      </tr>
   </table>
</div>
<?php include "footer.php"; ?>