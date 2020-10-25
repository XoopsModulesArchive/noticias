<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:15:44 mikhail Exp $
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', 'Ειδήσεις');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Δημιουργία τμήματος ειδήσεων σε στυλ Slashdot, όπου οι χρήστες μπορούν να καταχωρούν ειδήσεις/σχόλια.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'Θέματα Ειδήσεων');
define('_MI_NOTICIAS_BNAME3', 'Μεγάλη Είδηση');
define('_MI_NOTICIAS_BNAME4', 'Κορυφαίες Ειδήσεις');
define('_MI_NOTICIAS_BNAME5', 'Πρόσφατες Ειδήσεις');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Καταχώρηση Είδησης');
define('_MI_NOTICIAS_SMNAME2', 'Αρχείο Ειδήσεων');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Διαχειριστής Θεμάτων');
define('_MI_NOTICIAS_ADMENU3', 'Καταχώρηση/Επεξεργασία Είδησης');

// Title of config items
define('_MI_STORYHOME', 'Επιλέξτε τον αριθμό των ειδήσεων που θα εμφανίζονται αρχική σελίδα');
define('_MI_NOTIFYSUBMIT', 'Επιλέξτε ναι για να στείλετε μήνυμα ειδοποίησης στον διαχειριστή ιστοχώρου για κάθε υποβολή');
define('_MI_DISPLAYNAV', 'Επιλέξτε ναι για να εμφανίζεται κουτί πλοήγησης στην αρχή κάθε σελίδας Είδησης');
define('_MI_ANONPOST', 'Να επιτρέπεται στους ανώνυμους χρήστες να καταχωρούν άρθρα ειδήσεων;');
define('_MI_AUTOAPPROVE', 'Αυτόματη έγκριση των άρθρων ειδήσεων χωρίς παρέμβαση του διαχειριστή;');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Γενικά');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Γενικές επιλογές ειδοποίησης ειδήσεων.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Είδηση');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Επιλογές ειδοποιήσεων που αφορούν την τρέχουσα είδηση.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Νέο Θέμα');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Ειδοποίησέ με όταν δημιουργείται ένα νέο θέμα.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Λήψη ειδοποιήσεων όταν δημιουργείται ένα νέο θέμα.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} αυτόματη ειδοποίηση: Νέο θέμα ειδήσεων');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Υποβλήθηκε Νέα Είδηση');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Ειδοποίησέ με όταν υποβληθεί νέα είδηση (που αναμένει έγκριση).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Λήψη ειδοποιήσεων για κάθε υποβληθεί νέας είδηση (που αναμένει έγκριση).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}  αυτόματη ειδοποίηση: Υποβλήθηκε νέα είδηση στις ειδήσεις');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Νέα Είδηση');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Ειδοποίησέ με για κάθε νέα είδηση που καταχωρείται.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Λήψη ειδοποιήσεων για κάθε νέα είδηση που καταχωρείται.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} αυτόματη ειδοποίηση : Νέα είδηση στις ειδήσεις');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Η Είδηση Εγκρύθηκε');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Ειδοποίησέ με όταν εγκριθεί αυτή η είδηση.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Λήψη ειδοποιήσεων όταν εγκριθεί αυτή η είδηση.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} αυτόματη ειδοποίηση: Η είδηση εγκρίθηκε');
