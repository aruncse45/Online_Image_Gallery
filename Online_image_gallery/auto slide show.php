<!DOCTYPE html>
<html>
<head>
	<title>slideshow by click</title>
	<style type="text/css">
		*{box-sizing: border-box;}
		.full{ max-width: 1000px; height: 500px; position: relative; margin:auto; }
		.slide{display: none;}
		
		
		
		.slide{ animation-name: fade; animation-duration: 1.5s; }
		@keyframes fade{ from {opacity: .4} to {opacity: 1} }
	</style>
</head>
<body>
    <div class="full">
    	
    		
    		<img class="slide" src="form_img.png" style="width: 100%">
            
    	
    	
    		
    		<img class="slide" src="from_image.jpg" style="width: 100%">
            
    	
    	
    		
    		<img class="slide" src="image.jpg" style="width: 100%">
            
    	
    	
    </div>
    <script type="text/javascript">
    	var myindex = 0;
        carousel();

        function carousel(){
            var i;
            var x = document.getElementsByClassName("slide")
            for(i=0; i<x.length; i++){
                x[i].style.display = "none";
            }
            myindex++;
            if(myindex>x.length){myindex=1}
                x.[myindex-1].style.display = "block";
            setTimeout(carousel, 2000);
        }
        
    </script>
</body>
</html>