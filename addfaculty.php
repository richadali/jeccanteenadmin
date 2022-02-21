<?php include 'nav.php';

 ?>
 
 <html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<script type="module" src="addfaculty.js"></script>
<style>
td{
	font-family: 'Poppins', sans-serif;
}
</style>
</head>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h4><b><i class="fa fa-plus-circle w3-xxlarge" aria-hidden="true"></i>  Add New Faculty</b></h4>
  </header>

    
    <div class="w3-container w3-margin-bottom" >
     
        <div class=" w3-padding">
    <div class="w3-container w3-green">
      <h4>Enter Faculty Details</h4>
    </div>
    <div class="w3-container w3-white w3-padding-16">
      <form onsubmit="return false">
        <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <div class=" w3-margin-bottom">
            <label><i class="fa fa-user-circle-o"></i> Faculty Name</label>
            <input class="w3-input w3-border" type="text" placeholder="Enter Faculty Name" id="fname" required>
          </div></div>
          <div class="w3-half w3-margin-bottom">
          <label><i class="fa fa-building-o"></i> Department</label>
            <select  class="w3-input w3-border"  id="department" required placeholder="" required>
                 <option selected="disabled" value="">Select Department</option>
                <option>MCA</option>
                <option>Civil Engineering</option>
                <option>Mechanical Engineering</option>
                <option>Electrical Engineering</option>
                <option>Computer Science Engineering</option>
                <option>Instrumenttion</option>
                <option>Humanities</option>
                <option>Physics</option>
                <option>Chemistry</option>
                <option>Mathematics</option>
                <option>Instrumenttion</option>
            </select><br>
          </div>
          </div>
          
           <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-envelope"></i> Email ID</label>
            <input class="w3-input w3-border" type="email" placeholder="Enter Faculty Email" name="email" id="email" required>
            <span id="result"></span><br>
          </div>
          <div class="w3-half w3-margin-bottom">
          <label><i class="fa fa-phone-square"></i> Phone</label>
            <input class="w3-input w3-border" type="text" placeholder="Contact Number" name="phone" id="phone" required>
            <span id="result1"></span><br>
          </div></div>

          <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-key"></i> Password</label>
            <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" id="pass" required>
          </div>
          <div class="w3-half w3-margin-bottom">
          <label><i class="fa fa-key"></i> Confirm Password</label>
            <input class="w3-input w3-border" type="password" placeholder="Re Enter Password" name="phone" id="cpass" required>
            <span id="result2"></span><br>
          </div></div>

          <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-id-badge"></i> Faculty ID</label>
            <input class="w3-input w3-border" type="number" placeholder="Enter faculty ID" id="fid" >
            <span id="result"></span><br>
          </div>
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-inr"></i> Credit</label>
            <input class="w3-input w3-border" type="number" placeholder="Enter credit amount" id="credit" value="0" >
            <span id="result"></span><br>
          </div>
          </div>
          <input type="submit" value="SUBMIT" style="background:steelblue; width:15%; padding:1%; border-radius:5px; " onclick="return confirm('Do you really Want to Save the Data?')" class="w3-btn w3-medium w3-text-white " id='sub' name="submit">
      </form>
    </div>
  </div>
      </div>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	function validatePhone(phone) {
  const re1= /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/; 
  return re1.test(phone);
}

function validatephone() {
  const $result = $("#result1");
  const phone = $("#phone").val();
  const $sub = $("#sub");

  $result.text("");

  if (validatePhone(phone)) {
    $result.text("Phone Number is valid");
    $result.css("color", "green");
     $sub.prop( "disabled", false );

  } else {
    $result.text(" Phone Number is not valid ");
    $result.css("color", "red");
     $sub.prop( "disabled", true );
  }
  return false;
}

function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate() {
  const $result = $("#result");
  const email = $("#email").val();
  const $sub = $("#sub");
  $result.text("");

  if (validateEmail(email)) {
    $result.text(email + " is valid ");
    $result.css("color", "green");
    $sub.prop( "disabled", false );
  } else {
    $result.text(email + " is not valid ");
    $result.css("color", "red");
    $sub.prop( "disabled", true );
  }
  return false;
}



function validatepass() {
  const $result = $("#result2");
const pass = $("#pass").val();
const cpass = $("#cpass").val();
const $sub = $("#sub")
  
 	
  if (pass==cpass) {
    $result.text("Passwords Matched");
    $result.css("color", "green");
     $sub.prop( "disabled", false );

  } else {
    $result.text("Passwords donot match");
    $result.css("color", "red");
    $sub.prop( "disabled", true );
  
}
}

$("#cpass").on("input", validatepass);
$("#pass").on("input", validatepass);

$("#phone").on("input", validatephone);
$("#email").on("input", validate);
</script>

<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script>

var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");
var text;
function validatePassword() {
  if (password.value != confirm_password.value || password.value == '') {
    text = "Password Wrong";
	 
  } else {
    text = "Passwords Match";
	
  		}
 document.getElementById("demo").innerHTML = text;
  
}


</script>