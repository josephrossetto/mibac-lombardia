<?php 
/* SVN FILE: $Id$ */

/**
 * @copyright Copyright(c) 2005-2009 Ministero per i beni e le attività culturali. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * Museo & Web CMS is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 *
 * @author		Daniele Ugoletti <daniele.ugoletti@gruppometa.it>, Gruppo Meta <http://www.gruppometa.it>
 * @version		$Id: it.php,$
 * @package		Museo&Web CMS
 * @category	script
 */
 
// remap the core models to custom models
org_glizy_ObjectFactory::remapClass('org.glizy.models.Media', 'org.minervaeurope.museoweb.models.Media');
org_glizy_ObjectFactory::remapClass('org.glizy.models.UserGroup', 'org.minervaeurope.museoweb.models.UserGroup');
org_glizy_ObjectFactory::remapClass('org.glizy.models.User', 'org.minervaeurope.museoweb.models.User');


/*
org_glizy_ObjectFactory::remapClass('org.minervaeurope.museoweb.models.Competition', 'dr.lombardia.models.Competition');
org_glizy_ObjectFactory::remapClass('org.minervaeurope.museoweb.models.Event', 'dr.lombardia.models.Event');
org_glizy_ObjectFactory::remapClass('org.minervaeurope.museoweb.models.Media', 'dr.lombardia.models.Media');
org_glizy_ObjectFactory::remapClass('org.minervaeurope.museoweb.models.User', 'dr.lombardia.models.User');
org_glizy_ObjectFactory::remapClass('org.glizy.components.Media', 'dr.lombardia.components.Media');
org_glizy_ObjectFactory::remapClass('org.glizy.media.Media', 'dr.lombardia.media.Media');
*/


/* Customizations */
glz_import( 'dr.lombardia.locale.*' );
org_glizy_ObjectFactory::remapClass('org.minervaeurope.museoweb.models.Event', 'dr.lombardia.models.Event');


org_glizy_ObjectFactory::remapPageType('Home.xml', 'Home_lombardia.xml');
org_glizy_ObjectFactory::remapPageType('Page.xml', 'Page_lombardia.xml');
?>