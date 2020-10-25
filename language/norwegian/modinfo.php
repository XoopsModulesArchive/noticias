<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:16:12 mikhail Exp $
// Module Info
// Translated by Dr. Goodman and Xend, www.oppegaard.com and www.xtm.no
// The name of this module
define('_MI_NOTICIAS_NAME', 'Nyheter');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Lager en Slashdot-lignende nyhetsseksjon, hvor brukere kan poste nyheter/kommentarer.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'Nyhetstemne-blokk');
define('_MI_NOTICIAS_BNAME3', 'Stor historie-blokk');
define('_MI_NOTICIAS_BNAME4', 'Toppnyheter-blokk');
define('_MI_NOTICIAS_BNAME5', 'Siste nyheter-blokk');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Legg til nyhet');
define('_MI_NOTICIAS_SMNAME2', 'Arkiv');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Administrasjon av emner');
define('_MI_NOTICIAS_ADMENU3', 'Poste/Rediger nyhet');

// Title of config items
define('_MI_STORYHOME', 'Velg hvor mange nyheter som skal vises på første side');
define('_MI_NOTIFYSUBMIT', 'Velg ja for å sende varsling til webmaster ved nytt innlegg');
define('_MI_DISPLAYNAV', 'Velg ja for visning av navigasjonsboks på toppen av hver nyhetsside');
define('_MI_ANONPOST', 'Tillat anonyme brukere å poste nyhetsartikler?');
define('_MI_AUTOAPPROVE', 'Automatisk godkjenn nyheter uten adminstrators godkjenning?');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Globalt');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Globale valg for nyhetsvarslinger.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Artikkel');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Varslingsvalg som gjelder for nåværende artikkel.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nytt Emne');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Varsle meg når ett nytt emne er laget.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Motta varsling når ett nytt emne er laget.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-varsling : Nytt nyhetsemne');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Ny artikkel innsendt');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Varsle meg når en nytt artikkel er innsendt (som venter på godkjenning).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Motta varsling når ett nytt artikkel er innsendt (som venter på godkjenning).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-varsling : Ny nyhetsartikkel er innsendt');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Ny artikkel');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Varsle meg når en ny artikkel er innsendt.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Motta varsling når en ny artikkel er innsendt.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-varsling : Ny nyhetsartikkel');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Story Approved');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Varsle meg når denne artikkelen er godkjent.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Motta varsling når denne artikkelen er godkjent.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-varsling : Artikkel er godkjent');
