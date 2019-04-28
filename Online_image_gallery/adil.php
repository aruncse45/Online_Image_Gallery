<?php include 'database.php' ; ?>
<?php 
    session_start();
    $name = $_SESSION['Username'];
    $slide= 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>User page</title>

    <script src="jk.js" type="text/javascript"></script>
    <script src="bal.js" type="text/javascript"></script>

	<style type="text/css">
		html{background-image: url(form_img.png);}
        div#full{position: absolute; height: 100%; width: 100%}
       div#up{position: fixed; width: 100%; height: 70px;   background-color: rgba(0,0,0,0.4);  }
        div#header{text-align: center; color:yellow;  float: left; margin-top: 4px;  width:70%; height: 46px; }
        .head{text-transform: uppercase;}
		div#navbar{ width:30%;  float: right; margin-top: 10px }
		ul{padding: 0; margin: 0; list-style: none;}
		li{background-color: #cd853f; float: left;}
		a:link{display: block; text-decoration: none;font-size: 15px; color:white; text-transform: uppercase; font-weight: bold; padding:15px;}
        a:link:hover{background-color: #800000}

        .logout{height: 48px;width: 146px; padding: 5px;  background-color: #cd853f;  border:2px solid #cd853f; font-size: 14px; color:white; text-transform: uppercase; font-weight: bold;}
        .logout:hover{background-color: #800000; border:2px solid #800000; cursor: pointer; }
        div#down{margin-top: 80px; height: 100%; width: 100%; border-top: 5px solid white;}








        #hello img
        {
            height: 200px;
            width:300px;
           
        }



    </style>


    <script type="text/javascript">
        $(document).ready(function()
            
            {
                $('#hello').cycle({ 
    fx:    'shuffle', 
    delay: -4000 
});
            }
        
        );
    </script>


</head>
<body>
    <div id="full">    
        <div id="up">
            <div id="header">
            	<font size="10px"  class="head"><?php echo $name;echo "'s"; ?> gallery</font>
            </div>
            <div id="navbar">
            	<ul>
            		<li><a href="#">HOME</a></li>
            		<li><a href="#">UPLOAD IMAGE</a></li>
                    <input type="button" class="logout" name="logout" value="logout">
            		
            	</ul>
            </div>
        </div>
        <div id="down">
           
            <?php 
                $i=0;
                $q = "Select *from " . $name . "_catagory";
                $r = mysqli_query($connection, $q);

                while($option = mysqli_fetch_array($r)) {
                   echo "<a href='users.php?catagory={$option["catagory"]}' style='float:left;height:400px; width: 400px; margin-left:50px;  '>";
                   echo "<div id='". $option["catagory"] ."'  style='height:400px; width: 400px; margin-left:50px; float:left; box-shadow:5px 5px 5px 5px rgba(0,0,0,0.7)' >";
                    echo "<font>this is ". $option["catagory"] ."";
                    echo "</font>";
                    $opt=$option["catagory"]; 
                    
    
                    $query="select *from $name where catagory='$opt'";
                   
                  
                 
                    $result=mysqli_query($connection, $query);


                    while($row = mysqli_fetch_array($result)){
                        $arr[$i++] =$row['image'];
            
                    }
                    echo "</div>";
                    echo "</a>";
           
                } 

                for($j=1;$j<9;$j++)
                {
                                    for($i=$j;$i<=($j+1);$i++)
                    {
                        echo "<div id='hello'>";
                        echo "<img  src='image/".$arr[$i]."'";

                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>




     <script type="text/javascript" src="uikit/js/uikit.min.js"></script>
</body>
</html>