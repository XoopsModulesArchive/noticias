<?php

###############################################################################
#              From English into Vietnamese translated                        #
#             by  Nguyen Dinh Quan (webmaster@narga.tk)                       #
#      [:: Narga Vault :-: The Land Of Dreams ::] (http://www.narga.tk)       #
###############################################################################
// $Id: modinfo.php,v 1.1 2006/03/27 15:16:35 mikhail Exp $
// Module Info
define('_MI_NOTICIAS_NAME', 'Tin tức');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Biên tập tin tức.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'Tin mới nhất');
define('_MI_NOTICIAS_BNAME3', 'Bài chú ý');
define('_MI_NOTICIAS_BNAME4', 'Tin được đọc nhiều nhất');
define('_MI_NOTICIAS_BNAME5', 'Tin mới nhất');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Gửi bài');
define('_MI_NOTICIAS_SMNAME2', 'Tin cũ');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU1', 'Cấu hình chung');
define('_MI_NOTICIAS_ADMENU2', 'Thêm sửa thể loại');
define('_MI_NOTICIAS_ADMENU3', 'Viết sửa bài');

// Title of config items
define('_MI_STORYHOME', 'Chọn số bài sẽ hiển thị trên trang chủ');
define('_MI_NOTIFYSUBMIT', 'Chọn Đồng ý để nhận thông báo của quản trị.');
define('_MI_DISPLAYNAV', 'Hiển thị chọn chuyên mục tin.');
define('_MI_ANONPOST', 'Cho phép khách được gửi bài?');
define('_MI_AUTOAPPROVE', 'Tự động chấp nhận tin mới mà không cần kiểm tra nội dung ?');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Toàn bộ');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Toàn bộ các theo dõi.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Bài viết');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Tùy chọn theo dõi cho các bài viết.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Chuyên mục mới');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Thông báo khi có chuyên mục mới được tạo.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Nhận thông báo khi có chuyên mục mới được tạo.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} thông báo: chuyên mục mới vừa được tạo');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Bài mới được gửi');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Thông báo khi có bài mới được gửi (đang chờ chấp nhận).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Nhận thông báo khi có bài mới được gửi (đang chờ chấp nhận).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} thông báo: có bài mới gửi');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Bài mới');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Thông báo khi có bài mới được gửi.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Nhận thông báo khi có bài mới được gửi.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} thông báo: có bài mới gửi');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Bài được chấp nhận');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Thông báo khi có bài mới được gửi nhận.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Nhận thông báo khi có bài mới được gửi nhận.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} thông báo: bài đã được chấp nhận');
