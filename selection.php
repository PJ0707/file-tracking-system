<?php
session_start(); 
 
if(!isset($_SESSION["id"])) 
{ 
 header('location:index.php'); 
} 
echo $_SESSION["id"]; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta content="width=device-width, initialscale=1.0" name="viewport">
 <title>Students_Selection_page</title>
 <meta content="" name="descriptison">
 <meta content="" name="keywords">
 <link href="selection.css" rel="stylesheet">
</head>
<body>
<div class="img">
<img " src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFVqXqqaIl4phDSDgqUq0M3nMzqnvxS17-Uw&usqp=CAU" width="250" height="200">
<a href="main.html"><button style="float: right; "class="w3-button w3-red w3-round-large">Go back >></button></a>
</div>
<div class="log">
<a href="logout.php"><button class="button"><span id="font1"><b>Log
Out</b> </span></button></a>
</div>

 <div class="c1">
 <div class="c2" style="flex-basis: 300px">
 <a href="submit.php"><h2>Submit Application</h2></a>
</div>
 
 <div class="c2" style='flex-basis:300px'>
 
 <a href="tracking.php"> <h2>Track Application</h2></a>
 </div>
</div>

</body>
</html>