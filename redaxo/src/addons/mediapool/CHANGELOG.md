Changelog
=========

Version 2.3.1 – 04.10.2017
--------------------------

### Security

* Weitere Dateiendungen werden geblockt: .pht, .phar, .hh, .htaccess, .htpasswd (@gharlan)
* Bei Dateien, die mit einem Punkt beginnen, wird dieser beim Upload durch einen Unterstrich ersetzt (@gharlan)

### Bugfixes

* Benutzer mit eingeschränkten MP-Kategorie-Rechten 
    - konnte nicht die Multi-Aktionen (schieben, löschen) ausführen (@gharlan)
    - konnten in "Keine Kategorie" hochladen (@gharlan)
* In der Doctypes-Property fehlte "jpeg" (@IngoWinter)
* Abhängigkeit zur fileinfo-Extension entfernt (@staabm)


Version 2.3.0 – 19.03.2017
--------------------------

### Neu

* Neue Klasse rex_media_category_service
* Kategorie-Auswahl über bootstrap-select mit Suchfeld (@skerbis)

### Bugfixes

* Bei Nutzung über Editoren (Redactor etc.) wurde der Link teilweise mehrfach eingefügt
* Dateien konnten nicht ausgetauscht werden, wenn die Extensions der beiden Dateien sich in der Klein-/Großschreibung unterschieden, auch jpg gegen jpeg und umgekehrt ging nicht
* Nach dem Austauschen einer Datei wurde anschließend teilweise noch die alte Datei aus dem Cache angezeigt
* Bei Medialists wurden die Medien im Chrome teils verzögert in die Liste übernommen
* Teilweise kam es zum JS-Fehler „Permission denied to access property winObjCounter“ (@ynamite)


Version 2.2.0 – 14.02.2017
--------------------------

### Neu

* Neue Methode rex_media::getRootMedia()
* Die rex_media-Klasse ist leichter erweiterbar (@DanielWeitenauer)
* Beim Upload- und Sync-Formular steht die Kategorie-Auswahl ganz oben (da bei Kategoriewechsel die Seite sich aktualisiert um die für die Kategorie richtigen Metainfos anzuzeigen)

### Bugfixes

* Dateityp-Einschränkung funktionierte nicht richtig
* Medienpool-Popup ließ sich teilweise für die gleiche Ebene mehrfach öffnen
* Medienpool-Popup schloss sich teilweise nicht korrekt
* REX_MEDIA[]: Vorschau für SVGs funktionierte nicht
* Bei Nutzung des Medienpools über Editoren (redactor, markitup) konnten nach Wechsel der Subpage die Medien nicht mehr ausgewählt werden
* Benutzer mit eingeschränkten Medienrechten konnten niemals die Metainfos der Medien bearbeiten


Version 2.1.1 – 15.07.2016
--------------------------

### Bugfixes

* Wildes Auf- und Zuklapen der Vorschau beim Media-Button entfernt (@schuer)
* SVGs wurden nicht angezeigt


Version 2.1.0 – 24.03.2016
--------------------------

### Neu

* REX_MEDIA[]: "field"-Argument ergänzt um Metainfos der Medien auszulesen
* JS-Event rex:selectMedia bei Auswahl einer Datei im Medienpool

### Bugfixes

* Auf OS X war Synchronisation von Dateien mit Umlauten im Namen nicht möglich
* In Meldungen waren teilweise HTML-Tags sichtbar
* Suche in Unterkategorien verursachte Fehler
* Nach Editieren war kein Sprung in andere Kategorie möglich
* Formular konnte nicht mit Enter abgesendet werden


Version 2.0.1 – 09.02.2016
--------------------------

### Security

* Im eingeloggten Bereich war eine SQL-Injection möglich
* Im eingeloggten Bereich war XSS möglich
