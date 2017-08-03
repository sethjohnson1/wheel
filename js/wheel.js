	$(function() {    
/*		  $("#wheel_img").swipe( {
        swipeStatus:function(event, phase, direction, distance, duration, fingers, fingerData, currentDirection)
        {
          var str = "<h4>Swipe Phase : " + phase + "<br/>";
          str += "Current direction: " + currentDirection + "<br/>";
          str += "Direction from inital touch: " + direction + "<br/>";
          str += "Distance from inital touch: " + distance + "<br/>";
          str += "Duration of swipe: " + duration + "<br/>";
          str += "Fingers used: " + fingers + "<br/></h4>";
          str += "<h2>distance/duration: " + distance/duration + "<br/></h2>";
          //Here we can check the:
          //phase : 'start', 'move', 'end', 'cancel'
          //direction : 'left', 'right', 'up', 'down'
          //distance : Distance finger is from initial touch point in px
          //duration : Length of swipe in MS
          //fingerCount : the number of fingers used
          if (phase!="cancel" && phase!="end") {
            if (duration<5000)
              str +="Under maxTimeThreshold.<h3>Swipe handler will be triggered if you release at this point.</h3>"
            else
              str +="Over maxTimeThreshold. <h3>Swipe handler will be canceled if you release at this point.</h3>"
            if (distance<200)
              str +="Not yet reached threshold.  <h3>Swipe will be canceled if you release at this point.</h3>"
            else
              str +="Threshold reached <h3>Swipe handler will be triggered if you release at this point.</h3>"
          }
          if (phase=="cancel")
            str +="<br/>Handler not triggered. <br/> One or both of the thresholds was not met "
          if (phase=="end")
            str +="<br/>Handler was triggered."
          $("#test2").html(str);
        },
        threshold:200,
        maxTimeThreshold:5000,
        fingers:'all'
      });
	  */
    });



//set variables and do idle thing, starts spinning wheel and also listens for click to stop it
var idleTimer = null;
var idleState = false;
//4 sec is nice, set to half for testing
var idleWait = 2000;
var angle = 0;
var lastinterval=0;
$(function(){
	$('*').bind('mousemove keydown scroll', function () { 
        clearTimeout(idleTimer);            
        if (idleState == true) { 
                // Reactivated event - doing nothing now
                $("body").append("<p>Welcome Back.</p>");            
            }
        idleState = false;
		idleTimer = setTimeout(function () { 
            // Idle Event
            $("body").append("<p>You've been idle for " + idleWait/1000 + " seconds.</p>");
			var interval = setInterval(function(){	
				angle+=1;
				$("#wheel_img").rotate(angle);
				$.getAngle();			
			},80);
			$(".nav_button").click(function() {
				//stops the animation and animates to value of button
				clearInterval(interval);
				$("#wheel_img").rotate({
					angle:angle,
					animateTo: parseInt($(this).attr("value"))
					});
					//reset the angle here so it doesn't jump around when it moves
					angle=parseInt($(this).attr("value"));
					$.getAngle();
				});//track initial swipe
				var iswipe=null;
				//now for the swiping logic...
				$("#wheel_img").swipe( {
				
				//including all possible return values
				swipeStatus:function(event, phase, direction, distance, duration, fingers, fingerData, currentDirection) {
					if (!iswipe) iswipe=direction;
					//simple, just based on initial swipe
					if (iswipe=="up" || iswipe=="right") angle+=3;			
					if (iswipe=="down" || iswipe=="left") angle-=3;			
					$("#wheel_img").rotate(angle);
					$.getAngle();
					clearInterval(interval);
					
					//temp for testing flinging
					fling=distance/duration;
					//$("#test2").html("<h2>"+distance/duration+"</h2>");
					
					if (phase=="end"){
						iswipe=null;
						//this is a fling from my tests, larger number is more agressive fling
						if ((fling)>2){
							dur=fling*500;
							spd=5000-dur;
							for ($i=0;$i<100;$i++) $.flingWheel(spd,"easeOutElastic");
							setInterval(function(){	location.reload()},dur);
						}
					}
				},
				// threshold:200,
				//maxTimeThreshold:5000,
				//fingers:'all'
				}); 
                idleState = true; }, idleWait);
    });
        $("body").trigger("mousemove");
    
});

//gets the angle then hide/show content
	$.getAngle=(function(){
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
	

	$(document).ready(function(){
		$("#quadrant1").attr("class","quadrant active");
		$("#quadrant1").show();
	});