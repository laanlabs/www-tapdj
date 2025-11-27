<?

class TAPDJUser {


//NOTE : alot of this should be moved to stored procedure later for speed

	public function get_user_for_device_hash($hash) {
		
		$user = array ();
		
		$nSQL = "SELECT u.user_id, u.username FROM users u, user_device d WHERE u.user_id = d.user_id AND d.device_hash =  '" . $hash . "' LIMIT 1";
		
		$u = DB::query($nSQL);
		
		if (count($u) > 0 ) {
			$user['user_id'] = $u[0]['user_id'];
			$user['username'] = $u[0]['username'];
		} else {
			
			$username = self::get_unique_username();
			
			
			//echo "USERNAME: " . $username;
			
			$sql = array (
			      "username"   =>     $username
			 );               

			$nSQL = "INSERT INTO users SET " . DB::assoc_to_sql_str($sql);
			DB::query($nSQL , false);
			
			$user_id = DB::last_insert_id();
			
			$sql = array (
			      "user_id"   =>     $user_id,
				  "device_hash"   =>     $hash,
			 );               

			$nSQL = "INSERT INTO user_device SET " . DB::assoc_to_sql_str($sql);
			DB::query($nSQL , false);
			
			
					$user['user_id'] = $user_id;
					$user['username'] = $username;
			
		}
		
		

		
		
		return $user;
		
	}	


	public function get_unique_username() {
		

		
		$nSQL = "SELECT username_index_id, username_prefix, username_suffix_count FROM usernames_index ORDER BY RAND() LIMIT 1";
		$u = DB::query($nSQL);
		
		
		$username = $u[0]['username_prefix'] . $u[0]['username_suffix_count'];
		
		$nSQL = "UPDATE usernames_index SET username_suffix_count = username_suffix_count + 1 WHERE username_index_id = " . $u[0]['username_index_id'];
		DB::query($nSQL , false);
		

		
		return $username;
	} 



}

?>