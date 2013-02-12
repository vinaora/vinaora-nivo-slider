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

// Require the base helper class only once
require_once dirname(__FILE__) . '/helper.php';

$helper = new mod_VT_Nivo_SliderHelper($params);

// Add the main stylesheet of Nivo Slider to <head> tag
$helper->addNivoCSS();

// Running demo slideshow
$demo = $params->get('demo');
if ($demo != "-1") $params->set('layout', $demo);

// Get Nivo theme and module layout
$theme = $params->get('theme', 'default');
$layout = $params->get('layout', 'default');

// Add the theme stylesheet of Nivo Slider to <head> tag
$helper->addThemCSS($theme, $layout);

// Get jQuery source and version
$source		= $params->get('jquery_source', 'local');
$version	= $params->get('jquery_version', '1.9.0');

// Add jQuery library. Check jQuery loaded or not. See more details >> http://goo.gl/rK8Yr
$app = JFactory::getApplication();
if(!isset($app->jquery) || $app->jquery === false) {
	$helper->addjQuery($source, $version);
	$app->jquery = true;
}

// Add Nivo Slider script to <head> tag
$helper->addNivoScript();

// Get basic parameters for Nivo Slider script
$effect				= $params->get('effect');
$slices				= $params->get('slices');
$boxCols			= $params->get('boxCols');
$boxRows			= $params->get('boxRows');

$animSpeed			= (int) $params->get('animSpeed');
$pauseTime			= (int) $params->get('pauseTime');

$startSlide			= (int) $params->get('startSlide');

$directionNav		= $params->get('directionNav');

$controlNav			= $params->get('controlNav');
$controlNavThumbs	= $params->get('controlNavThumbs', 'false');

$pauseOnHover		= $params->get('pauseOnHover');
$manualAdvance		= $params->get('manualAdvance');

$randomStart		= $startSlide ? 'false' : 'true';

$prevText			= htmlspecialchars($params->get('prevText'), ENT_QUOTES);
$nextText			= htmlspecialchars($params->get('nextText'), ENT_QUOTES);

$ribbon				= $params->get('ribbon');

if ($layout == 'default'){
	
	$slide_width				= $params->get('slide_width');
	$slide_height				= $params->get('slide_height');
	
	// Get the parameters for 'amazing' theme
	$slide_bgcolor				= $params->get('slide_bgcolor');
	$slide_bdcolor				= $params->get('slide_bdcolor');
	$slide_bdwidth				= $params->get('slide_bdwidth');
	$slide_bdrounded			= $params->get('slide_bdrounded');	
	$slide_bdshadow				= $params->get('slide_bdshadow');

	$controlPosition			= $params->get('controlPosition');
	$controlStyle				= $params->get('controlStyle');
	$arrowStyle					= $params->get('arrowStyle');
	
	$captionPosition			= $params->get('captionPosition');
	$captionMarginVertical		= $params->get('captionMarginVertical');
	$captionMarginHorizontal	= $params->get('captionMarginHorizontal');

	$titleFontStyle				= $params->get('titleFontStyle');
	$titleFontSize				= $params->get('titleFontSize');
	$titleColor					= $params->get('titleColor');

	$descFontSize				= $params->get('descFontSize');
	$descColor					= $params->get('descColor');
	$descFontStyle				= $params->get('descFontStyle');
	
	$captionWidth				= $params->get('captionWidth');
	$captionHeight				= $params->get('captionHeight');
	$captionBackground			= $params->get('captionBackground');
	$captionMargin				= $params->get('captionMargin');
	$captionRounded				= $params->get('captionRounded');
	
	/* For testing
	$controlPosition			= JRequest::getVar('p', 'top');
	$controlStyle				= JRequest::getVar('c', '01');
	$arrowStyle					= JRequest::getVar('a', '01');
	$captionPosition			= JRequest::getVar('t', 'topleft');
	*/

	// Create slider
	$startSlide	= $helper->getStartSlide($params);
	$slider		= $helper->getSlider($params);

	// Get the HTML code of images
	$images		= $slider["images"];
	
	// Image not found
	if(empty($images)) $images = JText::_('MOD_VT_NIVO_SLIDER_ERROR_IMAGE_NOT_FOUND');
	
	// Get the HTML code of captions
	$captions	= $slider["captions"];
}

$module_id	= $module->id;
$base_url	= rtrim(JURI::base(true), "/");

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_vt_nivo_slider', $params->get('layout', 'default'));
