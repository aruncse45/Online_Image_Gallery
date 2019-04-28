<?php include 'database.php' ; ?>
<?php 
    
    if(isset($_POST['submit'])){
    	$target = "img/" . $_FILES['image']['name'];
    	$image = $_FILES['image']['name'];
        $ismoved = move_uploaded_file($_FILES['image']['tmp_name'], $target);
        if($ismoved == true){
            $sql="INSERT INTO photo (image) values ('$image')";
            mysqli_query($connection, $sql);
    	}
    	else {
            echo "not";
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>save image</title>
</head>
<body>
<?php
    $sql="select image from photo";
    $result=mysqli_query($connection,$sql);
    while($row=mysqli_fetch_array($result)){
        echo "<div id='img_div'>";
        echo "<img src='img/".$row['image']."' style='height:200px; width: 200px; float:left'>";
        echo "</div>";    }
?>
    <form action="save_photo.php" enctype="multipart/form-data" method="post">

   	    <input type="file" name="image"> 
   	    <input type="submit" name="submit" value="uploadimage" >
    </form>
    
</body>
</html>