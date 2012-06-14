<?php
/**
 * @version		$Id: demo-amazing.php 2012-06-10 vinaora $
 * @package		VINAORA NIVO SLIDER
 * @subpackage	mod_vt_nivo_slider
 * @copyright	Copyright (C) 2011-2012 VINAORA. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @website		http://vinaora.com
 * @twitter		http://twitter.com/vinaora
 * @facebook	http://facebook.com/vinaora
 * @google+		https://plus.google.com/111142324019789502653
 */

// no direct access
defined('_JEXEC') or die;
?>
<style type="text/css">
#vt_nivo_slider<?php echo $module_id; ?> .nivoSlider {
	overflow: visible;
	background-color:#ffffff;
	border-color:#ffffff;
	border-style:solid;
	border-width:0px;
}
#vt_nivo_slider<?php echo $module_id; ?> .nivoSlider {
	-moz-border-radius: 8px 8px 8px 8px;
	-webkit-border-radius: 8px 8px 8px 8px;
	border-radius: 8px 8px 8px 8px;
}
#vt_nivo_slider<?php echo $module_id; ?> .nivoSlider {
	-webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
	-moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
	box-shadow: 0px 1px 5px 0px #4a4a4a;
}
#vt_nivo_slider<?php echo $module_id; ?> .nivoSlider {
	width:auto; /* Make sure your images are the same size */
	height:auto; /* Make sure your images are the same size */
}
#vt_nivo_slider<?php echo $module_id; ?> .nivo-caption {
	position:absolute;
	background:#ffffcc;
	width:350px;
	height:auto;
	z-index:8;
}

#vt_nivo_slider<?php echo $module_id; ?> .nivo-heading,
#vt_nivo_slider<?php echo $module_id; ?> .nivo-heading a{
	font-size:20px !important;
	color:#333333 !important;
	line-height:25px !important;
}
#vt_nivo_slider<?php echo $module_id; ?> .nivo-description{
	line-height:17px !important;
	font-size:12px !important;
	color:#333333 !important;
}
</style>
<!-- BEGIN: Vinaora Nivo Slider >> http://vinaora.com/ -->
<div class="vt_nivo_slider<?php echo $moduleclass_sfx?>">
	<div class="slider-wrapper theme-amazing nivocontrol-bottom nivo-bullets05 nivo-arrows12 captionposition-topright captionrounded-all">
		<div class="ribbon"></div>
		<div id="vt_nivo_slider<?php echo $module_id; ?>" class="nivoSlider">
			<a href="http://vinaora.com/vinaora-slick-slideshow/" target="_blank"><img src="<?php echo $base_url; ?>/media/mod_vt_nivo_slider/images/demo-standard/toystory.jpg" alt="toystory" title="#nivocaption0" /></a>
			<a href="http://vinaora.com/vinaora-visitors-counter/" target="_blank"><img src="<?php echo $base_url; ?>/media/mod_vt_nivo_slider/images/demo-standard/up.jpg" alt="up" title="#nivocaption1" /></a>
			<a href="http://vinaora.com/vinaora-nivo-slider/" target="_blank"><img src="<?php echo $base_url; ?>/media/mod_vt_nivo_slider/images/demo-standard/walle.jpg" alt="walle" title="#nivocaption2" /></a>
			<a href="http://vinaora.com/vinaora-cu3er-3d-slideshow/" target="_blank"><img src="<?php echo $base_url; ?>/media/mod_vt_nivo_slider/images/demo-standard/nemo.jpg" alt="nemo" title="#nivocaption3" /></a>
		</div>
		<div id="nivocaption0" class="nivo-html-caption">
			<div class="nivo-heading">Vinaora Slick Slideshow</div>
			<div class="nivo-description"><a href="http://vinaora.com/vinaora-slick-slideshow/" target="_blank">Fashionable flash</a> + image slideshow with slick navigation and design, fully customizable...</div>
		</div>
		<div id="nivocaption1" class="nivo-html-caption">
			<div class="nivo-heading">Vinaora Visitors Counter</div>
			<div class="nivo-description">Famous and nice <a href="http://vinaora.com/vinaora-visitors-counter/" target="_blank">Joomla counter</a> module. <a href="http://extensions.joomla.org/extensions/popular/page2">Top 40 Joomla Popular Extensions</a> on JED.</div>
		</div>
		<div id="nivocaption2" class="nivo-html-caption">
			<div class="nivo-heading">Vinaora Nivo Slider</div>
			<div class="nivo-description">The world's most awesome <a href="http://vinaora.com/vinaora-nivo-slider/" target="_blank">Joomla slider</a>. It allows you to easily create an image slideshow.</div>
		</div>
		<div id="nivocaption3" class="nivo-html-caption">
			<div class="nivo-heading">Vinaora Cu3er 3D slide-show</div>
			<div class="nivo-description">Shows images in <a href="http://vinaora.com/vinaora-cu3er-3d-slideshow/" target="_blank">3D Flash Slide-show</a>. Create amazing 3D transition between slides.</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery.noConflict();
	jQuery(window).load(function() {
		jQuery('#vt_nivo_slider<?php echo $module_id; ?>').nivoSlider({
			effect: '<?php echo $effect; ?>', // Specify sets like: 'fold,fade,sliceDown'
			slices: <?php echo $slices; ?>, // For slice animations
			boxCols: <?php echo $boxCols; ?>, // For box animations
			boxRows: <?php echo $boxRows; ?>, // For box animations
			animSpeed: <?php echo $animSpeed; ?>, // Slide transition speed
			pauseTime: <?php echo $pauseTime; ?>, // How long each slide will show
			startSlide: <?php echo $startSlide; ?>, // Set starting Slide (0 index)
			directionNav: <?php echo $directionNav; ?>, // Next & Prev navigation
			directionNavHide: <?php echo $directionNavHide; ?>, // Only show on hover
			controlNav: <?php echo $controlNav; ?>, // 1,2,3... navigation
			controlNavThumbs: <?php echo $controlNavThumbs; ?>, // Use thumbnails for Control Nav
			pauseOnHover: <?php echo $pauseOnHover; ?>, // Stop animation while hovering
			manualAdvance: <?php echo $manualAdvance; ?>, // Force manual transitions
			prevText: '<?php echo $prevText; ?>', // Prev directionNav text
			nextText: '<?php echo $nextText; ?>', // Next directionNav text
			randomStart: <?php echo $randomStart; ?>, // Start on a random slide
			beforeChange: function(){}, // Triggers before a slide transition
			afterChange: function(){}, // Triggers after a slide transition
			slideshowEnd: function(){}, // Triggers after all slides have been shown
			lastSlide: function(){}, // Triggers when last slide is shown
			afterLoad: function(){} // Triggers when slider has loaded
		});
	});
</script>
<!-- END: Vinaora Nivo Slider >> http://vinaora.com/ -->