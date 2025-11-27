<?php

//echo "coming soon", die()
/* THIS WILL TURN WORDPRESS BACK ON
define('WP_USE_THEMES', true);

require('./content/wp-blog-header.php');
*/

require_once $_SERVER["DOCUMENT_ROOT"] . "/../app.php";

$email_saved = false;

if ( @$_REQUEST['email_save'] == 1) {

	$sql = array (
	      "email"           =>      $_REQUEST['email_field'] ,
	      "product"        =>      "tapdjsite",
	      "campaign"        =>      "placeholderpage"
	 );


	$nSQL = "INSERT INTO laanlabs.newsletter SET " . DB::assoc_to_sql_str($sql)  ;
	DB::query($nSQL , false);

	$email_saved = true;

}


?>



<html>  
    <head>  
        <title>another tap.dj mix</title> 
		<link rel="shortcut icon" href="http://tap.dj/content/wp-content/themes/tapdj/images/favicon.ico" type="image/x-icon" /> 

		<script src="/_lib/js/AC_Quicktime.js" language="JavaScript" type="text/javascript"></script>
 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
		<script src="/_lib/js/LLQTPlayer.js" language="JavaScript" type="text/javascript"></script>
		

		<style type="text/css" media="screen">@import "http://labs.laan.com/marketing/arcontest/iphonenav.css";</style>
		<link
		    rel="stylesheet"
		    type="text/css"
		    href="http://labs.laan.com/marketing/arcontest/iphonenavretina.css"
		    media="only screen and (-webkit-min-device-pixel-ratio: 2)"
		/>

<style>

body, html {padding:0x; margin:0px; height:100%;}

body {
	background: #e3e6e8 url('<?=$base_img?>/tiny/tinyurl_background.jpg') repeat-x left top;
}

#wrapper {
	margin:0px auto;
	width: 800px;}




#mixArtwork {
	background: url('<?=$base_img?>/tiny/artwork_bk.png') no-repeat;
	width:136px;
	height:132px;	
}

#mixes {
	position:relative;
	top: 55px;
	height:340px;
	
}

#mix{
	position:relative;
	float:left;
	width:350px;
	font-family: 'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif;

	
}

#mixArtwork  img{
	position: relative;
	top: 12px;
	left:16px;
	border:1px solid #ccc;
	
	width:100px;
	height:100px;	
}

#mixCredits {
	position:relative;
	left:8px;
	
}

#buttonPreview {
	position:absolute; top:82px; left:90px
	
}

#trackName {
	line-height:34px;
	color:#2f3238;
	font-weight:bold;
	font-size:24px;
}

#artistName {
	line-height:24px;
	
}

#collectionName {
	line-height:24px;
	
}

#itunesLink {
	padding-top: 10px;
	
}

#vsBall {
	position:absolute;
	top:10px;
	left:205px;
	
}

</style>
<script language="JavaScript">

var result

function validEmail(){
 var str=document.email_form.email_field.value
 var filter=/^.+@.+\..{2,3}$/

 if (filter.test(str))
    result=true
 else {
    result=false
}


if (result) {
	return true;
} else {
	
	alert("Please input a valid email address!");
    return false;
}

}

function submitCheckedForm() {
	
	if (validEmail()) {
		
		document.email_form.submit();
	}
	
	
}


</script>

    </head>
	 <body>  
	<script>

	</script> 


	 
<div id="wrapper">

<div id="content" align="center">
			
				<div style="font-size:50px;padding:20px; color:#ccc">
					Coming Soon!
				</div>
			
	
				<div style="width:602px; height:307px;background: url(http://tap.dj/content/wp-content/themes/tapdj/images/iphone_top.png) top left no-repeat;"></div> 
	
	<br/>
	
				<? if ($email_saved) { ?>

					<div id="thanksText">
						Thanks for submitting! You will get an email when the DJ has arrived!
					</div>

				<? } else { ?>


				<div align="center">

					<div style="font-size:14px;padding:10px; color:#000">
						If you give us your email, we will alert you when the app is in the store.
					</div>
				    <form name="email_form" class="" action="index.php" method="POST" onSubmit="return validEmail()">
					<input type="hidden" name="email_save" value="1"/>
				        <fieldset>
				            <input name="email_field" type="text" placeholder="Enter Your Email"/>
				        </fieldset>
				    </form>


				<a id="buttonSignup" href="javascript:submitCheckedForm();">&nbsp;</a>
				
				<? } ?>
	
</div></div>


    </body>  
</html>