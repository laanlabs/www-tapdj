var lastId = 0;
var audioPlayerExists = false

var playingTracker = [];

function loadAndPlay(id, url) {

	$("#playButtonImage"+id).attr('src','/wp-content/themes/tapdj/images/tiny//button_play.png');	
	$("#playButtonImage"+lastId).attr('src','/wp-content/themes/tapdj/images/tiny/button_play.png');	
		
	
	if (lastId == id) {
		if (playingTracker[id] == true ) {
				document.audioPlayerQT.Stop();
				document.audioPlayerQT.Rewind(); 
				playingTracker[id] = false;
			} else {
				document.audioPlayerQT.Play();
				playingTracker[id] = true;
			}

		
		
	} else {
		
		document.audioPlayerQT.SetURL(url)
		document.audioPlayerQT.Play();
		$("#playButtonImage"+id).attr('src','/wp-content/themes/tapdj/images/tiny/button_stop.png');	
		playingTracker[id] = true;
			
	}
	
	
	lastId = id;
}




function loadAndPlayHTML5(id, url) {

	$("#playButtonImage1").attr('src','/wp-content/themes/tapdj/images/tiny/tiny/button_play.png');	
	$("#playButtonImage2").attr('src','/wp-content/themes/tapdj/images/tiny/tiny/button_play.png');	
		
	var audioElement = document.getElementById('audioPlayer');

	if (lastId == id) {
		if (playingTracker[id] == true ) {
				audioElement.pause(); 
				playingTracker[id] = false;
			} else {
				audioElement.play();
				playingTracker[id] = true;
			}

		
		
	} else {
		
		audioElement.setAttribute('src', url);
		audioElement.load();
		audioElement.play();
		$("#playButtonImage"+id).attr('src','/wp-content/themes/tapdj/images/tiny/tiny/button_stop.png');	
		playingTracker[id] = true;
			
	}
	
	
	lastId = id;
}