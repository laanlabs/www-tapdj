<?php

//tiny handler




$base_img = "/wp-content/themes/tapdj/images";

$country_code = DB::getCountryCode();

//CREATE A TITLE
$mix_title = "";
$rowcount = 0;
foreach ($m as $r) {	
	$rowcount++;	
	if ($rowcount > 1) $mix_title .= " &amp ";
	$mix_title .= preview_text($r['track_name'],30);
}


if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) {
 	include("./tiny_template/iphone.php");
} else {
	include("./tiny_template/default.php");
}
//print_r($mixs);
?>
