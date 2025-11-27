
<div id="name" style="padding-bottom:20px">
	Checkout the charts of what our dj's are mixing with by looking at the
	<a class="" href="/charts/featured-tracks/">Featured Tracks</a>,
	<a class="" href="/charts/popular-tracks/">Popular tracks</a> and
	<a class="" href="/charts/popular-mixes/">Popular Mixes</a>.
	Here is quick taste of the last 5 tracks used:
</div>

<?
	
		$track = TAPDJMix::get_latest_tracks(5);
	

				
			
$i = 0;		
foreach ($track as $r) {
	$trackName = $r['track_name'] ;
	
	//print_r($r);
	$maxlen = 60;
	if (strlen($trackName) > $maxlen) { $trackName = trim(substr($trackName, 0, $maxlen)) . "..."; }
	?>
	
	
	<div id="trackRow" style="height:110px" >


		<div id="artWork" style="float:left;">
			<img src="<?=$r['ext_itunes_artwork_url'] ?>" />
		</div>
		
		<div id="trackCredits" style="float:left; padding-left: 10px; width:400px">
			<div id="trackName"><?=$trackName?></div>
			<div id="artistName"><?=$r['artist_name'] ?></div>
			<div id="collectionName"><?=$r['collection_name'] ?></div>
			<div id="itunesLink">
				<a href="<?=TAPDJMix::makeAffiliateLink($r['ext_itunes_track_url'],$country_code) ?>" target_="new"><img src="http://www.apple.com/itunes/affiliates/resources/iTunes_small_badge.gif" border="0"/></a>
			</div>	
		</div>

		<div id="buttonPreview" style="">
			<a href="javascript:loadAndPlay('<?=$i+1?>','<?=$r['ext_itunes_audio_preview_url'] ?>');"><img id="playButtonImage<?=$i+1?>"src="/wp-content/themes/tapdj/images/tiny/button_play.png" border="0"></a>
		</div>

	</div>	
	
	
<? 
$i++;
} ?>