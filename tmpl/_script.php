<?php
/**
 * @package		VINAORA NIVO SLIDER
 * @subpackage	mod_vt_nivo_slider
 * @copyright	Copyright (C) 2011-2013 VINAORA. All rights reserved.
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
