<?



TAPDJMix::verifyRequest();


$inserted_track_id = array();
$found_tracks = 0;


for ($deck_count = 0; $deck_count < 2; $deck_count++) {

if (@$_REQUEST['track_title'][$deck_count]) {	

//GET SEARCH TERM AS COMBO OF TRACK NAME AND ARTIST - THIS SEEMS TO WORK WELL WITH ITUNES
$search_term = urlencode(@$_REQUEST['track_title'][$deck_count] . " " . @$_REQUEST['artist_name'][$deck_count]);

//echo "TERM: " . $search_term;

	if (@$_REQUEST['itunes_id'][$deck_count] > 0 ) {
		$url = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsLookup?&id=" . $_REQUEST['itunes_id'][$deck_count];
	} else {
		$url = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsSearch?&entity=musicTrack,mix&limit=1&term=" . $search_term;
	}

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
		
		
				$last_track_id = DB::last_insert_id();

				//TODO: find way to improve this -- last id not working sometime as result of mysqli bug - i think?
				if ($last_track_id == 0) {

					$nSQL = "SELECT track_id FROM tracks WHERE ext_itunes_id = '" .$track['trackId'] . "' LIMIT 1";
					echo $nSQL;
					$t = DB::query($nSQL);
					$last_track_id = $t[0]['track_id'];
				}

		$inserted_track_id[$found_tracks]['deck_id'] =  $_REQUEST['deck_id'][$deck_count];
		$inserted_track_id[$found_tracks]['track_id'] =  $last_track_id;
		$inserted_track_id[$found_tracks]['track_name'] = $track['trackName'];
		$inserted_track_id[$found_tracks]['artist_name'] = $track['artistName'];	
		$inserted_track_id[$found_tracks]['itunes_id'] = $track['trackId'];
		$inserted_track_id[$found_tracks]['preview_url'] = $track['previewUrl'];
		$inserted_track_id[$found_tracks]['artwork_url'] = $track['artworkUrl100'];
		$inserted_track_id[$found_tracks]['link_url'] =    $track['trackViewUrl'];
	
		$found_tracks++;
		
		$last_track_id = 0;
		
	}  else { 
	
	
	
	}//END IF TRACK found

} //END IF TRACK SUBMT

} //END DECK LOOP


//if we found tracks

if ($found_tracks > 0 ) {

//CREATE USER

$user = TAPDJUser::get_user_for_device_hash($_REQUEST['user_hash']);


// START CREATE MIX


$mix_title = "Mixing....";


$sql = array (
      "mix_title"           =>      $mix_title,
      "user_id"           =>     $user['user_id'] ,
 );

$nSQL = "INSERT INTO mixs SET " . DB::assoc_to_sql_str($sql);
DB::query($nSQL , false);

$mix_id = DB::last_insert_id();


// END CREATE MIX


//INSERT LINKING TABLES
for ($i = 0; $i < count($inserted_track_id); $i++) {


	$sql = array (
	      "mix_id"     =>      $mix_id,
	      "track_id"   =>     $inserted_track_id[$i]['track_id'],
		  "deck_id"	 => $i
	 );               

	$nSQL = "INSERT INTO track_mix SET " . DB::assoc_to_sql_str($sql);
	DB::query($nSQL , false);


}
//JSON DATA OUTPUT



$json_data = array (
	"mix_id"        =>      $mix_id,
	"mix_url"       =>     "http://tap.dj/" . TinyHelper::decimal_to_base($mix_id, 62),
	"mix_title"     =>      $mix_title,
	"user_id"       =>      $user['user_id'] ,
	"username"      =>      $user['username'] ,
	"tracks"		=>		$inserted_track_id
);	


} else {
	
	$json_data = array (
		"error"        =>      "No tracks found"
		
	);
	
} //END IF FOUND TRACKS






echo json_encode($json_data);


//print_r($jsonObj);


?>