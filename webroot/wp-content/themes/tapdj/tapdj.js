jQuery(document).ready(function() {
	

	$("#video-demo1").click(function() {

		$.fancybox({
			'padding'		: 10,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'width'			: 600,
			'height'		: 400,
			'content'		: "<iframe src='http://player.vimeo.com/video/18984129?color=dd4499&autoplay=true' width='600' height='400' frameborder='0'></iframe>",
			
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
			'content'		: "<object width='600' height='400'><param name='movie' value='http://www.youtube.com/v/eZIJJb-jDZo?hl=en&fs=1'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/eZIJJb-jDZo?hl=en&fs=1&autoplay=1&hd=1&rel=0' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='600' height='400'></embed></object>",
			
		});
		
		return false;
	});
	
});

function showIPhoneScreen(item) {

	var htmlContent;
	
	switch(item)
	{
	case 1:
	  htmlContent = "<iframe src='http://player.vimeo.com/video/17413893?color=dd4499' width='100%' height='100%' frameborder='0'></iframe>";
	  break;
	case 2:
	  htmlContent = "<img src='/wp-content/themes/tapdj/images/screen/screen_doodle.png' border='0' width='390' height='260'/>";
	  break;
	case 3:
	  htmlContent = "<img src='/wp-content/themes/tapdj/images/screen/screen_sampler.png' border='0' width='390' height='260'/>";
	  break;
	case 4:
	  htmlContent = "<img src='/wp-content/themes/tapdj/images/screen/screen_cuepoints.png' border='0' width='390' height='260'/>";
	  break;												
	default:
	  htmlContent = "<img src='/wp-content/themes/tapdj/images/screen/screen_default.png' border='0' width='390' height='260'/>";
	}


	$("#iPhoneScreen").html(htmlContent);



}


