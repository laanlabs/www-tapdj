<?
define("APP_ENV", "production");
define("APP_ROOT", $_SERVER["DOCUMENT_ROOT"]."/../");
define("BASE_URL", "http://tap.dj");	

define("APP_DOMAIN", $_SERVER['HTTP_HOST']);
define("APP_NAME", 'timex');

/** DB VARS **/
$dbhost = "127.0.0.1";
$dbuser = "usr_djdb";
$dbpass = "usr_djdb";
$db = "dbdj";


$GLOBALS['messages'] = array();

define("LIB", APP_ROOT."lib");
require_once LIB."/utils.php";
require_once LIB."/db.php";
require_once LIB."/TinyHelper.php";
require_once LIB . "/TAPDJMix.php";
include LIB . "/TAPDJUser.php";


define("API_ROOT", APP_ROOT."api");

$log_dir = APP_ROOT."logs/devices/";


// exit_and_close_db();


?>