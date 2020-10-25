<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:15:41 mikhail Exp $
// Support Francophone de Xoops (www.frxoops.org)
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', 'Articles');

// A brief description of this module
define('_MI_NOTICIAS_DESC', "Cr&eacute;e une section d'articles, o&ugrave; les utilisateurs peuvent poster des articles/commentaires.");

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', "Sujets d'articles");
define('_MI_NOTICIAS_BNAME3', 'Article du jour');
define('_MI_NOTICIAS_BNAME4', 'Top Articles');
define('_MI_NOTICIAS_BNAME5', 'Articles r&eacute;cents');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Proposer un article');
define('_MI_NOTICIAS_SMNAME2', 'Archives');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Gestionnaire de sujets');
define('_MI_NOTICIAS_ADMENU3', 'Envoyer/Editer des articles');

// Title of config items
define('_MI_STORYHOME', "Combien d'article(s) sur la page TOP ?");
define('_MI_NOTIFYSUBMIT', "Notifier par mail d'une nouvelle proposition ?");
define('_MI_DISPLAYNAV', 'Afficher la bo&icirc;te de navigation ?');
define('_MI_ANONPOST', 'Autoriser les utilisateurs anonymes &agrave; envoyer de nouveaux articles ?');
define('_MI_AUTOAPPROVE', "Approuver automatiquement les nouveaux articles sans l'intervention d'un administrateur ?");

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Globale');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Options de notification globales des articles.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Articles');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', "Options de notification s'appliquant &agrave; l'article actuel.");

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nouveau sujet');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notifiez-moi quand un nouveau sujet est cr&eacute;&eacute;.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Recevoir une notification quand un nouveau sujet est cr&eacute;&eacute; .');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique : New noticias topic');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Nouvel article propos&eacute;');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', "Notifiez-moi quand un nouvel article est propos&eacute; (attente d'&ecirc;tre approuv&eacute;).");
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', "Recevoir une notification quand un nouvel article est propos&eacute; (attente d'&ecirc;tre approuv&eacute;).");
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique : Nouvel article propos&eacute;');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Nouvel article');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Notifiez-moi quand un nouvel article est post&eacute;.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Recevoir une notification quand un nouvel article est post&eacute;.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique : Nouvel article');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Article approuv&eacute;');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Notifiez-moi quand cet article est approuv&eacute;.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Recevoir une notification quand cet article est approuv&eacute;.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique : Article approuv&eacute;');
