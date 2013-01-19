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

$module_id	= $module->id;
$base_url	= rtrim(JURI::base(true), "/");

// Add Nivo Slider stylesheet to <head> tag
JHtml::stylesheet('media/mod_vt_nivo_slider/css/nivo-slider.css');

$params = modVT_Nivo_SliderHelper::validParams($params);
$demo = $params->get('demo');
if ($demo != "-1"){
	$params->set('layout', $demo);
}

$layout = preg_replace('/^_:/', '', $params->get('layout', 'default'));
$theme = $params->get('theme', 'default');
modVT_Nivo_SliderHelper::addThemCSS($theme, $layout);

$source		= $params->get('jquery_source', 'local');
$version	= $params->get('jquery_version', '1.9.0');

// Add jQuery library. Check jQuery loaded or not. See more details >> http://goo.gl/rK8Yr
$app = JFactory::getApplication();
if(!isset($app->jquery) || $app->jquery === false) {
	modVT_Nivo_SliderHelper::addjQuery($source, $version);
	$app->jquery = true;
}

// Add Nivo Slider script to <head> tag
JHtml::script('media/mod_vt_nivo_slider/js/jquery.nivo.slider.min.js');

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

if ($layout == 'default'){
	
	$slide_width				= $params->get('slide_width');
	$slide_height				= $params->get('slide_height');

	// Get amazing parameters
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
	
	$controlPosition			= JRequest::getVar('p', 'top');
	$controlStyle				= JRequest::getVar('c', '01');
	$arrowStyle					= JRequest::getVar('a', '01');
	$captionPosition			= JRequest::getVar('t', 'topleft');

	// Create slider
	$startSlide	= modVT_Nivo_SliderHelper::getStartSlide($params);
	$slider		= modVT_Nivo_SliderHelper::getSlider($params);

	$images		= $slider["images"];
	
	// Image not found
	if(empty($images)){
		$images = JText::_('MOD_VT_NIVO_SLIDER_ERROR_IMAGE_NOT_FOUND');
	}
	$captions	= $slider["captions"];
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_vt_nivo_slider', $params->get('layout', 'default'));
