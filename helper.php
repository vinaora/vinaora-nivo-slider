<?php
/**
 * @version		$Id: helper.php 2012-06-10 vinaora $
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

class modVT_Nivo_SliderHelper
{
	private function __construct(){
	}

	public static function &validParams($params){
		$slide_width	= trim($params->get('slide_width'));
		$slide_width	= (!strlen($slide_width) || ($slide_width == "auto")) ? "auto" : preg_replace('/((\s+)?px)?$/', "", $slide_width)."px";
		$params->set('slide_width', $slide_width);

		$slide_height	= trim($params->get('slide_height'));
		$slide_height	= (!strlen($slide_height) || ($slide_height == "auto")) ? "auto" : preg_replace('/((\s+)?px)?$/', "", $slide_height)."px";
		$params->set('slide_height', $slide_height);

		$slide_bdwidth	= trim($params->get('slide_bdwidth'));
		$slide_bdwidth	= preg_replace('/((\s+)?px)?$/', "", $slide_bdwidth)."px";
		$params->set('slide_bdwidth', $slide_bdwidth);

		$slices		= intval($params->get('slices', 0));
		$slices		= ($slices) ? $slices : mt_rand(1,10);
		$params->set('slices', $slices);

		$boxCols	= intval($params->get('boxCols', 0));
		$boxCols	= ($boxCols) ? $boxCols : mt_rand(1,10);
		$params->set('boxCols', $boxCols);

		$boxRows	= intval($params->get('boxRows', 0));
		$boxRows	= ($boxRows) ? $boxRows : mt_rand(1,10);
		$params->set('boxRows', $boxRows);

		$captionWidth	= trim($params->get('captionWidth'));
		$captionWidth	= (!strlen($captionWidth) || ($captionWidth == "auto")) ? "auto" : preg_replace('/((\s+)?px)?$/', "", $captionWidth)."px";
		$params->set('captionWidth', $captionWidth);

		$captionHeight	= trim($params->get('captionHeight'));
		$captionHeight	= (!strlen($captionHeight) || ($captionHeight == "auto")) ? "auto" : preg_replace('/((\s+)?px)?$/', "", $captionHeight)."px";
		$params->set('captionHeight', $captionHeight);

		$captionMarginVertical	= trim($params->get('captionMarginVertical'));
		$captionMarginVertical	= preg_replace('/((\s+)?px)?$/', "", $captionMarginVertical)."px";
		$params->set('captionMarginVertical', $captionMarginVertical);

		$captionMarginHorizontal = trim($params->get('captionMarginHorizontal'));
		$captionMarginHorizontal = preg_replace('/((\s+)?px)?$/', "", $captionMarginHorizontal)."px";
		$params->set('captionMarginHorizontal', $captionMarginHorizontal);

		$titleFontStyle = $params->get('titleFontStyle');
		$titleFontStyle = self::getFontStyle($titleFontStyle);
		$params->set('titleFontStyle', $titleFontStyle);

		$descFontStyle = $params->get('descFontStyle');
		$descFontStyle = self::getFontStyle($descFontStyle);
		$params->set('descFontStyle', $descFontStyle);

		return $params;
	}

	/*
	 * Add jQuery Library to <head> tag
	 */
	public static function addjQuery($source='local', $version='1.7.1'){
		$source = strtolower(trim($source));
		$version = trim($version);

		switch($source){
			case 'local':
				JHtml::script("media/mod_vt_nivo_slider/js/jquery/$version/jquery.min.js");
				break;
			case 'google':
				JHtml::script("https://ajax.googleapis.com/ajax/libs/jquery/$version/jquery.min.js");
				break;
			default:
				return false;
		}
		return true;
	}

	/*
	 * Add file [theme].css to <head> tag
	 */
	public static function addThemCSS($theme, $layout='default'){
		// Remove prefix "demo-" if has'
		$demo = preg_replace("/^(_:)?demo-/", "", $layout);
		$theme = ($layout == $demo) ? $theme : $demo;
		$css = "media/mod_vt_nivo_slider/themes/$theme/$theme.css";
		if (file_exists(JPATH_BASE.DS.$css)){
			JHtml::stylesheet($css);
		}
		else{
			JHtml::stylesheet("media/mod_vt_nivo_slider/themes/default/default.css");
		}
		return true;
	}

	/*
	 * Get a Parameter in a Parameters String which are separated by a specify symbol (default: vertical bar '|').
	 * Example: Parameters = "value1 | value2 | value3". Return "value2" if positon = 2
	 */
	public static function getParam($param, $position=1, $separator='|'){

		$position = intval($position);

		// Not found the separator in string
		if( strpos($param, $separator) === false ){
			if ( $position == 1 ) return $param;
		}
		// Found the separator in string
		else{
			$param = ($separator = "\n") ? str_replace(array("\r\n","\r"), "\n", $param) : $param;
			$items = explode($separator, $param);
			if ( ($position > 0) && ($position < count($items)+1) ) return $items[$position-1];
		}

		return '';
	}

	/*
	 * Get Vinaora Nivo Slider
	 */
	public static function getSlider($params, $separator = "\n"){
		$slider = array("images"=>'', "captions"=>'');

		$slide_width	= $params->get('slide_width');
		$slide_height	= $params->get('slide_height');
		$item_dir		= $params->get('item_dir');

		$links	= $params->get('item_url');
		$links	= str_replace("|", "\r\n", $links);

		$target = $params->get('item_target');

		$titles	= $params->get('item_title');
		$titles	= str_replace("|", "\r\n", $titles);

		$descriptions = $params->get('item_description');
		$descriptions = str_replace("|", "\r\n", $descriptions);

		// Get all images
		$items	= self::getItems($params);

		if (empty($items) || !count($items)){
			return $slider;
		}

		foreach($items as $i=>$path){
			$link	= self::getParam($links, $i+1, $separator);
			$link	= trim($link);
			$link	= htmlspecialchars($link, ENT_QUOTES);

			$title	= self::getParam($titles, $i+1, $separator);
			$title	= trim($title);
			$title	= htmlspecialchars($title, ENT_QUOTES);

			$desc	= self::getParam($descriptions, $i+1, $separator);
			$desc	= trim($desc);
			$desc	= htmlspecialchars($desc, ENT_QUOTES);

			// Get the image name in the full image path
			$image	= strrchr($path, "/");
			$data_thumb = "";
			$captionid = "";

			// The image has caption (title or description)
			if (strlen($title) || strlen($desc)){
				$captionid = '#nivocaption'.$i;

				$slider["captions"] .= "<div id=\"nivocaption$i\" class=\"nivo-html-caption\">";
				if (strlen($title)) $slider["captions"] .= "<div class=\"nivo-heading\">$title</div>";
				if (strlen($desc)) $slider["captions"] .= "<div class=\"nivo-description\">$desc</div>";
				$slider["captions"] .="</div>"."\n";
			}

			$tmp	= "<img src=\"$path\" alt=\"Vinaora Nivo Slider\" title=\"$captionid\" data-thumb=\"$data_thumb\" width=\"$slide_width\" height=\"$slide_height\"/>";
			if (!empty($link)){
				$slider["images"] .= "<a href=\"$link\" target=\"$target\">" . $tmp . "</a>";
			}else{
				$slider["images"] .= $tmp;
			}
		}
		$slider["images"] .= "\n";
		$slider["captions"] .= "\n";
		
		return $slider;
	}

	/*
	 * Get the Captions
	 */
	public static function getCaptions($params, $separator = "\n"){
		$str = '';

		$item_dir		= $params->get('item_dir');
		$items			= self::getItems($params);

		if (empty($items) || !count($items)) return $str;

		$titles	= $params->get('item_title');
		$titles	= str_replace("|", "\r\n", $titles);

		$descriptions = $params->get('item_description');
		$descriptions = str_replace("|", "\r\n", $descriptions);

		foreach($items as $i=>$value){
			$caption = '';

			$title	= self::getParam($titles, $i+1, $separator);
			$title	= trim($title);
			$title	= htmlspecialchars($title, ENT_QUOTES);

			$desc	= self::getParam($descriptions, $i+1, $separator);
			$desc	= trim($desc);
			$desc	= htmlspecialchars($desc, ENT_QUOTES);

			if (strlen($title) || strlen($desc)){
				$caption .= "<div id=\"nivocaption$i\" class=\"nivo-html-caption\">";
				if (strlen($title)) $caption .= "<div class=\"nivo-heading\">$title</div>";
				if (strlen($desc)) $caption .= "<div class=\"nivo-description\">$desc</div>";
				$caption .="</div>";
			}
			$str .= $caption;
		}
		$str .= "\n";
		return $str;
	}

	/*
	 * Get the first slide to start slideshow
	 */
	public static function getStartSlide($params){
		$startSlide = intval($params->get('startSlide'));
		$items = self::getItems($params);
		if (empty($items) || !count($items)) return 0;
		$total = count($items);

		$startSlide = min($startSlide, $total);
		$startSlide = (!$startSlide) ? mt_rand(0, $total-1) : $startSlide-1;

		return $startSlide;
	}

	/*
	 * Get the font-family
	 */
	public static function getFontStyle($font=""){
		$str = "";
		$str = preg_replace('/(\w+)\s(\w+(\s\w+)?)/', "\"$1 $2\"", $font);
		return $str;
	}

	/*
	 * Get the Paths of Items
	 */
	public static function getItems($params){

		$param	= $params->get('item_path');
		$param	= str_replace(array("\r\n","\r"), "\n", $param);
		$param	= explode("\n", $param);

		// Get Paths from invidual paths
		foreach($param as $key=>$value){
			$param[$key] = self::validPath($value);
		}
		// Remove empty element
		$param = array_filter($param);
		// Get Paths from directory
		if (empty($param)){
			$param	= $params->get('item_dir');
			if ($param == "-1") return null;

			$filter		= '([^\s]+(\.(?i)(jpg|png|gif|bmp))$)';
			$exclude	= array('index.html', '.svn', 'CVS', '.DS_Store', '__MACOSX', '.htaccess');
			$excludefilter = array();
			// array_push($excludefilter, $params->get('controlNavThumbsReplace'));

			$param	= JFolder::files(JPATH_BASE.DS.'images'.DS.$param, $filter, true, true, $exclude, $excludefilter);
			foreach($param as $key=>$value){
				$value = substr($value, strlen(JPATH_BASE.DS) - strlen($value));
				$param[$key] = self::validPath($value);
			}
		}

		// Reset keys
		$param = array_values($param);
		return $param;
	}

	/*
	 * Get the Valid Path of Item
	 */
	public static function validPath($path){
		$path = trim($path);

		// Check file type is image or not
		if( !preg_match('/[^\s]+(\.(?i)(jpg|png|gif|bmp))$/', $path) ) return '';

		// The path includes http(s) or not
		if( preg_match('/^(?i)(https?):\/\//', $path) ){
			$base = JURI::base(false);
			if (substr($path, 0, strlen($base)) == $base){
				$path = substr($path, strlen($base) - strlen($path));
			}
			else return $path;
		}

		$path = JPath::clean($path, DS);
		$path = ltrim($path, DS);
		if (!is_file(JPATH_BASE.DS.$path)) return '';

		// Convert it to url path
		$path = JPath::clean(JURI::base(true)."/".$path, "/");
		
		return $path;
	}
}
