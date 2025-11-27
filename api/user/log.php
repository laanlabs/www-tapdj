<?


$udid = @$_REQUEST['UID'];

if (!isset($udid)) 
	die("NO ID");

$log_file = $log_dir . $udid . ".txt";

if (!file_exists($log_file)) {
	$fh = fopen($log_file, 'w') or die("can't open file");
	fclose($fh);
}

$fh = fopen($log_file, 'a+') or die("can't open file");
$stringData = "--------------------------------------------------------------------------------\n";
$stringData .= date("d/m/y - H:i:s", time()) .  @$_REQUEST['event'] .  "\n";
$stringData .= "--------------------------------------------------------------------------------\n";

$stringData .= @urldecode($_REQUEST['data']) . "\n";
$stringData .= "\n";
fwrite($fh, $stringData);
fclose($fh);


?>
log written