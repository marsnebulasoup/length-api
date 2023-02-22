<?php
include "layout.php";
?>
<script>
function recaptchaCallback() {
    $('#submitBtn').removeAttr('disabled');
};
</script>
<div style='margin-top:17px'class="container">
	<h1>Contact us</h1>
	<h5>We will try to get back to you within 3-5 business days</h5>
	<h6>Alternatively, you can email customer support at customersupport@lengthapi.win</h6>
	<form style="padding-top:15px" method="post" action="cmailer.php">
	<div class="form-row">
	 <div class="form-group col-md-6">
    <label for="name">Name</label>
    <input type="name" class="form-control" name="name" id="name" placeholder="John Smith" required>
  </div>
  <div class="form-group col-md-6">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
  </div>
  </div>
  
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" id="message" name="message" rows="3" maxlength="500" required></textarea>
	<small id="message" class="form-text text-muted">Up to 500 characters</small>
  </div>
  <div class="form-group">
      	<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfeTGQUAAAAAEs1umDY_BUu3HLo9g-6o6TpPCf9"></div>
      </div>
	  <div class="form-group">
         <button type="submit" name="submit" id="submitBtn" name="submit" value="click" class="btn btn-primary" disabled>Submit query</button>
      </div>
</form>
</div>
