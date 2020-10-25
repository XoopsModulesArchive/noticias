<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:15:29 mikhail Exp $
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', '新闻动态');

// A brief description of this module
define('_MI_NOTICIAS_DESC', '新闻发布区');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', '新闻分类');
define('_MI_NOTICIAS_BNAME3', '重大消息');
define('_MI_NOTICIAS_BNAME4', '热门新闻');
define('_MI_NOTICIAS_BNAME5', '最新消息');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', '新闻发布');
define('_MI_NOTICIAS_SMNAME2', '按月归档');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', '分类管理');
define('_MI_NOTICIAS_ADMENU3', '发表/编辑新闻');

// Title of config items
define('_MI_STORYHOME', '首页要显示多少条新闻');
define('_MI_NOTIFYSUBMIT', '是否要通知管理员有新提交的新闻');
define('_MI_DISPLAYNAV', '是否每页显示导航区块');
define('_MI_ANONPOST', '允许游客提供新闻?');
define('_MI_AUTOAPPROVE', '自动发布网友提供的新闻?');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', '全局通知');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', '应用到整个新闻模块的通知选项.');

define('_MI_NOTICIAS_STORY_NOTIFY', '当前分类-新消息');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', '应用到当前分类的通知选项.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', '新分类');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', '当有新的新闻分类创建时，通知我.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', '当有新的新闻分类创建时，接收通知.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}]“{X_MODULE}”自动通知: 新的[新闻]分类');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', '新条目提交');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', '当有任何文章提交(等待审核)，通知我.');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'R当有任何文章提交(等待审核)，接收通知.');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}]“{X_MODULE}”自动通知: 有新文章提交');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', '新文章发布');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', '当有新的文章发布时，通知我.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', '当有任何新文章发布，接收通知.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}]“{X_MODULE}”自动通知: 有新文章发布');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', '通过审核');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', '当该文章通过审核时，通知我.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', '当该文章通过审核时，接收通知.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}]“{X_MODULE}”自动通知: 文章审核通过');
