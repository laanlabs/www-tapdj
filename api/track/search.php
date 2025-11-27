<?




if (@$_REQUEST['term']) {

//GET SEARCH TERM AS COMBO OF TRACK NAME AND ARTIST - THIS SEEMS TO WORK WELL WITH ITUNES
$search_term = urlencode($_REQUEST['term']);

$url = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsSearch?&entity=musicTrack,mix&limit=40&term=" . $search_term;

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
	$inserted_track_id[$i]['artist_name'] = $track['artistName'];
	$inserted_track_id[$i]['itunes_id'] = $track['trackId'];
	$inserted_track_id[$i]['preview_url'] = $track['previewUrl'];
	$inserted_track_id[$i]['artwork_url'] = $track['artworkUrl100'];
	$inserted_track_id[$i]['link_url'] =    $track['trackViewUrl'];

}	//END RESULTS LOOP


} //END IF TRACK RESULTS



} //END IF SEARCH TERM




$json_data = array (
	"track_result_sets"		=>		count($inserted_track_id),
	"tracks"		=>		$inserted_track_id
);	


echo json_encode($json_data);


//print_r($jsonObj);


?>