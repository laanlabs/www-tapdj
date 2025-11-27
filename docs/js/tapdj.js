jQuery(document).ready(function() {
	
	$("#video-demo1").click(function() {
		$.fancybox({
			'padding'		: 10,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'width'			: 600,
			'height'		: 400,
			'content'		: "<iframe src='https://player.vimeo.com/video/18984129?color=dd4499&autoplay=true' width='600' height='400' frameborder='0' allow='autoplay; fullscreen' allowfullscreen></iframe>",
		});
		return false;
	});
	
	$("#video-demo2").click(function() {
		$.fancybox({
			'padding'		: 10,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'width'			: 600,
			'height'		: 400,
			'content'		: "<iframe width='600' height='400' src='https://www.youtube.com/embed/eZIJJb-jDZo?autoplay=1&hd=1&rel=0' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>",
		});
		return false;
	});
	
});

function showIPhoneScreen(item) {
	var htmlContent;
	
	switch(item) {
		case 1:
			htmlContent = "<iframe src='https://player.vimeo.com/video/17413893?color=dd4499' width='100%' height='100%' frameborder='0' allow='autoplay; fullscreen' allowfullscreen></iframe>";
			break;
		case 2:
			htmlContent = "<img src='images/screen/screen_doodle.png' border='0' width='390' height='260'/>";
			break;
		case 3:
			htmlContent = "<img src='images/screen/screen_sampler.png' border='0' width='390' height='260'/>";
			break;
		case 4:
			htmlContent = "<img src='images/screen/screen_cuepoints.png' border='0' width='390' height='260'/>";
			break;												
		default:
			htmlContent = "<img src='images/screen/screen_default.png' border='0' width='390' height='260'/>";
	}
	
	$("#iPhoneScreen").html(htmlContent);
}

