Contao Extension: RscNewsletterReminder
=======================================

Sends monthly a reminder email to configured groups regarding the RSC newsletter and provides inserttags to display the dealine.


Installation
------------

The extension is not published in contao extension repository.
Install it manually or via [composer](https://packagist.org/packages/rsclg/newsletter-reminder).


Tracker
-------

https://github.com/rsclg/RscNewsletterReminder/issues


Compatibility
-------------

- min. version: Contao 2.9.5
- max. version: Contao 3.4.x


Inserttags
----------

- `{{rscnewsletter::remainingdays}}` - Liefert die Anzahl Tage bis zum nächsten Versand (Stichtag).
- `{{rscnewsletter::deadline}}` - Liefert den Stichtag.
- `{{rscnewsletter::deadline::date}}` - Liefert den nächsten Stichtag als Datum (Formatiert nach dem System Datumsformat).