
<?
for ($deck_count = 0; $deck_count < 2; $deck_count++) {

echo "<table border='1'><tr valign='top'><td >";		
	

$search_term = urlencode($_REQUEST['track_title'][$deck_count] . " " . $_REQUEST['artist_name'][$deck_count]);

$url = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsSearch?&entity=musicTrack,mix&limit=20&term=" . $search_term;

//attribute=allTrackTerm
//$url = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsSearch?&entity=allTrack&attribute=allITunesUTrackTerm&term=" . $search_term;


$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);


$jsonObj = json_decode($result, true);

//echo $jsonObj['resultCount'];

foreach($jsonObj['results'] as $track) {
	
	?>
	
	 <?=$track['trackId']?>  <br/>
	 <?=$track['trackName']?>  <br/>
	 <?=$track['artistName']?>  <br/>
	 <a href="<?=$track['previewUrl']?>"><?=$track['previewUrl']?></a>  <br/>
 	 <img src="<?=$track['artworkUrl100']?>" />  <br/>
	<hr/>
	
<?	
}


echo "</td><td>";


}


echo "</tr></table>";

//print_r($jsonObj);


?>


<!--
	[wrapperType] => track
    [kind] => song
    [artistId] => 334854763
    [collectionId] => 398439652
    [trackId] => 398439653
    [artistName] => Ke$ha
    [collectionName] => We R Who We R - Single
    [trackName] => We R Who We R
    [collectionCensoredName] => We R Who We R - Single
    [trackCensoredName] => We R Who We R
    [artistViewUrl] => http://itunes.apple.com/us/artist/ke-ha/id334854763?uo=4
    [collectionViewUrl] => http://itunes.apple.com/us/album/we-r-who-we-r/id398439652?i=398439653&uo=4
    [trackViewUrl] => http://itunes.apple.com/us/album/we-r-who-we-r/id398439652?i=398439653&uo=4
    [previewUrl] => http://a1.phobos.apple.com/us/r1000/003/Music/9c/21/7c/mzi.qaqllntq.aac.p.m4a
    [artworkUrl30] => http://a1.phobos.apple.com/us/r1000/015/Music/16/b2/a0/mzi.yospdmuk.30x30-50.jpg
    [artworkUrl60] => http://a1.phobos.apple.com/us/r1000/015/Music/16/b2/a0/mzi.yospdmuk.60x60-50.jpg
    [artworkUrl100] => http://a1.phobos.apple.com/us/r1000/015/Music/16/b2/a0/mzi.yospdmuk.100x100-75.jpg
    [collectionPrice] => 1.29
    [trackPrice] => 1.29
    [releaseDate] => 2010-10-22 07:00:00 Etc/GMT
    [collectionExplicitness] => notExplicit
    [trackExplicitness] => notExplicit
    [discCount] => 1
    [discNumber] => 1
    [trackCount] => 1
    [trackNumber] => 1
    [trackTimeMillis] => 204760
    [country] => USA
    [currency] => USD
    [primaryGenreName] => Pop
    [contentAdvisoryRating] =>
-->