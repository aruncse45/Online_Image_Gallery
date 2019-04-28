<?php include 'database.php' ; ?>
<?php 
    session_start();
    $t_name = $_SESSION['Username'];
    if (!isset($t_name))
        header("Location: login_&_Signup.php");

    $catagory=isset($_POST['cata']) ? $_POST["cata"] : "";
    $value=0;
    $value1=0;
    
    $i=0;
    $data=array();
    $data1=array();
    if(isset($_POST["add"])){
       
        $query = "SELECT catagory FROM " . $t_name . "_catagory Where catagory = '" . $catagory ."' ";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1){
          $value = 1;
        }
        else{  $value = 0; }
        
        if($value == 0){
           $query1 = "INSERT INTO " . $t_name . "_catagory(catagory) VALUES ('$catagory')";
    mysqli_query($connection , $query1);
       }
       
        }
        
        $catagory1 = isset($_POST['Catag']) ? $_POST["Catag"] : "";
        $about = isset($_POST['About']) ? $_POST["About"] : "";

        if(isset($_POST['upload'])){
            $target = "image/". $_SESSION['Username'] . "-" .basename($_FILES['image']['name']);
            $target1 = "imgg/" .basename($_FILES['image']['name']);
            $image = $_SESSION['Username'] . "-" .$_FILES['image']['name'];
            
            $query = "SELECT image FROM " . $t_name . "  Where image = '" . $image ."' ";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0){
              $value=8; 
              
            }
            else{
                $value=9;
                
            }
              
          
          if($value==9){
                $sql = "INSERT INTO " . $t_name . " (image,catagory,about) values ('$image', '$catagory1', '$about')";
                mysqli_query($connection, $sql);

                if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                
             }
                $sql1 = "INSERT INTO " . $t_name . "_recent (image) values ('$image')";
                mysqli_query($connection, $sql1);
            }


    if(isset($_POST['checkbox'])){
            $query = "SELECT image FROM share Where image = '" . $image ."' ";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) == 1){
               $value1=3;
              
            }
            else{ $value1=4;}

            if($value1==4){
                $sql= "INSERT INTO share(image) VALUES ('$image') ";
                mysqli_query($connection,$sql);
               }
              
            }
}

    



 ?>
        
<!DOCTYPE html>
<html>
<head>
	<title>upload image</title>
	<style type="text/css">
        body{
            
        }
        div#full{
            padding: 0;
            margin: 0;
            background-size: cover;
            height: 100%;
            width: 100%;
            
        }
        div#left{
            position: fixed;
            height: 100%;
            width: 34%;
            margin-left: 0px;
            
            background-color: #5CDB95;
        }
        div#navbar{ background-color: #708090; width: 100%; margin:auto; overflow: auto;}
        ul{padding: 0; margin: 0; list-style: none;}
        li{width:33.333%;background-color: #708090; float: left; }

        a#link{display: block; text-decoration: none;text-align:center; font-size: 15px; color:orange; text-transform: uppercase; font-weight: bold; padding:15.5px;}
        a#link:hover{background-color: #4169e1;  border-radius: 15px}
        div#upload_form{ 
            position: absolute;
            
            left: 50px;
            top: 70px;
            width: 350px;
            height: 78%;
            text-align: center;
            box-sizing: border-box;
            border-radius: 10px;
            background: rgba(0,0,0,0.3);
        }
        div#right{
            position: absolute;
            height: 100%;
            width: 65%;
            margin-left:459.3px;
            
            
            
        }
        div#header{
            position:fixed;
            width: 65%;
            margin:auto;
            height: 8.5%;
            background-color: #9acd32;
            border-radius: 20px 0;
            text-align: center;
            border-bottom: 5px solid #a0522d;
        }
        div#photo{
            background-color: #9acd32;
            background-size: cover;
            width:100%;
            margin-top: 6%;

           
        }
        .logout{height: 48px;width: 146px; padding: 5px;  background-color: #708090; border:2px solid #708090; font-size: 14px; color:orange; text-transform: uppercase; font-weight: bold;}
        .logout:hover{background-color: #4169e1; border:2px solid #4169e1; border-radius: 15px;cursor: pointer;}
        .form{margin-top: 30px;  color:#EEE2DC;}
        .file{ font-size: 20px; width: 220px; font-family: comic sans ms; color: #47C79C;box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.7) }
        .f_attri{font-weight: ; font-family: comic sans ms   }  
        
        .b{background-color: sienna; margin-top: 8%; height: 40px; width: 100px; border-radius: 10px; border:2px solid sienna; color:white; font-size: 15px;box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.7)}
        .c{height: 30px; width: 180px; border-radius: 10px; background-color: sienna; 
         border:2px solid sienna; color:white; box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.7);}
        .a:hover{padding: 3px}
        .b:hover{background-color: #4A3AAD ; border: 2px solid  #4A3AAD; padding: 10px }
        .c:hover{background-color: #4A3AAD; border: 2px solid  #4A3AAD}
        .d{height: 30px; width:100px; border-radius:2px dotted white; background-color: black; color:white}
        .d:hover{background-color: #1e90ff}
        .file:hover{padding: 2px}
        div#butt:hover{background-color: yellow}
        div#mymodal{
            display: none; 
        	position: fixed; 
        	z-index: 1;
            padding-top: 100px;     
        	left: 0; 
            top: 0; 
        	width:100%; 
        	height: 100%;
        	overflow: auto;
            background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);
            }
        div#modal_content{
        	position: relative; 
        	background-color: #c2b9b0;
        	margin: auto;
        	border: 1px solid #888; 
        	width: 40%; 
        	box-shadow: 0 4px 8px 0 rgba(0,0,0,0,2),0 6px 20px 0 rgba(0,0,0,0.9); 

            animation-duration:1.4s; 
            animation-name: animatetop;
            }
        @keyframes animatetop{ 
            from{top: -300px; opacity: 0}

                50%{top:-40px; opacity:0.5;
                    transform: rotate(360deg);
                }



             100%{top:0; opacity: 1;

             } 
         }
        .close{
            color:white; 
            float: right; 
            font-size: 28px; 
            font-weight: bold;
        }
        .close:hover,
        .close:focus{
            color:#000; 
            text-decoration: none;
            cursor: pointer;
         }
        div#modal_header{
            text-align: center;
            padding: 2px 16px; 
            background-color: #5d5c61;
            color: white;
         }
        div#modal_body{
            text-align: center;
            padding: 20px 16px;
        }
        div#modal_footer{
            text-align: center;
            padding: 5px 16px;
            background-color: #5d5c61; 
            color: white; 
        }
        
	</style>
</head>
<body>
    <div id="full">
        <div id="left">
            <div id="navbar">
                <ul>
                    <li><a id="link" href="User_pages.php">My page</a></li>
                    <li><a id="link" href="user_viwer.php">viwer zone</a></li>

                    <form action="upload_image.php " method="post"> 
                        <input type="submit" class="logout" name="Logout" value="log out" >
                    </form>
                </ul>
            </div>
            <div id="upload_form">
              
                <form class="form" action="upload_image.php"  enctype="multipart/form-data"  method=   "post">
                <font class="f_attri" style="line-height: 70px; font-size: 20px; color:#ffff00; text-shadow: 5px 5px 5px rgba(0,0,0,0.7)">Upload your photo here</font>

                    <div class="error" > 
                    <?php  if(isset($_POST["upload"])){
                        if($value==8){ echo "this is already exist";}
                  } ?> 
                  </div>

                    <input  class="file" type="file" name="image"><br><br>

                    <div style="color:#ffc346; text-align: center;"><?php if(isset($_POST["add"])){if($value==1){echo "Already exists.please choose another.";} elseif ($value1==1) {
                        echo "DONE";
                    }} ?></div>
                    <input id="butt" class="c"  type="button"  value="Add new catagory type"><br><br>

                    <font class="f_attri" style="line-height: 40px; margin-top: 5%; ">Catagory :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>

                    <select class="a" name="Catag" style="height: 25px; width: 160px; border-radius: 10px; border: 1px solid white;" >
                      
                    <?php 
                        $q = "Select catagory from " . $t_name . "_catagory";
                        $r = mysqli_query($connection, $q);
                    ?>
                      
                      <?php
                        while($option = mysqli_fetch_assoc($r)) {
                            echo "<option>" . $option["catagory"] . "</option>";
                        }
                      ?>
                    </select><br><br>

                    <font class="f_attri" style="padding-top: 10%">About photo :</font>

                    <textarea class="a" style="border-radius: 10px; border: 1px solid white;" class="textarea" name="About" cols="18" rows="3" placeholder="About this photo"></textarea><br><br>

                     <div class="error" > 
                        <?php  if(isset($_POST["checkbox"])){
                        if($value1==3){ echo "this is already shared";}
                        } ?> </div>

                    <input type="checkbox" value="checkbox1" name="checkbox">
                    <font size="3" face="elephant" color="#EEE2DC">
                        Share to all</font><br>

                    <input class="b" style="  " type="submit" name="upload" value="UPLOAD">
                    <br>
                    
                </form>
            </div>
        </div>   
        <div id="right">
            <div id="header">
                <font style="  font-size: 25px; color:#00ffff; font-family: comic sans ms;text-shadow: 5px 5px 5px rgba(0,0,0,0.7)">Your recent uploaded photos</font>
            </div>  
            <div id="photo">
               <?php
                        $sql="select image from " . $t_name . "_recent ";
                        $result=mysqli_query($connection,$sql);
                        while($row=mysqli_fetch_array($result)){
                            
                            echo "<img src='image/".$row['image']."' style='height:200px; margin-left:10px; width: 200px; float:left'>";
                              }
                ?>
            </div>  
        </div>
        <div id="mymodal">
                        <div id="modal_content">
                            <div id="modal_header">
                                <span class="close">&times;</span>
                                <h2>Add a catagory</h2>
                            </div> 
                            <div id="modal_body">
                                <form action="upload_image.php" method="post">
                                    <font style="color:#000000; font-size: 20px">Catagory:&nbsp;&nbsp;&nbsp;</font>
                                    <input class="cata" style="height: 20px; border-radius: 5px" type="text" name="cata"><br><br>
                                    <input class="d" style=" "  type="submit" name="add" value="ADD">
                                </form>
                            </div>  
                            <div id="modal_footer">
                                <font>This catagory will be add in your catagory type</font>
                            </div>
                        </div>
                    </div>
    </div>    
   

    	    
    
   
    <script type="text/javascript">
    	var modal = document.getElementById('mymodal');
    	var btn = document.getElementById("butt");
    	var span = document.getElementsByClassName("close")[0];
    	btn.onclick = function(){
    		modal.style.display = "block";
    	}
    	span.onclick = function(){
    		modal.style.display = "none";
    	}
    	window.onclick = function(event){
    		if(event.target == modal){
    			modal.style.display = "none";
    		}
    	}
    </script>
<?php
    if(isset($_POST["Logout"])){
        
            $sql4=" DELETE  FROM  " . $t_name . "_recent" ;
               mysqli_query($connection, $sql4);
            echo "<script type=''text/javascript>

                window.location.href='login_&_Signup.php';
            </script>";
            session_destroy();
      }
 ?>
   
</body>
</html>