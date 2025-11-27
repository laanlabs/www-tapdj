<!--
<div style="position:relative; left:0px;top:-15px">
<a class="screenshot" href="javascript:showIPhoneScreen(1);"><img src='<?php echo get_template_directory_uri() ?>/images/screen/screen_default_sm.png' border='0' width='70' height='47'/><span>demo video</span></a>
<a class="screenshot" href="javascript:showIPhoneScreen(2);"><img src='<?php echo get_template_directory_uri() ?>/images/screen/screen_doodle_sm.png' border='0' width='70' height='47'/><span>doodle skin</span></a>
<a class="screenshot" href="javascript:showIPhoneScreen(3);"><img src='<?php echo get_template_directory_uri() ?>/images/screen/screen_sampler_sm.png' border='0' width='70' height='47'/><span>sampler</span></a>
<a class="screenshot" href="javascript:showIPhoneScreen(4);"><img src='<?php echo get_template_directory_uri() ?>/images/screen/screen_cuepoints_sm.png' border='0' width='70' height='47'/><span>cuepoints</span></a>
</div>
-->

<!--<div style="padding-bottom:16px; font-style:italic; color:#897d6d;">Videos coming soon, these videos are placeholders. Stay tuned! </div>-->

<!--
<div style="padding-bottom:4px; padding-top:2px; height: 227px; position:relative; left:-20px;">
<a href="/contest"><img src='<?php echo get_template_directory_uri() ?>/images/contest/home-page-banner.png' border='0'/></a>
</div>-->


<div style="padding-bottom:4px; padding-top:22px; height: 100px;">

	<div align="center" style="position:relative; margin-left:46px; float:left; width: 145px; height:104px; margin-right:172px;">	
	<!-- DONT do for iPad.. since the pop-up works OK on iPad -->
	<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') ) { ?>
		<div class="screenshot">
		<iframe src="http://player.vimeo.com/video/18984129?color=dd4499" width="112" height="74" frameborder="0" style="position:absolute; top:9px; left:9px;"></iframe>
		<span>Demo Video</span>
		</div>
	<? } else { ?>
		<a id="video-demo1" class="screenshot" href="http://vimeo.com/18984129">
			<div class="video-play-button"></div>
			<img src='<?php echo get_template_directory_uri() ?>/images/main-video-thumb.png' border='0' width='115' height='77'/>
			<span>Demo Video</span>
		</a>
	<? } ?>
	
	</div>

	<div align="center" style="position:relative; float:left; width: 145px; height:104px;">	
		<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') ) { ?>
			<div class="screenshot">
			<!--<iframe src="http://player.vimeo.com/video/17413893?color=dd4499" width="112" height="74" frameborder="0" style="position:absolute; top:9px; left:9px;"></iframe>-->
			<object width='112' height='74' style="position:absolute; top:9px; left:9px;"><param name='movie' value='http://www.youtube.com/v/eZIJJb-jDZo?hl=en&fs=1'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed style="position:absolute; top:9px; left:9px;" src='http://www.youtube.com/v/eZIJJb-jDZo?hl=en&fs=1&autoplay=1&hd=1&rel=0' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='112' height='74'></embed></object>
			<span>Live Demo</span>
			</div>
		<? } else { ?>
			<a id="video-demo2" class="screenshot" href="http://www.youtube.com/watch?v=eZIJJb-jDZo">
				<div class="video-play-button"></div>
				<img src='<?php echo get_template_directory_uri() ?>/images/main-video-thumb.png' border='0' width='115' height='77'/>
				<span>Live Demo</span>
			</a>
		<? } ?>
	</div>

</div>

<br clear="both"/>
<div style="position:relative; left:-10px; width:700px; background:#ffcc00;">
<div class="feature-bullet-item">
	<div class="feature-bullet-thumbnail"><img src='<?php echo get_template_directory_uri() ?>/images/list-icons/ipod-icon.png' border='0' width='44' height='44'/></div>
	<div class="feature-bullet-title-container">
		<div class="feature-bullet-title">iPod Access</div>
		<div class="feature-bullet-subtitle">One click integrated library</div>
	</div>
</div>

<div class="feature-bullet-item">
	<div class="feature-bullet-thumbnail"><img src='<?php echo get_template_directory_uri() ?>/images/list-icons/scratch-icon.png' border='0' width='44' height='44'/></div>
	<div class="feature-bullet-title-container">
		<div class="feature-bullet-title">Real Scratching</div>
		<div class="feature-bullet-subtitle">Responsive low-latency scratching</div>
	</div>
</div>

<div class="feature-bullet-item">
	<div class="feature-bullet-thumbnail"><img src='<?php echo get_template_directory_uri() ?>/images/list-icons/fx-icon.png' border='0' width='44' height='44'/></div>
	<div class="feature-bullet-title-container">
		<div class="feature-bullet-title">Effects + Equalizer</div>
		<div class="feature-bullet-subtitle">Make your mix sound great</div>
	</div>
</div>

<div class="feature-bullet-item">
	<div class="feature-bullet-thumbnail"><img src='<?php echo get_template_directory_uri() ?>/images/list-icons/cue-icon.png' border='0' width='44' height='44'/></div>
	<div class="feature-bullet-title-container">
		<div class="feature-bullet-title">Cue Points + Loops</div>
		<div class="feature-bullet-subtitle">3 Loopable Cue points per deck</div>
	</div>
</div>

<div class="feature-bullet-item">
	<div class="feature-bullet-thumbnail"><img src='<?php echo get_template_directory_uri() ?>/images/list-icons/recording-icon.png' border='0' width='44' height='44'/></div>
	<div class="feature-bullet-title-container">
		<div class="feature-bullet-title">Mix Recording</div>
		<div class="feature-bullet-subtitle">Save and transfer over USB</div>
	</div>
</div>

<div class="feature-bullet-item">
	<div class="feature-bullet-thumbnail"><img src='<?php echo get_template_directory_uri() ?>/images/list-icons/sampler-icon.png' border='0' width='44' height='44'/></div>
	<div class="feature-bullet-title-container">
		<div class="feature-bullet-title">Sampler + Sounds</div>
		<div class="feature-bullet-subtitle">Pre-loaded with hits and sound FX</div>
	</div>
</div>

<div class="feature-bullet-item">
	<div class="feature-bullet-thumbnail"><img src='<?php echo get_template_directory_uri() ?>/images/list-icons/gyro-icon.png' border='0' width='44' height='44'/></div>
	<div class="feature-bullet-title-container">
		<div class="feature-bullet-title">GyroScratch!</div>
		<div class="feature-bullet-subtitle">Use the gyroscope to scratch</div>
	</div>
</div>

<div class="feature-bullet-item">
	<div class="feature-bullet-thumbnail"><img src='<?php echo get_template_directory_uri() ?>/images/list-icons/share-icon.png' border='0' width='44' height='44'/></div>
	<div class="feature-bullet-title-container">
		<div class="feature-bullet-title">Music Discovery</div>
		<div class="feature-bullet-subtitle">Share and rate top tracks + mixes</div>
	</div>
</div>
</div>

<!-- OLD BULLETs still look OK -->
<!--
<span class="feature-bullet-point">Scratch and Mix your iPod Music</span>
<div class="feature-bullet-point-content">Your iPod library is only one click away, even use WiFi or USB to upload more tracks.</div>

<span class="feature-bullet-point">Equalizer and Effects</span>
<div class="feature-bullet-point-content">Make your mix sound great.</div>

<span class="feature-bullet-point">Record and Share</span>
<div class="feature-bullet-point-content">Record your mixes and transfer them to your desktop. Even share a link to friends.</div>

<span class="feature-bullet-point">Cue Points, Sampler, WAV Support</span>
<div class="feature-bullet-point-content">All these great features for only $1.99</div>
-->
<br clear="both"/>
<div style="margin-top:40px; margin-left:46px; width:300px;"><a href="/content/features" style="text-decoration:none; font-size:20px; font-style:italic; color:#897d6d; text-shadow: 0px 1px white; text-align:left;">See More Features »</a></div>


<div>
	
	<div style="padding-top:20px;padding-bottom:20px;">
	<img src="/wp-content/themes/tapdj/images/features/sep_bar.png" border="0" width="636" height="8"/>
	</div>
	
<div style="clear:both">

<div id="large-thumb-item">
	<div id="large-thumb-title">Share Mixes</div>
	<div id="large-thumb-image"><a href="/features"><img src="/wp-content/themes/tapdj/images/features/thumb_share.png" border="0" width="258" height="172"/></a></div>
</div>

<div id="large-thumb-item">
	<div id="large-thumb-title">Effects</div>
	<div id="large-thumb-image"><a href="/features"><img src="/wp-content/themes/tapdj/images/features/thumb_effects.png" border="0" width="258" height="172"/></a></div>
</div>

</div>


<div style="clear:both">

<div id="large-thumb-item">
	<div id="large-thumb-title">Sampler</div>
	<div id="large-thumb-image"><a href="/features"><img src="/wp-content/themes/tapdj/images/features/thumb_samples.png" border="0" width="258" height="172"/></a></div>
</div>

<div id="large-thumb-item">
	<div id="large-thumb-title">iPod Access</div>
	<div id="large-thumb-image"><a href="/features"><img src="/wp-content/themes/tapdj/images/features/thumb_explore.png" border="0" width="258" height="172"/></a></div>
</div>

</div>


	
</div>





