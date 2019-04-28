<!DOCTYPE html>
<html>
<head>
	<title>slideshow by click</title>
	<style type="text/css">
		*{box-sizing: border-box;}
		.full{ max-width: 1000px; height: 500px; position: relative; margin:auto; }
		.slide{display: none;}
		.prev, .next{cursor: pointer; position: absolute; top: 50%; width: auto; margin-top: -22px; padding: 16px; color:white; font-weight: bold; font-size: 18px; transition: 0.6s ease; border-radius: 0 3px 3px 0;  }
		.next{ right: 0; border-radius: 3px 0 0 3px;  }
		.next:hover, .prev:hover{ background-color: rgba(0,0,0,0.8); }
		.foottext{color:black; position: absolute; padding: 8px 12px; bottom: 8px; text-align: center; width: 100%;}
		.numtext{color:blue; font-size: 12px; padding: 8px 12px; position: absolute; top: 0; }
		.slide{ animation-name: fade; animation-duration: 1.5s; }
		@keyframes slide{ from {opacity: .4} to {opacity: 1} }
	</style>
</head>
<body>
    <div class="full">
    	<div class="slide">
    		<div class="numtext">1 / 3</div>
    		<img src="form_img.png" style="width: 100%">
            <div class="foottext"> this is test 1</div>
    	</div>
    	<div class="slide">
    		<div class="numtext">2 / 3</div>
    		<img src="from_image.jpg" style="width: 100%">
            <div class="foottext"> this is test 2</div>
    	</div>
    	<div class="slide">
    		<div class="numtext">3 / 3</div>
    		<img src="image.jpg" style="width: 100%">
            <div class="foottext"> this is test 3</div>
    	</div>
    	<a class="prev" onclick="ps(-1)">&#10094;</a>
    	<a class="next" onclick="ps(1)">&#10095;</a>
    </div>
    <script type="text/javascript">
    	var si=1;
        showslide(si);
        function ps(n){
        	showslide(si+=n);
        }
        function showslide(n){
        	var i;
        	var slides= document.getElementsByClassName("slide");
        	if(n>slides.length) {si=1; }
        	if(n<1) {si=slides.length;}
        	for(i=0; i<slides.length; i++){
        		slides[i].style.display="none";
        	}
        	slides[si-1].style.display="block";
        }
    </script>
</body>
</html>