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

class modVT_Nivo_SliderHelper
{
	function __construct(&$params){
	
		// Valid the Dimension of Slideshow
		$param	= trim( $params->get('slide_width') );
		$param	= self::validDimension($param, "auto");
		$params->set('slide_width', $param);

		$param	= trim( $params->get('slide_height') );
		$param	= self::validDimension($param, "auto");
		$params->set('slide_height', $param);

		$param	= trim( $params->get('slide_bdwidth') );
		$param	= self::validDimension($param, "");
		$params->set('slide_bdwidth', $param);

		// Valid the number of Slices, Columns, Rows
		$param	= (int) $params->get('slices', 0);
		$param	= ($param) ? $param : mt_rand(1, 20);
		$params->set('slices', $param);

		$param	= (int) $params->get('boxCols', 0);
		$param	= ($param) ? $param : mt_rand(1, 20);
		$params->set('boxCols', $param);

		$param	= (int) $params->get('boxRows', 0);
		$param	= ($param) ? $param : mt_rand(1, 20);
		$params->set('boxRows', $param);

		// Valid the Dimension of Slideshow Caption
		$param	= trim( $params->get('captionWidth') );
		$param	= self::validDimension($param, "auto");
		$params->set('captionWidth', $param);

		$param	= trim( $params->get('captionHeight') );
		$param	= self::validDimension($param, "auto");
		$params->set('captionHeight', $captionHeight);

		// Valid the Margin of Slideshow Caption
		$param	= trim( $params->get('captionMarginVertical') );
		$param	= self::validDimension($param, "");
		$params->set('captionMarginVertical', $param);

		$param = trim( $params->get('captionMarginHorizontal') );
		$param	= self::validDimension($param, "");
		$params->set('captionMarginHorizontal', $param);

		// Valid the Font styles
		$param = $params->get('titleFontStyle');
		$param = trim($param);
		$params->set('titleFontStyle', $param);

		$param = $params->get('descFontStyle');
		$param = trim($param);
		$params->set('descFontStyle', $param);
		
	}

	/**
	 * Add jQuery Library to <head> tag
	 */
	public static function addjQuery($source='local', $version='1.9.0'){

		$source	= strtolower(trim($source));
		$version = trim($version);

		switch($source){
			case 'local':
				JHtml::script("media/mod_vt_nivo_slider/js/jquery/$version/jquery.min.js");
				break;
			
			case 'google':
				$version = ($version == 'latest') ? '1' : $version;
				JHtml::script("http://ajax.googleapis.com/ajax/libs/jquery/$version/jquery.min.js");
				break;
				
			case 'jquery':
				JHtml::script("http://code.jquery.com/jquery-$version.min.js");
				break;
			
			default:
				return false;
		}
		return true;
	}

	/**
	 * Add the main stylesheet of Nivo Slider to <head> tag
	 */
	public static function addNivoCSS(){
		JHtml::stylesheet('media/mod_vt_nivo_slider/css/nivo-slider.min.css');
	}
	
	/**
	 * Add Nivo Slider script to <head> tag
	 */
	public static function addNivoScript(){
		JHtml::script('media/mod_vt_nivo_slider/js/jquery.nivo.slider.min.js');
	}
	
	/**
	 * Add file [theme].css to <head> tag
	 */
	public static function addThemCSS($theme='default', $layout='default'){
		// Remove prefix "demo-" if has
		$demo = preg_replace("/^(_:)?demo-/", "", $layout);
		$theme = ($layout == $demo) ? $theme : $demo;
		$css = "media/mod_vt_nivo_slider/themes/$theme/$theme.css";
		if (file_exists(JPATH_BASE . '/' . $css)){
			JHtml::stylesheet($css);
		}
		else{
			JHtml::stylesheet("media/mod_vt_nivo_slider/themes/default/default.css");
		}
		return;
	}

	/**
	 * Get Vinaora Nivo Slider
	 */
	public static function getSlider($params, $separator = "\n"){
		$slider = array("images"=>'', "captions"=>'');

		// Get the dimension of slideshow
		$slide_width	= $params->get('slide_width');
		$slide_height	= $params->get('slide_height');
		
		// Get the directory which contain all images
		$item_dir	= $params->get('item_dir');

		// Get the titles, descriptions and links of all images
		$titles	= $params->get('item_title');
		$descs	= $params->get('item_description');
		$links	= $params->get('item_url');
		$target	= $params->get('item_target');

		// Get all images
		$items	= self::getItems($params);

		// Not found images
		if (empty($items) || !count($items)){
			return $slider;
		}

		foreach($items as $i=>$path){
		
			// Get the title, description and link of every image
			$title	= self::getParam($titles, $i+1, $separator);
			$title	= trim($title);
			$title	= htmlspecialchars($title, ENT_QUOTES);

			$desc	= self::getParam($descs, $i+1, $separator);
			$desc	= trim($desc);
			$desc	= htmlspecialchars($desc, ENT_QUOTES);
			
			$link	= self::getParam($links, $i+1, $separator);
			$link	= trim($link);
			$link	= htmlspecialchars($link, ENT_QUOTES);

			// Get the name in the full path of image
			$image	= strrchr($path, "/");
			
			$data_thumb = "";
			$captionid = "";

			// The image has caption (title or description)
			if (strlen($title) || strlen($desc)){
				$captionid = "#nivocaption$i";

				$slider["captions"] .= "<div id=\"nivocaption$i\" class=\"nivo-html-caption\">";
				
				// Found a title of image
				if (strlen($title)) $slider["captions"] .= "<div class=\"nivo-heading\">$title</div>";
				
				// Found a description of image
				if (strlen($desc)) $slider["captions"] .= "<div class=\"nivo-description\">$desc</div>";
				
				$slider["captions"] .= "</div>\n";
			}

			$img	= "<img src=\"$path\" alt=\"Vinaora Nivo Slider\" title=\"$captionid\" data-thumb=\"$data_thumb\" width=\"$slide_width\" height=\"$slide_height\"/>";
			
			// Found or not found the link of image
			if (!empty($link)){
				$slider["images"] .= "<a href=\"$link\" target=\"$target\">$img</a>";
			}else{
				$slider["images"] .= $img;
			}
		}
		$slider["images"] .= "\n";
		$slider["captions"] .= "\n";
		
		return $slider;
	}

	/**
	 * Get the first slide to start slideshow
	 */
	public static function getStartSlide($params){
		
		$startSlide = (int) $params->get('startSlide');
		$items = self::getItems($params);
		
		// Not found any image
		if (empty($items) || !count($items)) return 0;
		
		// Found the images
		$total = count($items);

		$startSlide = min($startSlide, $total);
		$startSlide = (!$startSlide) ? mt_rand(0, $total-1) : $startSlide-1;

		return $startSlide;
	}

	/**
	 * Valid the Dimension 
	 */
	public static function validDimension($param, $default="auto"){
	
		if( ($param != $default) && strlen($param) ){
			$param	= preg_replace('/((\s+)?px)?$/', "", $param)."px";
		}
		
		return $param;
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
