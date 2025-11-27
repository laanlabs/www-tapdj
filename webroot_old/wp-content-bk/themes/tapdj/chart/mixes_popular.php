<script>

function vote(mix_id, vote, divID) {


	var baseDiv = divID + ((vote == 1) ? '_plus' : '_minus');

	$('#'+baseDiv).html('voting..');

	var url = '/api/mix/vote?mix_id=' + mix_id + '&vote=' + vote;



	$.get(url, function(data) {
	 $('.result').html(data);
	
  	 	$('#'+baseDiv).html('voted');

		var countDiv = baseDiv + 'Count';
		var count = $('#'+countDiv).html();
	  	var countInt = parseInt(count) +1 ;
		$('#'+countDiv).html(countInt);
	});

}

</script>

<style>
.voteBlock {
	display:inline;
}
</style>

<?
			$mixs = TAPDJMix::get_popular_mixes(20);



			$i = 0;
			foreach ($mixs as $r) {	

				$url = "http://tap.dj/" . TinyHelper::decimal_to_base($r['mix_id'], 62);

				$phpdate = strtotime( $r['date_created'] );
				$mysqldate = date( 'm.d.y', $phpdate );
				
				$username = (strlen($r['username'] ) == 0) ? "Uknown" : $r['username'] ;
				
			?>

			<div id="mixRow">

				<div id="mixHeader">
					
					<div style="float:left; ">
							<a href="<?= $url ?>">Mixed by <strong><?= $username ?></strong> on <?=  $mysqldate ?></a>
							
							<? if ($r['others'] > 0) {?> and <?= $r['others'] ?> other<?  echo ($r['others'] == 1) ? "" : "s";  }?>
					</div>
					
		
								<div style="float:right;">
											<div class="voteBlock" id="voteDiv<?=$i?>_plus"><a href="javascript:vote('<?= $r['mix_id'] ?>','1','voteDiv<?=$i?>')";>up</a></div>
											<div class="voteBlock" id="voteDiv<?=$i?>_plusCount"><?= $r['vote_plus'] ?></div> |
											<div class="voteBlock" id="voteDiv<?=$i?>_minus"><a href="javascript:vote('<?= $r['mix_id'] ?>','-1','voteDiv<?=$i?>')";>down</a></div>
											<div class="voteBlock" id="voteDiv<?=$i?>_minusCount"><?= $r['vote_minus'] ?></div>
												
								</div>
					<br clear="both"/>
						
					
					
				</div>
	
			<? for ($deck_count = 1; $deck_count < 3; $deck_count++) { 
				
				$trackName = $r['t'. $deck_count . '_track_name'] ;
				
				if (strlen($trackName) > 20) { $trackName = trim(substr($trackName, 0, 20)) . "..."; }
				?>

				<div id="mixTrack" >


					<div id="artWork" style="float:left;">
						<img src="<?=$r['t'. $deck_count . '_artwork_url'] ?>" />
					</div>
					
					<div id="trackCredits" style="float:left; padding-left: 10px">
						<div id="trackName"><?=$trackName?></div>
						<div id="artistName"><?=$r['t'. $deck_count . '_artist_name'] ?></div>
						<div id="collectionName"><?=$r['t'. $deck_count . '_collection_name'] ?></div>
						<div id="itunesLink"> 
							<a href="<?=TAPDJMix::makeAffiliateLink($r['t'. $deck_count . '_link_url'], $country_code) ?>" target_="new"><img src="http://www.apple.com/itunes/affiliates/resources/iTunes_small_badge.gif" border="0"/></a>
						</div>	
					</div>

					<div id="buttonPreview" style="">
						<a href="javascript:loadAndPlay('<?=$i+1?>','<?=$r['t'. $deck_count . '_preview_url'] ?>');"><img id="playButtonImage<?=$i+1?>"src="/wp-content/themes/tapdj/images/tiny/button_play.png" border="0"></a>
					</div>

				</div>

				
			<? 
			$i++;
			} ?>


			</div>
			<br clear="both"/>	




			<?
			}
			?>