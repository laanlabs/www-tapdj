<?

class TAPDJMix {


	public function makeAffiliateLink($iTunesLink,  $locale = NULL) {
				
		switch ($locale) {
		    case "US":
				$affiliateLink = self::makeLinkShare($iTunesLink);
		        break;
		    case "UK":
				$affiliateLink = self::makeLinkShare($iTunesLink);
		        break;
		    case "DE":
		        $affiliateLink = self::makeTradeDoublerLink($iTunesLink, $locale);
		        break;
			default:
				$affiliateLink = self::makeLinkShare($iTunesLink);
		}
	
		return $affiliateLink;
	
	}

	function makeTradeDoublerLink($iTunesLink, $locale ) {
		
		//http://www.apple.com/itunes/affiliates/resources/documentation/linking-to-the-itunes-music-store.html#AddingAffiliateTracking
		
		$programLookup['AT'] = 24380;
		$programLookup['BE'] =	24379;
		$programLookup['CH'] =	24372;
		$programLookup['DE'] =	23761;
		$programLookup['DK'] =	24375;
		$programLookup['ES'] =	24364;
		$programLookup['FI'] =	24366;
		$programLookup['FR'] =	23753;
		$programLookup['GB'] =	23708;
		$programLookup['IE'] =	24367;
		$programLookup['IT'] =	24373;
		$programLookup['NL'] =	24371;
		$programLookup['NO'] =	24369;
		$programLookup['SE'] =	23762;
		
		
		$program_id = $programLookup[$locale];
		$site_id = "1895269";
		
		$baseURL = "http://clk.tradedoubler.com/click?p=$program_id&a=$site_id&url=";
		
		$pos = strpos($iTunesLink,"?");
		if($pos === false) {
			$iTunesLink = $iTunesLink . "?";
		}
		$iTunesLink = $iTunesLink . "&partnerId=2003";
		$affiliateLink = $baseURL . urlencode($iTunesLink);
		
		return $affiliateLink;	
		
	}


	function makeLinkShare($iTunesLink) {
	
	
			$baseURL = "http://click.linksynergy.com/fs-bin/click?id=cavRWSU5H/Y&subid=&offerid=146261.1&type=10&tmpid=3909&RD_PARM1=";

			$pos = strpos($iTunesLink,"?");
			if($pos === false) {
				$iTunesLink = $iTunesLink . "?";
			}
			$iTunesLink = $iTunesLink . "&partnerId=30";

			$affiliateLink = $baseURL . urlencode($iTunesLink);

			return $affiliateLink;	
		
		
	}



	public function verifyRequest() {
		

		
		 $TAPDJ_API_KEY  = "9873243287888";
		 $TAPDJ_API_SECRETE  = "df98asdjfe98ekldsf9";
		
		$hashString =   md5($_POST['api_key'] . $TAPDJ_API_SECRETE);
		
		//this is the simple one
		if ($_POST['sig'] != $hashString ) die("invalid sig");
		
		//here is real one
		/*
		$sig = $_POST['sig'];
		unset ($_POST['sig']);
		krsort($_POST);
		$sortedString =  http_build_query($_POST, '', '=') . $TAPDJ_API_SECRETE;
		
		echo $sortedString;
		*/
		
		
		//print_r( $_POST );
		
		//album_name[0]=album_name[1]=api_key=9873243287888artist_name[0]=The Decemberistsartist_name[1]=The Nationaldeck_id[0]=1deck_id[1]=2track_data[0]=track_data[1]=track_title[0]=The Sporting Lifetrack_title[1]=Abeluser_hash=B1143169-1BC6-5863-BCB7-8DDE52B1BFE9df98asdjfe98ekldsf9
		
		    //die();
		
	}



	public function get_latest_tracks($limit) {
		
		$nSQL = "SELECT t.*, count(m.track_id) as count  
		FROM track_mix m LEFT OUTER JOIN tracks t ON t.track_id = m.track_id 
		WHERE t.track_id IS NOT NULL 
		GROUP BY  t.track_id  ORDER BY date_added DESC LIMIT $limit ";
		
		$tracks = DB::query($nSQL);

		return $tracks;
		
	}


	public function get_popular_tracks($limit) {
		
		$nSQL = "SELECT t.*, count(m.track_id) as count  
		FROM track_mix m LEFT OUTER JOIN tracks t ON t.track_id = m.track_id 
		WHERE t.track_id IS NOT NULL 
		AND date_created >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
		GROUP BY  t.track_id  ORDER BY count DESC LIMIT $limit ";
		
		$tracks = DB::query_memcache($nSQL);

		return $tracks;
	}


	public function get_featured_tracks($limit) {
		
		$nSQL = "SELECT t.*, count(m.track_id) as count  
		FROM track_mix m LEFT OUTER JOIN tracks t ON t.track_id = m.track_id 
		WHERE t.track_id IS NOT NULL 
		GROUP BY  t.track_id  ORDER BY rand()
		LIMIT $limit ";
	/*
		$nSQL = "SELECT t.*, count(m.track_id) as count  
                FROM track_mix m LEFT OUTER JOIN tracks t ON t.track_id = m.track_id 
                WHERE t.track_id IS NOT NULL AND m.date_added >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
                GROUP BY  t.track_id  ORDER BY rand()
                LIMIT $limit ";	
	*/	
		$tracks = DB::query($nSQL);
		
		
		return $tracks;
		
	}


	public function get_mix($mix_id) {
		
		$nSQL = "SELECT mix.*, m.deck_id, m.dont_share, t.*, u.username FROM mixs mix LEFT OUTER JOIN users u ON mix.user_id = u.user_id, 
		track_mix m
		LEFT OUTER JOIN tracks t ON t.track_id = m.track_id
		WHERE m.mix_id = mix.mix_id
		AND m.mix_id = " . DB::escape($mix_id) ;


		return DB::query($nSQL);
		
		
	}


	public function get_popular_mixes($limit) {
		
		//die("back shortly");	
		
		//yeah this query is a little insaine....
		$nSQL = "SELECT u.username, mix.*, 
		t1.track_id AS t1_track_id, t1.track_name AS t1_track_name, t1.artist_name AS t1_artist_name, 
		t1.collection_name AS t1_collection_name, t1.ext_itunes_id AS t1_itunes_id, t1.ext_itunes_audio_preview_url AS t1_preview_url,
		t1.ext_itunes_artwork_url AS t1_artwork_url, t1.ext_itunes_track_url AS t1_link_url,


		t2.track_id AS t2_track_id, t2.track_name AS t2_track_name, t2.artist_name AS t2_artist_name, 
		t2.collection_name AS t2_collection_name, t2.ext_itunes_id AS t2_itunes_id, t2.ext_itunes_audio_preview_url AS t2_preview_url,
		t2.ext_itunes_artwork_url AS t2_artwork_url, t2.ext_itunes_track_url AS t2_link_url,

		m1.deck_id AS t1_deck_id, 
		m2.deck_id AS t2_deck_id
		FROM mixs mix  LEFT OUTER JOIN users u ON mix.user_id = u.user_id
		INNER JOIN track_mix m1 ON mix.mix_id = m1.mix_id AND m1.deck_id = 0 AND m1.track_id > 0 AND m1.dont_share = 0
		INNER JOIN tracks t1 ON t1.track_id = m1.track_id 

		INNER JOIN track_mix m2 ON mix.mix_id = m2.mix_id AND m2.deck_id = 1 AND m2.track_id > 0 AND m2.dont_share = 0
		INNER JOIN tracks t2 ON t2.track_id = m2.track_id 
		ORDER BY mix.vote_plus DESC, mix.date_created DESC
		LIMIT $limit;
		-- WHERE mix.mix_id = 460";
		
		$nSQL = "SELECT  min(mix.mix_id) AS mix_id, mix.mix_title, mix.date_created, mix.user_id,  u.username, 
		count(mix.mix_id)-1 AS others, sum(mix.vote_plus) as vote_plus, sum(mix.vote_minus) as vote_minus, count(mix.mix_id)+sum(mix.vote_plus) as scale, 
		t1.track_id AS t1_track_id, t1.track_name AS t1_track_name, t1.artist_name AS t1_artist_name, 
		t1.collection_name AS t1_collection_name, t1.ext_itunes_id AS t1_itunes_id, t1.ext_itunes_audio_preview_url AS t1_preview_url,
		t1.ext_itunes_artwork_url AS t1_artwork_url, t1.ext_itunes_track_url AS t1_link_url,


		t2.track_id AS t2_track_id, t2.track_name AS t2_track_name, t2.artist_name AS t2_artist_name, 
		t2.collection_name AS t2_collection_name, t2.ext_itunes_id AS t2_itunes_id, t2.ext_itunes_audio_preview_url AS t2_preview_url,
		t2.ext_itunes_artwork_url AS t2_artwork_url, t2.ext_itunes_track_url AS t2_link_url,

		m1.deck_id AS t1_deck_id, 
		m2.deck_id AS t2_deck_id


				FROM mixs mix LEFT OUTER JOIN users u ON mix.user_id = u.user_id
				INNER JOIN track_mix m1 ON mix.mix_id = m1.mix_id AND m1.deck_id = 0 AND m1.track_id > 0 AND m1.dont_share = 0
				INNER JOIN tracks t1 ON t1.track_id = m1.track_id 

				INNER JOIN track_mix m2 ON mix.mix_id = m2.mix_id AND m2.deck_id = 1 AND m2.track_id > 0 AND m2.dont_share = 0
				INNER JOIN tracks t2 ON t2.track_id = m2.track_id 

		GROUP BY m1.deck_id, m1.track_id, m2.deck_id, m2.track_id
		ORDER BY scale DESC, mix.date_created DESC
		LIMIT $limit;";
		
		//WHERE mix.date_created >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
		
		
		$nSQL = "SELECT * FROM  mixs_popular 
		WHERE t1_track_id is not null
		AND t2_track_id is not null
		LIMIT 0 , 30";
		
		
		$mixs = DB::query_memcache($nSQL);
		
		
		return $mixs;
		
		
	}
	
	

public function refresh_popular_mixes() {
	
$nSQL = "DELETE FROM mixs_popular;";
$mixs = DB::query($nSQL, false);



$nSQL = "REPLACE INTO mixs_popular (mix_id,mix_title,date_created,user_id, username, others,vote_plus,vote_minus,scale)   
SELECT   
min(mix.mix_id) AS mix_id, mix.mix_title, mix.date_created, mix.user_id, u.username,
		count(mix.mix_id)-1 AS others, sum(mix.vote_plus) as vote_plus, sum(mix.vote_minus) as vote_minus, count(mix.mix_id)+sum(mix.vote_plus) - sum(mix.vote_minus) as scale 
FROM mixs mix 
LEFT OUTER JOIN users u ON mix.user_id = u.user_id
WHERE mix.date_created >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
GROUP BY mix.mix_id
ORDER BY scale DESC, mix.date_created DESC
LIMIT 80;";
$mixs = DB::query($nSQL, false);


$nSQL = "UPDATE mixs_popular mix LEFT JOIN  track_mix m1 ON mix.mix_id = m1.mix_id AND m1.deck_id = 0 AND m1.track_id > 0 AND m1.dont_share = 0
SET 
t1_track_id = m1.track_id,
t1_deck_id = 0;";
$mixs = DB::query($nSQL, false);


$nSQL = "UPDATE mixs_popular mix LEFT JOIN  tracks t ON mix.t1_track_id = t.track_id 
SET 
t1_track_name = t.track_name,
t1_artist_name = t.artist_name,
t1_collection_name = t.collection_name,
t1_itunes_id = t.ext_itunes_id,
t1_preview_url = t.ext_itunes_audio_preview_url,
t1_artwork_url = t.ext_itunes_artwork_url,
t1_link_url = t.ext_itunes_track_url;";
$mixs = DB::query($nSQL, false);


$nSQL = "UPDATE mixs_popular mix LEFT JOIN  track_mix m1 ON mix.mix_id = m1.mix_id AND m1.deck_id = 1 AND m1.track_id > 0 AND m1.dont_share = 0
SET 
t2_track_id = m1.track_id,
t2_deck_id = 1;";
$mixs = DB::query($nSQL, false);


$nSQL = "UPDATE mixs_popular mix LEFT JOIN  tracks t ON mix.t2_track_id = t.track_id 
SET 
t2_track_name = t.track_name,
t2_artist_name = t.artist_name,
t2_collection_name = t.collection_name,
t2_itunes_id = t.ext_itunes_id,
t2_preview_url = t.ext_itunes_audio_preview_url,
t2_artwork_url = t.ext_itunes_artwork_url,
t2_link_url = t.ext_itunes_track_url;";
$mixs = DB::query($nSQL, false);





}

}

?>
