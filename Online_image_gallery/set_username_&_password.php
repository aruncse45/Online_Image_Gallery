<?php include 'database.php' ; ?>

<?php
    session_start();

    $username=isset($_POST['Username']) ? $_POST["Username"] : "";
    $password=isset($_POST['Password']) ? $_POST["Password"] : "";
    $radio = isset($_POST["Radio"]) ? $_POST["Radio"] : ""; 
    $value1 = 0;
    $value2 = 0;
    $errors = array();
    
    if(isset($_POST["login"])){
      $field_required = array("Username","Password");
      foreach ($field_required as $field) {
        $value = $_POST[$field];
        if(!isset($value) || empty($value)){
          $errors[$field] = $field;
        } 
        else {
          $errors[$field] = "";
        }
      }
    }
    
    if(isset($_POST["login"])){
       if($radio=="user"){
      if($_POST["Username"] != ""){
       $query1 = "SELECT username from user where username = '". $username ."' ";
       $result1 = mysqli_query($connection, $query1);
       if(mysqli_num_rows($result1) == 1){
         $value1=1;
      }
       else{$value1=2;}
      }
       if($_POST["Password"] != ""){
       $query2 = "SELECT password from user where password = '". $password ."' ";
       $result2 = mysqli_query($connection, $query2);
       if(mysqli_num_rows($result2) == 1){
         $value2=1;
      }
       else{$value2=2;}
      }
    }
          if($radio=="viwer"){
      if($_POST["Username"] != ""){
       $query1 = "SELECT username from viwer where username = '". $username ."' ";
       $result1 = mysqli_query($connection, $query1);
       if(mysqli_num_rows($result1) == 1){
         $value1=1;
      }
       else{$value1=2;}
      }
       if($_POST["Password"] != ""){
       $query2 = "SELECT password from viwer where password = '". $password ."' ";
       $result2 = mysqli_query($connection, $query2);
       if(mysqli_num_rows($result2) == 1){
         $value2=1;
      }
       else{$value2=2;}
      }
    }
    }


  
    if($radio=="user"){
     if($value1 == 2 && $value2 == 2 ){
     
     
      $query = "INSERT INTO user(username, password) VALUES ('$username','$password')";
    mysqli_query($connection , $query);
    
    $query1 = "CREATE TABLE " . $username . "( id int(20) NOT NULL AUTO_INCREMENT, image varchar(200), catagory varchar(20), about  varchar(200), primary key (id) )";
    mysqli_query($connection , $query1);

     $query2 = "CREATE TABLE " . $username . "_catagory( id int(10) not null AUTO_INCREMENT,catagory varchar(20),PRIMARY key (id)
         ) ";
         mysqli_query($connection , $query2);

         $query3 = "CREATE TABLE " . $username . "_recent( id int(10) not null AUTO_INCREMENT,image varchar(200),PRIMARY key (id)
         ) ";
         mysqli_query($connection , $query3);
        header("location: user_pages.php");
    $_SESSION['Username']= $username;
   
    }   
  }
  

     if($radio=="viwer"){
     if($value1 == 2 && $value2 == 2 ){
       
      $query = "INSERT INTO viwer(username, password) VALUES ('$username','$password')";
    mysqli_query($connection , $query);
    $_SESSION['Username']= $username;
            header("location: viwer_page.php");

    }   
  }
   

  ?> 
  
<!DOCTYPE html>
<html>
  <head>
	  <title>Set username & password</title>
    	<style type="text/css">
          body{background-image: url(s.jpg); background-repeat: no-repeat; background-size: cover}
      		div#form{padding-top: 20px;  margin:auto;  background-color: rgba(0,0,0,0.4); margin-top: 10%; width: 30%; height: 50%; border-radius: 10px;text-align: center  }
      		.a{font-family: vrinda; }
      		.login_attribute{color:white; font-size: 20px;  font-family: vrinda;}
      		.blank_space{height: 20px; background: transparent; border:none; outline: none; border-bottom: 1px solid #fff}
          .radio{color:white; font-size: 20px;}
      		.login_attribute_button{padding: 10px;   background-color: #1818ff; border:#1818ff;  box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.7); width:100px; font-family: ALGERIAN; color: white; font-size: 15px; border-radius: 10px}
          .blank_space:hover{padding:3px;}
      		.login_attribute_button:hover{background-color: #a52a2a}
      		.login_attribute_button:active{background-color: #008F8F}
          .error{ color:#FFFF00;}
    	</style>
  </head>
<body>
    <form action="set_username_&_password.php" method="post">
        <div id="form">
          <font class="a" color="yellow" size="5px" >
        	 <b>Set your username & password</b>
            </font><br><br><br>

          <div class="error"><?php if(isset($_POST["login"])){if($errors["Username"]=="Username"){ echo "*Username cant be blank.";} if($value1==1) {echo "*Please chosse another Username";}} ?></div>

          <font class="login_attribute"> Username</font><br>
    	    <input class="blank_space" type="text" placeholder="any name" name="Username" size="30"><br><br>

          <div class="error"><?php if(isset($_POST["login"])){if($errors["Password"]=="Password"){ echo "*Password cant be blank.";} if($value2==1) {echo "*Please chosse another Password";}} ?></div>

    	    <font class="login_attribute"> Password</font><br>
    	    <input class="blank_space" type="text" placeholder="........." name="Password" size="30" minlength="8"><br><br><br>
          <font class="radio" style="">User</font>
          <input class="radio" type="radio" name="Radio" value="user">
          <font class="radio" style="margin-left: 50px">Viwer</font>
          <input class="radio" type="radio" name="Radio" value="viwer"><br><br><br>
          <input class="login_attribute_button" type="submit" name="login" value="Login" onclick="">
          <br><br><br>
        </div>
    </form>
</body>
</html>