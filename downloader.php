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

//get the images - FOR WHAT?? nothing, just example code from another project
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

$opts = [
        'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: PHP'
                ]
        ]
];

$context = stream_context_create($opts);


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
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="contentRow-content">

</div>
<script>
$(document).ready(function(){
fetchBlogPosts();
});
	function fetchBlogPosts(){

		<?php foreach ($show['options'] as $title=>$v): ?>
		<?php foreach ($v as $k=>$sub): ?>
		//$(document).ready(function() { 
		$.ajax({
			async:true,
			dataType:"jsonp",
			success:function (data, textStatus) {
				$('.wp-title').text(data.title);
				originalContent=data.content;
				$('.contentRow-content').append('<div class="ajaxContent hidden <?=$title.'_'.$k?>"><h3>'+data.title+'</h3>'+data.content+'</div>');
				
			},
			complete: function(){
				$('.video-container').addClass('youtube-container');
				//definitely a flaw in this logic, since all lightbox data-rel will be cascaded with ajaxPic_class....
				$('[data-rel^="lightbox"]').addClass('ajaxPic_<?=$show['blogid']?>');
				//initColorBox('<?=$show['blogid']?>');
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