<?php
/**
 * TITEL:                Extension: FileIndexer / FileIndexer_cfg.php
 * ERSTELLDATUM:        25.09.2010
 * AUTHOR:                Ramon Dohle aka 'raZe'
 * ORGANISATION:        GRASS-MERKUR GmbH & Co. KG & raZe.it
 * VERSION:                0.1.5.01    03.10.2010
 * REVISION:
 *         25.09.2010    0.1.0.00    raZe        *    Initiale Version
 *                                             *    Ausgelagert aus FileIndexer.php
 *         26.09.2010    0.1.1.00    raZe        *    Variable $wgFiFilenamePlaceholder durch Konstante WC_FI_FILEPATH ersetzt
 *         27.09.2010    0.1.2.00    raZe        *    $wgFiCommandCalls unter Verwendung der Konstante WC_FI_COMMAND neu gesetzt
 *         28.09.2010    0.1.3.00    raZe        *    Weitere Office Dokumenttypen eingetragen
 *                                             *    BUGFIX: Index iconv in $wgFiCommandPaths korrigiert
 *         30.09.2010    0.1.4.00    raZe        *    Defaultwert von $wgFiCommandPaths geaendert - Pfrade auf /usr/bin/ vereinheitlicht
 *                                             *    Defaultwert von $wgFiCommandCalls geaendert - hochgeladene Datei in Anfuehrungszeichen gesetzt
 *         01.10.2010    0.1.5.00    raZe        *    Dateityp xlsm nachgetragen
 *         03.10.2010    0.1.5.01    raZe        *    Beschreibung einiger Parameter korrigiert.
 *
 * OFFENE PUNKTE:
 *         @SYSTEMADMINISTRATOREN:
 *             Die folgenden Konfigurationsparameter muessen noch geprueft werden:
 *                 $wgFiCommandPaths
 *                 $wgFiCommandCalls
 *                 $wgFiTypesToRemoveTags
 *             Die
 *
 * BESCHREIBUNG:
 *         Diese Erweiterung basiert auf der Wiki-Erweiterung 'FileIndexer' vom Stand 15.05.2008.
 *         Wie sein Original soll sie Dateien Indexieren um auch den Inhalt dieser Dateien durch Suchmaschienen zu erfassen.
 *
 *         Hier wird die Konfiguration der Erweiterung extrahiert.
 */
 
 
 
// *** SYSTEMNAHE KONFIGURATIONSPARAMETER
 
/*
 * TYP: BOOL
 * ENTWICKLER DEFAULT = FALSE
 * BESCHREIBUNG:
 *         Wenn TRUE, dann wird vor jeder Indexerstellung geprueft, ob alle Hilfprogramme erreichbar sind.
 */
$wgFiCheckSystem = true;
 
/*
 * TYP: ARRAY
 * BESCHREIBUNG:
 *         Verwaltet alle vorausgesetzten System-Kommandozeilen-Hilfsprogramme mit deren Aufrufpfaden.
 */
$wgFiCommandPaths = array(
    'pdftotext' => "/usr/bin/pdftotext",
    'iconv' => "/usr/bin/iconv",
    'antiword' => "/usr/bin/antiword",
    'xls2csv' => "/usr/bin/xls2csv",
    'catppt' => "/usr/bin/catppt",
    'strings' => "/usr/bin/strings",
    'unzip' => "/usr/bin/unzip",
    'cat' => "/bin/cat",
    'catdoc' => "/usr/bin/catdoc",
);
 
/*
 * TYP: ARRAY
 * BESCHREIBUNG:
 *         Verwaltet die Templates der Kommandoaufrufe je eingestelltem Dateityp (Dateiendung).
 *         ACHTUNG: Bitte die Konstante WC_FI_FILEPATH dort einsetzen, wo spaeter jeweils der Dateipfad ersetzt werden soll!
 */
$wgFiCommandCalls = array(
#    'pdf' => WC_FI_COMMAND . "[pdftotext] -raw -nopgbrk \"" . WC_FI_FILEPATH . "\" -| " . WC_FI_COMMAND . "[iconv] -f ISO-8859-1 -t UTF-8",
    'pdf' => WC_FI_COMMAND . "[pdftotext] -nopgbrk \"" . WC_FI_FILEPATH . "\" -| cat",
    'dot' => WC_FI_COMMAND . "[antiword] -m UTF-8.txt -s \"" . WC_FI_FILEPATH . "\"",
    'doc' => WC_FI_COMMAND . "[antiword] -m UTF-8.txt -s \"" . WC_FI_FILEPATH . "\"",
    'xls' => WC_FI_COMMAND . "[xls2csv] \"" . WC_FI_FILEPATH . "\"",
    'ppt' => WC_FI_COMMAND . "[catppt] \"" . WC_FI_FILEPATH . "\"",
    'rtf' => WC_FI_COMMAND . "[strings] \"" . WC_FI_FILEPATH . "\"",
    'ods' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" content.xml",
    'odp' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" content.xml",
    'odg' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" content.xml",
    'odt' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" content.xml",
    'docx' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" word/document.xml",
    'xlsx' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" xl/sharedStrings.xml",
    'xlsm' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" xl/sharedStrings.xml",
    'pptx' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" ppt/slides/slide*.xml",
    'ppsx' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" ppt/slides/slide*.xml",
    'dotx' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" word/document.xml",
    'dotm' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" word/document.xml",
    'docm' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" word/document.xml",
    'xlsx' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" xl/sharedStrings.xml",
    'xlam' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" xl/sharedStrings.xml",
    'xslx' => WC_FI_COMMAND . "[unzip] -p \"" . WC_FI_FILEPATH . "\" xl/sharedStrings.xml",
    'txt' => WC_FI_COMMAND . "[cat] \"" . WC_FI_FILEPATH . "\"",
    'rtf' => WC_FI_COMMAND . "[catdoc] \"" . WC_FI_FILEPATH . "\"",


);
 
/*
 * TYP: ARRAY
 * BESCHREIBUNG:
 *         Liste aller Dateitypen (Dateiendungen) auf, deren Ausgabe nach Ausfuehrung das entsprechenden Kommandos aus $wgFiCommandCalls noch von Tags zu befreien sind.
 */
$wgFiTypesToRemoveTags = array(
    'ods',
    'odp',
    'odg',
    'odt',
    'docx',
    'xlsx',
    'xlsm',
    'pptx',
    'dotx',
    'dotm',
    'docm',
    'xlam',
    'xslx',
    'pptx',
    'ppsx',
);
 
/*
 * TYP: STRING
 * ENTWICKLER DEFAULT: "/tmp"
 * BESCHREIBUNG:
 *         Verzeichnispfad zur Erstellung temporaeren Dateien. Diese werden benoetigt um bei Warnmeldungen waehrend des Fileuploads die Aufforderung
 *         zur Indexerstellung nicht zu vergessen (Problematik: neuer Request)
 *         ACHTUNG: In diesem Verzeichnis benoetigt der Systembenutzer, unter dem der Webserver ausgefuehrt wird, Schreibrechte!
 */
$wgFiRequestIndexCreationFile = "/tmp";
 
 
 
// *** AUSGABE KONFIGURATIONSPARAMETER
 
/*
 * TYP: STRING
 * ENTWICKLER DEFAULT: "<!-- FI:INDEX-START -->{{FileIndex |index="
 * BESCHREIBUNG:
 *         Ein eindeutiges Praefix vor dem Index-Block, welches bei einer Aktualisierung genutzt wird um den Anfang des Blocks zu erkennen.
 *         TIP: Dieser kann genutzt werden um die Ausgabe zu formatieren. Dabei ist zu beachten, wie die eingesetzten SeachEngines arbeiten!
 */
$wgFiPrefix = "<!-- FI:INDEX-START -->{{FileIndex |index=";
 
/*
 * TYP: STRING
 * ENTWICKLER DEFAULT: " }}<!-- FI:INDEX-START -->"
 * BESCHREIBUNG:
 *         Ein eindeutiges Postfix hinter dem Index-Block, welches bei einer Aktualisierung genutzt wird um das Ende des Blocks zu erkennen.
 *         TIP: Dieser kann genutzt werden um die Ausgabe zu formatieren. Dabei ist zu beachten, wie die eingesetzten SeachEngines arbeiten!
 */
$wgFiPostfix = " }}<!-- FI:INDEX-ENDE -->";
 
/*
 * TYP: INT
 * ENTWICKLER DEFAULT: NS_IMAGE
 * BESCHREIBUNG:
 *         Dieses Feld legt den Namensraum fest, in dem die Indexe zu Dateien beim Hochladen erzeugt werden. D.h. Wird eine Datei X mit
 *         Bestellung eines Indexes hochgeladen, so wird in diesem Namensraum im Artikel X der Index hinterlegt/aktualisiert.
 *
 *         Zusaetzlich wird dieser Namensraum auf der Spezialseite als Defaultwert fuer das Namensraumfeld gewaehlt.
 *
 *         ACHTUNG: Es wird in diesem Parameter nicht der Name sondern die Nummer des Namensraumes angegeben!
 */
$wgFiArticleNamespace = NS_IMAGE;
 
/*
 * TYP: INT
 * ENTWICKLER DEFAULT: 3
 * BESCHREIBUNG:
 *         Mindestlaenge der Indexworte (bei der Angabe von Werte kleiner eins wird automatisch der Wert 3 verwendet).
 *         Zeichenfolgen mit weniger als dieser Anzahl von Zeichen werden nicht im Index beruecksichtigt.
 */
$wgFiMinWordLen = 3;
 
/*
 * TYP: BOOL
 * ENTWICKLER DEFAULT: TRUE
 * BESCHREIBUNG:
 *         Legt fest, ob der Index komplett in Kleinbuchstaben umgewandelt werden soll.
 */
$wgFiLowercaseIndex = true;
 
 
 
// *** SPEZIALSEITEN KONFIGURATIONSPARAMETER
 
/*
 * TYP: CHAR
 * ENTWICKLER DEFAULT: '*'
 * BESCHREIBUNG:
 *         Voreingestelltes Zeichen als Wildcard fuer die Spezialseite zur gezielten Indexierung
 */
$wgFiSpDefaultWildcardSign = "*";
 
/*
 * TYP: BOOL
 * ENTWICKLER DEFAULT: TRUE
 * BESCHREIBUNG:
 *         Legt fest, ob auf der Spezialseite das Wildcard Zeichen fuer die Bestimmung der Artikel waehlbar ist.
 */
$wgFiSpWildcardSignChangeable = true;
 
/*
 * TYP: BOOL
 * ENTWICKLER DEFAULT: TRUE
 * BESCHREIBUNG:
 *         Legt fest, ob auf der Spezialseite der Namesraum fuer die Index-Zielartikel waehlbar ist.
 */
$wgFiSpNamespaceChangeable = true;
 
 
 
// *** ALLGEMEINE STEUERUNGS KONFIGURATIONSPARAMETER
 
/*
 * TYP: BOOL
 * ENTWICKLER DEFAULT: TRUE
 * BESCHREIBUNG:
 *         Schalter fuer das standardmaessige Erstellen eines Indexes, wann immer eine Datei hochgeladen wird. Er erzwingt zwar nicht die
 *         Erstellung, aber durch setzen auf TRUE, wird bei jedem Aufruf der entsprechenden des Uploadformulars die Checkbox zur
 *         Indexanforderung gesetzt.
 */
$wgFiCreateOnUploadByDefault = true;
 
/*
 * TYP: BOOL
 * ENTWICKLER DEFAULT: FALSE
 * BESCHREIBUNG:
 *         Schalter fuer das standardmaessige Aktualisieren des Indexes, wann immer ein Artikel, der einen Index zu einer Datei beinhaltet,
 *         veraendert wird. Er erzwingt zwar nicht die Aktualisierung, aber durch setzen auf TRUE, wird im Formular die Checkbox zur
 *         Indexanforderung gesetzt.
 */
$wgFiUpdateOnEditArticleByDefault = false;
