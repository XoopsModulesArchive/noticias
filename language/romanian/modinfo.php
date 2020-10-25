<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:16:22 mikhail Exp $
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', 'noticias');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Creates a Slashdot-like noticias section, where users can post noticias/comments.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'noticias Topics');
define('_MI_NOTICIAS_BNAME3', 'Big Story');
define('_MI_NOTICIAS_BNAME4', 'Top noticias');
define('_MI_NOTICIAS_BNAME5', 'Recent noticias');
define('_MI_NOTICIAS_BNAME6', 'Moderate noticias');
define('_MI_NOTICIAS_BNAME7', 'Navigate thru topics');
define('_MI_NOTICIAS_BNAME8', 'Recent articles in a topic');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Submit noticias');
define('_MI_NOTICIAS_SMNAME2', 'Archive');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Topics Manager');
define('_MI_NOTICIAS_ADMENU3', 'Post/Edit noticias');
define('_MI_NOTICIAS_GROUPPERMS', 'Submit/Approve Permissions');

// Title of config items
define('_MI_STORYHOME', 'Select the number of noticias items to display on top page');
define('_MI_NOTIFYSUBMIT', 'Select yes to send notification message to webmaster upon new submission');
define('_MI_DISPLAYNAV', 'Select yes to display navigation box at the top of each noticias page');
define('_MI_ANONPOST', 'Allow anonymous users to post noticias articles?');
define('_MI_AUTOAPPROVE', 'Auto approve noticias stories without admin intervention?');
define('_MI_ALLOWEDSUBMITGROUPS', 'Groups who can Submit noticias');
define('_MI_ALLOWEDAPPROVEGROUPS', 'Groups who can Approve noticias');
define('_MI_NOTICIASDISPLAY', 'noticias Display Layout');
define('_MI_NAMEDISPLAY', "Author's name");
define('_MI_COLUMNMODE', 'Columns');
define('_MI_STORYCOUNTADMIN', 'Number of new articles to display in admin area: ');
define('_MI_UPLOADFILESIZE', 'MAX Filesize Upload (KB) 1048576 = 1 Meg');
define('_MI_UPLOADGROUPS', 'Authorized groups to upload');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define('_MI_ALLOWEDSUBMITGROUPSDESC', 'The selected groups will be able to submit noticias items');
define('_MI_ALLOWEDAPPROVEGROUPSDESC', 'The selected groups will be able to approve noticias items');
define('_MI_NOTICIASDISPLAYDESC', 'Classic shows all noticias ordered by date of publish. noticias by topic will group the noticias by topic with the latest story in full and the others with just the title');
define('_MI_ADISPLAYNAMEDSC', 'Select how to display the author\'s name');
define('_MI_COLUMNMODE_DESC', 'You can choose the number of columns to display articles list');
define('_MI_STORYCOUNTADMIN_DESC', '');
define('_MI_UPLOADFILESIZE_DESC', '');
define('_MI_UPLOADGROUPS_DESC', 'Select the groups who can upload to the server');

// Name of config item values
define('_MI_NOTICIASCLASSIC', 'Classic');
define('_MI_NOTICIASBYTOPIC', 'By Topic');
define('_MI_DISPLAYNAME1', 'Username');
define('_MI_DISPLAYNAME2', 'Real Name');
define('_MI_DISPLAYNAME3', 'Do not display author');
define('_MI_UPLOAD_GROUP1', 'Submitters and Approvers');
define('_MI_UPLOAD_GROUP2', 'Approvers Only');
define('_MI_UPLOAD_GROUP3', 'Upload Disabled');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Global');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Global noticias notification options.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Story');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Notification options that apply to the current story.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'New Topic');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notify me when a new topic is created.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receive notification when a new topic is created.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New noticias topic');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'New Story Submitted');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Notify me when any new story is submitted (awaiting approval).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Receive notification when any new story is submitted (awaiting approval).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New noticias story submitted');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'New Story');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Notify me when any new story is posted.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Receive notification when any new story is posted.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New noticias story');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Story Approved');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Notify me when this story is approved.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Receive notification when this story is approved.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Story approved');

define('_MI_RESTRICTINDEX', 'Restrict Topics on Index Page?');
define('_MI_RESTRICTINDEXDSC', 'If set to yes, users will only see noticias items listed in the index from the topics, they have access to as set in noticias Permissions');
