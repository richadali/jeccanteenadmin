<?php
session_start();
if (isset($_POST['userID'])) {
	$_SESSION['id'] = $_POST['userID'];
}
if (isset($_SESSION['id']))
{
	header("location:items.php");
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>JEC CANTEEN</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<script type="module" src="index.js"></script>
</head>
<style>
	.in {
		border-style: none;
		border-left: 1px solid gray;
		background: none;
		padding: 10px;
		padding-left: 20px;
		outline: none;

	}

	form label {
		background: #E6E6E6;
		border-radius: 40px;
		padding: 20px;
		color: #666;
		font-family: roboto;


	}

	.lbtn {

		border-style: none;
		padding: 15px;
		width: 330px;
		background: #57B846;
		border-radius: 40px;
		color: white;
		font-family: roboto;
		font-size: 20px;


	}

	.lbtn:hover {
		background: #333;
		color: white;
		transition: 1s ease;
	}
</style>

<body style="background:url(images/bg.jpg); background-size:cover; font-family: roboto">
	<center>
		<form id="sessionForm" method="POST" action="index.php">
			<input type="text" name="userID" id="userID" hidden/>
		</form>
		<div class="w3-content  w3-padding-32 w3-card-4 " style="border-radius:40px; margin-top:7%; height:auto; background: rgba(1,1,1,0.8); color: white;">
			<div class="w3-row-padding " style="margin-top:3%;">
				<div class="w3-half">

					<img src="images/jeclogo1.png" style="width:70%;margin-top:2%;" class="">



				</div>

				<div class=" w3-half">
					<span style="font-family: 'Poppins', sans-serif; font-size:30px; font-weight:700">Admin Login</span><br><br><br>
					<form onsubmit="return false" method="post">
						<label class="w3-white"> <i class="fa fa-user"> </i> Username &nbsp;&nbsp;&nbsp;<input type="email" class="in" placeholder="Enter  email" id="email"></label><br><br><br>
						<label class="w3-white"> <i class="fa fa-key"> </i> Password &nbsp;&nbsp;&nbsp;<input type="password" class="in" placeholder="Enter  password" id="password"></label><br><br><br>
						<button class="lbtn" id="submit">Login</button>
					</form>

				</div>

			</div><br><br><br>
			<span style="font-family:poppins; color:white">This software is developed and maintained by <b>MCA 5th Semester</b>.</span>
		</div>

	</center>
</body>

</html>