<?

$mix_id = $_REQUEST['mix_id'];
$vote = $_REQUEST['vote'];

if ($vote == 1) {
	$nSQL = "UPDATE mixs SET vote_plus = vote_plus + 1 WHERE mix_id = " . DB::escape($mix_id);
	DB::query($nSQL, false);
} else if ($vote == -1) {
	echo "down";
	$nSQL = "UPDATE mixs SET vote_minus = vote_minus + 1 WHERE mix_id = " . DB::escape($mix_id);
	DB::query($nSQL, false);
} else {
	die("false");
}

echo "true";


?>