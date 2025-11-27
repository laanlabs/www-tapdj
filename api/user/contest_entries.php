

<style>

table
{
border-collapse:collapse;
}
table,th, td
{
border: 1px solid black;
}

td {
	
	padding:2px;
}

</style>

<?

$nSQL = "SELECT count(*) as count FROM contest_entry_twitter";
$k = DB::query($nSQL);


$nSQL = "SELECT DAYOFYEAR(ts) as day, HOUR(ts) as hour, count(*) as count, ts
FROM contest_entry_twitter
GROUP BY day, hour
ORDER BY day, hour";


$t = DB::query($nSQL);

?>

<h2> Twitter Entries - <?=$k[0]['count'] ?></h2>

<table>

<tr>
	<td>date</td>
	<td>hour</td>
	<td>count</td>
	<td>Count</td>
</tr>	
<?

foreach ( $t as $r) {
	
	$datetime = strtotime( $r['ts'] );
	
	
?>

<tr>
	<td><?= date("m/d/y", $datetime-5*60*60) ?></td>
	<td><?= date("g:i A", $datetime-5*60*60) ?></td>
	<td><?= $r['count'] ?></td>
	<td>
	<div style="background-color:#000; height: 20px; width:<?= $r['count']*5 ?>px ">
	
		
		</td>
</tr>



<?  } ?>

</table>



<?

$nSQL = "SELECT count(*) as count FROM contest_entry_facebook";
$k = DB::query($nSQL);


$nSQL = "SELECT DAYOFYEAR(ts) as day, HOUR(ts) as hour, count(*) as count, ts
FROM contest_entry_facebook
GROUP BY day, hour
ORDER BY day, hour";


$t = DB::query($nSQL);

?>

<hr/>

<h2> Facebook Entries - <?=$k[0]['count'] ?></h2>

<table>

<tr>
	<td>date</td>
	<td>hour</td>
	<td>count</td>
	<td>Count</td>
</tr>	
<?

foreach ( $t as $r) {
	
	$datetime = strtotime( $r['ts'] );
	
	
?>

<tr>
	<td><?= date("m/d/y", $datetime-5*60*60) ?></td>
	<td><?= date("g:i A", $datetime-5*60*60) ?></td>
	<td><?= $r['count'] ?></td>
	<td>
	<div style="background-color:#000; height: 20px; width:<?= $r['count']*5 ?>px ">
	
		
		</td>
</tr>



<?  } ?>

</table>
