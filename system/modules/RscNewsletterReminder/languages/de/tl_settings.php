<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2012
 * @author     Cliff Parnitzky
 * @package    RscNewsletterReminder
 * @license    LGPL
 */

/**
 * fields
 */
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminder_legend']        = "RSC Newsletter Erinnerung";
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderDeadline']       = array('Stichtag', 'Wählen Sie den Tag des Monats, wann die Erinnerung gesendet werden soll.');
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderLeadtime']       = array('Vorlaufzeit', 'Wählen Sie die Anzahl Tage, wann die Erinnerung vor dem Stichtag gesendet werden soll.');
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderReceiverGroups'] = array('Empfängergruppe(n)', 'Wählen Sie die Mitgliedergruppe(n), für welche die Newsletter Erinnerung gesendet werden soll.');
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderEmailSubject']   = array('E-Mail Betreff', 'Geben Sie den Betreff für die E-Mail ein. Die Verwendung von Inserttags ist möglich.');
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderEmailContent']   = array('E-Mail Inhalt', 'Geben Sie den HTML Inhalt für die E-Mail ein. Dieser wird automatisch als Text umgewandelt. So sind HTML und Text Emails gewährleistet. Die Verwendung von Inserttags ist möglich.');

/**
 * options
 */
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderLeadtime']['5']  = '5 Tage';
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderLeadtime']['7']  = '1 Woche';
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderLeadtime']['10'] = '10 Tage';
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminderLeadtime']['14'] = '2 Wochen';

/**
 * help messages
 */
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminder']['help']['inserttags']['headline']        = array('<u>Inserttags</u>', 'Folgende Inserttags können verwendet werden:');
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminder']['help']['inserttags']['config_deadline'] = array('<i>{{config::deadline}}</i>', 'Dieses Tag liefert den Stichtag als Zahlwert.');
$GLOBALS['TL_LANG']['tl_settings']['rscNewsletterReminder']['help']['inserttags']['config_leadtime'] = array('<i>{{config::leadtime}}</i>', 'Dieses Tag liefert den Wert der Vorlaufzeit.');

?>