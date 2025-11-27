<?

//1 change the mix to reflect new prop 
// note this takes only one track at a time


$mix_id = $_REQUEST['mix_id'];

$nSQL = "DELETE FROM track_mix WHERE mix_id = " . $mix_id ;
DB::query($nSQL , false);


for ($deck_count = 0; $deck_count < 2; $deck_count++) {

if (@$_REQUEST['deck_id'][$deck_count]) {


	if (@$_REQUEST['track_id'][$deck_count] > 0 ) { //if we have track id

		$track_id = $_REQUEST['track_id'][$deck_count];
		//echo "TRACK ID FROM SUBMIT:" . $track_id;

	} else if (@$_REQUEST['itunes_id'][$deck_count] > 0 ) {

		//echo "ITUNES ID FROM SUBMIT:" . $track_id;

		$url = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsLookup?&id=" . $_REQUEST['itunes_id'][$deck_count];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);



		$jsonObj = json_decode($result, true);



		//echo $jsonObj['resultCount'];

			if ( count($jsonObj['results'])) {

				$track = $jsonObj['results'][0];

				$sql = array (
				      "track_name"           =>      $track['trackName'],
				      "artist_name"           =>      $track['artistName'],
					  "collection_name"       =>      $track['collectionName'],
				      "ext_itunes_id"  		  =>      $track['trackId'],
				      "ext_itunes_audio_preview_url"       =>      $track['previewUrl'],
				      "ext_itunes_artwork_url"             =>     $track['artworkUrl100'],
					  "ext_itunes_track_url"             =>     $track['trackViewUrl'],

				 );

				$nSQL = "INSERT INTO tracks SET " . DB::assoc_to_sql_str($sql) . " ON DUPLICATE KEY UPDATE track_id = LAST_INSERT_ID(track_id), " .  DB::assoc_to_sql_str($sql) ;

				DB::query($nSQL , false);

				$track_id = DB::last_insert_id();

				//TODO: find way to improve this -- last id not working sometime as result of mysqli bug - i think?
				if ($track_id == 0) {

					$nSQL = "SELECT track_id FROM tracks WHERE ext_itunes_id = " .$track['trackId'] . " LIMIT 1";
					//echo $nSQL;
					$t = DB::query($nSQL);
					$track_id = $t[0]['track_id'];
				}

			}

	} //end if itunes



	$sql = array (
	      "mix_id"     =>     $mix_id,
	      "track_id"   =>    $track_id,
		  "deck_id"	 => $_REQUEST['deck_id'][$deck_count] -1,
		  "dont_share" => (($_REQUEST['dont_share'][$deck_count] == "true") ? "1" : "0") 
	 );               

	
	$nSQL = "INSERT INTO track_mix SET " . DB::assoc_to_sql_str($sql);
	
	if ($track_id > 0 )
		DB::query($nSQL , false);

	//echo $nSQL;
	
	$track_id = 0;


} //END IF track

} // end track loops


//$mix_id = "40"; 

$nSQL = "SELECT mix.*, m.deck_id, m.dont_share, t.*, u.username FROM mixs mix LEFT OUTER JOIN users u ON mix.user_id = u.user_id, 
track_mix m
LEFT OUTER JOIN tracks t ON t.track_id = m.track_id
WHERE m.mix_id = mix.mix_id
AND m.mix_id = " . DB::escape($mix_id) ;


$t = DB::query($nSQL);

$tracks = array();

$i = 0;
foreach ($t as $r) {	
	

	$mix_title = $r['mix_title']; 
	$user_id = $r['user_id']; 
	$username = $r['username']; 
	
	$tracks[$i]['deck_id'] = $r['deck_id'] + 1;
	$tracks[$i]['track_id'] = $r['track_id'];
	$tracks[$i]['track_name'] = $r['track_name'];
	$tracks[$i]['artist_name'] = $r['artist_name'];
	$tracks[$i]['itunes_id'] = $r['ext_itunes_id'];
	$tracks[$i]['preview_url'] = $r['ext_itunes_audio_preview_url'];
	$tracks[$i]['artwork_url'] = $r['ext_itunes_artwork_url'];
	$tracks[$i]['link_url'] =    $r['ext_itunes_track_url'];
	$tracks[$i]['dont_share'] =    $r['dont_share'];

$i++;

}


$json_data = array (
	"mix_id"        =>      $mix_id,
	"mix_url"       =>     "http://tap.dj/" . TinyHelper::decimal_to_base($mix_id, 62),
	"mix_title"     =>      $mix_title,
	"user_id"       =>      $user_id,
	"username"      =>      $username,
	"tracks"		=>		$tracks
);	

echo json_encode($json_data);

?>