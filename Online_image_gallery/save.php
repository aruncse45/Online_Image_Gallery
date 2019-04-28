<?php include 'database.php' ; ?>
<?php 
    $msg="";
    if(isset($_POST['submit'])){
    	$target="image/".basename($_FILES['image']['name']);
    	$image= $_FILES['image']['name'];
        
        $sql="INSERT INTO photo(image) values ('$image')";
        mysqli_query($connection, $sql);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        	echo "done";
    	    }
    	    else {
                echo "nott";
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>save image</title>
</head>
<body>
    <form action="save.php" enctype="multipart/form-data" method="post">

   	    <input type="file" name="image"> 
   	    <input type="submit" name="submit" value="uploadimage" >
    </form>
    
</body>
</html>