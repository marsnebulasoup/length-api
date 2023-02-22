<?php
   include "layout.php";
   
   
   ?>
<script>
function recaptchaCallback() {
    $('#submitBtn').removeAttr('disabled');
	$('#submitBtn2').removeAttr('disabled');
};
</script>     
<div style="padding-top:50px;"class="container">
   <h2 style="font-family:verdana">Lost your API key? Fill out this form and we'll send it back to you</h2>
   <form method="post" action="mailer.php">
      <div class="form-group">
         <label for="name">Name*</label>
         <input type="name" class="form-control" name="name" id="name" placeholder="Name" required>
      </div>
      <div class="form-group">
         <label for="email">Email*</label>
         <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
         <small id="passwordHelpBlock" class="form-text text-muted">*Required</small>
      </div>
	  <div class="form-group">
      	<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfeTGQUAAAAAEs1umDY_BUu3HLo9g-6o6TpPCf9"></div>
      </div>
      <div class="form-group">
         <button type="submit" id="submitBtn" name="submit" value="click" class="btn btn-primary" disabled>Get API Key</button>
         <button type="submit" id="submitBtn2" name="reqnewkey" value="click" class="btn btn-primary" disabled>Request new API Key</button>
      </div>
   </form>
</div>
<div style="padding-top:140px">
   <?php include "footer.php" ?>
</div>