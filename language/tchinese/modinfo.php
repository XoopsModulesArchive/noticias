<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:16:28 mikhail Exp $
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', '新聞區');

// A brief description of this module
define('_MI_NOTICIAS_DESC', '張貼網站新聞的地方.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', '新聞分類區塊');
define('_MI_NOTICIAS_BNAME3', '重大消息區塊');
define('_MI_NOTICIAS_BNAME4', '熱門新聞區塊');
define('_MI_NOTICIAS_BNAME5', '最新新聞區塊');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', '發布新聞');
define('_MI_NOTICIAS_SMNAME2', '分月新聞');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', '分類管理');
define('_MI_NOTICIAS_ADMENU3', '發表/編輯 新聞');

// Title of config items
define('_MI_STORYHOME', '設定首頁要顯示多少新聞');
define('_MI_NOTIFYSUBMIT', '設定是否要通知網主有新的新聞');
define('_MI_DISPLAYNAV', '設定是否每頁顯示導引區塊');
define('_MI_ANONPOST', '匿名者可提供新聞嗎?');
define('_MI_AUTOAPPROVE', '自動發布網友提供的新聞?');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', '新聞全域通知');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', '新聞區全域通知項目.');

define('_MI_NOTICIAS_STORY_NOTIFY', '新聞發布通知');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', '新聞發布通知項目.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', '新聞分類通知');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', '有新的新聞分類時通知我.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', '接受新的新聞分類建立通知.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} 自動提醒通知 : 新的新聞分類');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', '新聞待審通知');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', '有使用者提供新聞待審時通知我.');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', '接受新聞待審通知.');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} 自動提醒通知 : 新的新聞待審');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', '新聞發布通知');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', '有新的新聞發布時通知我.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', '接受新聞發布通知.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} 自動提醒通知 : 新的新聞已發布');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', '新聞核准通知');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', '新聞通過審核發布時通知我.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', '接受新聞核准發布通知.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} 自動提醒通知 : 新聞已核准發布');
