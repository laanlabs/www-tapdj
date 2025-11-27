<?

if (!empty($_REQUEST['twitter_id'])) {
	
	$sql = array (
		"twitter_screenName"   =>      $_REQUEST['twitter_screenName'],
		"twitter_id"           =>      $_REQUEST['twitter_id'],

	 );

	$nSQL = "INSERT INTO contest_entry_twitter SET " . DB::assoc_to_sql_str($sql) ;
	
	
}

if (!empty($_REQUEST['facebook_id'])) {
	$sql = array (
		"facebook_id"           =>      $_REQUEST['facebook_id'],
		"facebook_name"           =>      $_REQUEST['facebook_name'],
		"facebook_url"           =>      $_REQUEST['facebook_url']

	 );

	$nSQL = "INSERT INTO contest_entry_facebook SET " . DB::assoc_to_sql_str($sql) ;

}

if (!empty($nSQL)) {
	DB::query($nSQL , false, false);
	echo "true";
} else {
	echo "false";
}

?>