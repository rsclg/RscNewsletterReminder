Contao Extension: RscNewsletterReminder
=======================================

Sendet eine Erinnerungsmail an konfigurierte Gruppen bzgl. der RSC Newsletters.


Installation
------------

The extension is not published in contao extension repository.
Install it manually.


Tracker
-------

https://github.com/rsclg/RscNewsletterReminder/issues


Compatibility
-------------

- min. version: Contao 2.9.5
- max. version: Contao 2.9.5


Inserttags
----------

- `{{rscnewsletter::remainingdays}}` - Liefert die Anzahl Tage bis zum nächsten Versand (Stichtag).
- `{{rscnewsletter::deadline}}` - Liefert den Stichtag.
- `{{rscnewsletter::deadline::date}}` - Liefert den nächsten Stichtag als Datum (Formatiert nach dem System Datumsformat).