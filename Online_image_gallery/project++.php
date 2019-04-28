<!DOCTYPE html>
<html>
<head>
	<title>ONLINE PHOTO GALLERY</title>
	<style type="text/css">
        html{background-color:#00BFFF;  }
        div#full{position: absolute; height: 100%; width: 100% }
        div#front_name{position: fixed; width:100%; height:70px; padding-top: 10px;  text-align: center; color:white; background-image:url(front_name3.jpg);  }
        div#a{ animation-name: n; animation-duration: 3s}
        @keyframes n{from{margin-left: -1500px} to{margin-left: 0px}}
		
        
		div#front_button{ position: fixed; background-color: white; margin-top: 80px; width:52.3%; height:45px;}
		.button{ cursor:pointer;border:none; background-color: white; padding-left: 16px; padding-right: 15px;  height: 45px; font-family: ALGERIAN; font-size: 15px; color: #770077; position: relative; text-align: center; transition-duration: 0.4s; overflow: hidden;  }
		
		.button:hover{background-color: #C0C0C0;  }
        .button:active{color:#808000;}
        div#body{ height:80%; margin-top: 125px; width: 100%;  text-align: center;  }
        div#right{position: fixed; margin-left: 80%; text-align: center;  height: 300px; width: 220px;   background-color: #00005B; border-radius:15px 0px; box-shadow: 5px 5px 5px  rgba(0,0,0,0.7); animation-name: m; animation-duration: 3s }
         @keyframes m{from{margin-top: -700px} to{margin-top: 0px}}

        div#left{margin-left: 8%; height: 300px; width: 600px; margin-top: 9%; box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.7);float: left; border-radius: 20px; border: 5px solid #778899;  }
        .slide{ height: 300px; width: 600px; animation-name: fade; animation-duration: 1.5s; border-radius: 20px }
        @keyframes fade{from{opacity: .4} to{opacity: 1}  }
        div#footer{position: absolute;  height: 100px; width: 100%; background-color: #405060}
       .signup{height: 40px; width: 180px; border-radius: 10px; background-color: #8a5500; 
         border:2px solid #8a5500; color:white; box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.7);}
        .signup:hover{background-color: #4A3AAD; border: 2px solid  #4A3AAD; cursor: pointer;}
        div#term{float: left; height:100%; width: 60% }
        div#photo{position:absolute; height: 30px; margin-top: 40px;   }
         a{cursor: pointer;}

        .photo img{height: 40px; width:40px; margin-top: 40px; margin-left: 10px; transition: all 1s ease; }
        .photo img:hover{transform: scale(1.2);box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.7);}

        
          div#mymodal{
            display: none; 
            position: fixed; 
            z-index: 1;
            padding-top: 80px;     
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
            width: 60%; 
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0,2),0 6px 20px 0 rgba(0,0,0,0.9); 

            animation-duration:1.4s; 
            animation-name: animatetop;
            }
        @keyframes animatetop{ 
            from{top: -300px; opacity: 0}
                100%{top:0; opacity: 1;  transform: rotate(360deg);} 
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
            
            
            height: 400px;
            width: 
        }
        div#modal_footer{
            text-align: center;
            padding: 15px 16px;
            background-color: #5d5c61; 
            color: white; 
        }
	</style>
</head>
<body>
    <div id="full">    
        <div id="front_name">
            <div id="a">
        	    <font size="15px"  >Online Photo Gallery</font> 
            </div>
        </div>
        
        <div id="front_button">
            <input id="butt" class="button" type="button" value="Discription" >
            <input class="button" type="button" value="Homepage" onclick="location.href='project++.php';">
            <input class="button" type="button" value="Favourite Photos" onclick="location.href='viwer_page.php';">
            <input class="button" type="button" value="Terms & Condition" onclick="location.href='#term';">
            <input class="button" style="width: 100px" type="button" value="Login" onclick="location.href='login_&_Signup.php';">
        </div>
        <div id="body">
            <font size="15px" color="orange"  style="margin-left: -50%; font-family: vrinda; text-shadow: 5px 5px 5px rgba(0,0,0,0.7)  ">We care about your memory</font>
            <div id="left">
                <img class="slide" src="form_img.png" style="">
                <img class="slide" src="from_image.jpg" style="">
                <img class="slide" src="image.jpg" style="">
                <img class="slide" src="front_name3.jpg" style="">
                <img class="slide" src="front_name2.jpg" style="">
                <img class="slide" src="login.jpg" style="">
                <img class="slide" src="login1.jpg" style="">
                <img class="slide" src="login2.jpg" style="">
                <img class="slide" src="s.jpg" style="">

            </div>

            <div id="right">
            <br><br>
            <input type="button" class="signup" name="signup" value="Create your own account" onclick="location.href='signup.php';"><br><br>
                <font size="5px" color="#ff4500"> Create your own account as a user or viwer.<br>
                       Please read the description.
                  </font>

            </div>
        </div>
        <div id="footer">
            <div id="term">
                <font size="4px" color="#fffafa" style="margin-top: 10px; margin-left: 20px "><a name="term"> Terms & Conditions </a></font>
                <ul style="margin-left: 20px; color: #fffafa" >
                    <li> You should store a valid image. </li>
                    <li>Image must be hand photography.</li>
                </ul>
            </div>
            <div class="photo">
            <a href="#"><img class="media" src="f.png"></a>
            <a href="#"><img class="media" src="i.jpg"></a>    
            <a href="#"><img class="media" src="imo.png"></a>     
            <a href="#"><img class="media" src="t.jpg"></a>    
            <a href="#"><img class="media" src="w.png"></a>    
            <a href="#"><img class="media" src="line.png"></a>    
            </div>    
        </div>

        <div id="mymodal">
            <div id="modal_content">
                <div id="modal_header">
                    <span class="close">&times;</span>
                    <h2>Wellcome to this website.</h2>
                </div> 
                <div id="modal_body">
                    <h4>Hello...</h4>
                    This is an photo gallery website. Using this website you can save your image in online. Viewing this website you will get the real test of photography.  
                    
                    <h4>Advantages:</h4>
                    <ul>
                        <li>You can easily save your image in this website Using the website server. In this way you can save your own PC/Mobile memory.</li>
                        <li>Any people from any place can see your photos by using this website if you want(By shareing your username & password). </li>
                        <li>you can create image catagory type on your own and save image by those catagories.</li>
                        <li>You can share your personal photography with all of the members of this website.</li>
                        <li>By using this website you can see camera photography of many photographers(who has account in this website).</li>
                        
                    </ul>
                    <h4>Rules:</h4>
                    <ul>
                        <li>To save your image in this website you have to  create an account as a user.</li>
                        <li>To see shareing image only you have to just create a account as a viwer.</li>
                        <li>As a user you can share only valid photos.</li>
                    </ul>
                </div>  
                <div id="modal_footer">
                    <font>!!----Wish you to have a nice experience----!!</font>
                </div>
            </div>
        </div>
    </div>
    



    <script type="text/javascript">
        var myindex = 0;
        carousel();

        function carousel(){
            var i;
            var x = document.getElementsByClassName("slide");
            for(i=0; i<x.length; i++){
                x[i].style.display = "none";
            }
            myindex++;
            if(myindex>x.length){myindex=1}
                x[myindex-1].style.display = "block";
            setTimeout(carousel, 2000);
        }
        
    </script>
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
    
</body>
</html>