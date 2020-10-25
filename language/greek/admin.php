<?php

// $Id: admin.php,v 1.1 2006/03/27 15:15:44 mikhail Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define('_AM_DBUPDATED', 'Η Βάση Δεδομένων Ανανεώθηκε Επιτυχώς!');
define('_AM_CONFIG', 'Ρυθμίσεις Ειδήσεων');
define('_AM_AUTOARTICLES', 'Αυτοματοποιημένα Άρθρα');
define('_AM_STORYID', 'ID Είδησης');
define('_AM_TITLE', 'Τίτλος');
define('_AM_TOPIC', 'Θέμα');
define('_AM_POSTER', 'Αποστολέας');
define('_AM_PROGRAMMED', 'Προγραμματισμένη Ημερομηνία/Ώρα');
define('_AM_ACTION', 'Ενέργεια');
define('_AM_EDIT', 'Επεξεργασία');
define('_AM_DELETE', 'Διαγραφή');
define('_AM_LAST10ARTS', 'Τελευταία 10 ¶ρθρα');
define('_AM_PUBLISHED', 'Δημοσιεύτηκε'); // Published Date
define('_AM_GO', 'Πάμε!');
define('_AM_EDITARTICLE', 'Επεξεργασία ¶ρθρου');
define('_AM_POSTNEWARTICLE', 'Καταχώρηση Νέου ¶ρθρου');
define('_AM_ARTPUBLISHED', 'Το άρθρο σας δημοσιεύτηκε!');
define('_AM_HELLO', ' %s γεια,');
define('_AM_YOURARTPUB', 'Το άρθρο που καταχωρήσατε στον ιστοχώρο μας δημοσιεύτηκε.');
define('_AM_TITLEC', 'Τίτλος: ');
define('_AM_URLC', 'URL: ');
define('_AM_PUBLISHEDC', 'Δημοσιεύτηκε: ');
define('_AM_RUSUREDEL', 'Είστε βέβαιοι για τη διαγραφή αυτού του άρθρου μαζί με όλα του τα σχόλια;');
define('_AM_YES', 'Ναι');
define('_AM_NO', 'Όχι');
define('_AM_INTROTEXT', 'Εισαγωγικό Κείμενο');
define('_AM_EXTEXT', 'Εκτεταμένο Κείμενο');
define('_AM_ALLOWEDHTML', 'Επιτρέπεται HTML:');
define('_AM_DISAMILEY', 'Απενεργοποίηση Smiley');
define('_AM_DISHTML', 'Απενεργοποίηση HTML');
define('_AM_APPROVE', 'Έγκριση');
define('_AM_MOVETOTOP', 'Μετακίνηση αυτής της είδησης στην κορυφή');
define('_AM_CHANGEDATETIME', 'Aλλαξε την ημερομηνία/ώρα δημοσίευσης');
define('_AM_NOWSETTIME', 'Ορίστηκε στις: %s'); // %s is datetime of publish
define('_AM_CURRENTTIME', 'Η τρέχουσα ώρα είναι: %s');  // %s is the current datetime
define('_AM_SETDATETIME', 'Ορίστηκε την ημερομηνία/ώρα δημοσίευσης');
define('_AM_MONTHC', 'Μήνας:');
define('_AM_DAYC', 'Μέρα:');
define('_AM_YEARC', 'Χρόνος:');
define('_AM_TIMEC', 'Ώρα:');
define('_AM_PREVIEW', 'Προεπισκόπηση');
define('_AM_SAVE', 'Αποθήκευση');
define('_AM_PUBINHOME', 'Δημοσίευση στην αρχική σελίδα;');
define('_AM_ADD', 'Προσθήκη');

//%%%%%%	Admin Module Name  Topics 	%%%%%

define('_AM_ADDMTOPIC', 'Προσθήκη ΚΥΡΙΩΣ Θέματος');
define('_AM_TOPICNAME', 'Όνομα Θέματος');
define('_AM_MAX40CHAR', '(μέγιστο: 40 χαρακτήρες)');
define('_AM_TOPICIMG', 'Εικόνα θέματος');
define('_AM_IMGNAEXLOC', 'το όνομα εικόνας + επέκταση βρίσκονται στο %s');
define('_AM_FEXAMPLE', 'π.χ.: games.gif');
define('_AM_ADDSUBTOPIC', 'Προσθήκη ενός ΥΠΟ-Θέμα');
define('_AM_IN', 'στο');
define('_AM_MODIFYTOPIC', 'Τροποποίηση Θέματος');
define('_AM_MODIFY', 'Τροποποίηση');
define('_AM_PARENTTOPIC', 'Αρχικό Θέμα');
define('_AM_SAVECHANGE', 'Αποθήκευση Αλλαγών');
define('_AM_DEL', 'Διαγραφή');
define('_AM_CANCEL', 'Ακυρο');
define('_AM_WAYSYWTDTTAL', 'ΠΡΟΣΟΧΗ: Είστε βέβαιοι για τη διαγραφή αυτού του θέματος μαζί με ΟΛΕΣ τις ειδήσεις και τα Σχόλιά του;');

// Added in Beta6
define('_AM_TOPICSMNGR', 'Διαχειριστής Θεμάτων');
define('_AM_PEARTICLES', 'Καταχώρηση / Επεξεργασία ¶ρθρων');
define('_AM_NOTICIASUB', 'Νέες Υποβολές');
define('_AM_POSTED', 'Δημοσιεύτηκε');
define('_AM_GENERALCONF', 'Γενικές Ρυθμίσεις');

// Added in RC2
define('_AM_TOPICDISPLAY', 'Εμφάνιση Εικόνας Θέματος;');
define('_AM_TOPICALIGN', 'Θέση');
define('_AM_RIGHT', 'Δεξιά');
define('_AM_LEFT', 'Αριστερά');

define('_AM_EXPARTS', 'Ληγμένα ¶ρθρα');
define('_AM_EXPIRED', 'Ληγμένα');
define('_AM_CHANGEEXPDATETIME', 'Αλλάξτε την ημερομηνία/ώρα λήξης');
define('_AM_SETEXPDATETIME', 'Ορίστε την ημερομηνία/ώρα λήξης');
define('_AM_NOWSETEXPTIME', 'Ορίστηκε στις: %s');

// Added in RC3
define('_AM_ERRORTOPICNAME', 'Πρέπει να εισάγετε ένα όνομα για το θέμα!');
define('_AM_EMPTYNODELETE', 'Δεν υπάρχει κάτι για διαγραφή!');
