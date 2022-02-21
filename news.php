

<?php include 'nav.php';

include'connect.php';

 ?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<!-- Overlay effect when opening sidebar on small screens -->


<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> News & Updates</b></h5>
  </header>

 




  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-fourth">

        <div class=" w3-padding w3-col l6 m8">
    <div class="w3-container w3-green">
      <h2><i class="fa fa-newspaper-o w3-margin-right"></i>News & Updates</h2>
    </div>
    <div class="w3-container w3-white w3-padding-16">
      <form action="savenews.php" method="post" enctype="multipart/form-data" >
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-calendar-o"></i> Date</label>
            <input class="w3-input w3-border" type="date"  name="don" required>
          </div>
          <div class="w3-half">
            <label><i class="fa fa-pencil"></i> Title</label>
            <input class="w3-input w3-border" type="text" placeholder="Enter The Title" name="title" required>
          </div>
        </div>
        <div class="w3-row-padding" style="margin:8px -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-image"></i> Image</label>
            <input class="w3-input w3-border" type="file" value="images/news.jpg" name="image">
          </div>
          <div class="w3-half">
            <label><i class="fa fa-paperclip"></i> Attatchment</label>
          <input class="w3-input w3-border" type="file"  name="attach" >
          </div>
        </div>

        <div class="w3-row-padding" style="margin:0 -16px;">
          
          <div class="">
            <label><i class="fa fa-pencil"></i> Description</label>
            <textarea class="w3-input w3-border"  placeholder="Enter The News Description" name="desc"></textarea>
          </div>
        </div>
        <br>
        <input class="w3-button w3-dark-grey" type="submit" value="Post" name="submit"><i class="fa fa-globe w3-margin-right"></i>
      </form>
    </div>
  </div>
      </div>
      <div class="w3-half" style="overflow: scroll; height: 450px;">
        <h5>Feeds</h5>
        
        <table class="w3-table w3-striped w3-white" >
          
        <tr class="w3-blue w3-text-white">
          <th></th>
          <th>Title</th>
          <th>Description</th>
          <th>Date</th>
        </tr>
          <?php 
         
            $sql=mysqli_query($con,"select * from news order by dateofnews desc");
            
            while($row=mysqli_fetch_array($sql))
            {
          ?>
         <tr>
            <td><i class="fa fa-newspaper-o w3-text-blue w3-large"></i></td>
            <td><?php echo $row ['title'] ;?></td>
            <td><?php echo $row ['description'] ;?></td>
            <td><i><?php echo date('F, d Y',strtotime($row ['dateofnews'])) ; ?></i></td>

          </tr>

        
          <?php }?>


        </table>
      </div>
    </div>
  </div>



<br><br>


<div class="w3-content" style="overflow: scroll; height: 600px;">
        <h5>Feeds</h5>
        
        <table class="w3-table w3-striped w3-white" >
          
        <tr class="w3-blue w3-text-white">
          <th></th>
          <th>Title</th>
          <th>Description</th>
          <th>Date</th>
          <th></th>
           <th></th>
        </tr>
          <?php 
         
            $sql=mysqli_query($con,"select * from news order by dateofnews desc");
            
            while($row=mysqli_fetch_array($sql))
            {
          ?>
         <tr>
            <td><i class="fa fa-newspaper-o w3-text-blue w3-large"></i></td>
            <td><?php echo $row ['title'] ;?></td>
            <td><?php echo $row ['description'] ;?></td>
            <td><i><?php echo date('F, d Y',strtotime($row ['dateofnews'])) ; ?></i></td>
            <td>
									
									<a href="<?php echo 'updatenews.php?id='.$row["slno"].'';?>" class="w3-btn w3-round-medium w3-green">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    <td>
									<a href="<?php  echo 'deletenews.php?id='.$row["slno"].''; ?>" onclick="return confirm('Do you really want to Delete?');" class="w3-btn w3-round-medium w3-red"><i class="fa fa-trash fa-lg" aria-hidden="true" ></i></a>                                    
                                   </td>

          </tr>

        
          <?php }?>


        </table>
      </div>
    </div>
  </div>
<br><br>
  
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>
<script type="text/javascript" src="../js/jquery.marquee.js"></script>
<script type="text/javascript">
  
  $(function(){


  $('#marquee-vertical').marquee();  
   

});

</script>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
