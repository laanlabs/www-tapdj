<?php
/**
 * Template Name: Chart page
 *
 * A custom page template without sidebar.
 * Selectable from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty Ten
 * @since 3.0.0
 */




$country_code = DB::getCountryCode();



	
	


?>
<?php get_header(); ?>

<style>

#mixRow {
	width:600px; 
	height:120px;
	
}

#mixHeader {
	position:relative;
	border-bottom: 1px solid #222;
	margin-bottom:5px;
}

#mixHeader a {
text-decoration:none;
color:#2f3238;
}


#trackRow {
	
	float:left; 
	width:500px; 
	position:relative;
	padding-bottom:10px;
}

#mixTrack {
	float:left; 
	width:295px; 
	position:relative;
}

#artWork img{
	width:72px;
	border: 1px solid #222;
}

#buttonPreview {
	position:absolute;
	left:14px;
	top:15px;
	filter: alpha(opacity=40);
	opacity: .4; 
	
}

#trackCredits {
	position:relative;
	left:8px;
	
}



#trackName {
	line-height:24px;
	color:#2f3238;
	font-weight:bold;
	font-size:18px;
}

#artistName {
	line-height:15px;
	font-size:12px;
	
}

#collectionName {
	line-height:12px;
	font-size:10px;
	
}

#itunesLink {
	padding-top: 2px;
}

#chartTitles {
	width:600px;
	margin-bottom:30px;
	border-bottom:5px solid #ccc;
	
}

#chartTitles a {
	font-size: 22px;
	color:#000;
	text-decoration:none;
	padding:4px;
}

#chartTitles a.selected {
	font-size: 28px;
	font-weight:bold;
	
}

</style>



		<div id="container" class="onecolumn">
			<div id="content">

			<?php the_post(); ?>
			<script language="javascript" type="text/javascript">
			QT_WriteOBJECT('http://a1.phobos.apple.com/us/r1000/041/Music/66/27/2f/mzm.xzgleriu.aac.p.m4a', '1','1', '', 'obj#id', 'audioPlayerQT', 'emb#id', 'qtmovie_embed2', 'emb#name', 'audioPlayerQT', 'postdomevents', 'true', 'enablejavascript', 'true','autoplay', 'false');
			</script>


<? 
$page_id =  $id; 

?> 
<div id="chartTitles">
	<a class="<?= ($page_id == 31 ) ? "selected": "" ?>" href="/charts/featured-tracks/">Featured Tracks</a>
	<a class="<?= ($page_id == 33) ? "selected": "" ?>" href="/charts/popular-tracks/">Popular tracks</a>
	<a class="<?= ($page_id == 29) ? "selected": "" ?>" href="/charts/popular-mixes/">Popular Mixes</a>
</div>
	
<?

switch ($page_id) {
    case 31:
		$track_type = "featured";
        include('chart/tracks_list.php');
        break;
    case 33:
		$track_type = "popular";
    	include('chart/tracks_list.php');
        break;
    case 29:
        include('chart/mixes_popular.php');
        break;
	default:
		include('chart/chart_main.php');
		break;
	

}


?>


			</div><!-- #content -->
		</div><!-- #container -->

		<?php get_sidebar(); ?>



<?php get_footer(); ?>


