<?
	
	if ($track_type == "featured") {
		$track = TAPDJMix::get_featured_tracks(20);
	} else {
		$track = TAPDJMix::get_popular_tracks(20);		
	}		

				
			
$i = 0;		
foreach ($track as $r) {
	$trackName = $r['track_name'] ;
	
	//print_r($r);
	$maxlen = 60;
	if (strlen($trackName) > $maxlen) { $trackName = trim(substr($trackName, 0, $maxlen)) . "..."; }
	?>
	
	
	<div id="trackRow" style="height:100px" >


		<div id="artWork" style="float:left;">
			<img src="<?=$r['ext_itunes_artwork_url'] ?>" />
		</div>
		
		<div id="trackCredits" style="float:left; padding-left: 10px; width:380px">
			<div id="trackName"><?=$trackName?></div>
			<div id="artistName"><?=$r['artist_name'] ?></div>
			<div id="collectionName"><?=$r['collection_name'] ?></div>
			<div id="itunesLink">
				<a href="<?=TAPDJMix::makeAffiliateLink($r['ext_itunes_track_url'], $country_code) ?>" target_="new"><img src="http://www.apple.com/itunes/affiliates/resources/iTunes_small_badge.gif" border="0"/></a>
			</div>	
		</div>

		<div id="buttonPreview" style="">
			<a href="javascript:loadAndPlay('<?=$i+1?>','<?=$r['ext_itunes_audio_preview_url'] ?>');"><img id="playButtonImage<?=$i+1?>"src="/wp-content/themes/tapdj/images/tiny/button_play.png" border="0"></a>
		</div>

	</div>	
	
	
<? 
$i++;
} ?>