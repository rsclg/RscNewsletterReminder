[![Latest Version on Packagist](http://img.shields.io/packagist/v/rsclg/newsletter-reminder.svg?style=flat)](https://packagist.org/packages/rsclg/newsletter-reminder)
[![Installations via composer per month](http://img.shields.io/packagist/dm/rsclg/newsletter-reminder.svg?style=flat)](https://packagist.org/packages/rsclg/newsletter-reminder)
[![Installations via composer total](http://img.shields.io/packagist/dt/rsclg/newsletter-reminder.svg?style=flat)](https://packagist.org/packages/rsclg/newsletter-reminder)

Contao Extension: RscNewsletterReminder
=======================================

Sends monthly a reminder email to configured groups regarding the RSC newsletter and provides inserttags to display the deadline.


Installation
------------

Install the extension via composer: [rsclg/newsletter-reminder](https://packagist.org/packages/rsclg/newsletter-reminder).

If you prefer to install it manually, download the latest release here: https://github.com/rsclg/RscNewsletterReminder/releases


Tracker
-------

https://github.com/rsclg/RscNewsletterReminder/issues


Compatibility
-------------

- min. Contao version: >= 3.2.0
- max. Contao version: <  3.6.0


Dependency
----------

This extension is dependent on the following extensions:

- [[friends-of-contao/contao-associategroups]](https://packagist.org/packages/friends-of-contao/contao-associategroups)


Inserttags
----------

- `{{rscnewsletter::remainingdays}}` - Returns the number of days until the next sending (deadline).
- `{{rscnewsletter::deadline}}` - Returns the deadline.
- `{{rscnewsletter::deadline::date}}` - Returns the next deadline date (formatted with system date format).