<?php

class clsMem extends Memcache {
        static private $m_objMem = NULL;

        static function getMem() {


                if (self::$m_objMem == NULL) {
                        self::$m_objMem = new Memcache;
                        // connect to the memcached on some
                        //host __MEMHOST running it om __MEMPORT
                        self::$m_objMem->connect("127.0.0.1", 11211)
                        or die ("The memcached server");
                }
                return self::$m_objMem;
        }
}

// SINGLETON
class DB {
	
	public static $mysqli_object = null;

	public static function mysqli() {
		if (self::$mysqli_object == null) {
			self::$mysqli_object = self::init_mysqli();
		}
		return self::$mysqli_object;
	}
	
	public static function init_mysqli() {
		global $dbhost, $dbuser, $dbpass, $db;
		$_mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
		
		//for procedural
		//$link = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
		
		
		if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
		}
	  return $_mysqli;		
	}

	public static function close() {
		if (self::$mysqli_object != null) {
			self::$mysqli_object->close();
		}
		
	}
	
	public static function nquery($sql){
		$mysqli = self::mysqli();
		
		return $mysqli->query($sql);	
		
	}
	
	
	public static function narray($results){
		
		
		return $results->fetch_array(MYSQLI_ASSOC) ;
	}
	
	public static function insert_id()
	{
		$mysqli = self::mysqli();
		return $mysqli->insert_id;
	}
	
	public static function query($query, $do_fetch = true, $errordisplay = true) {
		if (array_key_exists('debug', $GLOBALS) && $GLOBALS['debug']) {
			echo "<p>$query</p>";
		}
		
		
		//sql injection
        if (ereg("/((\%27)|(\'))union/ix", $query)) die("no no no....");
		
		$mysqli = self::mysqli();
		
		$result = $mysqli->query($query);
		
		if ($do_fetch && $result) {
			$rows = array();		
			while ($row = $result->fetch_assoc()) {
				array_push($rows, $row);
			}
			$result->close();
			return $rows;
		} else if (!$result) {
			if ($errordisplay)
				die("<pre>QUERY ERROR:\n".$query."\n------\n".$mysqli->error."</pre>");
		} else {
			return $result;
		}
	}
	
	public static function query_memcache($query, $do_fetch = true) {
                if (array_key_exists('debug', $GLOBALS) && $GLOBALS['debug']) {
                        echo "<p>$query</p>";
                }



        if ($do_fetch == true) {
        if ($objResultset = clsMem::getMem()->get(MD5($query) ) )  {
        //          // return the cached resultset


        //print_r($objResultset);
        //echo "c";

                    return $objResultset;
          }
        }



                //sql injection
                if (ereg("/((\%27)|(\'))union/ix", $query)) die("no no no....");



                $mysqli = @self::mysqli();

                $result = @$mysqli->query($query);

                if ($do_fetch && $result) {
                        $rows = array();
                        while ($row = $result->fetch_assoc()) {
                                array_push($rows, $row);
                        }

                        clsMem::getMem()->set(MD5($query), $rows, 0, 60000);

                        $result->close();



                        return $rows;


                } else if (!$result) {
                //      die("<pre>QUERY ERROR:\n".$query."\n------\n".$mysqli->error."</pre>");
                 echo " an error getting video or query... this page may not render correctly";
                } else {


                        return $result;
                }
        }
	
	
	public static function uuid() {
		$rows = self::query("SELECT UUID() AS u;");
		return $rows[0]['u'];
	}
	
	public static function escape($string) {

		return self::mysqli()->real_escape_string($string);
	}

	public static function assoc_to_sql_arr($assoc) {
		$sql_arr = array();
		foreach ($assoc as $key => $value) {
			array_push($sql_arr, "{$key} = '".self::escape($value)."'");
		}
		return $sql_arr;
	}
	
	
	public static function assoc_to_sql_str($assoc) {
            return implode(", ", self::assoc_to_sql_arr($assoc));
    }
	
	public static function field_defaults($table)
	{
		
		$field_arr = array();
		$sql = "SHOW COLUMNS FROM " . $table;
		$_fields = self::query($sql);

		foreach ($_fields as $r)
		{	

			switch ($r['Type'])
			{
			case 'datetime':
				${"_{$r['Field']}"} =date("Y-m-d G:i:s") ;
				break;
			default:
				${"_{$r['Field']}"} = $r['Default'] ;
				

			}
			$field_arr["_{$r['Field']}"] = ${"_{$r['Field']}"};
 			//array_push($field_arr, "_{$r['Field']} = '".${"_{$r['Field']}"}."'");
			
		}
		
		return $field_arr;
		
	}

	public static function last_insert_id() {
		return self::mysqli()->insert_id; // http://us2.php.net/manual/en/mysqli.insert-id.php#84625 TODO: switch to procedural style
		
		//mysqli_insert_id
		//mysql_insert_id();
		
	}
		
	
	public static	function close_and_exit() {
		self::close();
		exit;
	}


    public function getCountryCode($ip = '') 
    { 
        if (!$ip) 
            $ip = $_SERVER['REMOTE_ADDR']; 

        $sql = "SELECT * FROM laanlabs.netblocks WHERE " 
                . "INET_ATON('".trim($ip)."') BETWEEN BlockStart and " 
                . "BlockEnd LIMIT 1;";

			$result = self::query($sql); 


        if (count($result) < 1) {
            return false; 
        } else { 
			return $result[0]['Prefix1'];
		}
    }


}

// $rows = DB::query("SELECT * FROM videos WHERE id = '".DB::escape($unclean)."';");
// print_r($rows);

?>