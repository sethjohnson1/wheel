<?
//get the images
$image=array();
foreach (glob('slideshow_imgs/*.JPG') as $key=>$filename) $image[$key]=$filename;
//if it's lowercase...
if (empty($image)) foreach (glob('slideshow_imgs/*.jpg') as $key=>$filename) $image[$key]=$filename;

//some basic variables
$lomg=[];
//$lomg['Spring']['subtitle']='introduction';
$lomg['Spring']['planting']=['blogid'=>''];
$lomg['Spring']['gathering willows']=['blogid'=>''];
$lomg['Spring']['tobacco ceremony']=['blogid'=>''];
$lomg['Spring']['hunting']=['blogid'=>''];
$lomg['Summer']['tending the gardens']=['blogid'=>''];
$lomg['Summer']['hunting']=['blogid'=>''];
$lomg['Summer']['gathering']=['blogid'=>''];
$lomg['Summer']['celebrations']=['blogid'=>''];
$lomg['Fall']['hunting']=['blogid'=>''];
$lomg['Fall']['gathering']=['blogid'=>''];
$lomg['Fall']['harvesting']=['blogid'=>''];
$lomg['Fall']['trade']=['blogid'=>''];
$lomg['Winter']['tipis']=['blogid'=>''];
$lomg['Winter']['mobility']=['blogid'=>''];
$lomg['Winter']['toys and games']=['blogid'=>''];
$lomg['Winter']['earth lodges']=['blogid'=>''];
$shows[0]=['title'=>'Land of Many Gifts','abbr'=>'lomg','options'=>$lomg];

?>
<html>
<head>
<link rel="stylesheet" href="css/wheel.min.css" />
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/jquery.slides.min.js"></script>
<script type="text/javascript" src="js/jquery-easing.js"></script>
<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="js/jquery-rotate.js"></script>
<script type="text/javascript" src="js/jquery.touchy.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- script type="text/javascript" src="js/wheel.js"></script -->
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

</head>
<body>
<!-- The width of the container is the width of the image divided by the nabi width (1656/1920) -->
<div class="spacing"></div>
  <div class="container">
   <div id="wheel">
   <?php $cnt=0;
   foreach ($shows[0]['options'] as $title=>$v):
	if ($cnt==0) $angle_val=0;	
	if ($cnt==1) $angle_val="-90";
	if ($cnt==2) $angle_val="-180";
	if ($cnt==3) $angle_val="90";
   ?>
   <div onclick="updateAppearance(<?=$cnt?>);" value="<?=$angle_val?>" class="nav_button quad_label quad_label_<?=$cnt?>"><h2><?=$title?></h2></div>

   <?php 
   $cnt++;
   endforeach; ?>
   <img src="img/wheel_large.png" alt="wheel" id="wheel_img"/>
   </div>
   <button class="nav_button" value="0">Spring</button>
   <button class="nav_button" value="-90">Summer</button>
   <button class="nav_button" value="-180">Fall</button>
   <button class="nav_button" value="90">Winter</button>
   
   
   <div id="quadrant1" class="quadrant"></div>
   <div id="quadrant2" class="quadrant"></div>
   <div id="quadrant3" class="quadrant"></div>
   <div id="quadrant4" class="quadrant"></div>

  </div>
	<style>
	/* this will prevent scrolling when the element is rotated, it also alleviates the Chrome console issue about element being treated as passive  */
		#wheel{
			touch-action: none;
		}
	</style>
  <script>
  
$(document).ready(function(){
	updateAppearance(0);
	$(".nav_button").click(function() {
		//stops the animation and animates to value of button
		//clearInterval(interval);
		getAngle();
		$("#wheel").rotate({
			angle:"-90",
			animateTo: parseInt($(this).attr("value")),
			callback: function(){   getAngle(); }
			});
		//reset the angle here so it doesn't jump around when it moves
		//angle=parseInt($(this).attr("value"));
		//
		
	});
	var degs = 0,
	velocity = 0,
	$target = $('#wheel'),
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
		var el = document.getElementById("wheel");
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
		
	/*	if (angle>360) angle=0;
		if (angle<0) angle=360;
		if (angle>=315 || angle < 45) {
			$(".quadrant").hide();
			$("#quadrant1").show();
		}
		else if (angle>=45 && angle < 135){$(".quadrant").hide(); $("#quadrant2").show();}
		else if (angle>=135 && angle < 225) {$(".quadrant").hide(); $("#quadrant3").show();}
		else if (angle>=135 && angle < 315) {$(".quadrant").hide(); $("#quadrant4").show();}
		else $(".quadrant").html("Error with some math somewhere.");
		*/
		if (angle<=45 && angle>-45) {
			console.log('spring');
			updateAppearance(0);
		}
		if (angle<=-45) {
			console.log('summer');
			updateAppearance(1);
		}
		
		if (angle<-137 || angle>=145){
			console.log('Fall');
			updateAppearance(2);
		}
		
		if (angle<145 && angle>45){
			console.log('winter');
			updateAppearance(3);
		}
		
		
		
	};
	
	function updateAppearance(quad){
		$('.quad_label').removeClass('quad_active');
		$('.quad_label_'+quad).addClass('quad_active');
	}
	
	/*$.getAngle=(function(){
		if (angle>360) angle=0;
		if (angle<0) angle=360;
		if (angle>=315 || angle < 45) {
			$(".quadrant").hide();
			$("#quadrant1").show();
		}
		else if (angle>=45 && angle < 135){$(".quadrant").hide(); $("#quadrant2").show();}
		else if (angle>=135 && angle < 225) {$(".quadrant").hide(); $("#quadrant3").show();}
		else if (angle>=135 && angle < 315) {$(".quadrant").hide(); $("#quadrant4").show();}
		else $(".quadrant").html("Error with some math somewhere.");
	});
  */
  </script>

</body>
</html>