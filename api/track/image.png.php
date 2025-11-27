<?



if (@$_REQUEST['q']) {

//GET SEARCH TERM AS COMBO OF TRACK NAME AND ARTIST - THIS SEEMS TO WORK WELL WITH ITUNES
$search_term = urlencode($_REQUEST['q']);

$url = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsSearch?&entity=musicTrack,mix&limit=1&term=" . $search_term;

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



	header("Location: " . $track['artworkUrl100'] ,TRUE,301);
	die();


}	//END RESULTS LOOP


}  //END IF TRACK RESULTS



} //END IF SEARCH TERM

header("HTTP/1.0 404 Not Found");


?>