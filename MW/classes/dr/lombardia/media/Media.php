<?php
/* SVN FILE: $Id: Media.php 320 2010-01-31 23:18:53Z ugoletti $ */

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
 * @subpackage   glizy.media
 * @author		 Daniele Ugoletti <daniele@ugoletti.com>
 * @category	 core class
 * @since        Glizy v 0.01
 * @version      $Rev: 320 $
 * @modifiedby   $LastChangedBy: ugoletti $
 * @lastmodified $Date: 2010-02-01 00:18:53 +0100 (lun, 01 feb 2010) $
 */


class org_glizy_media_Media extends GlizyObject
{
	var $id;
	var $fileName;
	var $size;
	var $type;
	var $title;
	var $creationDate;
	var $modificationDate;
	var $category;
	var $author;
	var $date;
	var $originalFileName;
	var $copyright;
	var $linkTitle;
	var $ar;
	

	function org_glizy_media_Media(&$ar)
	{
		$this->ar               = $ar;
		$this->id               = $ar->media_id;
		$this->fileName         = $ar->media_fileName;
		$this->size             = $ar->media_size;
		$this->type             = $ar->media_type;
		$this->title            = glz_encodeOutput($ar->media_title);
		$this->creationDate     = $ar->media_creationDate;
		$this->modificationDate = $ar->media_modificationDate;
		$this->category         = $ar->media_category;
		$this->author           = $ar->media_author;
		$this->date             = $ar->media_date;
		$this->zoom             = $ar->media_zoom;
		$this->originalFileName	= !empty($ar->media_originalFileName) ? $ar->media_originalFileName : $ar->media_fileName;
		$this->copyright        = $ar->media_copyright;
		$this->linkTitle        = $ar->media_linkTitle;
	}

	function getFileName( $checkIfExists=true )
	{
		if ( strpos( $this->fileName, 'cache/' ) === false )
		{
			$file = org_glizy_Paths::get('APPLICATION_MEDIA_ARCHIVE').ucfirst(strtolower($this->type)).'/'.$this->fileName;
		}
		else
		{
			$file = $this->fileName;	
		}
		
		if ( !$checkIfExists )
		{
			return $file;		
		}
		else
		{
			return file_exists($file) ? $file : org_glizy_Assets::get('ICON_MEDIA_IMAGE');
		}
	}
	
	function getIconFileName()
	{
		return org_glizy_Assets::get('ICON_MEDIA_IMAGE');
	}
	
	function getResizeImage($width, $height, $crop=false, $cropOffset=1, $forceSize=false, $returnResizedDimension=true, $usePiramidalSizes = true)
	{
		return array('imageType' => IMG_JPG, 'fileName' => $this->getIconFileName(), 'width' => NULLww, 'height' => NULL, 'originalWidth'=> NULL, 'originalHeight'=>  NULL);
	}
	
	function getThumbnail( $width, $height, $crop=false, $cropOffset = 0 )
	{
		$iconPath = $this->getIconFileName();
		// controlla se c'è un'anteprima associata
		if ( !empty( $this->ar->media_thumbFileName ) )
		{
			// TODO: da implementare meglio in modo che i metodi di resize
			// non siano in Image ma comuni a tutti i media
			$this->ar->media_fileName = $this->ar->media_thumbFileName;
			$this->ar->media_type = 'IMAGE';
			$media = org_glizy_media_MediaManager::getMediaByRecord( $this->ar );
			return $media->getThumbnail( $width, $height );
		}
		list( $originalWidth, $originalHeight, $imagetypes ) = getImageSize($iconPath);
		return array('fileName' => $iconPath, 'width' => $originalWidth, 'height' => $originalHeight);
	}
}
?>