<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:15:57 mikhail Exp $

// ------------------------------------------------------------------------- //
//       Italian Translation by Marco Ragogna (m.ragogna@xoopsit.net)        //
//                and Andrea Bandino (a.bandino@xoopsit.net)                 //
//        webmasters of XOOPS :: Italian Corner  (www.xoopsit.net)           //
//              the XOOPS Official Italian Site                              //
// ------------------------------------------------------------------------- //

// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', 'Notizie');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Crea una sezione di notizie in cui gli utenti possono inviare e commentare notizie.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'Argomenti delle notizie');
define('_MI_NOTICIAS_BNAME3', 'Notizia del giorno');
define('_MI_NOTICIAS_BNAME4', 'Notizie più lette');
define('_MI_NOTICIAS_BNAME5', 'Notizie recenti');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Scrivi una notizia');
define('_MI_NOTICIAS_SMNAME2', 'Archivio');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Amministra Argomenti');
define('_MI_NOTICIAS_ADMENU3', 'Invia/Modifica Notizia');

// Title of config items
define('_MI_STORYHOME', 'Quante notizie sulla pagina principale?');
define('_MI_NOTIFYSUBMIT', 'Notifica via email ogni nuova notizia inviata?');
define('_MI_DISPLAYNAV', 'Mostra il box di navigazione?');
define('_MI_ANONPOST', 'Consenti agli utenti anonimi di inviare notizie?');
define('_MI_AUTOAPPROVE', 'Approva automaticamente le nuove notizie senza l\'intervento dell\'amministratore?');

// Description of each config items
define('_MI_STORYHOMEDSC', 'Seleziona il numero di notizie da visualizzare sulla pagina principale.');
define('_MI_NOTIFYSUBMITDSC', 'Scegli Sì per inviare un messaggio di notifica al webmaster per ogni nuova notizia inviata.');
define('_MI_DISPLAYNAVDSC', 'Scegli Sì per mostrare il box di navigazione in cima a ogni pagina di notizie.');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications
define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Globale');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Opzioni globali di notifica delle noticias.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Articolo');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Opzioni di notifica applicati a questo articolo');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nuovo argomento');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notificami per ogni nuovo argomento creato.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Ricevi una notifica quando un nuovo argomento viene creato.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notifica automatica : Nuovo argomento delle noticias');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Nuovo articolo inviato');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Notificami per ogni nuovo articolo inviato (in attesa di approvazione).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Ricevi una notifica quando un nuovo articolo viene inviato (in attesa di approvazione).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notifica automatica : Nuovo articolo inviato');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Nuovo articolo');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Notificami per ogni nuovo articolo inviato.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Ricevi una notifica quando un nuovo articolo viene inviato.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notifica automatica : Nuovo articolo');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Articolo approvato');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Notificami quando questo articolo viene approvato.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Ricevi una notifica quando questo articolo viene approvato.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notifica automatica : Articolo approvato');
