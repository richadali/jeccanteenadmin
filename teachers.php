<?php include 'nav.php';

include'connect.php';

 ?><html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <h4><b><i class="fa fa-address-card" aria-hidden="true"></i>  Faculty</b></h4>
  </header>

    
    <div class="w3-card w3-white w3-padding-16" style="width:98%; margin:0 auto; margin-top:20px">
    	<h4 align="center" style="font-family:roboto">Teachers</h4>
        <div class="w3-container w3-small">
        	<form method="post" action="teachers.php" style="font-family:roboto; font-size:12px">
                <table width="80%" border="0" align="center" cellspacing="2">
                    <tr>
                      <td width="15%" style="font-family: 'Poppins', sans-serif; font-size:12px">
                      	<select class="w3-select w3-border w3-round-medium" name="department">
                            <option disabled selected>Select Department</option>
                            <option >Assamese</option>
                            <option >Economics</option>
                            <option >Education</option>
                            <option >ELectronics</option>
                            <option >English</option>
                            <option >History</option>
                            <option >Philosophy</option>
                            <option >Political Science</option>
                            <option >Botany</option>
                            <option >Chemistry</option>
                            <option >Geology</option>
                            <option >Physics</option>
                            <option >Mathematics</option>
                            <option >Statistics</option>
                            <option >Computer Science</option>
                            <option >Zoology</option>
                          </select>
                      </td>
                      <td width="10%" style="font-family: 'Poppins', sans-serif; font-size:12px">
                            <input type="submit" name="Search" value="Go" class="w3-btn w3-indigo">
                      </td>
  
                      <td width="30%" style="font-family: 'Poppins', sans-serif; font-size:12px">
                        <input type="text" name="name1" id="name1" class="w3-input w3-border" placeholder="Search by name">
                      </td>
                      <td width="10%" style="font-family: 'Poppins', sans-serif; font-size:12px"><input type="submit" name="Search2" value="Go" class="w3-btn w3-indigo"></td>
                      <td width="10%" style="font-family: 'Poppins', sans-serif; font-size:12px"><input type="submit" name="Refresh" value="Refresh" class="w3-btn w3-indigo"></td>
                     </tr>
                </table>
            </form>
        </div>
<div class="w3-container w3-responsive" style="margin-top:20px; width:98%; margin:30px auto"  >
  
    <table class="w3-table-all w3-centered w3-hoverable w3-small">
        <tr class="w3-blue">
           <th>Sl. ID</th>
           <th></th>
           <th>Name</th>
           <th>Department</th>
           <th>Designation</th>
           <th>Contact</th>
           <th>Qualification</th>
           <th>Date of Joining</th>
           <th></th>
           <th></th>
        </tr>
       
        <?php
				if(isset($_POST["Search"]))
				{
					$department=$_POST["department"];
					$sql="Select * from teacher where dept='$department'";
				}
				else if(isset($_POST["Search2"]))
				{
					$cname=$_POST["name1"];
					$sql="Select * from teacher where cname like '$cname%'";
				}
				else
				{
					$sql="select * from teacher";
				}
				$result=mysqli_query($con,$sql);
				$count=1;
				while($row=mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$count."</td>";
						echo '<td><img src="../'.$row['photo'].'" width="50" height="50"></td>';
						echo "<td><strong>".$row['name']."</strong></td>";
						echo "<td>".$row['dept']."</td>";
						echo "<td>".$row['designation']."</td>";
						echo "<td>".$row['phone']."</td>";
						echo "<td>".$row['deg']."</td>";
						echo "<td>".$row['doj']."</td>";	
						echo '<td><a href="viewteacher.php?id='.$row['slno'].'" input class="w3-btn w3-green w3-round w3-tiny">View / Edit</a></td>';?>
						 <td>
					  <a href="<?php  echo 'deleteteacher.php?id='.$row["slno"].''; ?>" onclick="return confirm('Do you really want to Delete?');" class="w3-btn w3-round-medium w3-red"><i class="fa fa-trash fa-lg" aria-hidden="true" ></i></a>                                    
                                   </td>
					<?php echo "</tr>";
						$count++;
					}		
        ?>

       
    </table>
</div>


</html>
<?php
  if(isset($_GET["saveupdate"]))
  {
    echo '<script> alert("Teacher Record Updated successfully"); </script>';
    
  }
  elseif(isset($_GET["save"]))
  {
    echo '<script> alert("New faculty added successfully"); </script>';
    
  }
?>