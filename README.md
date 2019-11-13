## bta-laravel-videostore

nach der Installation folgendes per Terminal im Projektverzeichnis ausführen:

- composer install
- npm install
- (für lokalen Gebrauch) .htaccess anlegen mit RedirectPermanent Anweisung:
 Verzeichnis im Webroot => VHost Adresse
 (zB: **RedirectPermanent /videostore http://videostore.loc**) 
- npm run dev
- .env.local kopieren nach .env und die darin enthaltenen Conf-Daten anpassen

Für Windows DNS in host Datei eintragen

- 127.0.0.1 videostore.loc
- 127.0.0.1 admin.videostore.loc
- 127.0.0.1 monitor.videostore.loc