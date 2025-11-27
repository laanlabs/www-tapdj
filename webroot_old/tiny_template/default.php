
<html>  
    <head>  
        <title>Tap DJ - Mix &amp; scratch on your iPhone/iPod - Mixing <?= $mix_title ?></title>
		<meta property="og:title" content="<?= $mix_title ?>"/> 
		<meta property="og:image" content="http://tap.dj/_lib/images/tapdj-logo-small.jpg"/> 
		<meta property="og:type" content="song"/>
		<meta property="og:url" content="http://tap.dj<?=$request_path ?>"/> 
		<meta property="fb:app_id" content="170656362962576"/> 
		<meta property="fb:admins" content="1219546768" />

		<link rel="shortcut icon" href="http://tap.dj/wp-content/themes/tapdj/images/favicon.ico" type="image/x-icon" /> 
		<meta id="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" />
		<script src="/_lib/js/AC_Quicktime.js" language="JavaScript" type="text/javascript"></script>
 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
		<script src="/_lib/js/LLQTPlayer.js" language="JavaScript" type="text/javascript"></script>
		

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

#mixArtwork  img.artThumb{
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
	padding-left:8px;
	
}

#vsBall {
	position:absolute;
	top:10px;
	left:205px;
	
}

</style>


    </head>

<body>  

	<script type="text/javascript"> 

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-20621430-1']);
	  _gaq.push(['_setDomainName', 'none']);
	  _gaq.push(['_setAllowLinker', true]);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	 
<div id="wrapper">

<div id="content">
	
<div id="header" style="position:relative; top:6px">
	<a href="/"><img src="<?=$base_img?>/tiny/tinyurl_logo.png" border="0"></a>
</div>	

<div id="mixes">

	<?
	$rowcount = 0;
	foreach ($m as $r) {	
	$rowcount++;	
	?>
	<div id="mix" >
		
		<div id="mixClickWrapper" onClick="loadAndPlay('<?=$rowcount?>','<?=$r['ext_itunes_audio_preview_url'] ?>');" style="cursor:hand">
		
		<div id="mixArtwork">
			<img class="artThumb" src="<?=$r['ext_itunes_artwork_url'] ?>"/>
			
			<div id="buttonPreview" style="">
				<img id="playButtonImage<?=$rowcount?>"src="<?=$base_img?>/tiny/button_play.png" border="0">
			</div>
			
		</div>
		

		
		<div id="mixCredits">
			
		
			<div id="trackName"><?=$r['track_name'] ?></div>
			<div id="artistName"><?=$r['artist_name'] ?></div>
			<div id="collectionName"><?=preview_text($r['collection_name'],40) ?></div>
	
		</div>
		</div>
			<div id="itunesLink">
				<a href="<?=TAPDJMix::makeAffiliateLink($r['ext_itunes_track_url'], $country_code)?>" target_="new"><img src="http://ax.phobos.apple.com.edgesuite.net/images/web/linkmaker/badge_itunes-lrg.gif" border="0"/></a>
			</div>
		
	</div>

	<? 
	}

	?>

<? if ($rowcount > 1) {?>
		<div id="vsBall">
			<img src="<?=$base_img?>/tiny/versus_ball.png" border="0">
		</div>
<?}?>
	
</div> 
<br clear="both"/>

<div>
<a href="http://itunes.apple.com/us/app/tap-dj-mix-scratch-your-music/id405088414?mt=8" target="_new"><img src="/_lib/images/buy-now-app-store.png" border="0"></a>
</div>


<div style="padding-top:40px">
<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://tap.dj<?=$request_path ?>" data-text="Loved this mix of <?=$mix_title ?> -" data-count="none">Tweet This Mix</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div>

<div style="padding-top:10px">
<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ftap.dj<?= urlencode($request_path) ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>
</div>


</div>

	
</div>
	
<script language="javascript" type="text/javascript">

QT_WriteOBJECT('<?=$m[0]['ext_itunes_audio_preview_url'] ?>', '1','1', '', 'obj#id', 'audioPlayerQT', 'emb#id', 'qtmovie_embed2', 'emb#name', 'audioPlayerQT', 'postdomevents', 'true', 'enablejavascript', 'true','autoplay', 'false');



</script>

<!-- <audio id="audioPlayer" src="" >
Your browser does not support the audio element.

</audio> -->

    </body>  
</html>