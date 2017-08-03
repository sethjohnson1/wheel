<?
//get the images
$image=array();
foreach (glob('slideshow_imgs/*.JPG') as $key=>$filename) $image[$key]=$filename;
//if it's lowercase...
if (empty($image)) foreach (glob('slideshow_imgs/*.jpg') as $key=>$filename) $image[$key]=$filename;

//some basic variables
$lomg=[];
//$lomg['Spring']['subtitle']='introduction';
$lomg['Spring']['planting']=['blogid'=>'40255'];
$lomg['Spring']['gathering_willows']=['blogid'=>'40181'];
$lomg['Spring']['tobacco_ceremony']=['blogid'=>'39994'];
$lomg['Spring']['hunting']=['blogid'=>'40221'];
$lomg['Summer']['tending_the_gardens']=['blogid'=>'38396'];
$lomg['Summer']['hunting']=['blogid'=>'40147'];
$lomg['Summer']['gathering']=['blogid'=>'40147'];
$lomg['Summer']['celebrations']=['blogid'=>'40147'];
$lomg['Fall']['hunting']=['blogid'=>'40147'];
$lomg['Fall']['gathering']=['blogid'=>'40147'];
$lomg['Fall']['harvesting']=['blogid'=>'40147'];
$lomg['Fall']['trade']=['blogid'=>'40147'];
$lomg['Winter']['tipis']=['blogid'=>'40147'];
$lomg['Winter']['mobility']=['blogid'=>'40147'];
$lomg['Winter']['toys_and_games']=['blogid'=>'40147'];
$lomg['Winter']['earth_lodges']=['blogid'=>'39994'];
$shows[0]=['title'=>'Land of Many Gifts','abbr'=>'lomg','options'=>$lomg];

?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
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
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container-fluid">

<div class="row contentRow">
<div class="col-xs-12">
<div class="inner">
	<div class="contentRow-content">
	<div class="ajaxContent">
		<h3>Click buttons below </h3>
		<p>(this will be an info-graphic)</p>
	</div>
	</div>

<div class="contentRow_expandBtn"><span class=" btn btn-orange"><span class="glyphicon glyphicon-triangle-bottom"></span> Expand</span></div>	
</div>
</div>
</div><!-- content row -->

<div class="row subNavContent">
<div class="col-xs-12">

</div>
</div><!-- subNavContent icons row -->


  <div class="row wheelRow">
  <div class="col-xs-12">
   <div id="wheel">
   <?php $cnt=0;
   foreach ($shows[0]['options'] as $title=>$v):
	if ($cnt==0) $angle_val=0;	
	if ($cnt==1) $angle_val="-90";
	if ($cnt==2) $angle_val="-180";
	if ($cnt==3) $angle_val="90";
	
	//now make columns that can be jQuery'd into above nav rows?>
	<div class="Content<?=$cnt?>-navs hidden">
	<?php
	foreach ($v as $k=>$sub):
   ?>

   <div data-toggle="<?=$title.'_'.$k?>" class="nav-item icon_button col-xs-3">
   <h3><?=str_replace("_"," ",$k)?></h3>
   <p><?=$sub['blogid']?></p>
   
   </div>
   <?php endforeach ?>
   </div><!-- /nav group -->
   <div onclick="updateAppearance(<?=$cnt?>);" value="<?=$angle_val?>" class="nav-item nav_button quad_label quad_label_<?=$cnt?>"><h2><?=$title?></h2></div>

   <?php 
   $cnt++;
   endforeach; ?>
   <img class="img-responsive" src="img/wheel_large_shadow.png" alt="wheel" id="wheel_img"/>
   </div>
   <!-- old testing buttons
   <button class="nav_button" value="0">Spring</button>
   <button class="nav_button" value="-90">Summer</button>
   <button class="nav_button" value="-180">Fall</button>
   <button class="nav_button" value="90">Winter</button>
   -- >

  </div>
  </div><!-- /wheel row -->
	<style>
	/* this will prevent scrolling when the element is rotated, it also alleviates the Chrome console issue about element being treated as passive  */
		#wheel{
			touch-action: none;
		}
	</style>
  <script>
  
$(document).ready(function(){

	//preload all of the content, this would be for kiosk version. Web version make a function to load on demand
	fetchBlogPosts();

	updateAppearance(0);
	$(".nav_button").click(function() {
		//stops the animation and animates to value of button
		//clearInterval(interval);
		getAngle();
		$("#wheel").rotate({
			angle:"-90",
			animateTo: parseInt($(this).attr("value")),
			duration:3000,
			easing: $.easing.easeInOutSine,
			easing: $.easing.easeInOutCubic,
			callback: function(){   getAngle(); }
			});
		//reset the angle here so it doesn't jump around when it moves
		//angle=parseInt($(this).attr("value"));
		//
		
	});
	/*
	$(".icon_button").click(function() {
		console.log($(this).attr('data-toggle'));
		$('.ajaxContent').fadeOut();
		$('.'+$(this).attr('data-toggle')).fadeIn();
	});
	*/
	$(document).off('click', '.icon_button').on('click', '.icon_button',function(e) {
		//
	//	console.log($(this).attr('data-toggle'));
		$('.ajaxContent').hide();
		$('.'+$(this).attr('data-toggle')).fadeIn();
		$('.'+$(this).attr('data-toggle')).removeClass('hidden');
		$('.icon_button').removeClass('subnav_active');
		$(this).addClass('subnav_active');
		
	});
	$(".contentRow_expandBtn").click(function() {
		//console.log($(this).hasClass('expanded'));
		if ($(this).hasClass('expanded')){
			collapseNav();
			$(this).removeClass('expanded');
		}
		else{
			expandNav();
			$(this).addClass('expanded');
		}
		
	});
	
	var collapsedContent=$('.contentRow_expandBtn').html();
	
	function collapseNav(){
		$( ".contentRow-content" ).animate({"height": "49%"}, 1000);
		$('.contentRow_expandBtn').html(collapsedContent);
	}
	
	function expandNav(){
		$( ".contentRow-content" ).animate({"height": "77%"}, 1000);
		$('.contentRow_expandBtn').html('<span class="btn btn-orange"><span class="glyphicon glyphicon-triangle-top"></span> Collapse</span>');
	}
	
	
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

		//console.log('Rotate: ' + angle + 'deg');
		
		if (angle<=45 && angle>-45) {
			//console.log('spring');
			updateAppearance(0);
		}
		if (angle<=-45) {
			//console.log('summer');
			updateAppearance(1);
		}
		
		if (angle<-137 || angle>=145){
			//console.log('Fall');
			updateAppearance(2);
		}
		
		if (angle<145 && angle>45){
			//console.log('winter');
			updateAppearance(3);
		}
		
		
		
	};
	
	function updateAppearance(quad){
		$('.quad_label').removeClass('quad_active');
		$('.quad_label_'+quad).addClass('quad_active');
		var items=$('.Content'+quad+'-navs').html();
		$('.subNavContent').html(items);
	}
	
	function fetchBlogPosts(){
		<?php foreach ($shows[0]['options'] as $title=>$v): ?>
		<?php foreach ($v as $k=>$sub): ?>
		//$(document).ready(function() { 
		$.ajax({
			async:true,
			dataType:"jsonp",
			success:function (data, textStatus) {
				//console.log(data);
				$('.wp-title').text(data.title);
				//$('.wp-author').text('By '+data.author.name);
				//$('.wp-content').html(data.content);
				originalContent=data.content;
				//$('.blog-loading').hide();
				$('.contentRow-content').append('<div class="ajaxContent hidden <?=$title.'_'.$k?>"><h3>'+data.title+'</h3>'+data.content+'</div>');
				
			},
			complete: function(){
				$('.video-container').addClass('youtube-container');
			},
			url:"https://centerofthewest.org/wp-json/posts/<?=$sub['blogid']?>/?_jsonp=?"
		});
		//return false;
		//});
	
		<?php endforeach ?>
		<?php endforeach ?>
	}
	
  </script>

</body>
</html>