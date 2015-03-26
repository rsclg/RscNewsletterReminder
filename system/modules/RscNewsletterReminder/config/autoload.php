<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package RscNewsletterReminder
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'RSC',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'RSC\RscNewsletterReminder' => 'system/modules/RscNewsletterReminder/classes/RscNewsletterReminder.php',
));
