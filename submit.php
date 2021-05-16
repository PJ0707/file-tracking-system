<?php
session_start(); 
$host="localhost"; 
$user="FTS"; 
$password=""; 
$db="user_login_details";
$port="3307"; 
$con=mysqli_connect($host,$user,$password,$db,$port); 
if(isset($_POST['submit'])) 
{ 
$file_name=$_POST['file_name']; 
$id=$_SESSION["id"]; 
$insert_query="insert into file_table(fname,id)values('$file_name','$id'); "; 
$insert_query_result=mysqli_query($con,$insert_query) or die(mysqli_error($con)); 
$file = $_FILES["file"]; 
$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION); 
if($insert_query_result){ 
 
 ?>
 <script>
 alert("Successfully Submitted"); 
 
 </script>
 <?php
 } 
 else{ 
 ?>
 <script>
 alert("Try again"); 
 
 </script>
 <?php
 } 
 
 $sql = "SELECT max(fileid) FROM file_table"; 
 $result = mysqli_query($con,$sql); 
 $row = mysqli_fetch_array($result, MYSQLI_NUM); 
 
 $count = $row[0]; 
 $_SESSION["fid"]=$count; 
 
$name = $count; 
echo $name; 
move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/".$name.".".$extension); 
 $insert_query="insert into level1_table(fileid)values('$count'); "; 
$insert_query_result=mysqli_query($con,$insert_query) or die(mysqli_error($con)); 
} 
 
?>
 <script>
 alert(<?php echo message ?>); 
 
 </script>
 <!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta content="width=device-width, initialscale=1.0" name="viewport">
 <title>Submit_page</title>
 <meta content="" name="descriptison">
 <meta content="" name="keywords">

 <link href="w3.css" rel="stylesheet">
<style>
 .box
 { 
 padding-left:100px;
 background-color:transparent; 
 align-self:center; 
 
 
 } 
 .cloud
 { 
 display: block; 
 margin-left:70px; 
 margin-right: auto; 
 padding-left:10px;
 width: 30%; 
 height: 140px; 
 } 
body
 { 
 padding-bottom:400px;
 background-image:url("o.jpg");
 background-size:cover;
 background-position:center;

 } 
 
 
</style>

</head>
<body>
 <span style="background-color: white;">
 	<a href="selection.php"><button style="float: right; "class="w3-button w3-red w3-round-large">Go back >></button></a>
</span>
<div class="container">
 <div class="row">
 <div class="mx-auto" style="width:500px;">
 <div class="box">
<img class="cloud" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdWJpEPzznZajFDmbecYqepOAd5EPUhiDM-CqPyR0jZbyj1vyxFAjBdhE2KrsbG01209g&usqp=CAU">
<form class="w3-container" method="POST" enctype="multipart/form-data">
 <label>File Name</label>
 <input class="w3-
input" type="text" autocomplete="off" placeholder="file_Name" name="file_name">
 
 <p style="paddingleft: 35%;background colour:black;" ><input type="file" name="file"></p>
 
 <p style="padding-left:36% ;"> <button class="w3-button w3-black w3-hover-green" name="submit">Submit</button></p>
 </div> 
 </div> 
 </div>
</div>
</body>
</html>
