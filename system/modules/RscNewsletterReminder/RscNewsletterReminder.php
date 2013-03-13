<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2013 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2012-2013
 * @author     Cliff Parnitzky
 * @package    RscNewsletterReminder
 * @license    LGPL
 */

/**
 * Class RscNewsletterReminder
 *
 * Provide methods to send an email to definined member groups when executed.
 * @copyright  Cliff Parnitzky 2012
 * @author     Cliff Parnitzky
 * @package    RscNewsletterReminder
 */
class RscNewsletterReminder extends Backend
{
	/**
	 * Sends a reminder mail to definined member groups.
	 */
	public function sendReminderMail ()
	{
		// first check if required extension 'associategroups' is installed
		if (!in_array('associategroups', $this->Config->getActiveModules()))
		{
			$this->log('RscNewsletterReminder: Extension "associategroups" is required!', 'RscNewsletterReminder sendReminderMail()', TL_ERROR);
			return false;
		} 

		$this->loadLanguageFile("tl_settings");
		
		if ($this->timeleadReached()) {
			$objEmail = new Email();

			$objEmail->logFile = 'RscNewsletterReminderEmail.log';
			
			$objEmail->from = $GLOBALS['TL_CONFIG']['adminEmail'];
			$objEmail->fromName = $GLOBALS['TL_CONFIG']['websiteTitle'];
			$objEmail->subject = $this->replaceEmailInsertTags($GLOBALS['TL_CONFIG']['rscNewsletterReminderEmailSubject']);
			$objEmail->html = $this->replaceEmailInsertTags($GLOBALS['TL_CONFIG']['rscNewsletterReminderEmailContent']);
			$objEmail->text = $this->transformEmailHtmlToText($objEmail->html);
			
			$this->log($objEmail->text, 'RscNewsletterReminder sendReminderMail()', TL_CRON);
			
			try
			{
				$objEmail->sendTo($this->getReceiverEmails());
				$this->log('Monthly sending newsletter reminder finished successfully.', 'RscNewsletterReminder sendReminderMail()', TL_CRON);
				return true;
			}
			catch (Swift_RfcComplianceException $e)
			{
				$this->log("Mail could not be send: " . $e->getMessage(), "RscNewsletterReminder sendReminderMail()", TL_ERROR);
				return false;
			}
		}
		return true;
	}
	
	/**
	 * Replaces all insert tags for the email text.
	 */
	private function replaceEmailInsertTags ($text)
	{
		$textArray = preg_split('/\{\{([^\}]+)\}\}/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
		
		for ($count = 0; $count < count($textArray); $count++)
		{
			$parts = explode("::", $textArray[$count]);
			if ($parts[0] == "config")
			{
				if ($parts[1] == "deadline")
				{
					if ($parts[2] == "date")
					{
						$textArray[$count] = date($GLOBALS['TL_CONFIG']['dateFormat'], $this->getDeadlineDate(time()));
					}
					else
					{
						$textArray[$count] = $GLOBALS['TL_CONFIG']['rscNewsletterReminderDeadline'];
					}
				}
				else if ($parts[1] == "leadtime")
				{
					$textArray[$count] = $GLOBALS['TL_CONFIG']['rscNewsletterReminderLeadtime'];
				}
			}
		}
		
		return implode('', $textArray);
	}
	
	/**
	 * Creates the text from the html for the email.
	 */
	private function transformEmailHtmlToText ($emailHtml)
	{
		$emailText = $emailHtml;
		$emailText = str_replace("</p> ", "\n\n", $emailText);
		$emailText = str_replace("</ul> ", "\n", $emailText);
		$emailText = str_replace(" <li>", " - ", $emailText);
		$emailText = str_replace("</li>", "\n", $emailText);
		$emailText = strip_tags($emailText);
		return $emailText;
	}
	
	/**
	 * Checks if the member is in the relvant group.
	 */
	private function getReceiverEmails ()
	{
		$receiverEmails = "";
		
		$receiverGroups = deserialize($GLOBALS['TL_CONFIG']['rscNewsletterReminderReceiverGroups']);
			
		$objEmail = $this->Database->prepare("SELECT DISTINCT m.email FROM tl_member m "
																			 . "JOIN tl_member_to_group m2g ON m2g.member_id = m.id "
																			 . "WHERE m.disable = ? AND m2g.group_id IN (" . implode(',', $receiverGroups) . ")")
										 ->execute("");
		
		while($objEmail->next())
		{
			if (strlen($receiverEmails) > 0)
			{
				// adding a separator
				$receiverEmails .= ", ";
			}
			$receiverEmails .= $objEmail->email;
		}
		
		return $receiverEmails;
	}
	
	/**
	 * Returns the deadline as date.
	 */
	private function getTodayDate ($actTime)
	{
		return mktime(0, 0, 0, date("m", $actTime), date("d", $actTime), date("Y", $actTime));
	}
	
	/**
	 * Returns the deadline as date.
	 */
	private function getDeadlineDate ($actTime)
	{
		$deadline = mktime(0, 0, 0, date('m', $actTime), $GLOBALS['TL_CONFIG']['rscNewsletterReminderDeadline'], date('Y', $actTime));
		if ($deadline < $this->getTodayDate($actTime))
		{
			$deadline = mktime(0, 0, 0, date('m', $actTime) + 1, $GLOBALS['TL_CONFIG']['rscNewsletterReminderDeadline'], date('Y', $actTime));
		}
		
		return $deadline;
	}
	
	/**
	 * Checks if the time lead is reached, means if act date plus time lead = deadline.
	 */
	private function timeleadReached ()
	{
		return $this->getDaysTillNextSending() == $GLOBALS['TL_CONFIG']['rscNewsletterReminderLeadtime'];
	}
	
	/**
	 * Get the days till next sending.
	 */
	private function getDaysTillNextSending ()
	{
		$actTime = time();
		$today = $this->getTodayDate($actTime);
		$deadline = $this->getDeadlineDate($actTime);
		return (($deadline - $today) / 3600 / 24);
	}
	
		/**
	 * Replaces the additional efg inserttags 
	 */
	public function replaceExternalInserttags($strTag)
	{
		$strTag = explode('::', $strTag);
		if ($strTag[0] == "rscnewsletter")
		{
			if ($strTag[1] == "next")
			{
				return $this->getDaysTillNextSending();
			}
		}
		return false;
	}

}

?>