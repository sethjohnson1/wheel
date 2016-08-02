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
var idleWait = 500;
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
			},50);
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
                idleState = true; }, idleWait);
    });
        $("body").trigger("mousemove");
    
});

//gets the angle then hide/show content
	$.getAngle=(function(){
		if (angle>=315 || angle < 45) $("#test").html("Quadrant1");
		else if (angle>=45 && angle < 135) $("#test").html("Quadrant2");
		else if (angle>=135 && angle < 225) $("#test").html("Quadrant3");
		else if (angle>=135 && angle < 315) $("#test").html("Quadrant4");
		else $("#test").html("No-mans-Land");
		
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
	
	  var slidenumber=0;
	 // $.animateHand();
  
      $('#slides').slidesjs({
		  //use CSS as well
        width: 1645,
        height: 1050,
        navigation: {
			active: false,
			effect: "slide"
		},
		pagination:{
			active:false,
			effect: "slide"
		},
		play:{
			active:false,
			effect: "fade",
			interval: 10000,
			//auto: true,
			restartDelay:10000,
			
		},
		callback:{
			start: function(s){

			},
			complete: function(a){
				//hide the hand and show the button
				if (a==1){
					$("#startover").hide();
				}
				else{
					//hide the hand otherwise animation gets screwed up
					$("#hand").hide();
					$("#startover").show();
				}
				
				
				//console.log($("#img_0").css('z-index'));
				//console.log(a);
			}
		}
		/* if the effect is too slow and they swipe while its going it blanks out for a few moments
		,effect:{
			fade:{
				speed:1500,
				crossfade:true
			}
		}*/
      });

	});