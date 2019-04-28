<?php include 'database.php' ; ?>
<?php 
    session_start();
    $name = $_SESSION['Username'];
    $slide= 0;
    if (!isset($name))
        header("Location: login_&_Signup.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>User page</title>
	<style type="text/css">
		html{background-color: #6495ed}
        div#full{position: absolute; height: 100%; width: 100%}
       div#up{position: fixed; width: 100%; height: 70px;   background-color: rgba(0,0,0,0.4);  }
        div#header{text-align: center; color:yellow;  float: left; margin-top: 4px;  width:50%; height: 46px; }
        .head{text-transform: uppercase;}
		div#navbar{ width:43%;  float: right; margin-top: 10px }
		ul{padding: 0; margin: 0; list-style: none;}
		li{background-color: #cd853f; float: left; color: white;}
		a#link{display: block; text-decoration: none;font-size: 15px; color: white;  text-transform: uppercase; font-weight: bold; padding:15px;}
        a#link:hover{background-color: #800000}

        .logout{height: 49px;width: 146px; padding: 5px;  background-color: #cd853f;  border:2px solid #cd853f; font-size: 14px; color:white; text-transform: uppercase; font-weight: bold;}
        .logout:hover{background-color: #800000; border:2px solid #800000; cursor: pointer; }
        div#down{margin-top: 80px; height: 100%; width: 100%; border-top: 5px solid white; }
        .a:hover{box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.7)}
	</style>
</head>
<body>
    <div id="full">    
        <div id="up">
            <div id="header">
            	<font size="10px"  class="head"><?php echo $name;echo "'s"; ?> gallery</font>
            </div>
            <div id="navbar">
            	<ul>
            		<li><a id="link"  href="project++.php">HOMEPAGE</a></li>
                    <li><a id="link" href="user_viwer.php">VIWER ZONE</a></li>
            		<li><a id="link" href="upload_image.php">UPLOAD IMAGE</a></li>
                   <form action="User_pages.php " method="post"> 
                <input type="submit" class="logout" name="Logout" value="log out" >
            </form>
            		
            	</ul>
            </div>
        </div>
        <div id="down">
           
            <?php 

                $q = "Select * from " . $name . "_catagory";
                $r = mysqli_query($connection, $q);
                
                while($option = mysqli_fetch_array($r)) {
                   echo "<a href='users.php?catagory={$option["catagory"]} '>";
                   echo "<div class='a' id='". $option["catagory"] ."'  style='height:300px; width: 300px; margin-left:50px; float:left; border:2px solid blue; text-align:center; ' >";
                    echo "<font style='font-size:20px; color:#f0fff0; text-transform:uppercase; font-weight:bold;'>";
                    echo "". $option["catagory"] ."";
                    echo "<br>";

                    echo "</font>";
                    $opt=$option["catagory"]; 
                    
    
                    $query="select *from $name where catagory='$opt'";
                   
                  
                 
                    $result=mysqli_query($connection, $query);


                    while($row = mysqli_fetch_array($result)){
                        echo "<img  src='image/".$row['image']."' style='height:50px; width: 50px; display: block; float:left'>";
                    }
                    echo "</div>";
                    echo "</a>";
           
                }
            ?>
        </div>
    </div>
    <?php
    if(isset($_POST["Logout"])){
         $sql4=" DELETE  FROM  " . $name . "_recent" ;
               mysqli_query($connection, $sql4);
            
            echo "<script type=''text/javascript>

                window.location.href='login_&_Signup.php';
            </script>";
            session_destroy();
      }
 ?>
</body>
</html>