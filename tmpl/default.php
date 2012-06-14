<?php
/**
 * @version		$Id: default.php 2012-06-10 vinaora $
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
<?php if($theme=="amazing"){ ?>
<style type="text/css">
#vtnivo<?php echo $module_id; ?> {
	overflow: visible;
	background-color:<?php echo $slide_bgcolor; ?>;
	border-color:<?php echo $slide_bdcolor; ?>;
	border-style:solid;
	border-width:<?php echo $slide_bdwidth; ?>;
}
<?php if($slide_bdrounded){ ?>
#vtnivo<?php echo $module_id; ?> {
	-moz-border-radius: 8px 8px 8px 8px;
	-webkit-border-radius: 8px 8px 8px 8px;
	border-radius: 8px 8px 8px 8px;
}
<?php } ?>
<?php if($slide_bdshadow){ ?>
#vtnivo<?php echo $module_id; ?> {
	-webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
	-moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
	box-shadow: 0px 1px 5px 0px #4a4a4a;
}
<?php } ?>
#vtnivo<?php echo $module_id;?> #vt_nivo_slider<?php echo $module_id;?> {
	width:<?php echo $slide_width;?>; /* Make sure your images are the same size */
	height:<?php echo $slide_height;?>; /* Make sure your images are the same size */
<?php if($controlNav=="true" && $controlPosition=="bottom") { ?>
	margin-bottom:0;
<?php } ?>
<?php if($directionNav=="true" && $arrowStyle=="04") { ?>
	margin-left:20px;
	margin-right:20px;
<?php } ?>
<?php if($directionNav=="true" && $arrowStyle=="10") { ?>
	margin-left:15px;
	margin-right:15px;
<?php } ?>
}
#vtnivo<?php echo $module_id;?> .nivo-caption {
	position:absolute;
	background:<?php echo $captionBackground;?>;
	width:<?php echo $captionWidth; ?>;
<?php if($captionHeight=="full") { ?>
	height:100%;
<?php }else{ ?>
	height:<?php echo $captionHeight; ?>;
<?php } ?>
	z-index:8;
<?php if( $captionMarginVertical){ ?>
<?php if( ($captionPosition=="topleft") || ($captionPosition=="topright")){ ?>
	top:<?php echo $captionMarginVertical; ?>;
<?php }else { ?>
	bottom:<?php echo $captionMarginVertical; ?>;
<?php } ?>
<?php } ?>
<?php if( $captionMarginHorizontal){ ?>
<?php if( ($captionPosition=="topleft") || ($captionPosition=="bottomleft")){ ?>
	left:<?php echo $captionMarginHorizontal; ?>;
<?php }else { ?>
	right:<?php echo $captionMarginHorizontal; ?>;
<?php } ?>
<?php } ?>
}

#vtnivo<?php echo $module_id;?> .nivo-heading,
#vtnivo<?php echo $module_id;?> .nivo-heading a{
<?php if(strlen($titleFontStyle)) { ?>
	font-family: <?php echo $titleFontStyle;?> !important;
<?php } ?>
	font-size:<?php echo $titleFontSize;?>px !important;
	color:<?php echo $titleColor;?> !important;
	line-height:<?php echo $titleFontSize+5;?>px !important;
}
#vtnivo<?php echo $module_id;?> .nivo-description{
	line-height:<?php echo $descFontSize+5;?>px !important;
	font-size:<?php echo $descFontSize;?>px !important;
	color:<?php echo $descColor;?> !important;
<?php if(strlen($descFontStyle)) { ?>
	font-family: <?php echo $descFontStyle;?> !important;
<?php } ?>
}
</style>
<?php }?>
<!-- BEGIN: Vinaora Nivo Slider >> http://vinaora.com/ -->
<div class="vt_nivo_slider<?php echo $moduleclass_sfx?>">
	<div id="vtnivo<?php echo $module_id; ?>" class="slider-wrapper theme-<?php echo $theme; ?> theme-<?php echo $theme.$module_id; ?> nivocontrol-<?php echo $controlPosition; ?> nivo-bullets<?php echo $controlStyle; ?> nivo-arrows<?php echo $arrowStyle; ?> captionposition-<?php echo $captionPosition; ?> captionrounded-<?php echo $captionRounded; ?>">
		<div class="ribbon"></div>
		<div id="vt_nivo_slider<?php echo $module_id; ?>" class="nivoSlider">
			<?php echo $images; ?>
		</div>
		<?php echo $captions; ?>
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
