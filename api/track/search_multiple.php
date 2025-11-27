<?



$inserted_track_id = array();

$result = array();

for ($deck_count = 0; $deck_count < 5; $deck_count++) {

	
if (@$_REQUEST['track_title'][$deck_count]) {

//GET SEARCH TERM AS COMBO OF TRACK NAME AND ARTIST - THIS SEEMS TO WORK WELL WITH ITUNES
$search_term = urlencode($_REQUEST['track_title'][$deck_count] . " " . $_REQUEST['artist_name'][$deck_count]);

$url = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsSearch?&entity=musicTrack,mix&limit=20&term=" . $search_term;

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);


$jsonObj = json_decode($result, true);

//echo $jsonObj['resultCount'];

if ( count($jsonObj['results'])) {

for ($i = 0; $i < count($jsonObj['results']); $i++) {
	$track = $jsonObj['results'][$i];


	$inserted_track_id[$i]['track_name'] = $track['trackName'];
	$inserted_track_id[$i]['itunes_id'] = $track['trackId'];
	$inserted_track_id[$i]['preview_url'] = $track['previewUrl'];
	$inserted_track_id[$i]['artwork_url'] = $track['artworkUrl100'];
	$inserted_track_id[$i]['link_url'] =    $track['trackViewUrl'];

}	//END RESULTS LOOP


} //END IF TRACK RESULTS

$results[$deck_count] = $inserted_track_id;

} //END IF SEARCH TERM

} //END DECK LOOP



$json_data = array (
	"track_result_sets"		=>		count($results),
	"tracks"		=>		$results
);	


echo json_encode($json_data);


//print_r($jsonObj);


?>