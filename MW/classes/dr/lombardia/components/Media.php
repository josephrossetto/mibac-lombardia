<?php
/* SVN FILE: $Id: Media.php 302 2008-10-21 23:26:00Z ugoletti $ */

/**
 * 
 *
 * This file is part of the GLIZY framework.
 * Copyright (c) 2005-2006 Daniele Ugoletti <daniele@ugoletti.com>
 * 
 * For the full copyright and license information, please view the COPYRIGHT.txt
 * file that was distributed with this source code.
 *
 * @copyright    Copyright (c) 2005, 2006 Daniele Ugoletti
 * @link         http://www.glizy.org Glizy Project
 * @license      http://www.gnu.org/copyleft/lesser.html GNU LESSER GENERAL PUBLIC LICENSE
 * @package      glizy
 * @subpackage   glizy.components
 * @author		 Daniele Ugoletti <daniele@ugoletti.com>
 * @category	 core class
 * @since        Glizy v 0.01
 * @version      $Rev: 302 $
 * @modifiedby   $LastChangedBy: ugoletti $
 * @lastmodified $Date: 2008-10-22 01:26:00 +0200 (mer, 22 ott 2008) $
 */
 
glz_import('org.glizy.components.Component');
glz_import('org.glizy.media.MediaManager');
glz_import('org.glizy.helpers.String');
glz_import('org.glizy.helpers.Media');

class org_glizy_components_Media extends org_glizy_components_Component
{
	var $media;
	
	/**
	 * Return the component information
	 * 
	 * @return	array	component informaton.
	 * @access	public
	 * @static
	 */
	function getInfo()
	{
		$info 					= parent::info();
		$info['name']			= 'Media';
		$info['class'] 			= 'org.glizy.components.Media';
		$info['package'] 		= 'Glizy';
		$info['version'] 		= GLZ_CORE_VERSION;
		$info['author'] 		= 'Daniele Ugoletti';
		$info['author-email'] 	= 'daniele@ugoletti.com';
		$info['url'] 			= 'http://www.ugoletti.com';
		return $info;
	}

	
	/**
	 * Init
	 * 
	 * @return	void
	 * @access	public
	 */
	function init()
	{
		// define the custom attributes
		$this->defineAttribute('cssClass',		false, 	'',		COMPONENT_TYPE_STRING);
		$this->defineAttribute('rel',			false, 	'',		COMPONENT_TYPE_STRING);
		$this->defineAttribute('label',			false, 	NULL,	COMPONENT_TYPE_STRING);
		$this->defineAttribute('linkTitle',		false, 	__T('GLZ_DOWNLOAD_FILE_LINK'),	COMPONENT_TYPE_STRING);
		$this->defineAttribute('adm:mediaType',		false, 	'ALL',	COMPONENT_TYPE_STRING);

		// call the superclass for validate the attributes
		parent::init();
	}


	/**
	 * Process
	 * 
	 * @return	boolean	false if the process is aborted
	 * @access	public
	 */
	function process()
	{
		$this->resetContent();

		$mediaId = intval($this->_parent->loadContent($this->getId()));
		if (is_numeric($mediaId) && $mediaId>0)
		{
			$this->attachMedia($mediaId);
		}
		
		$this->processChilds();
	}
	
	
	/**
	 * Render
	 * 
	 * @return	void
	 * @access	public
	 */
	function render_html()
	{
		$this->_render_html();
		$this->addOutputCode($this->_content['__html__']);	
	}
	
	function _render_html()
	{
		if ($this->_content['mediaId']>0)
		{
			$linkTitle = $this->getAttribute('linkTitle');
			$linkTitle = str_replace('#title#', $this->_content['title'], $linkTitle);
			$linkTitle = str_replace('#size#', org_glizy_helpers_String::formatFileSize($this->media->size), $linkTitle);
			$this->_content['linkTitle'] = $linkTitle;
			$this->_content['__url__'] = org_glizy_helpers_Media::getFileUrlById($this->media->id);
			$this->_content['__html__'] = org_glizy_helpers_Link::makeSimpleLink($this->_content['title'],
																				$this->_content['__url__'],
																				$linkTitle,
																				$this->getAttribute('cssClass'),
																				$this->getAttribute('rel'));

		}
	}
	
	function render_jsediting()
	{
		$output = array();
		$output['id'] 		= $this->getId();
		$output['label'] 	= $this->getAttribute('label');	
		$output['type'] 	= 'media';	
		$output['media_id']	= empty($this->_content['mediaId']) ? '' : $this->_content['mediaId'];	
		$output['value'] 	= empty($this->_content['title']) ? '' : $this->_content['title'];
		$output['mediaType'] 	= $this->getAttribute('adm:mediaType');
	
		$this->addOutputCode($output);
	}
	
	function getContent($parent=NULL)
	{
		$this->_render_html();
		return $this->_content;	
	}
	
	function resetContent()
	{
		$this->_content = array();
		$this->_content['mediaId']		= 0;
		$this->_content['src'] 			= '';
		$this->_content['title'] 		= '';
		$this->_content['size'] 		= '';
		$this->_content['mediaType'] 	= '';
		$this->_content['__url__'] 		= '';
		$this->_content['__html__'] 	= '';
		$this->_content['linkTitle'] 	= '';
	}
	
	function attachMedia($mediaId)
	{
		$this->media = &org_glizy_media_MediaManager::getMediaById($mediaId);
		if (is_object($this->media))
		{
			$this->_content['mediaId']	= $this->media->id;
			$this->_content['src'] 		= $this->media->getFileName();
			$this->_content['title'] 	= $this->media->title;
			$this->_content['size'] 	= $this->media->size;
			$this->_content['mediaType']= $this->media->type;
		}
	}
}
?>