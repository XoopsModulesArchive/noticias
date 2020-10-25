<?php

// $Id: storyform.inc.php,v 1.1 2006/03/27 15:15:22 mikhail Exp $
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
if (file_exists(XOOPS_ROOT_PATH . '/language/' . $xoopsConfig['language'] . '/calendar.php')) {
    require_once XOOPS_ROOT_PATH . '/language/' . $xoopsConfig['language'] . '/calendar.php';
} else {
    require_once XOOPS_ROOT_PATH . '/language/english/calendar.php';
}
require XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
$sform = new XoopsThemeForm(_NW_SUBMITNOTICIAS, 'storyform', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/submit.php');
$sform->setExtra('enctype="multipart/form-data"');
$sform->addElement(new XoopsFormText(_NW_TITLE, 'title', 50, 80, $title), true);

//Todo: Change to only display topics, which a user has submit privileges for
if (!isset($xt)) {
    $xt = new XoopsTopic($xoopsDB->prefix('topics'));
}
ob_start();
$xt->makeTopicSelBox(0, $topicid);
$sform->addElement(new XoopsFormLabel(_NW_TOPIC, ob_get_contents()));
ob_end_clean();

//If admin - show admin form
//TODO: Change to "If submit privilege"
if ($approveprivilege) {
    //Show topic image?

    $sform->addElement(new XoopsFormRadioYN(_AM_TOPICDISPLAY, 'topicdisplay', $topicdisplay));

    //Select image position

    $posselect = new XoopsFormSelect(_AM_TOPICALIGN, 'topicalign', $topicalign);

    $posselect->addOption('R', _AM_RIGHT);

    $posselect->addOption('L', _AM_LEFT);

    $sform->addElement($posselect);

    //Publish in home?

    //TODO: Check that pubinhome is 0 = no and 1 = yes (currently vice versa)

    $sform->addElement(new XoopsFormRadioYN(_AM_PUBINHOME, 'ihome', $ihome, _NO, _YES));
}

$sform->addElement(new XoopsFormDhtmlTextArea(_NW_THESCOOP, 'hometext', $hometext, 15, 60, 'hometext_hidden'), true);

//Extra info
//If admin -> if submit privilege
if ($approveprivilege) {
    $sform->addElement(new XoopsFormDhtmlTextArea(_AM_EXTEXT, 'bodytext', $bodytext, 15, 60, 'bodytext_hidden'), false);
}

// Manage upload(s)
$allowupload = false;
switch ($xoopsModuleConfig['uploadgroups']) {
    case 1: //Submitters and Approvers
        $allowupload = true;
        break;
    case 2: //Approvers only
        $allowupload = $approveprivilege ? true : false;
        break;
    case 3: //Upload Disabled
        $allowupload = false;
        break;
}

if ($allowupload) {
    if ('edit' == $op) {
        $sfiles = new sFiles();

        $filesarr = [];

        $filesarr = $sfiles->getAllbyStory($storyid);

        if (count($filesarr) > 0) {
            $upl_tray = new XoopsFormElementTray(_AM_UPLOAD_ATTACHFILE, '<br>');

            $upl_checkbox = new XoopsFormCheckBox('', 'delupload[]');

            foreach ($filesarr as $onefile) {
                $link = sprintf("<a href='%s/%s' target='_blank'>%s</a>\n", XOOPS_UPLOAD_URL, $onefile->getDownloadname('S'), $onefile->getFileRealName('S'));

                $upl_checkbox->addOption($onefile->getFileid(), $link);
            }

            $upl_tray->addElement($upl_checkbox, false);

            $dellabel = new XoopsFormLabel(_AM_DELETE_SELFILES, '');

            $upl_tray->addElement($dellabel, false);

            $sform->addElement($upl_tray);
        }
    }

    $sform->addElement(new XoopsFormFile(_AM_SELFILE, 'attachedfile', $xoopsModuleConfig['maxuploadsize']), false);
}

$option_tray = new XoopsFormElementTray(_OPTIONS, '<br>');
//Set date of publish/expiration
if ($approveprivilege) {
    $approve_checkbox = new XoopsFormCheckBox('', 'approve', $approve);

    $approve_checkbox->addOption(1, _AM_APPROVE);

    $option_tray->addElement($approve_checkbox);

    $published_checkbox = new XoopsFormCheckBox('', 'autodate');

    $published_checkbox->addOption(1, _AM_SETDATETIME);

    $option_tray->addElement($published_checkbox);

    $option_tray->addElement(new XoopsFormDateTime(_AM_SETDATETIME, 'publish_date', 15, $published));

    $expired_checkbox = new XoopsFormCheckBox('', 'autoexpdate');

    $expired_checkbox->addOption(1, _AM_SETEXPDATETIME);

    $option_tray->addElement($expired_checkbox);

    $option_tray->addElement(new XoopsFormDateTime(_AM_SETEXPDATETIME, 'expiry_date', 15, $expired));
}

if (is_object($xoopsUser)) {
    if (isset($xoopsConfig['anonpost']) && 1 == $xoopsConfig['anonpost']) {
        $noname_checkbox = new XoopsFormCheckBox('', 'noname', $noname);

        $noname_checkbox->addOption(1, _POSTANON);

        $option_tray->addElement($noname_checkbox);
    }

    $notify_checkbox = new XoopsFormCheckBox('', 'notifypub', $notifypub);

    $notify_checkbox->addOption(1, _NW_NOTIFYPUBLISH);

    $option_tray->addElement($notify_checkbox);

    if ($xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
        $nohtml_checkbox = new XoopsFormCheckBox('', 'nohtml', $nohtml);

        $nohtml_checkbox->addOption(1, _DISABLEHTML);

        $option_tray->addElement($nohtml_checkbox);
    }
}
$smiley_checkbox = new XoopsFormCheckBox('', 'nosmiley', $nosmiley);
$smiley_checkbox->addOption(1, _DISABLESMILEY);
$option_tray->addElement($smiley_checkbox);

$sform->addElement($option_tray);

//TODO: Approve checkbox + "Move to top" if editing + Edit indicator

//Submit buttons
$button_tray = new XoopsFormElementTray('', '');
$preview_btn = new XoopsFormButton('', 'preview', _PREVIEW, 'submit');
$preview_btn->setExtra('accesskey="p"');
$button_tray->addElement($preview_btn);
$submit_btn = new XoopsFormButton('', 'post', _NW_POST, 'submit');
$submit_btn->setExtra('accesskey="s"');
$button_tray->addElement($submit_btn);
$sform->addElement($button_tray);

//Hidden variables
if (isset($storyid)) {
    $storyid_hidden = new XoopsFormHidden('storyid', $storyid);

    $sform->addElement($storyid_hidden);
}
if (!isset($type)) {
    if ($approveprivilege) {
        $type = 'admin';
    } else {
        $type = 'user';
    }
}
$type_hidden = new XoopsFormHidden('type', $type);
$sform->addElement($type_hidden);
$sform->display();
