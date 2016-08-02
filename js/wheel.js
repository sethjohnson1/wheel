	$(function() {    
		  $("#wheel_img").swipe( {
        swipeStatus:function(event, phase, direction, distance, duration, fingers, fingerData, currentDirection)
        {
          var str = "<h4>Swipe Phase : " + phase + "<br/>";
          str += "Current direction: " + currentDirection + "<br/>";
          str += "Direction from inital touch: " + direction + "<br/>";
          str += "Distance from inital touch: " + distance + "<br/>";
          str += "Duration of swipe: " + duration + "<br/>";
          str += "Fingers used: " + fingers + "<br/></h4>";
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
          $("#test").html(str);
        },
        threshold:200,
        maxTimeThreshold:5000,
        fingers:'all'
      });
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
				});
				//now for the swiping logic...
				var xinitial=null;
				$("#wheel_img").swipe( {
				//including all possible return values
				swipeStatus:function(event, phase, direction, distance, duration, fingers, fingerData, currentDirection) {
					console.log(xinitial);
					if (!xinitial) xinitial=event.changedTouches[0].clientX;
					clearInterval(interval);
					//console.log($( "#wheel_img" ).width());
					//console.log(event.changedTouches[0].clientX);
					//also figure out which half of screen they are on, the clientX doesn't work so well
					if (direction=="up" && xinitial<676) angle+=1;		
					if (direction=="down" && xinitial>=676) angle+=1;		

					$("#wheel_img").rotate(angle);
					$.getAngle();
					 if (phase=="end") xinitial=null;
					//console.log(direction);
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
		if (angle>=315 || angle < 45) $("#test").html("Quadrant1");
		else if (angle>=45 && angle < 135) $("#test").html("Quadrant2");
		else if (angle>=135 && angle < 225) $("#test").html("Quadrant3");
		else if (angle>=135 && angle < 315) $("#test").html("Quadrant4");
		else $("#test").html("No-mans-Land");
		
	});
 
//now for swiping logic... 
$(function() {
    $("#image_container").swipe( {
	//including all possible return values
	swipeStatus:function(event, phase, direction, distance, duration, fingers, fingerData, currentDirection) {
		val = event.target.id;
		current_imgnum = parseInt(val.substr(val.indexOf("_") + 1));
		if (direction=="right"){
			counter=counter+increment;
			if (counter>=(increment*(totalimages-1))) counter=0;
			imgnum=Math.round(counter/increment);
			
		}
		else if (direction=="left"){
			counter=counter-increment;
			if (counter<=0) counter=(totalimages-1)*increment;
			imgnum=Math.round(counter/increment);
		}
		else imgnum=current_imgnum;

		//a small delay might help, nothing now
		$(".images").delay(0).hide();
		$("#img_"+imgnum).show();
	},

       // threshold:200,
        //maxTimeThreshold:5000,
        //fingers:'all'
      });
	  //show the first image
	  $("#img_0").fadeIn();
});

	//add this to jQuery namespace and it can be called globally
		$.animateHand=function() {
		//$("#hand").css(	"bottom","-148px");
		//$("#hand").css(	"right","314px");
		//show in case it was hidden
		$("#hand").show();
		$( "#hand" ).animate({
			opacity: 0.55
			,bottom: "-40px",
		}, 2000,"easeOutQuint", function() {
			//first animation done
			$( "#hand" ).animate({
			//opacity: .55,
			right: "791px",
			}, 1500, 'easeOutQuint', function() {
			// second done, now fade out
				$( "#hand" ).animate({
				opacity: 0
				}, 5000, function() {
					//third done, reset then do again
					$( "#hand" ).animate({
						bottom: "-148px",
						right:"314px"
						}, 5, function() {
							//console.log(slidenumber);						
							//do the claw thing, one out of 100
							if (Math.floor((Math.random() * 2) + 100)==83) $("#hand").attr("src","claw_hand.png");
							else $("#hand").attr("src","pointing-finger.png");
							//notice NO parenthesis in setTimeout or it just calls the function immediately
							setTimeout($.animateHand,5000);
						});
					});
				});
			});
		}
	$(document).ready(function(){

	});