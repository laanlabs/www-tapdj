<?

	$t = TAPDJMix::get_featured_tracks(15);

	$tracks = array();	
		
	for ($k = 0; $k < count($t); $k++) {
		

		
		$tracks[$k]['track_id'] =  $t[$k]['track_id'];
		$tracks[$k]['track_name'] = $t[$k]['track_name'];
		$tracks[$k]['artist_name'] = $t[$k]['artist_name'];
		$tracks[$k]['collection_name'] = $t[$k]['collection_name'];
		$tracks[$k]['itunes_id'] = $t[$k]['ext_itunes_id'];
		$tracks[$k]['preview_url'] = $t[$k]['ext_itunes_audio_preview_url'];
		$tracks[$k]['artwork_url'] = $t[$k]['ext_itunes_artwork_url'];
		$tracks[$k]['link_url'] =    TAPDJMix::makeAffiliateLink($t[$k]['ext_itunes_track_url']);
		$tracks[$k]['mix_count'] =    $t[$k]['count'];
		
	}	
	








$json_data = array (
	"tracks"        =>      $tracks
);	

//print_r($json_data); die();


echo json_encode($json_data);


?>