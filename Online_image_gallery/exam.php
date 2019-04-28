<?php include 'database.php' ; ?>
<?php 
session_start();
          $a = $_SESSION['name'];
          echo "$a";
          $slide=0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.a:hover{box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.7); margin-left: 5px}
	</style>
</head>
<body>
<a class="a" href="margin.html"><img src="id.png"></a>
<?php $slide= 1; echo $slide;  ?> 
</body>
</html>