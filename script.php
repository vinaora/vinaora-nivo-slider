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

class mod_VT_Nivo_SliderInstallerScript{
	/**
	 * method to install the component
	 *
	 * @return void
	 */
	function install($parent)
	{
	}
 
	/**
	 * method to uninstall the component
	 *
	 * @return void
	 */
	function uninstall($parent) 
	{
	}

	/**
	 * method to update the component
	 *
	 * @return void
	 */
	function update($parent) 
	{
		$version = $parent->get('manifest')->version;
		
		// Remove the directory '/media/.../fonts'
		$path = JPATH_ROOT . '/media/mod_vt_nivo_slider/fonts';
		if( file_exists( $path ) ){
			JFolder::delete( $path );
		}
		
		// Remove the outdated jquery scripts from 1.0.x to 1.6.x'
		$path = JPATH_ROOT . '/media/mod_vt_nivo_slider/js/jquery';
		$folders = JFolder::folders($path, '^1\.[0-6]\.[0-9]$', false, true);
		foreach($folders as $folder){
			JFolder::delete( $folder );
		}
		
	}
}
