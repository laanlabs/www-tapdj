<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="primary" class="widget-area" role="complementary">
			
			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				
				<?php if ( 0 && !is_front_page() ) { ?>
					<style>
					div.menu {
						/* Guessing there's a better way to do this ? */
						margin-top:10px;
					}
					</style>
					
				<?php } ?>
				
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
			
			<ul class="xoxo">
			
			
			

				<!--no search for now -->
			<!--
			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>
			-->




			</ul>
		</div><!-- #primary .widget-area -->


