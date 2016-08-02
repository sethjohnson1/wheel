<?
//get the images
$image=array();
foreach (glob('slideshow_imgs/*.JPG') as $key=>$filename) $image[$key]=$filename;
//if it's lowercase...
if (empty($image)) foreach (glob('slideshow_imgs/*.jpg') as $key=>$filename) $image[$key]=$filename;
?>
<html>
<head>
<link rel="stylesheet" href="css/wheel.css" />
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/jquery.slides.min.js"></script>
<script type="text/javascript" src="js/jquery-easing.js"></script>
<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="js/jquery-rotate.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/wheel.js"></script>

</head>
<body>
<!-- The width of the container is the width of the image divided by the nabi width (1656/1920) -->
<div class="spacing"></div>
  <div class="container">
   <div id="wheel">
   <img src="img/wheel1.png" alt="wheel" id="wheel_img"/>
   </div>
   <button class="nav_button" value=0>One</button>
   <button class="nav_button" value=90>Two</button>
   <button class="nav_button" value=180>Three</button>
   <button class="nav_button" value=270>Four</button>
   <div id="test"></div>
	<img id="hand" src="pointing-finger.png" alt="swiping hand" />
<!-- a href="index.php" id="startover" class="wgwa-btn">&laquo; Start Over</a -->

  </div>


</body>
</html>