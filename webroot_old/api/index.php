<?

//APP CONFIG
require_once $_SERVER["DOCUMENT_ROOT"] . "/../app.php";

//SET API PATH
$uri = isset($_SERVER['HTTP_X_REWRITE_URL']) ? $_SERVER['HTTP_X_REWRITE_URL']  : $_SERVER['REQUEST_URI']  ;
$request_path        = rtrim($uri, "/");
$request_path        = preg_replace("/\?.*$/", '', $request_path); // strip off query string
$request_path =  str_replace("/api", "",$request_path);
$_route_path = API_ROOT . $request_path . ".php";

//CATCH BAD CALLS
if( !file_exists($_route_path) )  die("bad api call");

require $_route_path; 




