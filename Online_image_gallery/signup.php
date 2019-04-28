<?php include 'database.php' ; ?>

<?php
    
      $name = isset($_POST["Name"]) ? $_POST["Name"] : "";
      $age = isset($_POST["Age"]) ? $_POST["Age"] : "";
      $date_of_birth = isset($_POST["Birth_date"]) ? $_POST["Birth_date"] : "";
      $country = isset($_POST["Country"]) ? $_POST["Country"] : "";
      $gender = isset($_POST["Gender"]) ? $_POST["Gender"] : "";
      $national_id = isset($_POST["National_id"]) ? $_POST["National_id"] : "";
      $occupation = isset($_POST["Occupation"]) ? $_POST["Occupation"] : "";
      $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
      $mobile_no = isset($_POST["Mobile_no"]) ? $_POST["Mobile_no"] : "";
      $value1=0;
      $value2=0;
      $value3=0;
      $value=0;
      $errors = array();
      
     if(isset($_POST["submit"])){
      $field_required = array("National_id","Email","Mobile_no");
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
      
    if(isset($_POST["submit"])){
      if($_POST["National_id"] != ""){
        $query1 = "SELECT national_id from information_form where national_id = '". $national_id ."' ";
        $result1 = mysqli_query($connection, $query1);
        if(mysqli_num_rows($result1) == 1){
            $value1=1;
        }
       else{$value1=2;}
     }
      
      if($_POST["Email"] != ""){
        $query2 = "SELECT email_address from information_form where email_address = '". $email ."' ";
        $result2 = mysqli_query($connection, $query2);
        if(mysqli_num_rows($result2) == 1){
            $value2=1;
       }
          else{$value2=2;}
     }
      
      if($_POST["Mobile_no"] != ""){
        $query3 = "SELECT mobile_no from information_form where mobile_no = '". $mobile_no ."' ";
        $result3 = mysqli_query($connection, $query3);
        if(mysqli_num_rows($result3) == 1){
            $value3=1;
       }
       else{$value3=2;}
     }
      }
      
      if($value1 == 2 && $value2 == 2 ){
        if( $value3 == 2 )  {
          $query = "INSERT INTO information_form (name,age,date_of_birth,country,gender,national_id,occupation, email_address,mobile_no) VALUES 
           ('$name','$age','$date_of_birth','$country','$gender', '$national_id','$occupation','$email','$mobile_no')";
           mysqli_query($connection , $query);
           header("location: set_username_&_password.php");
         }
    }
   

  ?> 

<!DOCTYPE html>
<html>
<head>
  <title>Sign_Up</title>
  <style type="text/css">
   body{background-image: url(form_img.png); background-repeat: no-repeat;}

    div#form{background-color: white; margin-left: 400px; margin-top: 20px;  width:35%; height:100%; box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.7); }
    div#form_title{background-color:#6e6658 ;  height:60px; width:100%; text-align: center; padding-top: 20px;}
    div#form_attributes{padding-left: 65px; width:100%; line-height: 25px;}
    .form_attribute{ font-size: 20px;  }
    .input{ border-radius: 10px; height: 30px; transition-duration: .3s}
    .input:hover{padding:3px;}
    .radio:hover{margin-top:  3px;}
    .form_button{background-color:#374785; border-radius: 10px; color: white; width:100px; font-size: 15px; padding: 10px; }
    .form_button:hover{background-color: #9b786f;}
    .error{padding-left: 150px; color:red;}

    
  </style>
</head>
<body>
 
    <div id="form">
      <form action="signup.php" method="post">
        <div id="form_title"><font size="5px" color="white" style="  "><b>Please fillup required information.</b> </font></div><br><br>
        <div id="form_attributes">
          <font class="form_attribute">Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          <input class="input" type="text" name="Name" placeholder="Your name" value="<?php echo $name ?>" size="30" ><br><br>
          <font class="form_attribute" style="line-height: 20px">Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          <input class="input" type="text" placeholder="Your age" value="<?php echo $age ?>" name="Age" size="30"><br><br>
          <font class="form_attribute">Date of Birth:&nbsp;&nbsp;&nbsp;&nbsp;</font>
          <input class="input" type="text" placeholder="Your birth date" value="<?php echo $date_of_birth ?>" name="Birth_date" size="30"><br><br>
          <font class="form_attribute">Country:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          <select class="input" style=" height: 28px; width: 200px; font-size: 15px" placeholder="Your Country" value="<?php echo $country ?>" name="Country" width="100%">
                <option>Bangladesh</option>   
                <option>India</option> 
                <option>Nepal</option> 
                <option>Vutan</option> 
                <option>Maldip</option> 
                <option>Srilanka</option>
                <option>Pakistan</option>
          </select><br><br>
          <font class="form_attribute">Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          <font class="form_attribute">Male:</font>
          <input class="radi" type="radio" name="Gender" value="male">&nbsp;&nbsp;&nbsp;&nbsp;
          <font class="form_attribute">Female:</font>
          <input class="radi" type="radio" name="Gender" value="Female"><br><br>

          <div class="error"><?php if(isset($_POST["submit"])){if($errors["National_id"]=="National_id"){ echo "*National_id cant be blank.";} if($value1==1) {echo "*Please chosse another";}} ?></div>

          <font class="form_attribute">National id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          <input class="input" type="text" placeholder="Your national id no" value="<?php echo  $national_id ?>" name="National_id" size="30" ><br><br>
          <font class="form_attribute">Occupation:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          <input class="input" type="text" placeholder="Your work name" value="<?php echo $occupation ?>"  name="Occupation" size="30"><br><br>

          <div class="error"><?php if(isset($_POST["submit"])){if($errors["Email"]=="Email"){ echo "*Email cant be blank.";} if($value2==1) {echo "*Please chosse another email address";}} ?></div>

          <font class="form_attribute">Email address:&nbsp;&nbsp;</font>
          <input class="input" type="text" placeholder="Your email address" value="<?php echo $email ?>" name="Email" size="30"><br><br>

          <div class="error"><?php if(isset($_POST["submit"])){if($errors["Mobile_no"]=="Mobile_no"){ echo "*Mobile_no cant be blank.";}if($value3==1) {echo "*Please chosse another mobile number";}} ?></div>

          <font class="form_attribute">Mobile no:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          <input class="input" type="text" name="Mobile_no" placeholder="Your mobile number" value="<?php echo $mobile_no ?>" size="30"><br><br><br>
          <input class="form_button" style="margin-left: 40px" type="reset" name="clear" value="CLEAR ALL" >
          <input class="form_button" style="margin-left: 50px" type="submit" name="submit" value="SUBMIT" >
          <br><br>
        </div>
      </form> 
    </div>
   
   
</body>
</html>   