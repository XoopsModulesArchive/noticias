<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:16:30 mikhail Exp $
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', 'Haber ve Yazýlar');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Creates a Slashdot-like noticias section, where users can post noticias/comments.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'noticias Topics');
define('_MI_NOTICIAS_BNAME3', 'Big Story');
define('_MI_NOTICIAS_BNAME4', 'Top noticias');
define('_MI_NOTICIAS_BNAME5', 'Recent noticias');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Yazý Gönder');
define('_MI_NOTICIAS_SMNAME2', 'Arþiv');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Konu Müdürü');
define('_MI_NOTICIAS_ADMENU3', 'Yazý Ekle/Düzenle');

// Title of config items
define('_MI_STORYHOME', 'Anasayfada Yazý gösterim sayýsý');
define('_MI_NOTIFYSUBMIT', 'Yeni yazý gönderildiðinde admin ve modlar uyarýlsýn mý?');
define('_MI_DISPLAYNAV', 'Yazý bölümünde navigasyon kutusu gösterimi');
define('_MI_ANONPOST', 'Ziyaretçiler yazý gönderebilsin mi?');
define('_MI_AUTOAPPROVE', 'Yazýlar admin yetkisi olmadan otomatik onaylansýn mý?');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Genel');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Genel Haber Not Ayarlarý');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Yazý');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Not ayarlarýný geçerli ve kabul olan yazýlara yap');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Yeni Konu');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Yeni konu açýlýrsa beni uyar');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Yeni konu açýlýrsa beni tekrar uyar');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Otomatik Notunuz : Yeni Haber Konusu');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Yeni Yazý Eklendi');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Yeni yazý eklenince beni uyar.(Bekleme zamaný dahil olsun)');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Receive notification when any new story is submitted (awaiting approval).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Otomatik Notunuz : Yeni yazý eklendi');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Yeni Yazý');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Siteye gönderilen her yeni yazýda beni uyar');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Uyarýmý kaldýr');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Otomatik Notunuz : Yeni yazý sitemize eklendi');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Yazý Kabul');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Bu yazý kabul edilince beni uyar');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Uyarýmý kaldýr');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Otomatik Not : Yazý Onaylandý.');
