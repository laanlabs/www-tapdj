<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->


<br clear="both"/>


	

</div><!-- #wrapper -->

<div id="footer" role="contentinfo">
	<div id="colophon">

<?php
/* A sidebar in the footer? Yep. You can can customize
 * your footer with four columns of widgets.
 */
get_sidebar( 'footer' );
?>
		<div id="footer-menu">
			
			<a href="http://labs.laan.com/products/" title="other apps" >Other Apps By Laan Labs</a>|
			<a href="http://labs.laan.com/" title="Visit Laan Labs" >Visit Laan Labs Website</a>|
			<a href="http://tap.dj/index" title="Tap DJ Blog" >Tap DJ Blog</a>|
			<a href="http://tap.dj/contact" title="Contact Us" >Contact Us</a>|
			<a href="http://tap.dj/press" title="Press Stuff" >Press</a>
		</div>
		
		<div id="site-info">
			Copyright 2010
			<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
			A Laan Consulting App
		</div>
		<!-- #site-info -->
		
		<div id="copyright-info">
			GyroScratch™ might be a registered trademark of Laan Consulting
		</div>
		
		



	</div><!-- #colophon -->
</div><!-- #footer -->

<!--
<script type="text/javascript">
    var GoSquared={};
    GoSquared.acct = "GSN-979330-U";
    (function(w){
        function gs(){
            w._gstc_lt=+(new Date); var d=document;
            var g = d.createElement("script"); g.type = "text/javascript"; g.async = true; g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
            var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(g, s);
        }
        w.addEventListener?w.addEventListener("load",gs,false):w.attachEvent("onload",gs);
    })(window);
</script>
-->

<?php if( !(is_page('4')||is_page('141')) ) { ?>
	
<script type="text/javascript" charset="utf-8">
  var is_ssl = ("https:" == document.location.protocol);
  var asset_host = is_ssl ? "https://s3.amazonaws.com/getsatisfaction.com/" : "http://s3.amazonaws.com/getsatisfaction.com/";
  document.write(unescape("%3Cscript src='" + asset_host + "javascripts/feedback-v2.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript" charset="utf-8">
  var feedback_widget_options = {};

  feedback_widget_options.display = "overlay";  
  feedback_widget_options.company = "tapdj";
  feedback_widget_options.placement = "left";
  feedback_widget_options.color = "#222";
  feedback_widget_options.style = "idea";
  var feedback_widget = new GSFN.feedback_widget(feedback_widget_options);
</script>
<?php } ?>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
