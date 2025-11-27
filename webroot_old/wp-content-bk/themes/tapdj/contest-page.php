<?php
/**
 * Template Name: Contest page
 *
 * A custom page template without sidebar.
 * Selectable from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty Ten
 * @since 3.0.0
 */


require_once $_SERVER["DOCUMENT_ROOT"] . "/../app.php";

$country_code = DB::getCountryCode();


$input = array("Want to win an iPod? @laanlabs is launching Tap DJ, the Ultimate iPhone DJ App! http://tap.dj/contest",
"Check out the cool Tap DJ iPhone app, you can mix & scratch your iPod music. And win an iPod http://tap.dj/contest",
"just entered contest at http://tap.dj/contest for 1 of 5 iPods from @laanlabs",
"Just got the Tap DJ iPhone app: http://bit.ly/tapdj and also entered contest to win iPod: http://tap.dj/contest",
"@laanlabs is giving away 5 iPods for the awesome Tap DJ app, I just entered at http://tap.dj/contest",
"Tap DJ iPhone App launch contest, win an iPod! http://tap.dj/contest #TapDJ"
);

$input = array(
"Just got the Tap DJ iPhone app: http://bit.ly/tapdj ",
"Checkout the Tap DJ app @ http://bit.ly/tapdj "
);

$rand_keys = array_rand($input, 2);














	
	


?>
<?php get_header(); ?>

<script src="http://platform.twitter.com/anywhere.js?id=vWFCog2qRYckRacwU1FllQ&v=1" type="text/javascript"></script>
<script src="http://connect.facebook.net/en_US/all.js"></script>


<style>
	#contest-wrapper {
		position:relative;
		left:-20px;
		width: 650px;
		height: 1000px;
		background: url('<?php echo get_template_directory_uri() ?>/images/contest/contest_bk.png') top left no-repeat;
		
	}
	
	
	#contest-title {
		height:200px;
		
		text-align:center;
	}
	
	#contest-title img{
		position: relative;
		top: 105px;
		left:10px;
	}
	
	#contest-choose{
		height:100px;
		position:relative;
		left:40px;
		top: 50px;
		background: url('<?php echo get_template_directory_uri() ?>/images/contest/contest-choose-bk.png') top left no-repeat;
		background-position: 0 20px;
		
	}
	
	#contest-tabs {
		position:relative;
		left:180px;
	}
	
	.contest-tab {
		float: left;
		width:176px;
		height:55px;
		cursor:pointer;
	}
	
	.contest-tab  img{
		position:relative;
		
		top:17px;
		left:13px;
	}
	
	.contest-tab-on {
		background: url('<?php echo get_template_directory_uri() ?>/images/contest/tab-on.png') top left no-repeat;
		
	}
	
	.contest-tab-off {
		background: url('<?php echo get_template_directory_uri() ?>/images/contest/tab-off.png') top left no-repeat;
		
	}
	
	.contest-content {
		position:relative;
		width:450px;
		left:170px;
		top:40px;
		color:#fff;
	}
	
	.contest-step {
		position:relative;
		padding-bottom:10px;
		padding-top:10px;
	}
	
	div.contest-step img.contest-step-number {
		position:absolute;
		left:-134px;
		top:-5px;
	}
	
	div.contest-step-title {
		color: #eccd82;
		text-shadow: 0px -1px #170c17;
		font-size: 28px;
		line-height: 36px;
		font-weight: bold;
	}
	
	div.contest-step-subtitle {
		color:#a69ea6;
		text-shadow: 0px -1px #312331;
		padding-bottom: 10px;
		font-weight: normal;
	}
	
	.tstyle td {
		height:50px;
	}
	.tday {
		width:100px;
	}
	.twinner {
		width:250px;
	}
	.tdate {
		width:300px;
	}
	.tprize {
		width:150px;
	}

	
</style>


<script>
	function showFacebook() {
		$("#contest-tab-twitter").removeClass('contest-tab-on').addClass('contest-tab-off');
		$("#contest-tab-facebook").removeClass('contest-tab-off').addClass('contest-tab-on');
		$("#contest-content-twitter").hide();
		$("#contest-content-facebook").show();
		
		
	}


	function showTwitter() {
		$("#contest-tab-facebook").removeClass('contest-tab-on').addClass('contest-tab-off');
		$("#contest-tab-twitter").removeClass('contest-tab-off').addClass('contest-tab-on');
		$("#contest-content-twitter").show();
		$("#contest-content-facebook").hide();
	}
	
	
	
	$(document).ready(function(){
	    var facebook_url_var = getUrlVars()["f"];
		if (facebook_url_var == true) {
			showFacebook();
		}
	    
	});
	
	function getUrlVars()
	{
	    var vars = [], hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    for(var i = 0; i < hashes.length; i++)
	    {
	        hash = hashes[i].split('=');
	        vars.push(hash[0]);
	        vars[hash[0]] = true;//hash[1];
	    }
	    return vars;
	}
	

</script>

		<div id="container" class="onecolumn">
			<div id="content">
					
					<div align="center">


					<h1>The Contest Has Expired!!!</h1>
					<h2>Please feel free to use the forms below to follow us or share Tap DJ on Twitter or Facebook (just cause its the nice thing to do).</h2>
					</div>
					
				<div id="contest-wrapper">
					
					<div id="contest-title">
						<img src="<?php echo get_template_directory_uri() ?>/images/contest/contest_title.png"/>
					</div>
					<div id="contest-choose" >
						<div id="contest-tabs">
							
						
						<div id="contest-tab-twitter" class="contest-tab contest-tab-on" onClick="showTwitter()">
							<img src="<?php echo get_template_directory_uri() ?>/images/contest/tab-logo-twitter.png"/>
							
						</div>
						<div id="contest-tab-facebook" class="contest-tab contest-tab-off" onClick="showFacebook()">
							<img src="<?php echo get_template_directory_uri() ?>/images/contest/tab-logo-facebook.png"/>
							
						</div>
						</div>
					</div>
					
					<!-- START FACEBOOK -->
					<div id="contest-content-facebook" class="contest-content" style="display:none">
						
						<div id="name" class="contest-step contest-step-1">
							<img id="contest-facebook-step-one-check" class="contest-step-number" src="<?php echo get_template_directory_uri() ?>/images/contest/step-one.png"/>

							<div class="contest-step-title" id="contest-facebook-step-one-subtitle">
								Connect to facebook.
							</div>
							<div class="contest-step-subtitle">
								So if you win, we can message you.
							</div>
							<div id="facebook-login-box" style="height:70px">
								<div id="user-info" style="display: none;"></div>
								<button id="facebook-login" style="border: 0; background: transparent">
									<img src="<?php echo get_template_directory_uri() ?>/images/contest/facebook-login.png" width="154" heght="22" alt="submit" />
								    
								</button>
								
							</div>
							
							<!--
								<button id="logout">Logout</button>
							     <button id="logout">Logout</button>
							      <button id="disconnect">Disconnect</button> -->

						</div>

						<div id="name" class="contest-step contest-step-2">
							<img id="contest-facebook-step-two-check" class="contest-step-number" src="<?php echo get_template_directory_uri() ?>/images/contest/step-two.png"/>
							
							<div class="contest-step-title">
								Update your status about Tap DJ
							</div>
							<div class="contest-step-subtitle">
								Click post. 
							</div>
							<div id="contest-facebook-post" style="height:70px">
								<button id="post" onClick="doPost();" style="border: 0; background: transparent"  >
									<img src="<?php echo get_template_directory_uri() ?>/images/contest/facebook-post.png" width="138" heght="25" alt="submit" />
								</button>
							</div>
							<div id="name">
								You can also give us a like (optional, but worth it).
								<fb:like href="http://labs.laan.com" layout="standard" show_faces="true" width="400" action="like" font="segoe ui" colorscheme="dark" />
								
							</div>
						    
							<div id="fb-root"></div>
							
						</div>
				


						<div id="name" class="contest-step contest-step-3">
							<img id="contest-twitter-step-three-check" class="contest-step-number" src="<?php echo get_template_directory_uri() ?>/images/contest/step-three.png"/>
							
							<div class="contest-step-title">
								Get the App!
							</div>
							<div class="contest-step-subtitle">
								And have some fun.
							</div>
							<div id="contest-get-app">
								<a href="http://itunes.apple.com/us/app/tap-dj-mix-scratch-your-music/id405088414?mt=8" target="_new">
								<img width="216" height="80" border="0" src="http://tap.dj/wp-content/themes/tapdj/images/buy-now.png"></a>
							</div>
							
							
						</div>




						
					</div>
					<!-- END FACEBOOK -->
					
					
					
					<!-- START TWITTER -->
					<div id="contest-content-twitter" class="contest-content"  style="">
						
						<div id="name" class="contest-step contest-step-1">
							<img id="contest-twitter-step-one-check" class="contest-step-number" src="<?php echo get_template_directory_uri() ?>/images/contest/step-one.png"/>
							
							<div class="contest-step-title">
								Follow us on twitter.
							</div>
							<div class="contest-step-subtitle">
								So if you win, we can message you.
							</div>
							<div id="follow-laanlabs" style="height:50px"></div>
							
						</div>

	
	
						<div id="name" class="contest-step contest-step-2">
							<img id="contest-twitter-step-two-check" class="contest-step-number" src="<?php echo get_template_directory_uri() ?>/images/contest/step-two.png"/>
							
							<div class="contest-step-title">
								Tweet about Tap DJ
							</div>
							<div class="contest-step-subtitle">
								You can customize this, but must have link<br/>(http://tap.dj/contest)<br/><span style="color:#cc4646;"><b>you must use this form to enter.</b></span>
							</div>
							<div id="contest-tbox" style="height:170px"></div>
							
							<!--<div id="twitter-connect-placeholder"></div>-->
							
						</div>
	
	
						<div id="name" class="contest-step contest-step-3">
							<img id="contest-twitter-step-three-check" class="contest-step-number" src="<?php echo get_template_directory_uri() ?>/images/contest/step-three.png"/>
							
							<div class="contest-step-title">
								Get the App!
							</div>
							<div class="contest-step-subtitle">
								And have some fun.
							</div>
							<div id="contest-get-app">
								<a href="http://itunes.apple.com/us/app/tap-dj-mix-scratch-your-music/id405088414?mt=8" target="_new">
								<img width="216" height="80" border="0" src="http://tap.dj/wp-content/themes/tapdj/images/buy-now.png"></a>
							</div>
							
							
						</div>


						
	
						
						
					</div>
					<!-- END TWITTER -->
					
					
					
<script>

//TWITTER START

twttr.anywhere(function (T) {
T('#follow-laanlabs').followButton("laanlabs");
});


twttr.anywhere(function (T) {

  T("#contest-tbox").tweetBox({
    height: 100,
    width: 400,
	label: "<span style=\"color: #fff; font-size: .9em;\">Tweet to enter the contest:</span>",
    defaultContent: "<?= $input[$rand_keys[0]]; ?>",
	onTweet: function() {
		 $('#contest-twitter-step-one-check').attr('src','<?php echo get_template_directory_uri() ?>/images/contest/step-one-done.png');
		
		currentUser = T.currentUser;
		 screenName = currentUser.data('screen_name');
		twitterID = currentUser.data('id');
		$.post("/api/user/contest", { twitter_screenName: screenName, twitter_id: twitterID},
		   function(data){
		     //alert("Data Loaded: " + data);
		   	alert("Congratulations, you are entered to win an iPod for today. We'll announce at the end of each day!");
		
		   });
    }
  });

});



/* dont really need to do th

twttr.anywhere(function (T) {

  var currentUser,
      screenName,
      profileImage,
      profileImageTag;
  if (T.isConnected()) {
    currentUser = T.currentUser;
    screenName = currentUser.data('screen_name');
    profileImage = currentUser.data('profile_image_url');
    profileImageTag = "<img src='" + profileImage + "'/>";
    $('#twitter-connect-placeholder').append("Logged in as " + profileImageTag + " " + screenName);
  } else {
    T("#twitter-connect-placeholder").connectButton();
  };

});

*/

//FACEBOOK START
 var user;

    // initialize the library with the API key
    FB.init({ apiKey: '2eaace5a2e94e5d8b4a780e7e36513fd', 
		xfbml  : true  // parse XFBML
});

    // fetch the status on load
    FB.getLoginStatus(handleSessionResponse);




    $('#facebook-login').bind('click', function() {
      FB.login(handleSessionResponse);
    });

    $('#logout').bind('click', function() {
      FB.logout(handleSessionResponse);
    });

    $('#disconnect').bind('click', function() {
      FB.api({ method: 'Auth.revokeAuthorization' }, function(response) {
        clearDisplay();
      });
    });

    // no user, clear display
    function clearDisplay() {
      $('#user-info').hide('fast');
	  $('#facebook-login').show();
    }


function doPost() {

FB.ui(
  {
    method: 'stream.publish',
	display : 'iframe',
    attachment: {
      name: 'Tap DJ iPhone app',
      caption: 'Click to download',
      description: (
        'Tap DJ is the Ultimate Pocket DJ App for iPhone/iPod. ' +
        'Visit http://tap.dj/ to check out the app!'
      ),
      href: 'http://tap.dj/?f',
      media: [
        {
          type: 'image',
          src: 'http://tap.dj/_lib/images/tapdj-big-icon.jpg',
          href: 'http://tap.dj/?f'
        }
      ]
    },
    action_links: [
      { text: 'Get App', href: 'http://itunes.apple.com/us/app/tap-dj-mix-scratch-your-music/id405088414?mt=8' }
    ]
  },
  function(response) {
    if (response && response.post_id) {
     // alert('Post was published.');


	 $('#contest-facebook-step-two-check').attr('src','<?php echo get_template_directory_uri() ?>/images/contest/step-two-done.png');
	

	if (typeof(user) == 'object') {
			
			alert("Congratulations, you are entered to win an iPod for today. We'll announce at the end of each day!");
			
			$.post("/api/user/contest", { facebook_id: user.id, facebook_name: user.name, facebook_url: user.url },
			   function(data){
			     //alert("Data Loaded: " + data);
			   });

	}
	
	
	} else {
      alert('Post was not published. Please complete your post to enter in the contest');
    }

  }
);


}


    // handle a session response from any of the auth related calls
    function handleSessionResponse(response) {
      // if we dont have a session, just hide the user info
      if (!response.session) {
        clearDisplay();
        return;
      }

      // if we have a session, query for the user's profile picture and name
      FB.api(
        {
          method: 'fql.query',
          query: 'SELECT id, url, name, pic FROM profile WHERE id=' + FB.getSession().uid
        },
        function(response) {
          user = response[0];
		  $('#facebook-login').hide();


          $('#user-info').html('<img src="' + user.pic + '" height="60" style="height:60px;"> you are logged in as ' + user.name).show('fast');
			
		 $('#contest-facebook-step-one-subtitle').html('You are connected to facebook');

 		 $('#contest-facebook-step-one-check').attr('src','<?php echo get_template_directory_uri() ?>/images/contest/step-one-done.png');

		
        }
      );
    }
  </script>
					
					
				
					
					
					
				</div>
	
	
	<div id="name">
		
		<table border="0" cellspacing="0" cellpadding="0" class="tstyle">
			<tr>
				<th class="tday">Day</th>
				<th class="twinner">Winner</th>
				<th class="tdate">Date</th>
				<th class="tprize">Prize</th>
			</tr>
			<tr>
				<td>Day 1</td>
				<td><img src="http://a2.twimg.com/profile_images/235604564/Pirate_normal.jpg"/><br/>@mushroomblu</td>
				<td>Feb 5th, 2011</td>
				<td>iPod</td>
			</tr>
			<tr>
				<td>Day 2</td>
				<td>Aram G.<br/>Facebook Winner</td>
				<td>Feb 6th, 2011</td>
				<td>iPod</td>
			</tr>
			<tr>
				<td>Day 3</td>
				<td><img src="http://a3.twimg.com/profile_images/671983646/Andrew_normal.jpg"/><br/>@ab_train</td>
				<td>Feb 7th, 2011</td>
				<td>iPod</td>
			</tr>
			<tr>
				<td>Day 4</td>
				<td><img src="http://a1.twimg.com/profile_images/974766021/1cbcc7ea-ac06-4201-8637-4882617702bc_normal.png"/><br/>@jwill215</td>
				<td>Feb 8th, 2011</td>
				<td>iPod</td>
			</tr>
			<tr>
				<td>Day 5</td>
				<td><img src="http://a2.twimg.com/profile_images/1102405511/155624320_normal.jpg"/><br/>@dennissudirdjo</td>
				<td>Feb 9th, 2011</td>
				<td>iPod w/ Killer Headphones</td>
			</tr>
		</table>
		
		Winner for each day is selected from entries for the day it is in New York City, New York, USA (GMT -5)<br/>

		In the 24 hour period starting at midnight, of the day of entry, going until 23:59 new york time the same day.<br/>

		Right now the current date in New York City, New York USA is <?= $timeNdate=gmdate('M d Y', time()-5*60*60); ?>.<br/>
		
		All Feb 4th entries will be compiled with Feb 5th.
		
		
		<br/><br/>		
			
		
				Please read the <a href="/_lib/static/contest-rules.txt" target="_new">Official Rules</a>. If you would like to enter the contest without tweeting/facebooking please click <a href="http://labs.laan.com/marketing/newsletter/no_subscibe.php" target="_new">here</a>.
		
			</div>		
					
			</div><!-- #content -->
		</div><!-- #container -->




		<?php get_sidebar(); ?>



<?php get_footer(); ?>


