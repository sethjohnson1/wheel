<?
/**
SOUND INFORMATION:
common:
wheelsnd when opened
droplet on tap
moresnd_flute when 

music has sound files that play on repeat in background

tcm is adversity and renewal, not sure what it stands for

***************

THIS IS THE STANDALONE KIOSK VERSION. The Live version should pull blog posts on demand. This should be used for each of the four kiosk versions to "compile" the site and then run locally *may need find/replace centerofthewest.org/ or..hmm how to handle that. !! Get the images and name/sort them for use here and then upload


*/

//get the images
$image=array();
foreach (glob('slideshow_imgs/*.JPG') as $key=>$filename) $image[$key]=$filename;
//if it's lowercase...
if (empty($image)) foreach (glob('slideshow_imgs/*.jpg') as $key=>$filename) $image[$key]=$filename;

//some basic variables

//learna
$lmg=[];
//$lomg['Spring']['subtitle']='introduction';

$lmg['Spring']['planting']=['blogid'=>'40571'];
$lmg['Spring']['gathering_willows']=['blogid'=>'40572'];
$lmg['Spring']['tobacco_ceremony']=['blogid'=>'40577'];
$lmg['Spring']['hunting']=['blogid'=>'40579'];
$lmg['Summer']['gardening']=['blogid'=>'40585'];
$lmg['Summer']['hunting']=['blogid'=>'40586'];
$lmg['Summer']['gathering']=['blogid'=>'40616'];
$lmg['Summer']['celebrations']=['blogid'=>'40625'];
$lmg['Fall']['hunting']=['blogid'=>'40924'];
$lmg['Fall']['gathering']=['blogid'=>'40926'];
$lmg['Fall']['harvesting']=['blogid'=>'40929'];
$lmg['Fall']['trade']=['blogid'=>'40934'];
$lmg['Winter']['tipis']=['blogid'=>'40960'];
$lmg['Winter']['mobility']=['blogid'=>'40987'];
$lmg['Winter']['toys_and_games']=['blogid'=>'40990'];
$lmg['Winter']['earth_lodges']=['blogid'=>'40993'];

//learnb
$bp=[];
$bp['Preparations']['the_buffalo_tradition']=['blogid'=>'40255'];
$bp['Preparations']['buffalo_dances']=['blogid'=>'40255'];
$bp['Preparations']['organizing_the_hunt']=['blogid'=>'40255'];
$bp['The_Hunt']['dog_days']=['blogid'=>'40255'];
$bp['The_Hunt']['horses']=['blogid'=>'40255'];
$bp['The_Hunt']['decline_of_buffalo']=['blogid'=>'40255'];
$bp['Back_to_Camp']['dividing_the_kill']=['blogid'=>'40255'];
$bp['Back_to_Camp']['preparing_the_meat']=['blogid'=>'40255'];
$bp['Back_to_Camp']['tanning_the_hide']=['blogid'=>'40255'];
$bp['Back_to_Camp']['using_everything']=['blogid'=>'40255'];
$bp['Giving_Thanks']['symbolism']=['blogid'=>'40255'];
$bp['Giving_Thanks']['the_buffalo_today']=['blogid'=>'40255'];

//learnc
$hc=[];
$hc['Child']['hills_of_life']=['blogid'=>'40255'];
$hc['Child']['naming']=['blogid'=>'40255'];
$hc['Child']['first_powwow']=['blogid'=>'40255'];
$hc['Child']['continuity']=['blogid'=>'40255'];
$hc['Youth']['boys_and_girls_lodges']=['blogid'=>'40255'];
$hc['Youth']['first_hunt']=['blogid'=>'40255'];
$hc['Youth']['first_hide']=['blogid'=>'40255'];
$hc['Youth']['graduation']=['blogid'=>'40255'];
$hc['Adult']['buffalo_woman_society']=['blogid'=>'40255'];
$hc['Adult']['mens_societies']=['blogid'=>'40255'];
$hc['Adult']['warriors']=['blogid'=>'40255'];
$hc['Adult']['leadership']=['blogid'=>'40255'];
$hc['Elder']['sacred_knowledge']=['blogid'=>'40255'];
$hc['Elder']['age_is_a_blessing']=['blogid'=>'40255'];
$hc['Elder']['sun_dance']=['blogid'=>'40255'];
$hc['Elder']['grandparents']=['blogid'=>'40255'];

//learnd
$tcm=[];
$tcm['Community']['sovereignty']=['blogid'=>'40255'];
$tcm['Community']['reservation_life']=['blogid'=>'40255'];
$tcm['Community']['economic_issues']=['blogid'=>'40255'];
$tcm['Community']['tribal_government']=['blogid'=>'40255'];
$tcm['Land']['reservations']=['blogid'=>'40255'];
$tcm['Land']['urbanization_and_relocation']=['blogid'=>'40255'];
$tcm['Land']['water_rights']=['blogid'=>'40255'];
$tcm['Land']['sacred_lands']=['blogid'=>'40255'];
$tcm['Spirituality']['passing_on_traditions']=['blogid'=>'40255'];
$tcm['Spirituality']['search_for_hope']=['blogid'=>'40255'];
$tcm['Spirituality']['reclaiming_sacred_objects']=['blogid'=>'40255'];
$tcm['Spirituality']['recovery']=['blogid'=>'40255'];
$tcm['Identity']['tribal_identity']=['blogid'=>'40255'];
$tcm['Identity']['language']=['blogid'=>'40255'];
$tcm['Identity']['boarding_schools']=['blogid'=>'40255'];
$tcm['Identity']['contemporary_education']=['blogid'=>'40255'];


//set the show to anything here
$show=['title'=>'Land of Many Gifts','abbr'=>'lmg','blogid'=>'40546','options'=>$lmg];
//$show=['title'=>'Buffalo and the People','abbr'=>'bp','options'=>$bp];
//$show=['title'=>'Honor and Celebration','abbr'=>'hc','options'=>$hc];
//$show=['title'=>'Adversity and Rewnewal','abbr'=>'tcm','options'=>$tcm];

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

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container-fluid">

<div class="row contentRow">
<div class="col-xs-12">
<div class="inner">
	<div class="contentRow-content">
	<div class="ajaxContent">
		<h3>Loading...</h3>
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
   foreach ($show['options'] as $title=>$v):
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
   <!-- img src="img/icons/<?=$show['abbr'].'_'.$k.'.png'?>" alt="<?=str_replace("_"," ",$k)?>" class="img-responsive subNavIcon" / -->
   
   <div class="subNavIcon nav-item">
   <img src="img/icons_cropped/<?=$show['abbr'].'_'.$k.'.png'?>" alt="<?=str_replace("_"," ",$k)?>" class="img-responsive subNavIcon" />
   <h3><?=str_replace("_"," ",$k)?></h3>
   </div>
   
   
   </div>
   <?php endforeach ?>
   </div><!-- /nav group -->
   <div onclick="updateAppearance(<?=$cnt?>);" value="<?=$angle_val?>" class="nav-item nav_button quad_label quad_label_<?=$cnt?>"><h2><?=str_replace("_"," ",$title)?></h2></div>

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
   -->

  </div>
  </div><!-- /wheel row -->
  
  <div class="toolbar">
  <span class="glyphicon glyphicon-minus-sign changeFontSize"></span>
  <span class="glyphicon glyphicon-plus-sign changeFontSize"></span>
  <span class="glyphicon glyphicon-volume-up toggleVolume"></span>
  
  </div>
  
  </div><!-- /container -->
	<style>
	/* this will prevent scrolling when the element is rotated, it also alleviates the Chrome console issue about element being treated as passive  */
		#wheel{
			touch-action: none;
		}
	</style>
  <script>
  
$(document).ready(function(){
	//preload audio
	
	var playAudio=true;
	
	var wheelAudio = document.createElement('audio');
    wheelAudio.setAttribute('src', 'media/fx/wheelsnd.mp3');
	
	var dropletAudio = document.createElement('audio');
    dropletAudio.setAttribute('src', 'media/fx/drop_click.mp3');
	
	var fluteAudio = document.createElement('audio');
    fluteAudio.setAttribute('src', 'media/fx/moresnd_flute.mp3');
	
	var musicAudio = document.createElement('audio');
    musicAudio.setAttribute('src', 'media/music/<?=$show['abbr']?>.mp3');
    
    musicAudio.addEventListener('ended', function() {
       // this.play();
    }, false);
	
	
	//preload all of the content, this would be for kiosk version. Web version make a function to load on demand
	fetchIntroPost();
	fetchBlogPosts();

	updateAppearance(0);
	$(".nav_button").click(function() {
		//stops the animation and animates to value of button
		//clearInterval(interval);
		getAngle();
		if (playAudio) wheelAudio.play();
		$("#wheel").rotate({
			angle:"-90",
			animateTo: parseInt($(this).attr("value")),
			duration:3000,
			easing: $.easing.easeInOutSine,
			easing: $.easing.easeInOutCubic,
			callback: function(){ 
				getAngle();
				if (playAudio){
					wheelAudio.pause();
					musicAudio.play(); 
				}
			
			}
			});
		//reset the angle here so it doesn't jump around when it moves
		//angle=parseInt($(this).attr("value"));
		//
		
		collapseNav();
		
	});
	/*
	$(".icon_button").click(function() 
		console.log($(this).attr('data-toggle'));
		$('.ajaxContent').fadeOut();
		$('.'+$(this).attr('data-toggle')).fadeIn();
	});
	*/
	$(document).off('click', '.changeFontSize').on('click', '.changeFontSize',function(e) {
		if ($(this).hasClass('glyphicon-plus-sign')){
			$( ".contentRow-content" ).animate({"font-size": "+=50%"}, 500);
		}
		else $( ".contentRow-content" ).animate({"font-size": "-=50%"}, 500);
	});
		
	$(document).off('click', '.toggleVolume').on('click', '.toggleVolume',function(e) {
		if ($(this).hasClass('glyphicon-volume-up')){
			playAudio=false;
			$(this).removeClass('glyphicon-volume-up');
			$(this).addClass('glyphicon-volume-off');
			musicAudio.pause();
			wheelAudio.pause();
		}
		else {
			playAudio=true;
			$(this).removeClass('glyphicon-volume-off');
			$(this).addClass('glyphicon-volume-up');
			musicAudio.play();
		}
	});
	
	$(document).off('click', '.icon_button').on('click', '.icon_button',function(e) {
		//
	//	console.log($(this).attr('data-toggle'));
		$('.ajaxContent').hide();
		$('.'+$(this).attr('data-toggle')).fadeIn();
		$('.'+$(this).attr('data-toggle')).removeClass('hidden');
		$('.icon_button').removeClass('subnav_active');
		$(this).addClass('subnav_active');
		
		if (playAudio) dropletAudio.play();
		
	});
	$(".contentRow_expandBtn").click(function() {
		if (playAudio) fluteAudio.play();
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
		$( ".contentRow-content" ).animate({"height": "39%"}, 1000);
		$('.contentRow_expandBtn').html(collapsedContent);
	}
	
	function expandNav(){
		$( ".contentRow-content" ).animate({"height": "74%"}, 1000);
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
	
	function fetchIntroPost(){
		
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
				$('.contentRow-content').html('<div class="ajaxContent"><h3>'+data.title+'</h3>'+data.content+'</div>');
				
			},
			complete: function(){
				$('.video-container').addClass('youtube-container');
			},
			url:"https://centerofthewest.org/wp-json/posts/<?=$show['blogid']?>/?_jsonp=?"
		});
		
	}
		
	function fetchBlogPosts(){
		<?php foreach ($show['options'] as $title=>$v): ?>
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