<?php
/**
 * Template Name: Contact Form
 *
 * A custom page template without sidebar.
 * Selectable from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty Ten
 * @since 3.0.0
 */


require_once('recaptchalib.php');

// Get a key from http://recaptcha.net/api/getkey
$publickey = "6Le6Qr8SAAAAAHKTkcEZhLPLRf48JuTZ4y8mySnn";
$privatekey = "6Le6Qr8SAAAAAGm8Xi3h3yZEt3_aw4wKozDdKXtp";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;


$send_email = isset($_POST['send_email']) ? $_POST['send_email'] : '0';


	# was there a reCAPTCHA response?
	if ($_POST["recaptcha_response_field"] && $send_email == 1) {
	        $resp = recaptcha_check_answer ($privatekey,
	                                        $_SERVER["REMOTE_ADDR"],
	                                        $_POST["recaptcha_challenge_field"],
	                                        $_POST["recaptcha_response_field"]);


	
										

		$vMSG = "";

		if ($resp->is_valid && (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['input_email'] )) ) {


			$mBODY = "<html><body>";
			$mBODY .= "" . $_POST['input_message'] . "<br/><br/>\r\n\r\n";
			$mBODY .= " " . $_POST['input_from'] . "<br/>\r\n";
			$mBODY .= " " . $_POST['input_email'] . "<br/><br/>\r\n";	
	
			$mBODY .= "</body></html>";

	
			/* EMAIL HEADERS */
			$sender = "labs@laan.com";
			$headers = "From: " . $sender . "<" . $sender . ">\n";
			$headers .= "Reply-To: " . $_POST['input_from'] ." <" . $_POST['input_email'] . ">\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: text/html\n";
						  
			mail("labs@laan.com", "" . $_POST['input_reason'],      $mBODY,      $headers);		
	
			$vMSG = "your email has been sent ...";

		} else {
		

	                $vMSG = "Your mail could not be sent:  " . $error = $resp->error;
		
		}		
	
	
	
	} 
	
	
	
	


?>
<?php get_header(); ?>

		<div id="container" class="onecolumn">
			<div id="content">

<?php the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-<?php the_ID(); ?> -->
				
				<div style="">
				<script type="text/javascript" charset="utf-8">
				  var is_ssl = ("https:" == document.location.protocol);
				  var asset_host = is_ssl ? "https://s3.amazonaws.com/getsatisfaction.com/" : "http://s3.amazonaws.com/getsatisfaction.com/";
				  document.write(unescape("%3Cscript src='" + asset_host + "javascripts/feedback-v2.js' type='text/javascript'%3E%3C/script%3E"));
				</script>

				<script type="text/javascript" charset="utf-8">
				  var feedback_widget_options = {};

				  feedback_widget_options.display = "inline";  
				  feedback_widget_options.company = "tapdj";


				  feedback_widget_options.style = "idea";
				  var feedback_widget = new GSFN.feedback_widget(feedback_widget_options);
				</script>
				</div>

				<!--
					<font color="red"><?= $vMSG ?></font>

					<form method="post" action="" name="form_email">

			        <table cellspacing="2" cellpadding="4" border="0">

						<input type="hidden" name="send_email" value="1"/>
							<tr>
								<td align="right">your name:</td>
								<td><input name="input_from" size="45" class="boxes"></td>
							</tr>
							<tr>
								<td align="right">your email:</td>
								<td><input name="input_email" size="45" class="boxes"></td>
							</tr>
							<tr>
								<td align="right" nowrap>your message:</td>
								<td><textarea name="input_message" cols="35" rows="6"></textarea></td>
							</tr>
							<tr>
								<td align="right" nowrap>this message is: </td>
								<td>
									<select name="input_reason">
										<option value="general site message">say hello</option>
										<option value="product feedback">product feedback</option>
										<option value="other site message">other</option>
									</select>

								</td>
							</tr>
							<tr>
								<td align="right" nowrap>human?</td>
								<td>
									<?php
										echo recaptcha_get_html($publickey, $error);
									?>						

								</td>	
							<tr>
								<td></td>
								<td> <input type="submit" value="Send Us Email" />
									</td>
							</tr>

					</table>
				</p>
			    	</form>
				-->
				
				<?php comments_template( '', true ); ?>

			</div><!-- #content -->
		</div><!-- #container -->

		<?php get_sidebar(); ?>


<?php get_footer(); ?>
