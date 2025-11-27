
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"> 
<html dir="ltr" lang="en-US" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en"  > 
<head> 
<meta charset="UTF-8" /> 
<meta name="resource-type" content="document" /> 
<meta property="fb:admins" content="1219546768" /> 
<title>Contest | Tap DJ</title> 
<link rel="profile" href="http://gmpg.org/xfn/11" /> 
<script src="/_lib/js/AC_Quicktime.js" language="JavaScript" type="text/javascript"></script> 
<script src="/_lib/js/LLQTPlayer.js" language="JavaScript" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="http://connect.facebook.net/en_US/all.js"></script>

</head>
<body>
		<div>

	    <fb:like href="http://labs.laan.com" layout="standard" show_faces="true" width="400" action="like" font="segoe ui" colorscheme="light" />
	
	    </div>


	<h1>Connect JavaScript - jQuery Login Example</h1>
	    <div>
	      <button id="login">Login</button>
	      <button id="logout">Logout</button>
	      <button id="disconnect">Disconnect</button>
	    </div>
	
	
	    <div>
	      <button id="post" onClick="doPost();">post</button>

	    </div>
	
	
	    <div id="user-info" style="display: none;"></div>


	    <div id="fb-root"></div>
	    <script>
	
	
		  var user;
		
	      // initialize the library with the API key
	      FB.init({ apiKey: '2eaace5a2e94e5d8b4a780e7e36513fd', 
					xfbml  : true  // parse XFBML
	});

	      // fetch the status on load
	      FB.getLoginStatus(handleSessionResponse);




	      $('#login').bind('click', function() {
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
	      }


		 function doPost() {
			
			FB.ui(
			  {
			    method: 'stream.publish',
			    attachment: {
			      name: 'Tap.dj Contest',
			      caption: 'Win',
			      description: (
			        'A small JavaScript library that allows you to harness ' +
			        'the power of Facebook, bringing the user\'s identity, ' +
			        'social graph and distribution power to your site.'
			      ),
			      href: 'http://tap.dj/contest'
			    },
			    action_links: [
			      { text: 'get app', href: 'http://fbrell.com/' }
			    ]
			  },
			  function(response) {
			    if (response && response.post_id) {
			      alert('Post was published.');
			    } else {
			      alert('Post was not published.');
			    }
			
				if (user.id) {
					
						$.post("/api/user/contest", { facebook_id: user.id, facebook_name: user.name, facebook_url: user.url },
						   function(data){
						     alert("Data Loaded: " + data);
						   });
			
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
	            $('#user-info').html(user.id + '<img src="' + user.pic + '">' + user.name).show('fast');
	
				
	
	          }
	        );
	      }
	    </script>

</body>
</html>

