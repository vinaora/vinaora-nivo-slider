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
		$current_version = self::getCurrentVersion('mod_vt_nivo_slider');
		
		if($current_version < $parent->get('manifest')->version)
		
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
	
	/**
	 * 
	 * @param (string) $type
	 * @param (manifest) $parent
	 * 
	 */
	function preflight( $type, $parent ){
	
		// Installing component manifest file version
		$this->release = $parent->get('manifest')->version;
		
		if ( $type == 'update' ) {
			
			$oldRelease = $this->getParam('version');
			
			if(version_compare($this->release, $oldRelease, 'gt')){
				
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
			else{
				// Todo: Warning Version
			}
		}
	}
	
	/**
	 * 
	 * @param (string) $module: The module name
	 * 
	 */
	function getCurrentVersion($module){
		$version = '';
		
		$xml = JPATH_ROOT . "/modules/$module/$module.xml";
		
		if(file_exists($xml)){
			$xml = simplexml_load_file($xml);
			$results = $xml->xpath('/extension/version');
			if(count($results)) $version = $results[0]->asXML();
		}
		
		return $version;
		
	}
	
	function updateParams() {
			
		// Read the existing extension value(s)
		// Get a db connection.
		$db = JFactory::getDbo();
		
		// Create a new query object.
		$query = $db->getQuery(true);
		
		$query
			->select('params')
			->from('#__extensions')
			->where('type = \'module\' AND element = ' . $db->quote('mod_vt_nivo_slider'));
		
		$db->setQuery($query);
		
		$params = json_decode( $db->loadResult(), true );
		
		$param	= trim($params['item_dir']);
		if(!file_exists(JPATH_ROOT . "/$param")){
			$param = "images/$param";
			$params['item_dir'] = $param;
		}
		
		// Store the combined new and existing values back as a JSON string
		$paramsString = json_encode( $params );
		
		$query
			->update('#__extensions')
			->set('params = ' . $db->quote( $paramsString ))
			->where('type = \'module\' AND element = ' . $db->quote('mod_vt_nivo_slider'));
		$db->setQuery($query);
		$db->query();
	}
}
