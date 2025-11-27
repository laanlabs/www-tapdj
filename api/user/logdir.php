<?
if ($handle = opendir($log_dir)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
	
			$filename = str_replace(".txt", "", $file);
	
	
            echo "<a href='/api/user/logread?UID=$filename'>$filename</a><br/>";
        }
    }
    closedir($handle);
}
?>