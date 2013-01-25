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

<?php if($theme == "amazing"){ ?>
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
	-moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
	-webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
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
<?php if(strlen($descFontStyle)) { ?>
	font-family: <?php echo $descFontStyle;?> !important;
<?php } ?>
	font-size:<?php echo $descFontSize;?>px !important;
	color:<?php echo $descColor;?> !important;
	line-height:<?php echo $descFontSize+5;?>px !important;
}
</style>
<?php }?>
<?php
$class	= "slider-wrapper "
		. "theme-$theme "
		. "theme-{$theme}{$module_id} "
		. "nivocontrol-$controlPosition "
		. "nivo-bullets$controlStyle "
		. "nivo-arrows$arrowStyle "
		. "captionposition-$captionPosition "
		. "captionrounded-$captionRounded";
$style	= "height: $slide_height; width: $slide_width";
?>
<!-- BEGIN: Vinaora Nivo Slider >> http://vinaora.com/ -->
<div class="vt_nivo_slider<?php echo $moduleclass_sfx?>">
	<div id="vtnivo<?php echo $module_id; ?>" class="<?php echo $class; ?>" style="<?php echo $style; ?>">
		<?php if($ribbon){ ?><div class="ribbon"></div><?php } ?>
		<div id="vt_nivo_slider<?php echo $module_id; ?>" class="nivoSlider">
			<?php echo $images; ?>
		</div>
		<?php echo $captions; ?>
	</div>
</div>
<?php require JModuleHelper::getLayoutPath('mod_vt_nivo_slider', '_script'); ?>
<!-- END: Vinaora Nivo Slider >> http://vinaora.com/ -->
