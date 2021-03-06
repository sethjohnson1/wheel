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

THIS IS THE STANDALONE KIOSK VERSION. The Live version should pull blog posts on demand. This should be used for each of the four kiosk versions to "compile" the site and then run locally. Using Chrome download entire website seems to work, then add the assets to the same directory as the HTML file, and remove the Javascript that fetches blog posts and also the Intro post




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

$lmg['Spring']['introduction']=['blogid'=>'40569'];
$lmg['Spring']['planting']=['blogid'=>'40571'];
$lmg['Spring']['gathering_willows']=['blogid'=>'40572'];
$lmg['Spring']['tobacco_ceremony']=['blogid'=>'40577'];
$lmg['Spring']['hunting']=['blogid'=>'40579'];
$lmg['Summer']['introduction']=['blogid'=>'40584'];
$lmg['Summer']['gardening']=['blogid'=>'40585'];
$lmg['Summer']['hunting']=['blogid'=>'40586'];
$lmg['Summer']['gathering']=['blogid'=>'40616'];
$lmg['Summer']['celebrations']=['blogid'=>'40625'];
$lmg['Fall']['introduction']=['blogid'=>'40917'];
$lmg['Fall']['hunting']=['blogid'=>'40924'];
$lmg['Fall']['gathering']=['blogid'=>'40926'];
$lmg['Fall']['harvesting']=['blogid'=>'40929'];
$lmg['Fall']['trade']=['blogid'=>'40934'];
$lmg['Winter']['introduction']=['blogid'=>'40945'];
$lmg['Winter']['tipis']=['blogid'=>'40960'];
$lmg['Winter']['mobility']=['blogid'=>'40987'];
$lmg['Winter']['toys_and_games']=['blogid'=>'40990'];
$lmg['Winter']['earth_lodges']=['blogid'=>'40993'];

//learnb
$bp=[];
$bp['Preparation']['introduction']=['blogid'=>'42250'];
$bp['Preparation']['the_buffalo_tradition']=['blogid'=>'42258'];
$bp['Preparation']['buffalo_dances']=['blogid'=>'42264'];
$bp['Preparation']['organizing_the_hunt']=['blogid'=>'42267'];
$bp['The_Hunt']['introduction']=['blogid'=>'42271'];
$bp['The_Hunt']['dog_days']=['blogid'=>'42273'];
$bp['The_Hunt']['horses']=['blogid'=>'42277'];
$bp['The_Hunt']['decline_of_buffalo']=['blogid'=>'42280'];
$bp['Back_to_Camp']['introduction']=['blogid'=>'42455'];
$bp['Back_to_Camp']['dividing_the_kill']=['blogid'=>'42458'];
$bp['Back_to_Camp']['preparing_the_meat']=['blogid'=>'42459'];
$bp['Back_to_Camp']['tanning_the_hide']=['blogid'=>'42466'];
$bp['Back_to_Camp']['using_everything']=['blogid'=>'42471'];
$bp['Giving_Thanks']['introduction']=['blogid'=>'42478'];
$bp['Giving_Thanks']['symbolism']=['blogid'=>'42480'];
$bp['Giving_Thanks']['the_buffalo_today']=['blogid'=>'42483'];

//learnc
$hc=[];
$hc['Child']['introduction']=['blogid'=>'41042'];
$hc['Child']['hills_of_life']=['blogid'=>'41259'];
$hc['Child']['naming']=['blogid'=>'41551'];
$hc['Child']['first_powwow']=['blogid'=>'41555'];
$hc['Child']['continuity']=['blogid'=>'41556'];
$hc['Youth']['introduction']=['blogid'=>'41558'];
$hc['Youth']['boys_and_girls_lodges']=['blogid'=>'41561'];
$hc['Youth']['first_hunt']=['blogid'=>'41568'];
$hc['Youth']['first_hide']=['blogid'=>'41572'];
$hc['Youth']['graduation']=['blogid'=>'41575'];
$hc['Adult']['introduction']=['blogid'=>'41586'];
$hc['Adult']['buffalo_woman_society']=['blogid'=>'41589'];
$hc['Adult']['mens_societies']=['blogid'=>'41593'];
$hc['Adult']['warriors']=['blogid'=>'41610'];
$hc['Adult']['leadership']=['blogid'=>'41613'];
$hc['Elder']['introduction']=['blogid'=>'41631'];
$hc['Elder']['sacred_knowledge']=['blogid'=>'41638'];
$hc['Elder']['age_is_a_blessing']=['blogid'=>'41657'];
$hc['Elder']['sun_dance']=['blogid'=>'41661'];
$hc['Elder']['grandparents']=['blogid'=>'41665'];

//learnd
$tcm=[];
$tcm['Community']['introduction']=['blogid'=>'42017'];
$tcm['Community']['sovereignty']=['blogid'=>'42018'];
$tcm['Community']['reservation_life']=['blogid'=>'42023'];
$tcm['Community']['economic_issues']=['blogid'=>'42025'];
$tcm['Community']['tribal_government']=['blogid'=>'42026'];
$tcm['Land']['introduction']=['blogid'=>'42027'];
$tcm['Land']['reservations']=['blogid'=>'42028'];
$tcm['Land']['urbanization_and_relocation']=['blogid'=>'42029'];
$tcm['Land']['water_rights']=['blogid'=>'42031'];
$tcm['Land']['sacred_lands']=['blogid'=>'42032'];
$tcm['Spirituality']['introduction']=['blogid'=>'41688'];
$tcm['Spirituality']['passing_on_traditions']=['blogid'=>'41961'];
$tcm['Spirituality']['search_for_hope']=['blogid'=>'41966'];
$tcm['Spirituality']['reclaiming_sacred_objects']=['blogid'=>'41969'];
$tcm['Spirituality']['recovery']=['blogid'=>'41972'];
$tcm['Identity']['introduction']=['blogid'=>'41988'];
$tcm['Identity']['tribal_identity']=['blogid'=>'41992'];
$tcm['Identity']['language']=['blogid'=>'41997'];
$tcm['Identity']['boarding_schools']=['blogid'=>'41999'];
$tcm['Identity']['contemporary_education']=['blogid'=>'42016'];


//set the show to anything here, use the first theme as the intro blogid (i.e. Spring intro)
//$show=['title'=>'Land of Many Gifts','abbr'=>'lmg','blogid'=>'40569','options'=>$lmg];
//$show=['title'=>'Buffalo and the People','abbr'=>'bp','blogid'=>'42250','options'=>$bp];
//$show=['title'=>'Honor and Celebration','blogid'=>'41042','abbr'=>'hc','options'=>$hc];
$show=['title'=>'Adversity and Rewnewal','abbr'=>'tcm','blogid'=>'42017','options'=>$tcm];

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
<!-- script type="text/javascript" src="js/jquery.colorbox.js"></script -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- script type="text/javascript" src="js/wheel.js"></script -->
<title><?=$show['title']?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php //quick style adjustments 
	if ($show['abbr']=='bp' || $show['abbr']=='tcm'):
?>
.quad_label h2 {
	font-size: 3.4vw;
}
<?php endif ?>
</style>

</head>
<body>

<div class="container-fluid">
	
	<div class="row titleRow">
	<div class="col-xs-4">
	<div id="wheel">
	<img id="wheel_img" src="img/wheel_<?=$show['abbr']?>.png" alt="<?=$show['title']?>" />
	</div>
	</div>
	<div class="col-xs-8">
	<h1><?=$show['title']?></h1>
	</div>
	</div>
  <div class="row wheelRow">
  <div class="col-xs-12">
   <div id="wheel-NO-MORE" class="row">
   <?php $cnt=0;
   foreach ($show['options'] as $title=>$v):
	if ($cnt==0) $angle_val="0";	
	if ($cnt==1) $angle_val="-90";
	if ($cnt==2) $angle_val="-180";
	if ($cnt==3) $angle_val="-270";
	
	//now make columns that can be jQuery'd into above nav rows?>
	<div class="Content<?=$cnt?>-navs hidden">
	<?php
	$intro_id='';
	foreach ($v as $k=>$sub):
		if ($k=='introduction'){
			$intro_id=$sub['blogid'];
			continue;
			
		}
   ?>

   <div data-id="<?=$sub['blogid']?>" data-toggle="<?=$title.'_'.$k?>" class="nav-item icon_button col-xs-3">

   
   <div class="subNavIcon nav-item">
   <img src="img/icons_cropped/<?=$show['abbr'].'_'.$k.'.png'?>" alt="<?=str_replace("_"," ",$k)?>" class="img-responsive subNavIcon" />
   <h3><?=str_replace("_"," ",$k)?></h3>
   </div>
   
   
   </div>
   <?php endforeach ?>
   </div><!-- /nav group -->

   
	<div data-id="<?=$intro_id?>" data-toggle="<?=$title?>_introduction" class="col-xs-3 quad_label quad_label_<?=$cnt?> nav-item nav_button" onclick="updateAppearance(<?=$cnt?>);" value="<?=$angle_val?>" >
		<h2><?=str_replace("_"," ",$title)?></h2>
	</div>

   <?php 
   $cnt++;
   endforeach; ?>

   </div>


  </div>
  </div><!-- /wheel row -->

<div class="row subNavContent">
<div class="col-xs-12">

</div>
</div><!-- subNavContent icons row -->
</div><!-- /container-fluid -->
<div class="container-fluid content-container">
<div class="contentRow">

<div class="inner">
	<div class="contentRow-content">
	<div class="ajaxContent introContent">
		<h3>Loading...</h3>
	</div>
	</div>

<!-- div class="contentRow_expandBtn"><span class=" btn btn-orange"><span class="glyphicon glyphicon-triangle-bottom"></span> Expand</span>
</div -->	
</div>
</div><!-- content row -->





<div class="toolbar-container">  
  
  <img src="img/bbcw-logo.svg" class="" style="width:9%; margin-left:20px" />
  <img src="img/pim.svg" class="" style="width:26%; margin-left:20px" />
  
  <div class="toolbar">
	  <span class="glyphicon glyphicon-minus-sign changeFontSize"></span>
	  <span class="glyphicon glyphicon-plus-sign changeFontSize"></span>
	  <span class="glyphicon glyphicon-volume-up toggleVolume"></span>
	  
  </div>
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
	//disable links
	$(document).off('click', 'a').on('click', 'a',function(e) {
		//don't just show the modal, it's empty until link is clicked
		e.preventDefault();
		return false;
	});
	
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
	
	
	//use this conditional statement so I don't have to keep editing the generated HTML file
	/*if (document.location.href=='https://sv-php7/wheel/'){
		//preload all of the content for the kiosk
		fetchIntroPost();
		//disable for designing as it slows down load!
		
	}
	*/
	if (document.location.href=='https://sv-php7/wheel/'){
		fetchBlogPosts();
		fetchIntroPost();
		
	}
	updateAppearance(0);
	wheelSpun=false;
	$(".nav_button").click(function() {
		//first load the introductory blog post
		$('.ajaxContent').hide();
		//using first() because when you save it makes two copies.. quick and dirty
		$('.'+$(this).attr('data-toggle')).first().fadeIn();
		$('.'+$(this).attr('data-toggle')).first().removeClass('hidden');
		//stops the animation and animates to value of button
		//clearInterval(interval);
		$('#wheel').stop();
		getAngle();
		if (playAudio) wheelAudio.play();
		//makes the spinning slightly more interesting and sequential
		currentAngle=parseInt($(this).attr("value"));
		if (wheelSpun){
			if (currentAngle==0) currentAngle="-360";
		}
		$("#wheel").rotate({
			angle:"-90",
			animateTo: parseInt(currentAngle),
			duration:3000,
			easing: $.easing.easeInOutSine,
			easing: $.easing.easeInOutCubic,
			callback: function(){ 
				wheelSpun=true;
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
		
		//collapseNav();
		
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
		//load the content if on dev server
		/*if (document.location.href=='https://sv-php7/wheel/'){
			fetchBlogPost($(this).attr('data-toggle'),$(this).attr('data-id'));
		}
*/
		//console.log($(this).attr('data-toggle'));
		$('.ajaxContent').hide();
		$('.'+$(this).attr('data-toggle')).first().fadeIn();
		$('.'+$(this).attr('data-toggle')).first().removeClass('hidden');
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
	getAngle(true);
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
		getAngle(true);
	//console.log(degrees);
	};

	$('#wheel_img').bind('touchy-rotate', handleTouchyRotate);
});
			
	function getAngle(doUpdates){
		//console.log(doUpdates);
		if (!doUpdates) doUpdates=false;
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
		
		//added IF statement here so it only updates when we want it to
		if (doUpdates){
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
			dataType:"json",
			success:function (data, textStatus) {
				//console.log(data);
				$('.wp-title').text(data.title.rendered);
				//$('.wp-author').text('By '+data.author.name);
				//$('.wp-content').html(data.content);
				originalContent=data.content.rendered;
				//$('.blog-loading').hide();
				$('.introContent').html('<h3 class="title">'+data.title.rendered+'</h3>'+data.content.rendered);
				
			},
			complete: function(){
				$('.video-container').addClass('youtube-container');
				//remove these extra attributes or the images won't pull local copy
				$("img").removeAttr('srcset');
				$("img").removeAttr('sizes');
				//find by data-rel lightbox from Wordpress and add ColorBox
				//don't do this for Intro now, because its used elsewhere and this makes it duplicate
				//but we don't need colorBox!
				//$('[data-rel^="lightbox"]').addClass('ajaxPic_<?=$show['blogid']?>_intro');
				//initColorBox('<?=$show['blogid']?>_intro');
			},
			url:"https://centerofthewest.org/?rest_route=/wp/v2/exhibit/<?=$show['blogid']?>"
		});
		
		
	}

/*
	this is what the kiosk should use to preload everything
	yeah but the piece of shit API sometimes doesn't work, so this is not a good idea.
	Probably better to just load by clicking on everything
 */
	function fetchBlogPosts(){
		var articles={
		<?php foreach ($show['options'] as $title=>$v): ?>
		<?php foreach ($v as $k=>$sub): 
			//if ($k=='introduction') continue;
		?>
			'<?=$title.'_'.$k?>':<?=$sub['blogid']?>,
		<?php endforeach ?>
		<?php endforeach ?>
		};
		//console.log(articles);
		$.each(articles, function( index, value ) {
			fetchPost(index,value);
		});
		
	
	}
	
	function fetchPost(classname,blogid){
		//console.log($(classname).html());
		if (!$(classname).html()){
		$.ajax({
				async:true,
				dataType:"json",
				success:function (data, textStatus) {
					//console.log(data);
					$('.contentRow-content').append('<div class="ajaxContent hidden '+classname+'"><h3 class="title">'+data.title.rendered+'</h3>'+data.content.rendered+'</div>');
					
				},
				complete: function(){
					$('.video-container').addClass('youtube-container');
					
					$("img").removeAttr('srcset');
					$("img").removeAttr('sizes');
					//now run it again! no not necessary now
					//fetchPost(classname,blogid);
					//actually, no need for colorBox!
					//$('.<?=$title.'_'.$k?>').find('[data-rel^="lightbox"]').addClass('ajaxPic_<?=$sub['blogid']?>');
					//initColorBox('<?=$sub['blogid']?>');
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
				},
				//v1.0 API, dataType must be jsonp
				//url:"https://centerofthewest.org/wp-json/posts/"+blogid+"/?_jsonp=?"
				//v2 API
				url:"https://centerofthewest.org/?rest_route=/wp/v2/exhibit/"+blogid
			});
			
		}
	}

	
	function initColorBox(blogid){
		//colorbox stuff
		cbw="100%";
		cbh="75%";
		//override if screen wider than tall
		if ($( window ).width()>=$( window ).height()){
			cbw="80%";
			cbh="90%";
		}
		var $gallery=$(".ajaxPic_"+blogid).colorbox({rel:'ajaxPic_'+blogid,width:cbw,height:cbh,opacity:0.75,current:"Viewing picture {current} of {total}"});
	}
	
	
  </script>

</body>
</html>