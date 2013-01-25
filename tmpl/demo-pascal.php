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

<!-- BEGIN: Vinaora Nivo Slider >> http://vinaora.com/ -->
<div class="vt_nivo_slider<?php echo $moduleclass_sfx?>">
	<div class="slider-wrapper theme-pascal">
		<?php if($ribbon){ ?><div class="ribbon"></div><?php } ?>
		<div id="vt_nivo_slider<?php echo $module_id; ?>" class="nivoSlider">
			<a href="http://vinaora.com/vinaora-visitors-counter/" target="_blank"><img src="<?php echo $base_url; ?>/media/mod_vt_nivo_slider/images/demo-pascal/toystory_pascal.jpg" alt="toystory_pascal" title="#nivocaption1" /></a>
			<a href="http://vinaora.com/vinaora-cu3er-3d-slideshow/" target="_blank"><img src="<?php echo $base_url; ?>/media/mod_vt_nivo_slider/images/demo-pascal/up_pascal.jpg" alt="up_pascal" title="#nivocaption2" /></a>
			<a href="http://vinaora.com/vinaora-cu3ox-slideshow/" target="_blank"><img src="<?php echo $base_url; ?>/media/mod_vt_nivo_slider/images/demo-pascal/walle_pascal.jpg" alt="walle_pascal" title="#nivocaption3" /></a>
			<a href="http://vinaora.com/vinaora-nivo-slider/" target="_blank"><img src="<?php echo $base_url; ?>/media/mod_vt_nivo_slider/images/demo-pascal/nemo_pascal.jpg" alt="nemo_pascal" title="#nivocaption4" /></a>
		</div>
		<div id="nivocaption1" class="nivo-html-caption">
			<div class="nivo-heading">Vinaora Visitors Counter</div>
			<div class="nivo-description"></div>
		</div>
		<div id="nivocaption2" class="nivo-html-caption">
			<div class="nivo-heading">Vinaora Cu3er 3D slide-show</div>
			<div class="nivo-description"></div>
		</div>
		<div id="nivocaption3" class="nivo-html-caption">
			<div class="nivo-heading">Vinaora Cu3ox Slideshow</div>
			<div class="nivo-description"></div>
		</div>
		<div id="nivocaption4" class="nivo-html-caption">
			<div class="nivo-heading">Vinaora Nivo Slider</div>
			<div class="nivo-description"></div>
		</div>
	</div>
</div>
<?php require JModuleHelper::getLayoutPath('mod_vt_nivo_slider', '_script'); ?>
<!-- END: Vinaora Nivo Slider >> http://vinaora.com/ -->
