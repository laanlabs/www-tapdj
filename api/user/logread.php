<?


$udid = @$_REQUEST['UID'];

if (!isset($udid)) 
	die("NO ID");

$log_file = $log_dir . $udid . ".txt";

$fh = fopen($log_file, 'r');
$data = fread($fh, filesize($log_file));
fclose($fh);
echo "<PRE>";
echo $data;
echo "</PRE>";

?>