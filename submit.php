<?php

// $Id: submit.php,v 1.1 2006/03/27 15:15:16 mikhail Exp $
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
require_once dirname(__DIR__, 2) . '/mainfile.php';
require_once __DIR__ . '/class/class.noticiasstory.php';
require_once __DIR__ . '/class/class.sfiles.php';
require_once XOOPS_ROOT_PATH . '/class/uploader.php';
require_once XOOPS_ROOT_PATH . '/header.php';
if (file_exists(XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/admin.php')) {
    require_once __DIR__ . '/language/' . $xoopsConfig['language'] . '/admin.php';
} else {
    require_once __DIR__ . '/language/english/admin.php';
}

$module_id = $xoopsModule->getVar('mid');

if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
} else {
    $groups = XOOPS_GROUP_ANONYMOUS;
}

$gpermHandler = xoops_getHandler('groupperm');

$perm_itemid = $POST['topic_id'] ?? 0;
//If no access
if (!$gpermHandler->checkRight('noticias_submit', $perm_itemid, $groups, $module_id)) {
    redirect_header('index.php', 3, _NOPERM);
}
$op = 'form';
foreach ($_POST as $k => $v) {
    ${$k} = $v;
}

//If approve privileges
$approveprivilege = 0;
if ($gpermHandler->checkRight('noticias_approve', $perm_itemid, $groups, $module_id)) {
    $approveprivilege = 1;
}

if (isset($_POST['preview'])) {
    $op = 'preview';
} elseif (isset($_POST['post'])) {
    $op = 'post';
} elseif (isset($_GET['op']) && isset($_GET['storyid'])) {
    if ($approveprivilege && 'edit' == $_GET['op']) {
        $op = 'edit';

        $storyid = $_GET['storyid'];
    } elseif ($approveprivilege && 'delete' == $_GET['op']) {
        $op = 'delete';

        $storyid = $_GET['storyid'];
    } else {
        redirect_header('index.php', 0, _NOPERM);
    }
}
switch ($op) {
    case 'edit':
        if (!$approveprivilege) {
            redirect_header('index.php', 0, _NOPERM);

            break;
        }
        echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";
        echo '<h4>' . _AM_EDITARTICLE . '</h4>';
        $story = new noticiasStory($storyid);
        $title = $story->title('Edit');
        $hometext = $story->hometext('Edit');
        $bodytext = $story->bodytext('Edit');
        $nohtml = $story->nohtml();
        $nosmiley = $story->nosmiley();
        $ihome = $story->ihome();
        $notifypub = 0;
        $topicid = $story->topicid();
        $approve = 0;
        $published = $story->published();
        if (isset($published) && $published > 0) {
            $approve = 1;
        }
        if (0 != $story->published()) {
            $published = $story->published();
        }
        if (0 != $story->expired()) {
            $expired = $story->expired();
        } else {
            $expired = 0;
        }
        $type = $story->type();
        $topicdisplay = $story->topicdisplay();
        $topicalign = $story->topicalign(false);
        $isedit = 1;
        include 'include/storyform.inc.php';
        echo '</td></tr></table>';
        break;
    case 'preview':
        $xt = new XoopsTopic($xoopsDB->prefix('topics'), $_POST['topic_id']);
        if (isset($storyid)) {
            $story = new noticiasStory($storyid);

            $published = $story->published();

            $expired = $story->expired();
        } else {
            $story = new noticiasStory();

            $published = 0;

            $expired = 0;
        }
        $topicid = $topic_id;
        $story->setTitle($title);
        $story->setHometext($hometext);
        if ($approveprivilege) {
            $story->setTopicdisplay($topicdisplay);

            $story->setTopicalign($topicalign);

            $story->setBodytext($bodytext);
        } else {
            $noname = isset($noname) ? (int)$noname : 0;
        }
        $notifypub = isset($notifypub) ? (int)$notifypub : 0;

        if (isset($nosmiley) && (0 == $nosmiley || 1 == $nosmiley)) {
            $story->setNosmiley($nosmiley);
        } else {
            $nosmiley = 0;
        }
        if ($approveprivilege) {
            $nohtml = isset($nohtml) ? (int)$nohtml : 0;

            $story->setNohtml($nohtml);

            if (!isset($approve)) {
                $approve = 0;
            }
        } else {
            $story->setNohtml = 1;
        }

        $title = $story->title('InForm');
        $hometext = $story->hometext('InForm');
        if ($approveprivilege) {
            $bodytext = $story->bodytext('InForm');

            $ihome = $story->ihome();
        }

        //Display post preview
        $p_title = $story->title('Preview');
        $p_hometext = $story->hometext('Preview');
        if ($approveprivilege) {
            $p_bodytext = $story->bodytext('Preview');

            $p_hometext .= $p_bodytext;
        }
        $topicalign = isset($story->topicalign) ? 'align="' . $story->topicalign() . '"' : '';
        $p_hometext = (('' != $xt->topic_imgurl()) && $topicdisplay) ? '<img src="images/topics/' . $xt->topic_imgurl() . '" ' . $topicalign . ' alt="">' . $p_hometext : $p_hometext;
        themecenterposts($p_title, $p_hometext);

        //Display post edit form
        require __DIR__ . '/include/storyform.inc.php';
        break;
    case 'post':
        $nohtml_db = 1;
        if (is_object($xoopsUser)) {
            $uid = $xoopsUser->getVar('uid');

            if ($xoopsUser->isAdmin($xoopsModule->mid())) {
                $nohtml_db = empty($nohtml) ? 0 : 1;
            }
        } else {
            if (1 == $xoopsModuleConfig['anonpost']) {
                $uid = 0;
            } else {
                redirect_header('index.php', 3, _NOPERM);

                exit();
            }
        }
        if (empty($storyid)) {
            $story = new noticiasStory();

            $story->setUid($xoopsUser->uid());
        } else {
            $story = new noticiasStory($storyid);
        }
        $story->setTitle($title);
        $story->setHometext($hometext);
        $story->setUid($uid);
        $story->setTopicId($topic_id);
        $story->setHostname(xoops_getenv('REMOTE_ADDR'));
        $story->setNohtml($nohtml_db);
        $nosmiley = isset($nosmiley) ? (int)$nosmiley : 0;
        $notifypub = isset($notifypub) ? (int)$notifypub : 0;
        $story->setNosmiley($nosmiley);
        $story->setNotifyPub($notifypub);
        $story->setType($type);
        if (!empty($autodate) && $approveprivilege) {
            //TODO: Change to fit XoopsFormDateTime result

            $pubdate = strtotime($publish_date['date']) + $publish_date['time'];

            $offset = $xoopsUser->timezone() - $xoopsConfig['server_TZ'];

            $pubdate -= ($offset * 3600);

            $story->setPublished($pubdate);
        }
        if (!empty($autoexpdate) && $approveprivilege) {
            $expiry_date = strtotime($expiry_date['date']) + $expiry_date['time'];

            $offset = $xoopsUser->timezone() - $xoopsConfig['server_TZ'];

            $expiry_date -= ($offset * 3600);

            $story->setExpired($expiry_date);
        } else {
            $story->setExpired(0);
        }
        if ($approveprivilege) {
            $story->setTopicdisplay($topicdisplay);

            $story->setTopicalign($topicalign);

            if ($bodytext) {
                $story->setBodytext($bodytext);
            } else {
                $story->setBodytext(' ');
            }

            $approve = $approve ?? 0;

            if (!$story->published()) {
                $story->setPublished(time());
            }

            if (!$story->expired()) {
                $story->setExpired(0);
            }
        } elseif (1 == $xoopsModuleConfig['autoapprove'] && !$approveprivilege) {
            $approve = 1;

            $story->setPublished(time());

            $story->setExpired(0);

            $story->setTopicalign('R');
        } else {
            $approve = 0;
        }
        $story->setApproved($approve);
        $result = $story->store();

        if ($result) {
            // Notification

            $notificationHandler = xoops_getHandler('notification');

            $tags = [];

            $tags['STORY_NAME'] = $title;

            $tags['STORY_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/article.php?storyid=' . $story->storyid();

            if (1 == $approve) {
                $notificationHandler->triggerEvent('global', 0, 'new_story', $tags);
            } else {
                $tags['WAITINGSTORIES_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/admin/index.php?op=newarticle';

                $notificationHandler->triggerEvent('global', 0, 'story_submit', $tags);
            }

            // If notify checkbox is set, add subscription for approve

            if ($notifypub) {
                require_once XOOPS_ROOT_PATH . '/include/notification_constants.php';

                $notificationHandler->subscribe('story', $story->storyid(), 'approve', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE);
            }
        } else {
            echo _ERRORS;
        }

        // Manage upload(s)
        if (isset($_POST['delupload']) && count($_POST['delupload']) > 0) {
            foreach ($_POST['delupload'] as $onefile) {
                $sfiles = new sFiles($onefile);

                $sfiles->delete();
            }
        }

        if (isset($_POST['xoops_upload_file'])) {
            $fldname = $HTTP_POST_FILES[$_POST['xoops_upload_file'][0]];

            $fldname = (get_magic_quotes_gpc()) ? stripslashes($fldname['name']) : $fldname['name'];

            if (trim('' != $fldname)) {
                $sfiles = new sFiles();

                $destname = $sfiles->createUploadName(XOOPS_UPLOAD_PATH, $fldname);

                // Actually : Web pictures (png, gif, jpeg), zip, doc, xls, pdf, gtar, tar

                $permittedtypes = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png', 'application/x-zip-compressed', 'application/msword', 'application/vnd.ms-excel', 'application/pdf', 'application/x-gtar', 'application/x-tar'];

                $uploader = new XoopsMediaUploader(XOOPS_UPLOAD_PATH, $permittedtypes, $xoopsModuleConfig['maxuploadsize']);

                $uploader->setTargetFileName($destname);

                if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
                    if ($uploader->upload()) {
                        $sfiles->setFileRealName($uploader->getMediaName());

                        $sfiles->setStoryid($story->storyid());

                        $sfiles->setMimetype($sfiles->giveMimetype(XOOPS_UPLOAD_PATH . '/' . $uploader->getMediaName()));

                        $sfiles->setDownloadname($destname);

                        if (!$sfiles->store()) {
                            echo _AM_UPLOAD_DBERROR_SAVE;
                        }
                    } else {
                        echo _AM_UPLOAD_ERROR;
                    }
                } else {
                    echo $uploader->getErrors();
                }
            }
        }
        redirect_header('index.php', 2, _NW_THANKS);
        break;
    case 'form':
    default:
        $xt = new XoopsTopic($xoopsDB->prefix('topics'));
        $title = '';
        $hometext = '';
        $noname = 0;
        $nohtml = 0;
        $nosmiley = 0;
        $notifypub = 1;
        $topicid = 0;
        if ($approveprivilege) {
            $topicdisplay = 0;

            $topicalign = 'R';

            $ihome = 0;

            $bodytext = '';

            $approve = 0;

            $autodate = '';

            $expired = 0;

            $published = 0;
        }

        require __DIR__ . '/include/storyform.inc.php';
        break;
}
require XOOPS_ROOT_PATH . '/footer.php';
