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
<script type="text/javascript" src="js/jquery.touchy.js"></script>
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
   
   <div id="quadrant1" class="quadrant"></div>
   <div id="quadrant2" class="quadrant"></div>
   <div id="quadrant3" class="quadrant"></div>
   <div id="quadrant4" class="quadrant"></div>
   
   <div id="test2"></div>
   <div id="test"></div>
	<img id="hand" src="pointing-finger.png" alt="swiping hand" />
<!-- a href="index.php" id="startover" class="wgwa-btn">&laquo; Start Over</a -->

  </div>
	<style>
	/* this will prevent scrolling when the element is rotated, it also alleviates the Chrome console issue about element being treated as passive  */
		#wheel_img{
			touch-action: none;
		}
	</style>
  <script>
  
              $(document).ready(function(){

                var degs = 0,
                    velocity = 0,
                    $target = $('#wheel_img'),
                    frameRateMS = 1000/60,
                    inertiaMotion = false;

                var handleTouchyRotate = function (e, phase, $target, data) {
                    switch (phase) {
                        case 'start':
                            inertiaMotion = false;
                            break;
                        case 'move':
                            degs += data.degreeDelta;
                            rotate(degs);
                            break;
                        case 'end':
                            inertiaMotion = true;
                            velocity = data.velocity;
                            releaseRadius =
                            spin(velocity);
                    }
					//console.log(data);
					getAngle();
                };

                var spin = function (velocity) {
                    // note that touchy returns velocity as degrees per millisecond only for touchy-rotate
                    degs += velocity * frameRateMS;
                    degs = degs > 359.99 ? 0 : degs;
                    rotate(degs);
                    if (inertiaMotion && Math.abs(velocity) > 0.001) {
                        setTimeout(function () {
							//this was originally .99, lowering it changes the inertia
                            spin(velocity * 0.59);
                        }, frameRateMS);
                    }
                    else {
                        velocity = 0;
                    }
                };

               var rotate = function (degrees) {
                    $target.css('webkitTransform','rotate3d(0,0,1,'+ degrees +'deg)');
					//console.log(degrees);
                };
				
                $('#wheel_img').bind('touchy-rotate', handleTouchyRotate);
            });
			
	function getAngle(){
		var el = document.getElementById("wheel_img");
		var st = window.getComputedStyle(el, null);
		var tr = st.getPropertyValue("-webkit-transform") ||
         st.getPropertyValue("-moz-transform") ||
         st.getPropertyValue("-ms-transform") ||
         st.getPropertyValue("-o-transform") ||
         st.getPropertyValue("transform") ||
         "FAIL";

		// With rotate(30deg)...
		// matrix(0.866025, 0.5, -0.5, 0.866025, 0px, 0px)
		//console.log('Matrix: ' + tr);

		// rotation matrix - http://en.wikipedia.org/wiki/Rotation_matrix

		var values = tr.split('(')[1].split(')')[0].split(',');
		var a = values[0];
		var b = values[1];
		var c = values[2];
		var d = values[3];

		var scale = Math.sqrt(a*a + b*b);

		//console.log('Scale: ' + scale);

		// arc sin, convert from radians to degrees, round
		var sin = b/scale;
		// next line works for 30deg but not 130deg (returns 50);
		// var angle = Math.round(Math.asin(sin) * (180/Math.PI));
		var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));

		console.log('Rotate: ' + angle + 'deg');
		//quadrant 1=0 to 90
		//quad 2= 90 to 179
		//quad 3 -179 to -90
		//quad 4 = -90 to 0
		
	};
  
  </script>

</body>
</html>