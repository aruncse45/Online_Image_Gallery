<?php include 'database.php' ; ?>
  
<?php
    session_start();

    $username = isset($_POST["Username"]) ? $_POST["Username"] : "";
    $password = isset($_POST["Password"]) ? $_POST["Password"] : "";
    $radio = isset($_POST["Radio"]) ? $_POST["Radio"] : ""; 
    $value=0;
    $v=0;
     
      if($radio == "admin"){
        //$query = 'SELECT * FROM user Where username = \'' . $username .'\' AND password = \'' . $password . '\'';
        $query = "SELECT * FROM admin Where username = '" . $username ."' AND password = '" . $password . "'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1){
          echo "done admin";
          session_start();
          $_SESSION['Password']= $password;
        }
        else{  $value=1; }
          
      }
       
      else if($radio == "user"){
        //$query = 'SELECT * FROM user Where username = \'' . $username .'\' AND password = \'' . $password . '\'';
        $query = "SELECT * FROM user Where username = '" . $username ."' AND password = '" . $password . "'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1){
          $_SESSION['Username']= $username;
          header("location: user_pages.php");
          
        }
        else{ $value=1;}
          
      }
      else if($radio == "viwer"){
        $query = "SELECT * from viwer where username = '" . $username ."' AND password = '" . $password ."' ";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1){
           $_SESSION['Username']= $username;
          header("location: viwer_page.php");
        }
        else{  $value=1;}
      }
      
    
   
  ?>



<!DOCTYPE html>
<html>
<head>
	<title>Login & Signup</title>
	<style type="text/css">
    body{background-image: url(autumn.jpg); background-repeat: no-repeat; background-size: cover; font-family: arial rounded mt bold;}
		div#login_form{ background-color:#D2B48C ; background-color: rgba(0,0,0,0.4); padding-top: 15px; margin:auto; margin-top: 7%; width: 30%; height: 70%; border-radius: 10px }
		.a{margin-left: 35%; padding-top: 30px; text-align: center;}
		.login_attribute{font-family: vrinda; color:white; font-size: 20px; margin-left: 20%; line-height: 30px}
		.blank_space{margin-left: 80px; height: 20px;border:none; border-bottom: 1px solid #fff; background: transparent;outline: none; font-size: 16px}
    .blank_space:hover{padding:3px;} 
        .radio{color:white; font-size: 20px; padding-left: 110px; margin-top: 40px}
         .radioo{color:white; font-size: 20px; margin-left: 50px; margin-top: 40px}
		.login_attribute_button{margin-left:25%;height: 35px; width:200px; border-radius: 10px; background-color: #5cdb95; border:#5cdb95; font-size: 17px; color:#ff1493; font-weight: bold;}
		.login_attribute_button:hover{background-color: #ffe400; color:red;}
		.login_attribute_button:active{background-color: #FFA500}
        div#show{height:20px; width:10%; margin-top: 50px; margin-left: 50px}
         .user{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            position: absolute;
            top: calc(+50px/2);
            left: calc(50% - 50px);
        }
        .error{ margin-left: 100px; color:#00ff7f; font-family: vrinda }
	</style>
</head>
<body>
    <div id="login_form">
      <img class="user" src="id.png">
      <form action="login_&_Signup.php" method="post">
      <br><br>
        <font class="a"  color="yellow" size="5px" >
            <b>Log in here</b>
        </font><br><br><br>
         <div class="error" > 
        <?php  if(isset($_POST["login"])){
          if(!isset($_POST["Username"]) || empty($_POST["Username"])){echo "* Username cant be blank"; $v=2;}
         } ?> </div>
        <font class="login_attribute" > Username:&nbsp;&nbsp;&nbsp;</font><br>
    	  <input class="blank_space" type="text" placeholder="Your name" name="Username" value="<?php echo $username ?>" size="30"><br><br>
        <div class="error"><?php if(isset($_POST["login"])){
          if(!isset($_POST["Password"]) || empty($_POST["Password"])){
            echo "* Password cant be blank"; $v=2;} } ?></div>
    	  <font class="login_attribute"  > Password:&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
    	  <input class="blank_space" type="password" placeholder="........." name="Password" size="30" ><br><br>
        <div class="error" style=" "><?php if(isset($_POST["login"])){
          if($v==2){}
            elseif ($value==1) {
              echo"Username or Password is incorrect";
            }
          } ?></div>
        
        <font class="radio">User</font>
        <input class="radio" type="radio" name="Radio" value="user">
        <font   class="radioo">Viwer</font>
        <input  class="radio" type="radio" name="Radio" value="viwer"><br><br><br>
        <input class="login_attribute_button" type="submit" name="login" value="Login" ><br><br>
        <input class="login_attribute_button" type="button" name="signup" value="Signup" onclick="location.href='signup.php';">
        <br><br><br>
      </form>
    </div> 
</body>
</html>