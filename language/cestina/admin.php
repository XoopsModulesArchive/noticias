<?php

// $Id: admin.php,v 1.1 2006/03/27 15:15:31 mikhail Exp $
//%%%%%% Admin Module Name Articles %%%%%
define('_AM_DBUPDATED', 'Database Updated Successfully!');
define('_AM_CONFIG', 'noticias Configuration');
define('_AM_AUTOARTICLES', 'Automated Articles');
define('_AM_STORYID', 'Story ID');
define('_AM_TITLE', 'Title');
define('_AM_TOPIC', 'Topic');
define('_AM_POSTER', 'Poster');
define('_AM_PROGRAMMED', 'Programmed Date/Time');
define('_AM_ACTION', 'Action');
define('_AM_EDIT', 'Edit');
define('_AM_DELETE', 'Delete');
define('_AM_LAST10ARTS', 'Last %d Articles');
define('_AM_PUBLISHED', 'Published'); // Published Date
define('_AM_GO', 'Go!');
define('_AM_EDITARTICLE', 'Edit Article');
define('_AM_POSTNEWARTICLE', 'Post New Article');
define('_AM_ARTPUBLISHED', 'Your article has been published!');
define('_AM_HELLO', 'Hello %s,');
define('_AM_YOURARTPUB', 'Your article submitted to our site has been published.');
define('_AM_TITLEC', 'Title: ');
define('_AM_URLC', 'URL: ');
define('_AM_PUBLISHEDC', 'Published: ');
define('_AM_RUSUREDEL', 'Are you sure you want to delete this article and all its comments?');
define('_AM_YES', 'Yes');
define('_AM_NO', 'No');
define('_AM_INTROTEXT', 'Intro Text');
define('_AM_EXTEXT', 'Extended Text');
define('_AM_ALLOWEDHTML', 'Allowed HTML:');
define('_AM_DISAMILEY', 'Disable Smiley');
define('_AM_DISHTML', 'Disable HTML');
define('_AM_APPROVE', 'Approve');
define('_AM_MOVETOTOP', 'Move this story to top');
define('_AM_CHANGEDATETIME', 'Change the date/time of publication');
define('_AM_NOWSETTIME', 'It is now set at: %s'); // %s is datetime of publish
define('_AM_CURRENTTIME', 'Current time is: %s'); // %s is the current datetime
define('_AM_SETDATETIME', 'Set the date/time of publish');
define('_AM_MONTHC', 'Month:');
define('_AM_DAYC', 'Day:');
define('_AM_YEARC', 'Year:');
define('_AM_TIMEC', 'Time:');
define('_AM_PREVIEW', 'Preview');
define('_AM_SAVE', 'Save');
define('_AM_PUBINHOME', 'Publish in Home?');
define('_AM_ADD', 'Add');
//%%%%%% Admin Module Name Topics %%%%%
define('_AM_ADDMTOPIC', 'Add a MAIN Topic');
define('_AM_TOPICNAME', 'Topic Name');
define('_AM_MAX40CHAR', '(max: 40 characters)');
define('_AM_TOPICIMG', 'Topic Image');
define('_AM_IMGNAEXLOC', 'image name + extension located in %s');
define('_AM_FEXAMPLE', 'for example: games.gif');
define('_AM_ADDSUBTOPIC', 'Add a SUB-Topic');
define('_AM_IN', 'in');
define('_AM_MODIFYTOPIC', 'Modify Topic');
define('_AM_MODIFY', 'Modify');
define('_AM_PARENTTOPIC', 'Parent Topic');
define('_AM_SAVECHANGE', 'Save Changes');
define('_AM_DEL', 'Delete');
define('_AM_CANCEL', 'Cancel');
define('_AM_WAYSYWTDTTAL', 'WARNING: Are you sure you want to delete this Topic and ALL its Stories and Comments?');
// Added in Beta6
define('_AM_TOPICSMNGR', 'Topics Manager');
define('_AM_PEARTICLES', 'Post/Edit Articles');
define('_AM_NOTICIASUB', 'New Submissions');
define('_AM_POSTED', 'Posted');
define('_AM_GENERALCONF', 'General Configuration');
// Added in RC2
define('_AM_TOPICDISPLAY', 'Display Topic Image?');
define('_AM_TOPICALIGN', 'Position');
define('_AM_RIGHT', 'Right');
define('_AM_LEFT', 'Left');
define('_AM_EXPARTS', 'Expired Articles');
define('_AM_EXPIRED', 'Expired');
define('_AM_CHANGEEXPDATETIME', 'Change the date/time of expiration');
define('_AM_SETEXPDATETIME', 'Set the date/time of expiration');
define('_AM_NOWSETEXPTIME', 'It is now set at: %s');
// Added in RC3
define('_AM_ERRORTOPICNAME', 'You must enter a topic name!');
define('_AM_EMPTYNODELETE', 'Nothing to delete!');
// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'Submit/Approve Permissions');
define('_AM_SELFILE', 'Select file');
// Added by Hervé
define('_AM_UPLOAD_DBERROR_SAVE', 'Error while attaching file to the story');
define('_AM_UPLOAD_ERROR', 'Error while uploading the file');
define('_AM_UPLOAD_ATTACHFILE', 'Attached file(s)');
define('_AM_APPROVEFORM', 'Approve Permissions');
define('_AM_SUBMITFORM', 'Submit Permissions');
define('_AM_VIEWFORM', 'View Permissions');
define('_AM_APPROVEFORM_DESC', 'Select, who can approve noticias');
define('_AM_SUBMITFORM_DESC', 'Select, who can submit noticias');
define('_AM_VIEWFORM_DESC', 'Select, who can view which topics');
define('_AM_DELETE_SELFILES', 'Delete selected files');
define('_AM_TOPIC_PICTURE', 'Upload picture');
define('_AM_UPLOAD_WARNING', '<B>Warning, do not forget to apply write permissions to the following folder : %s</B>');
define('_AM_NOTICIAS_UPGRADE', 'Upgrade');
define('_AM_NOTICIAS_UPGRADECOMPLETE', 'Upgrade Complete');
define('_AM_NOTICIAS_UPGRADEFAILED', 'Upgrade Failed');
define('_AM_UPDATEMODULE', 'Update Module templates and blocks');
