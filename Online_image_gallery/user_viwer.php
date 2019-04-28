<?php include 'database.php' ; ?>
<?php   
    session_start();
    $nameee = $_SESSION['Username'];
    if (!isset($nameee))
        header("Location: login_&_Signup.php");

    if(isset($_POST["Logout"])){
        
        $sql4="DELETE FROM  " . $nameee . "_recent where 1" ;
         mysqli_query($connection, $sql4);
       
            session_destroy();
            echo "<script type=''text/javascript>

                window.location.href='login_&_Signup.php';
            </script>";
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Viwer page</title>
    <style type="text/css">
        html{background-color: #6495ed}
        div#full{position: absolute; height: 100%; width: 100%}
       div#up{position: fixed; width: 100%; height: 70px;   background-color: rgba(0,0,0,0.4);  }
        div#header{text-align: center; color:yellow;  float: left; margin-top: 4px;  width:50%; height: 46px; }
        .head{text-transform: uppercase;}
        div#navbar{ width:40%;  float: right; margin-top: 10px;  }
        ul{padding: 0; margin: 0; list-style: none;}
        li{background-color: #cd853f; float: left;}
        a#link{display: block; text-decoration: none;font-size: 15px; color:white; text-transform: uppercase; font-weight: bold; padding:15px;}
        a#link:hover{background-color: #800000}

        .logout{height: 49px;width: 120px; padding: 5px;  background-color: #cd853f;  border:2px solid #cd853f; font-size: 14px; color:white; text-transform: uppercase; font-weight: bold;}
        .logout:hover{background-color: #800000; border:2px solid #800000; cursor: pointer; }
        div#down{margin-top: 80px; height: 100%; width: 100%; border-top: 5px solid white}
        div#img_div{animation-name: n; animation-duration: 3s;}
        @keyframes n{from{margin-left: -1500px} to{margin-left: 0px}}
        div#img_div:hover{cursor: pointer; }
        .photo img{height: 100%; width:100%; transition: all 1s ease;}
        .photo img:hover{transform: scale(1.5);}
    </style>
</head>
<body>
    <div id="full">    
        <div id="up">
            <div id="header">
                <font size="10px"  class="head">Photograph Zone</font>
            </div>
            <div id="navbar">
                <ul>
                    <li><a id="link" href="project++.php">homepage</a></li>
                    <li><a id="link" href="User_pages.php">my page</a></li>
                    <li><a id="link" href="upload_image.php">upload image</a></li>
                    <form action="user_viwer.php" method="post"> 
                        <input type="submit" class="logout" name="Logout" value="logout" >
                    </form>
                </ul>
            </div>
        </div>
        <div id="down">
           <?php 
            
                $sql= " SELECT image from share   ";
                $result= mysqli_query($connection, $sql);

                 while($row=mysqli_fetch_array($result)){
        echo "<div class='photo' id='img_div'>";
        echo "<img src='image/".$row['image']."' style='height:200px; width: 200px; float:left; margin-left:10px; margin-top:10px; '>";
         echo "</div>"; 
}
             ?>


        </div>
    </div>

    
</body>
</html>