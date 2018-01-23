geoIP Test
==========

Description
-----------
Ein kleiner Test für geoIP

TL;DR
Um die Ermittlung des Landes anhand der IP-Adresse zu gewährleisten, muss immer das PHP Modul (php5-geoip) verwendet werden und nicht das Apache Modul (libapache2-mod-geoip). Dieser Test ermittelt die IP-Adresse und den Ländercode sowohl mittels Apache- als auch mittels PHP-Modul. Werden zwei unterschiedliche IP-Adressen oder Ländercodes ermittelt, erfolgt eine Warnung.

---

Die Ermittlung des Landes bzw. Ländercodes anhand der IP-Adresse des Endgerätes funktioniert mit dem Apache Modul in bestimmten Konstellationen nicht zuverlässig. Aufgefallen ist mir dies bei Laurel im Zuge der Mobiloptimierung. Die Kombination iPhone + T-Mobile führt dazu, dass die ermittelte IP-Adresse durch das Apache-Modul eine IP-Adresse von Apple USA ist. Der erkannte Ländercode ist demzufolge logischerweise US. Weitere Kombinationen mit anderen Mobilfunkprovidern (O2, Vodafone) als auch mit anderen Smartphoneherstellern (Samsung, Oneplus) zeigt dieses Verhalten nicht. Selbst mit einem iPhone in Kombination mit Vodafone oder O2 tritt der Fehler nicht auf.
Die Konsequenz aus diesem Phänomen ist, das Apache Modul konsequent nicht zu verwenden, da damit eine sicher Identifikation der IP-Adresse und damit des Ländercodes nicht gewährleistet ist. Stattdessen muss das PHP Modul verwendet werden. Ist dieses nicht installiert, sollte es vom Hoster nachinstalliert werden.
Installation

Die geoIP Erweiterung für PHP wird mittels composer installiert. Ist das Modul bereits über die Paketverwaltung installiert, schlägt die Installation mittels composer fehl, dies ist in Ordnung.
Als zweite Komponente wird die geoIP Datenbank von Maxmind benötigt. Man kan sich das Legacy Format auf der Herstellerseite herunterladen.

Requirements
------------
- PHP >= 5.2
- composer (optional)

Restrictions
------------
don't install Maxmind's geoIP (geoip-api-php) with composer, if the native package (php5-geoip) is already installed

Installation Instruction
------------------------
0. wget https://getcomposer.org/composer.phar
1. (php) composer.phar install

THE END.
