<?php

// $Id: xoops_version.php,v 1.1 2006/03/27 15:15:16 mikhail Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://xoopscube.org>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

$modversion['name'] = _MI_NOTICIAS_NAME;
$modversion['version'] = 1.2;
$modversion['description'] = _MI_NOTICIAS_DESC;
$modversion['credits'] = 'The XOOPS Project';
$modversion['help'] = 'noticias.html';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 1;
$modversion['image'] = 'images/noticias_slogo.png';
$modversion['dirname'] = 'noticias';

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
//$modversion['sqlfile']['postgresql'] = "sql/pgsql.sql";

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'stories';
$modversion['tables'][1] = 'topics';
$modversion['tables'][2] = 'stories_files';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Templates
$modversion['templates'][1]['file'] = 'noticias_item.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'noticias_archive.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'noticias_article.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'noticias_index.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'noticias_by_topic.html';
$modversion['templates'][5]['description'] = '';

// Blocks
$modversion['blocks'][1]['file'] = 'noticias_topics.php';
$modversion['blocks'][1]['name'] = _MI_NOTICIAS_BNAME1;
$modversion['blocks'][1]['description'] = 'Shows noticias topics';
$modversion['blocks'][1]['show_func'] = 'b_noticias_topics_show';
$modversion['blocks'][1]['template'] = 'noticias_block_topics.html';

$modversion['blocks'][2]['file'] = 'noticias_bigstory.php';
$modversion['blocks'][2]['name'] = _MI_NOTICIAS_BNAME3;
$modversion['blocks'][2]['description'] = 'Shows most read story of the day';
$modversion['blocks'][2]['show_func'] = 'b_noticias_bigstory_show';
$modversion['blocks'][2]['template'] = 'noticias_block_bigstory.html';

$modversion['blocks'][3]['file'] = 'noticias_top.php';
$modversion['blocks'][3]['name'] = _MI_NOTICIAS_BNAME4;
$modversion['blocks'][3]['description'] = 'Shows top read noticias articles';
$modversion['blocks'][3]['show_func'] = 'b_noticias_top_show';
$modversion['blocks'][3]['edit_func'] = 'b_noticias_top_edit';
$modversion['blocks'][3]['options'] = 'counter|10|25|0';
$modversion['blocks'][3]['template'] = 'noticias_block_top.html';

$modversion['blocks'][4]['file'] = 'noticias_top.php';
$modversion['blocks'][4]['name'] = _MI_NOTICIAS_BNAME5;
$modversion['blocks'][4]['description'] = 'Shows recent articles';
$modversion['blocks'][4]['show_func'] = 'b_noticias_top_show';
$modversion['blocks'][4]['edit_func'] = 'b_noticias_top_edit';
$modversion['blocks'][4]['options'] = 'published|10|25|0';
$modversion['blocks'][4]['template'] = 'noticias_block_new.html';

$modversion['blocks'][5]['file'] = 'noticias_moderate.php';
$modversion['blocks'][5]['name'] = _MI_NOTICIAS_BNAME6;
$modversion['blocks'][5]['description'] = 'Shows a block to moderate articles';
$modversion['blocks'][5]['show_func'] = 'b_noticias_topics_moderate';
$modversion['blocks'][5]['template'] = 'noticias_block_moderate.html';

$modversion['blocks'][6]['file'] = 'noticias_topicsnav.php';
$modversion['blocks'][6]['name'] = _MI_NOTICIAS_BNAME7;
$modversion['blocks'][6]['description'] = 'Shows a block to navigate topics';
$modversion['blocks'][6]['show_func'] = 'b_noticias_topicsnav_show';
$modversion['blocks'][6]['edit_func'] = 'b_noticias_topicsnav_edit';
$modversion['blocks'][6]['template'] = 'noticias_block_topicnav.html';

// Menu
$modversion['hasMain'] = 1;

$cansubmit = 0;

$moduleHandler = xoops_getHandler('module');
$module = $moduleHandler->getByDirname($modversion['dirname']);
//Get config for noticias module
if ($module) {
    global $xoopsUser;

    if (is_object($xoopsUser)) {
        $groups = $xoopsUser->getGroups();
    } else {
        $groups = XOOPS_GROUP_ANONYMOUS;
    }

    $gpermHandler = xoops_getHandler('groupperm');

    if ($gpermHandler->checkRight('noticias_submit', 0, $groups, $module->getVar('mid'))) {
        $cansubmit = 1;
    }
}
if ($cansubmit) {
    $modversion['sub'][1]['name'] = _MI_NOTICIAS_SMNAME1;

    $modversion['sub'][1]['url'] = 'submit.php';
}
unset($cansubmit);

$modversion['sub'][2]['name'] = _MI_NOTICIAS_SMNAME2;
$modversion['sub'][2]['url'] = 'archive.php';

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'noticias_search';

// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['pageName'] = 'article.php';
$modversion['comments']['itemName'] = 'storyid';
// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'noticias_com_approve';
$modversion['comments']['callback']['update'] = 'noticias_com_update';

// Config Settings (only for modules that need config settings generated automatically)

// name of config option for accessing its specified value. i.e. $xoopsModuleConfig['storyhome']
$modversion['config'][1]['name'] = 'storyhome';

// title of this config option displayed in config settings form
$modversion['config'][1]['title'] = '_MI_STORYHOME';

// description of this config option displayed under title
$modversion['config'][1]['description'] = '_MI_STORYHOMEDSC';

// form element type used in config form for this option. can be one of either textbox, textarea, select, select_multi, yesno, group, group_multi
$modversion['config'][1]['formtype'] = 'select';

// value type of this config option. can be one of either int, text, float, array, or other
// form type of group_multi, select_multi must always be value type of array
$modversion['config'][1]['valuetype'] = 'int';

// the default value for this option
// ignore it if no default
// 'yesno' formtype must be either 0(no) or 1(yes)
$modversion['config'][1]['default'] = 5;

// options to be displayed in selection box
// required and valid for 'select' or 'select_multi' formtype option only
// language constants can be used for array key, otherwise use integer
$modversion['config'][1]['options'] = ['5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30];

/*
$modversion['config'][2]['name'] = 'notifysubmit';
$modversion['config'][2]['title'] = '_MI_NOTIFYSUBMIT';
$modversion['config'][2]['description'] = '_MI_NOTIFYSUBMITDSC';
$modversion['config'][2]['formtype'] = 'yesno';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = 1;
*/

$modversion['config'][3]['name'] = 'displaynav';
$modversion['config'][3]['title'] = '_MI_DISPLAYNAV';
$modversion['config'][3]['description'] = '_MI_DISPLAYNAVDSC';
$modversion['config'][3]['formtype'] = 'yesno';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 1;

$modversion['config'][4]['name'] = 'anonpost';
$modversion['config'][4]['title'] = '_MI_ANONPOST';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype'] = 'yesno';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = 0;

$modversion['config'][5]['name'] = 'autoapprove';
$modversion['config'][5]['title'] = '_MI_AUTOAPPROVE';
$modversion['config'][5]['description'] = '_MI_AUTOAPPROVEDSC';
$modversion['config'][5]['formtype'] = 'yesno';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = 0;

$modversion['config'][6]['name'] = 'noticiasdisplay';
$modversion['config'][6]['title'] = '_MI_NOTICIASDISPLAY';
$modversion['config'][6]['description'] = '_MI_NOTICIASDISPLAYDESC';
$modversion['config'][6]['formtype'] = 'select';
$modversion['config'][6]['valuetype'] = 'text';
$modversion['config'][6]['default'] = 'Classic';
$modversion['config'][6]['options'] = [
    '_MI_NOTICIASCLASSIC' => 'Classic',
'_MI_NOTICIASBYTOPIC' => 'Bytopic',
];

// For Author's name
$modversion['config'][7]['name'] = 'displayname';
$modversion['config'][7]['title'] = '_MI_NAMEDISPLAY';
$modversion['config'][7]['description'] = '_MI_ADISPLAYNAMEDSC';
$modversion['config'][7]['formtype'] = 'select';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = 1;
$modversion['config'][7]['options'] = ['_MI_DISPLAYNAME1' => 1, '_MI_DISPLAYNAME2' => 2, '_MI_DISPLAYNAME3' => 3];

$modversion['config'][8]['name'] = 'columnmode';
$modversion['config'][8]['title'] = '_MI_COLUMNMODE';
$modversion['config'][8]['description'] = '_MI_COLUMNMODE_DESC';
$modversion['config'][8]['formtype'] = 'select';
$modversion['config'][8]['valuetype'] = 'int';
$modversion['config'][8]['default'] = 1;
$modversion['config'][8]['options'] = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];

$modversion['config'][9]['name'] = 'storycountadmin';
$modversion['config'][9]['title'] = '_MI_STORYCOUNTADMIN';
$modversion['config'][9]['description'] = '_MI_STORYCOUNTADMIN_DESC';
$modversion['config'][9]['formtype'] = 'select';
$modversion['config'][9]['valuetype'] = 'int';
$modversion['config'][9]['default'] = 10;
$modversion['config'][9]['options'] = ['5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '35' => 35, '40' => 40];

$modversion['config'][10]['name'] = 'uploadgroups';
$modversion['config'][10]['title'] = '_MI_UPLOADGROUPS';
$modversion['config'][10]['description'] = '_MI_UPLOADGROUPS_DESC';
$modversion['config'][10]['formtype'] = 'select';
$modversion['config'][10]['valuetype'] = 'int';
$modversion['config'][10]['default'] = 2;
$modversion['config'][10]['options'] = ['_MI_UPLOAD_GROUP1' => 1, '_MI_UPLOAD_GROUP2' => 2, '_MI_UPLOAD_GROUP3' => 3];

$modversion['config'][11]['name'] = 'maxuploadsize';
$modversion['config'][11]['title'] = '_MI_UPLOADFILESIZE';
$modversion['config'][11]['description'] = '_MI_UPLOADFILESIZE_DESC';
$modversion['config'][11]['formtype'] = 'texbox';
$modversion['config'][11]['valuetype'] = 'int';
$modversion['config'][11]['default'] = 1048576;

$modversion['config'][12]['name'] = 'restrictindex';
$modversion['config'][12]['title'] = '_MI_RESTRICTINDEX';
$modversion['config'][12]['description'] = '_MI_RESTRICTINDEXDSC';
$modversion['config'][12]['formtype'] = 'yesno';
$modversion['config'][12]['valuetype'] = 'int';
$modversion['config'][12]['default'] = 0;

// Notification
$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'noticias_notify_iteminfo';

$modversion['notification']['category'][1]['name'] = 'global';
$modversion['notification']['category'][1]['title'] = _MI_NOTICIAS_GLOBAL_NOTIFY;
$modversion['notification']['category'][1]['description'] = _MI_NOTICIAS_GLOBAL_NOTIFYDSC;
$modversion['notification']['category'][1]['subscribe_from'] = ['index.php', 'article.php'];

$modversion['notification']['category'][2]['name'] = 'story';
$modversion['notification']['category'][2]['title'] = _MI_NOTICIAS_STORY_NOTIFY;
$modversion['notification']['category'][2]['description'] = _MI_NOTICIAS_STORY_NOTIFYDSC;
$modversion['notification']['category'][2]['subscribe_from'] = ['article.php'];
$modversion['notification']['category'][2]['item_name'] = 'storyid';
$modversion['notification']['category'][2]['allow_bookmark'] = 1;

$modversion['notification']['event'][1]['name'] = 'new_category';
$modversion['notification']['event'][1]['category'] = 'global';
$modversion['notification']['event'][1]['title'] = _MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY;
$modversion['notification']['event'][1]['caption'] = _MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP;
$modversion['notification']['event'][1]['description'] = _MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC;
$modversion['notification']['event'][1]['mail_template'] = 'global_newcategory_notify';
$modversion['notification']['event'][1]['mail_subject'] = _MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ;

$modversion['notification']['event'][2]['name'] = 'story_submit';
$modversion['notification']['event'][2]['category'] = 'global';
$modversion['notification']['event'][2]['admin_only'] = 1;
$modversion['notification']['event'][2]['title'] = _MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY;
$modversion['notification']['event'][2]['caption'] = _MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP;
$modversion['notification']['event'][2]['description'] = _MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC;
$modversion['notification']['event'][2]['mail_template'] = 'global_storysubmit_notify';
$modversion['notification']['event'][2]['mail_subject'] = _MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][3]['name'] = 'new_story';
$modversion['notification']['event'][3]['category'] = 'global';
$modversion['notification']['event'][3]['title'] = _MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY;
$modversion['notification']['event'][3]['caption'] = _MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP;
$modversion['notification']['event'][3]['description'] = _MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC;
$modversion['notification']['event'][3]['mail_template'] = 'global_noticiastory_notify';
$modversion['notification']['event'][3]['mail_subject'] = _MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ;

$modversion['notification']['event'][4]['name'] = 'approve';
$modversion['notification']['event'][4]['category'] = 'story';
$modversion['notification']['event'][4]['invisible'] = 1;
$modversion['notification']['event'][4]['title'] = _MI_NOTICIAS_STORY_APPROVE_NOTIFY;
$modversion['notification']['event'][4]['caption'] = _MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP;
$modversion['notification']['event'][4]['description'] = _MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC;
$modversion['notification']['event'][4]['mail_template'] = 'story_approve_notify';
$modversion['notification']['event'][4]['mail_subject'] = _MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ;
