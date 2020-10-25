<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:15:34 mikhail Exp $
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', 'Nieuws');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Maakt een soort Slashdot-achtige nieuwssectie, waar gebruikers nieuws en commentaar kunnen toevoegen.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'Nieuws onderwerpen');
define('_MI_NOTICIAS_BNAME3', 'Belangrijk bericht');
define('_MI_NOTICIAS_BNAME4', 'Top Nieuws');
define('_MI_NOTICIAS_BNAME5', 'Recent Nieuws');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Nieuws inzenden');
define('_MI_NOTICIAS_SMNAME2', 'Archief');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Onderwerpen Manager');
define('_MI_NOTICIAS_ADMENU3', 'Post/Verander Nieuws');

// Title of config items
define('_MI_STORYHOME', 'Aantal berichten op hoofdpagina?');
define('_MI_NOTIFYSUBMIT', 'E-mail notificatie bij nieuws inzendingen?');
define('_MI_DISPLAYNAV', 'Navigatie box tonen?');

// Description of each config items
define('_MI_STORYHOMEDSC', 'Selecteer het aantal te tonen nieuwsberichten op de hoofdpagina');
define('_MI_NOTIFYSUBMITDSC', 'Selecteer ja indien u een notificatiebericht betreffende een nieuwe plaatsing naar de webmaster wilt sturen');
define('_MI_DISPLAYNAVDSC', 'Selecteer ja indien u de navigatie box bovenaan iedere nieuwspagina wilt tonen');
define('_MI_ANONPOST', 'Anonieme gebruikers toelaten van nieuws te posten?');
define('_MI_AUTOAPPROVE', 'Automatisch nieuws stories goedkeuren zonder admin interventie?');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Globaal');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Globale nieuws notificatie opties.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Artikel');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Notificatie opties toepassend op het huidige artikel.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nieuw Onderwerp');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Verwittig me van elk nieuw gemaakt onderwerp.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Ontvang verwittigingen wanneer een nieuw onderwerp gemaakt wordt.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-verwittiging : Nieuw nieuws onderwerp');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Nieuw Artikel Ingestuurd');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Verwittig me wanneer een nieuw artikel ingestuurd is (wachtend op goedkeuring).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Ontvang verwittigingen wanneer een nieuw artikel ingestuurd is (wachtend op goedkeuring).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-verwittiging : Nieuw nieuws artikel ingestuurd');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Nieuw Artikel');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Verwittig me wanneer een nieuw artikel is gepost.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Ontvang verwittigingen wanneer een nieuw artikel is gepost.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-verwittiging : Nieuw nieuws artikel');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Artikel Goedgekeurd');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Verwittig me wanneer dit artikel is goedgekeurd.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Ontvang een verwittiging wanneer dit artikel is goedgekeurd.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-verwitting : Artikel Goedgekeurd');
