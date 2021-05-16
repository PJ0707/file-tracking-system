<?php
session_start(); 
$host="localhost"; 
$user="FTS"; 
$password=""; 
$db="user_login_details"; 
$port="3307";
$con=mysqli_connect($host,$user,$password,$db,$port); 
$id=$_SESSION['ID']; 
$query="select fileid from file_table where id='".$id."'"; 
$result= mysqli_query($con,$query); 
$row = mysqli_fetch_array($result); 
$tname= $row[0]; 
$query="select fileid from file_table where status is null"; 
$result= mysqli_query($con,$query); 
$result1=$result; 
$files=scandir("uploads"); 
set_time_limit(500); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <meta content="width=device-width, initialscale=1.0" name="viewport">
 <title>Faculty_page</title>
 <meta content="" name="description">
 <meta content="" name="keywords">
 <style>
 	body
 { 
 padding-bottom:300px;
 background:url("teacher.jpg");
 background-size:cover;
 background-position:center;

 } 
 
 .c2{
 color:black;
 background-color:white;
 padding:0px;
 margin:0px;
 justify-content:right;
 }
 }
 </style>
</head>
<body>
<img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFVqXqqaIl4phDSDgqUq0M3nMzqnvxS17-Uw&usqp=CAU" width="200" height="200">
<a href="logout.php"><button style = "float:right;" class="button"><span id="font1">LogOut </span></button></a>
<form method="POST">
<?php
 if (mysqli_num_rows($result) > 0) { 
 
 
 while($row = mysqli_fetch_assoc($result)) { 
 $namea = $row["fileid"] . "a"; 
 $namer = $row["fileid"] . "r"; 
 $name = $row["fileid"] ; 
 
 
 for($a=0;$a<count($files);$a++) 
 { 
 $ram=pathinfo($files[$a],PATHINFO_FILENAME); 
 
 $var=0; 
 if($name==$ram) 
 { 
 
 $var=1;
 $dowload_fname=$files[$a]; 
 break; 
 } 
 
 
 } 
 
 ?>
<div class="c2" style="flex-basis:5px">
 <span><?php echo $name;?></span>
 <input style = "float:right" type="submit" name="<
?php echo $namer; ?>" value="reject">
 <input style = "float:right" type="submit" name="<
?php echo $namea; ?>" value="Accept">
 <?php
 
 if($var==1) 
 { 
 ?>
<div>
 <a href ="uploads/<?php echo $dowload_fname?>" target="_blank"><p style="color:black">Click here to view file!</p></a>
</div>
 <?php
}
?>
<?php
}
?>
</div>
</form>
<?php
extract($_REQUEST); 
$query="select fileid from file_table where status is null"; 
$result= mysqli_query($con,$query); 
while($row = mysqli_fetch_assoc($result)) { 
 $name= $row["fileid"]; 
 $namea = $row["fileid"] . "a"; 
 $namer = $row["fileid"] . "r"; 
 
 if(isset($_POST[$namea])) 
 { 
 $query="update file_table set status = 1 where fileid = '".$name."'"; 
 $exe = mysqli_query($con,$query); 
 
 if(!strcmp("file_table","level2_table")) 
 { 
 $query="update file_table set status = 2 where fileid = '".$name."'"; 
 $exe = mysqli_query($con,$query); 
 } 
 else{ 
 $query="update file_table set status = 1 where fileid = '".$name."'"; 
 $exe = mysqli_query($con,$query); 
 $insert_query="insert into level2_table(fileid)values('$name'); "; 
 $insert_query_result=mysqli_query($con,$insert_query) or die(mysqli_error($con)); 
 } 
 ?> 
 <script>
 location.replace("request.php"); 
 </script>
 <?php 
 } 
 if(isset($_POST[$namer])) 
 { 
 $query="update file_table set status = 0 where fileid = '".$name."'"; 
 $exe = mysqli_query($con,$query); 
 if(!strcmp("file_table","level2_table")) 
 { 
 $query="update file_table set status = -2 where fileid = '".$name."'"; 
 $exe = mysqli_query($con,$query); 
 } 
 else{ 
 $query="update file_table set status = -1 where fileid = '".$name."'"; 
 $exe = mysqli_query($con,$query); 
 echo "reject"; 
 } 
 ?> 
 <script>
 location.replace("request.php"); 
 </script>
<?php 
 } 
 
 
} 
} 
 
 else{ 
echo "no requests";
 
 } 
 ?>
</body>
</html>
