<?php include 'nav.php';
session_start();
if(!isset($_SESSION['id']))
{
  header('location: index.php');
}

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

<script type="module" src="additem.js"></script>
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
    <h4><b><i class="fa fa-cart-plus w3-xxlarge" aria-hidden="true"></i>  Add New Item</b></h4>
  </header>

    
    <div class="w3-container w3-margin-bottom" >
     
        <div class=" w3-padding">
    <div class="w3-container w3-green">
      <h4>Enter Item Details</h4>
    </div>
    <div class="w3-container w3-white w3-padding-16">
      <form onsubmit="return false">
        <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <div class=" w3-margin-bottom">
            <label><i class="fa fa-pencil"></i> Item Name</label>
            <input class="w3-input w3-border" type="text" placeholder="Enter Name of Item" id="iname" required>
          </div></div>
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-inr"></i> Item Price</label>
            <input class="w3-input w3-border" type="number" placeholder="Enter The Price" id="price"  required>
          </div>
          </div>
          
           <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-file-image-o"></i> Upload Item Picture</label>
            <input class="w3-input w3-border" type="file"  id="photo" accept=".jpg,.jpeg,.png"><br>
            <label for="progress">Uploading progress :</label><br>
            <progress id="progress" value="" max="100" style="width: 100%; height: 2.5vh;"></progress>
          </div></div>
        <input class="w3-button w3-dark-grey" type="submit" value="Add Item" id="submit" name="submit" onclick="return confirm('Do you really want to save this record?');">
      </form>
    </div>
  </div>
      </div>

</html>