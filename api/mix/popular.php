<?

if (isset($_POST['locale'])) {
	$country_code = $_POST['locale'];
} else {
	$country_code = DB::getCountryCode();
}	
	
$mix_db = TAPDJMix::get_popular_mixes(20);

$mixs = array();


$i = 0;
foreach ($mix_db as $r) {

	$tracks = array();

	
		
	for ($k = 0; $k < 2; $k++) {
				
		$t = 't' . ($k+1) . '_';		
				
		$tracks[$k]['deck_id'] =  $r[$t . 'deck_id'] + 1;
		$tracks[$k]['track_id'] =  $r[$t . 'track_id'];
		$tracks[$k]['track_name'] = $r[$t . 'track_name'];
		$tracks[$k]['artist_name'] = $r[$t . 'artist_name'];
		$tracks[$k]['itunes_id'] =  $r[$t . 'itunes_id'];
		$tracks[$k]['preview_url'] = $r[$t . 'preview_url'];
		$tracks[$k]['artwork_url'] = $r[$t . 'artwork_url'];
		$tracks[$k]['link_url'] =    TAPDJMix::makeAffiliateLink($r[$t . 'link_url'], $country_code);
		
	}	
	



	$mixs[$i] = array (
		"mix_id"        =>      $r['mix_id'],
		"mix_url"       =>     "http://tap.dj/" . TinyHelper::decimal_to_base( $r['mix_id'], 62),
		"mix_title"     =>      $r['mix_title'],
		"user_id"       =>      $r['user_id'],
		"username"      =>      $r['username'],
		"vote_plus"      =>      $r['vote_plus'],
		"vote_minus"      =>      $r['vote_minus'],
		"tracks"		=>		$tracks
	);

 $i++;
}




$json_data = array (
	"mixs"        =>      $mixs
);	


echo json_encode($json_data);




?>