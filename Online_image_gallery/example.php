<?php include 'database.php' ; ?>

<?php
$username = isset($_POST["name"]) ? $_POST["name"] : "";
if(isset($_POST["sub"])){
	 $query = "INSERT INTO new(name) VALUES ('$username')";
    mysqli_query($connection , $query);
    session_start();
          $_SESSION['name']= $username;
    }

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>emni</title>
</head>
<body>
<form action="example.php" method="post">
	<input type="text" name="name">
	<input type="submit" name="sub">
</form>
</body>
</html>