<?

            

$nSQL = "UPDATE users SET username = '" . $_REQUEST['username'] . "' WHERE user_id =  " . $_REQUEST['user_id'] ;
DB::query($nSQL , false);



?>