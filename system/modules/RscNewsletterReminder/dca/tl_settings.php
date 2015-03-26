<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2015 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2012-2015
 * @author     Cliff Parnitzky
 * @package    RscNewsletterReminder
 * @license    LGPL
 */

/**
 * Add to palette
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{rscNewsletterReminder_legend},rscNewsletterReminderDeadline, rscNewsletterReminderLeadtime, rscNewsletterReminderReceiverGroups, rscNewsletterReminderEmailSenderAddress, rscNewsletterReminderEmailSenderName, rscNewsletterReminderEmailSubject, rscNewsletterReminderEmailContent;';

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['rscNewsletterReminderDeadline'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderDeadline'],
	'inputType'               => 'select',
	'options'                 => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'),
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rscNewsletterReminderLeadtime'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderLeadtime'],
	'inputType'               => 'select',
	'options'                 => array('5', '7', '10', '14'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderLeadtime'],
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rscNewsletterReminderReceiverGroups'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderReceiverGroups'],
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_member_group.name',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'clr', 'multiple'=>true)
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rscNewsletterReminderEmailSenderAddress'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderEmailSenderAddress'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp' => 'email','maxlength'=>128, 'tl_class'=>'w50 clr')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rscNewsletterReminderEmailSenderName'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderEmailSenderName'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp' => 'extnd','maxlength'=>128, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rscNewsletterReminderEmailSubject'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderEmailSubject'],
	'inputType'               => 'text',
	'reference'               => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminder']['help']['inserttags'],
	'eval'                    => array('mandatory'=>true, 'allowHtml'=>true, 'helpwizard'=>true, 'tl_class'=>'clr long')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rscNewsletterReminderEmailContent'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderEmailContent'],
	'inputType'               => 'textarea',
	'reference'               => &$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminder']['help']['inserttags'],
	'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'allowHtml'=>true, 'helpwizard'=>true, 'tl_class'=>'clr')
);

?>