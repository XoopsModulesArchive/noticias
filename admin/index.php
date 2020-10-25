<?php

// $Id: index.php,v 1.1 2006/03/27 15:15:15 mikhail Exp $
// ------------------------------------------------------------------------ //
// XOOPS - PHP Content Management System                      //
// Copyright (c) 2000 XOOPS.org                           //
// <http://xoopscube.org>                             //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// //
// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// //
// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //
require dirname(__DIR__, 3) . '/include/cp_header.php';
require_once XOOPS_ROOT_PATH . '/class/xoopstopic.php';
require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
require_once XOOPS_ROOT_PATH . '/modules/noticias/class/class.noticiasstory.php';
require_once XOOPS_ROOT_PATH . '/modules/noticias/class/class.sfiles.php';
require_once XOOPS_ROOT_PATH . '/class/uploader.php';
require_once 'functions.php';
$op = 'default';
if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        ${$k} = $v;
    }
}

if (isset($_GET['op'])) {
    $op = $_GET['op'];

    if (isset($_GET['storyid'])) {
        $storyid = (int)$_GET['storyid'];
    }
}

/*
 * Show new submissions
 */
function noticiasubmissions()
{
    $storyarray = noticiasStory:: getAllSubmitted();

    if (count($storyarray) > 0) {
        echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

        echo "<div style='text-align: center;'><b>"
             . _AM_NOTICIASUB
             . "</b><br><table width='100%' border='1'><tr class='bg2'><td align='center'>"
             . _AM_TITLE
             . "</td><td align='center'>"
             . _AM_POSTED
             . "</td><td align='center'>"
             . _AM_POSTER
             . "</td><td align='center'>"
             . _AM_ACTION
             . "</td></tr>\n";

        foreach ($storyarray as $noticiastory) {
            echo "<tr><td>\n";

            $title = $noticiastory->title();

            if (!isset($title) || ('' == $title)) {
                echo "<a href='index.php?op=edit&amp;storyid=" . $noticiastory->storyid() . "'>" . _AD_NOSUBJECT . "</a>\n";
            } else {
                echo "&nbsp;<a href='../submit.php?op=edit&amp;storyid=" . $noticiastory->storyid() . "'>" . $title . "</a>\n";
            }

            echo "</td><td align='center' class='nw'>"
                 . formatTimestamp($noticiastory->created())
                 . "</td><td align='center'><a href='"
                 . XOOPS_URL
                 . '/userinfo.php?uid='
                 . $noticiastory->uid()
                 . "'>"
                 . $noticiastory->uname()
                 . "</a></td><td align='right'><a href='index.php?op=delete&amp;storyid="
                 . $noticiastory->storyid()
                 . "'>"
                 . _AM_DELETE
                 . "</a></td></tr>\n";
        }

        echo "</table></div>\n";

        echo '</td></tr></table>';

        echo '<br>';
    }
}

/*
 * Shows automated stories
 */
function autoStories()
{
    global $xoopsModule;

    $storyarray = noticiasStory:: getAllAutoStory();

    if (count($storyarray) > 0) {
        echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

        echo "<div style='text-align: center;'><b>" . _AM_AUTOARTICLES . "</b><br>\n";

        echo "<table border='1' width='100%'><tr class='bg2'><td align='center'>"
             . _AM_STORYID
             . "</td><td align='center'>"
             . _AM_TITLE
             . "</td><td align='center'>"
             . _AM_TOPIC
             . "</td><td align='center'>"
             . _AM_POSTER
             . "</td><td align='center' class='nw'>"
             . _AM_PROGRAMMED
             . "</td><td align='center' class='nw'>"
             . _AM_EXPIRED
             . "</td><td align='center'>"
             . _AM_ACTION
             . '</td></tr>';

        foreach ($storyarray as $autostory) {
            $topic = $autostory->topic();

            $expire = ($autostory->expired() > 0) ? formatTimestamp($autostory->expired()) : '';

            echo "
        		<tr><td align='center'><b>"
                 . $autostory->storyid()
                 . "</b>
        		</td><td align='left'><a href='"
                 . XOOPS_URL
                 . '/modules/'
                 . $xoopsModule->dirname()
                 . '/article.php?storyid='
                 . $autostory->storyid()
                 . "'>"
                 . $autostory->title()
                 . "</a>
        		</td><td align='center'>"
                 . $topic->topic_title()
                 . "
        		</td><td align='center'><a href='"
                 . XOOPS_URL
                 . '/userinfo.php?uid='
                 . $autostory->uid()
                 . "'>"
                 . $autostory->uname()
                 . "</a></td><td align='center' class='nw'>"
                 . formatTimestamp($autostory->published())
                 . "</td><td align='center'>"
                 . $expire
                 . "</td><td align='center'><a href='../submit.php?op=edit&amp;storyid="
                 . $autostory->storyid()
                 . "'>"
                 . _AM_EDIT
                 . "</a>-<a href='index.php?op=delete&amp;storyid="
                 . $autostory->storyid()
                 . "'>"
                 . _AM_DELETE
                 . '</a>';

            echo "</td></tr>\n";
        }

        echo '</table>';

        echo '</div>';

        echo '</td></tr></table>';

        echo '<br>';
    }
}

/*
 * Shows last 10 published stories
 */
function lastStories()
{
    global $xoopsModule, $xoopsModuleConfig;

    echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

    echo "<div style='text-align: center;'><b>" . sprintf(_AM_LAST10ARTS, $xoopsModuleConfig['storycountadmin']) . '</b><br>';

    $storyarray = noticiasStory:: getAllPublished($xoopsModuleConfig['storycountadmin'], 0, false, 0, 1);

    echo "<table border='1' width='100%'><tr class='bg3'><td align='center'>"
         . _AM_STORYID
         . "</td><td align='center'>"
         . _AM_TITLE
         . "</td><td align='center'>"
         . _AM_TOPIC
         . "</td><td align='center'>"
         . _AM_POSTER
         . "</td><td align='center' class='nw'>"
         . _AM_PUBLISHED
         . "</td><td align='center' class='nw'>"
         . _AM_EXPIRED
         . "</td><td align='center'>"
         . _AM_ACTION
         . '</td></tr>';

    foreach ($storyarray as $eachstory) {
        $published = formatTimestamp($eachstory->published());

        $expired = ($eachstory->expired() > 0) ? formatTimestamp($eachstory->expired()) : '---';

        $topic = $eachstory->topic();

        echo "
        	<tr><td align='center'><b>"
             . $eachstory->storyid()
             . "</b>
        	</td><td align='left'><a href='"
             . XOOPS_URL
             . '/modules/'
             . $xoopsModule->dirname()
             . '/article.php?storyid='
             . $eachstory->storyid()
             . "'>"
             . $eachstory->title()
             . "</a>
        	</td><td align='center'>"
             . $topic->topic_title()
             . "
        	</td><td align='center'><a href='"
             . XOOPS_URL
             . '/userinfo.php?uid='
             . $eachstory->uid()
             . "'>"
             . $eachstory->uname()
             . "</a></td><td align='center' class='nw'>"
             . $published
             . "</td><td align='center'>"
             . $expired
             . "</td><td align='center'><a href='../submit.php?op=edit&amp;storyid="
             . $eachstory->storyid()
             . "'>"
             . _AM_EDIT
             . "</a>-<a href='index.php?op=delete&amp;storyid="
             . $eachstory->storyid()
             . "'>"
             . _AM_DELETE
             . '</a>';

        echo "</td></tr>\n";
    }

    echo '</table><br>';

    echo "<form action='index.php' method='post'>
    	" . _AM_STORYID . " <input type='text' name='storyid' size='10'>
    	<select name='op'>
    	<option value='edit' selected='selected'>" . _AM_EDIT . "</option>
    	<option value='delete'>" . _AM_DELETE . "</option>
    	</select>
    	<input type='submit' value='" . _AM_GO . "'>
    	</form>
	</div>
    	";

    echo '</td></tr></table>';
}

// Added function to display expired stories
function expStories()
{
    global $xoopsModule;

    echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

    echo "<div style='text-align: center;'><b>" . _AM_EXPARTS . '</b><br>';

    $storyarray = noticiasStory:: getAllExpired(10, 0, 0, 1);

    echo "<table border='1' width='100%'><tr class='bg3'><td align='center'>"
         . _AM_STORYID
         . "</td><td align='center'>"
         . _AM_TITLE
         . "</td><td align='center'>"
         . _AM_TOPIC
         . "</td><td align='center'>"
         . _AM_POSTER
         . "</td><td align='center' class='nw'>"
         . _AM_PUBLISHED
         . "</td><td align='center' class='nw'>"
         . _AM_EXPIRED
         . "</td><td align='center'>"
         . _AM_ACTION
         . '</td></tr>';

    foreach ($storyarray as $eachstory) {
        $published = formatTimestamp($eachstory->published());

        $expired = formatTimestamp($eachstory->expired());

        $topic = $eachstory->topic();

        // added exired value field to table

        echo "
        	<tr><td align='center'><b>"
             . $eachstory->storyid()
             . "</b>
        	</td><td align='left'><a href='"
             . XOOPS_URL
             . '/modules/'
             . $xoopsModule->dirname()
             . '/article.php?storyid='
             . $eachstory->storyid()
             . "'>"
             . $eachstory->title()
             . "</a>
        	</td><td align='center'>"
             . $topic->topic_title()
             . "
        	</td><td align='center'><a href='"
             . XOOPS_URL
             . '/userinfo.php?uid='
             . $eachstory->uid()
             . "'>"
             . $eachstory->uname()
             . "</a></td><td align='center' class='nw'>"
             . $published
             . "</td><td align='center' class='nw'>"
             . $expired
             . "</td><td align='center'><a href='../submit.php?op=edit&amp;storyid="
             . $eachstory->storyid()
             . "'>"
             . _AM_EDIT
             . "</a>-<a href='index.php?op=delete&amp;storyid="
             . $eachstory->storyid()
             . "'>"
             . _AM_DELETE
             . '</a>';

        echo "</td></tr>\n";
    }

    echo '</table><br>';

    echo "<form action='index.php' method='post'>
    	" . _AM_STORYID . " <input type='text' name='storyid' size='10'>
    	<select name='op'>
    	<option value='edit' selected='selected'>" . _AM_EDIT . "</option>
    	<option value='delete'>" . _AM_DELETE . "</option>
    	</select>
    	<input type='submit' value='" . _AM_GO . "'>
    	</form>
	</div>
    	";

    echo '</td></tr></table>';
}

function topicsmanager()
{
    global $xoopsDB, $xoopsConfig, $xoopsModule, $xoopsModuleConfig;

    xoops_cp_header();

    adminmenu(0);

    $uploadfolder = sprintf(_AM_UPLOAD_WARNING, XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/topics');

    echo '<h4>' . _AM_CONFIG . '</h4>';

    $xt = new XoopsTopic($xoopsDB->prefix('topics'));

    $topics_array = XoopsLists:: getImgListAsArray(XOOPS_ROOT_PATH . '/modules/noticias/images/topics/');

    // $xoopsModule->printAdminMenu();

    // echo "<br>";

    // Add a New Main Topic

    echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

    echo "<form method='post' action='index.php' enctype='multipart/form-data'>\n";

    echo '<h4>' . _AM_ADDMTOPIC . '</h4><br>';

    echo '<b>' . _AM_TOPICNAME . '</b> ' . _AM_MAX40CHAR . "<br><input type='text' name='topic_title' size='30' maxlength='40'><br>";

    echo '<b>' . _AM_TOPICIMG . '</b> (' . sprintf(_AM_IMGNAEXLOC, 'modules/' . $xoopsModule->dirname() . '/images/topics/') . ')<br>' . _AM_FEXAMPLE . '<br>';

    echo "<select size='1' name='topic_imgurl'>";

    echo "<option value=' '>------</option>";

    foreach ($topics_array as $image) {
        echo "<option value='" . $image . "'>" . $image . '</option>';
    }

    echo '</select><br>';

    echo '<b>' . _AM_TOPIC_PICTURE . "</b> <input type='hidden' name='MAX_FILE_SIZE' value='" . $xoopsModuleConfig['maxuploadsize'] . "'>";

    echo "<input type='file' name='attachedfile' id='attachedfile'><input type='hidden' name='xoops_upload_file[]' id='xoops_upload_file[]' value='attachedfile'><br> $uploadfolder";

    echo '<br><br>';

    echo "<input type='hidden' name='topic_pid' value='0'>\n";

    echo "<input type='hidden' name='op' value='addTopic'>";

    echo "<input type='submit' value=" . _AM_ADD . '><br></form>';

    echo '</td></tr></table>';

    echo '<br>';

    // Add a New Sub-Topic

    $result = $xoopsDB->query('select count(*) from ' . $xoopsDB->prefix('topics') . '');

    [$numrows] = $xoopsDB->fetchRow($result);

    if ($numrows > 0) {
        echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

        echo "<form method='post' action='index.php' enctype='multipart/form-data'>";

        echo '<h4>' . _AM_ADDSUBTOPIC . '</h4><br>';

        echo '<b>' . _AM_TOPICNAME . '</b> ' . _AM_MAX40CHAR . "<br><input type='text' name='topic_title' size='30' maxlength='40'>&nbsp;" . _AM_IN . '&nbsp;';

        $xt->makeTopicSelBox(0, 0, 'topic_pid');

        echo '<br>';

        echo '<b>' . _AM_TOPICIMG . '</b> (' . sprintf(_AM_IMGNAEXLOC, 'modules/' . $xoopsModule->dirname() . '/images/topics/') . ')<br>' . _AM_FEXAMPLE . '<br>';

        echo "<select size='1' name='topic_imgurl'>";

        echo "<option value=' '>------</option>";

        foreach ($topics_array as $image) {
            echo "<option value='" . $image . "'>" . $image . '</option>';
        }

        echo '</select><br>';

        echo '<b>' . _AM_TOPIC_PICTURE . "</b> <input type='hidden' name='MAX_FILE_SIZE' value='" . $xoopsModuleConfig['maxuploadsize'] . "'>";

        echo "<input type='file' name='attachedfile' id='attachedfile'><input type='hidden' name='xoops_upload_file[]' id='xoops_upload_file[]' value='attachedfile'><br> $uploadfolder";

        echo '<br><br>';

        echo "<input type='hidden' name='op' value='addTopic'>";

        echo "<input type='submit' value='" . _AM_ADD . "'><br></form>";

        echo '</td></tr></table>';

        echo '<br>';

        // Modify Topic

        echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

        echo "
    		<form method='post' action='index.php'>
    		<h4>" . _AM_MODIFYTOPIC . '</h4><br>';

        echo '<b>' . _AM_TOPIC . '</b><br>';

        $xt->makeTopicSelBox();

        echo "<br><br>\n";

        echo "<input type='hidden' name='op' value='modTopic'>\n";

        echo "<input type='submit' value='" . _AM_MODIFY . "'>\n";

        echo '</form>';

        echo '</td></tr></table>';
    }
}

function modTopic()
{
    global $xoopsDB;

    global $xoopsModule;

    $xt = new XoopsTopic($xoopsDB->prefix('topics'), $_POST['topic_id']);

    $topics_array = XoopsLists:: getImgListAsArray(XOOPS_ROOT_PATH . '/modules/noticias/images/topics/');

    xoops_cp_header();

    echo '<h4>' . _AM_CONFIG . '</h4>';

    // $xoopsModule->printAdminMenu();

    // echo "<br>";

    echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

    echo '<h4>' . _AM_MODIFYTOPIC . '</h4><br>';

    if ($xt->topic_imgurl()) {
        echo "<div style='text-align: right;'><img src='" . XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/topics/' . $xt->topic_imgurl() . "'></div>";
    }

    echo "<form action='index.php' method='post'>";

    echo '<b>' . _AM_TOPICNAME . '</b>&nbsp;' . _AM_MAX40CHAR . "<br><input type='text' name='topic_title' size='20' maxlength='40' value='" . $xt->topic_title('E') . "'><br>";

    echo '<b>' . _AM_TOPICIMG . '</b>&nbsp;(' . sprintf(_AM_IMGNAEXLOC, 'modules/' . $xoopsModule->dirname() . '/images/topics/') . ')<br>' . _AM_FEXAMPLE . '<br>';

    // echo "<input type='text' name='topic_imgurl' size='20' maxlength='20' value='".$xt->topic_imgurl()."'><br>\n";

    echo "<select size='1' name='topic_imgurl'>";

    echo "<option value=' '>------</option>";

    foreach ($topics_array as $image) {
        if ($image == $xt->topic_imgurl()) {
            $opt_selected = "selected='selected'";
        } else {
            $opt_selected = '';
        }

        echo "<option value='" . $image . "' $opt_selected>" . $image . '</option>';
    }

    echo '</select><br>';

    echo '<b>' . _AM_PARENTTOPIC . "<b><br>\n";

    $xt->makeTopicSelBox(1, $xt->topic_pid(), 'topic_pid');

    echo "\n<br><br>";

    echo "<input type='hidden' name='topic_id' value='" . $xt->topic_id() . "'>\n";

    echo "<input type='hidden' name='op' value='modTopicS'>";

    echo "<input type='submit' value='" . _AM_SAVECHANGE . "'>&nbsp;<input type='button' value='" . _AM_DEL . "' onclick='location=\"index.php?topic_pid=" . $xt->topic_pid() . '&amp;topic_id=' . $xt->topic_id() . "&amp;op=delTopic\"'>\n";

    echo "&nbsp;<input type='button' value='" . _AM_CANCEL . "' onclick='javascript:history.go(-1)'>\n";

    echo '</form>';

    echo '</td></tr></table>';
}

function modTopicS()
{
    global $xoopsDB;

    $xt = new XoopsTopic($xoopsDB->prefix('topics'), $_POST['topic_id']);

    if ($_POST['topic_pid'] == $_POST['topic_id']) {
        echo 'ERROR: Cannot select this topic for parent topic!';

        exit();
    }

    $xt->setTopicPid($_POST['topic_pid']);

    if (empty($_POST['topic_title'])) {
        redirect_header('index.php?op=topicsmanager', 2, _AM_ERRORTOPICNAME);
    }

    $xt->setTopicTitle($_POST['topic_title']);

    if (isset($_POST['topic_imgurl']) && '' != $_POST['topic_imgurl']) {
        $xt->setTopicImgurl($_POST['topic_imgurl']);
    }

    $xt->store();

    redirect_header('index.php?op=topicsmanager', 1, _AM_DBUPDATED);

    exit();
}

function delTopic()
{
    global $xoopsDB, $xoopsModule;

    if (1 != $_POST['ok']) {
        xoops_cp_header();

        echo '<h4>' . _AM_CONFIG . '</h4>';

        xoops_confirm(['op' => 'delTopic', 'topic_id' => (int)$_GET['topic_id'], 'ok' => 1], 'index.php', _AM_WAYSYWTDTTAL);
    } else {
        $xt = new XoopsTopic($xoopsDB->prefix('topics'), $_POST['topic_id']);

        // get all subtopics under the specified topic

        $topic_arr = $xt->getAllChildTopics();

        $topic_arr[] = $xt;

        foreach ($topic_arr as $eachtopic) {
            // get all stories in each topic

            $story_arr = noticiasStory:: getByTopic($eachtopic->topic_id());

            foreach ($story_arr as $eachstory) {
                if (false !== $eachstory->delete()) {
                    xoops_comment_delete($xoopsModule->getVar('mid'), $eachstory->storyid());

                    xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'story', $eachstory->storyid());
                }
            }

            // all stories for each topic is deleted, now delete the topic data

            $eachtopic->delete();

            xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'category', $eachtopic->topic_id);
        }

        redirect_header('index.php?op=topicsmanager', 1, _AM_DBUPDATED);

        exit();
    }
}

function addTopic()
{
    global $xoopsDB, $xoopsModule, $HTTP_POST_FILES, $xoopsModuleConfig;

    $xt = new XoopsTopic($xoopsDB->prefix('topics'));

    if (!$xt->topicExists($_POST['topic_pid'], $_POST['topic_pid'])) {
        $xt->setTopicPid($_POST['topic_pid']);

        if (empty($_POST['topic_title'])) {
            redirect_header('index.php?op=topicsmanager', 2, _AM_ERRORTOPICNAME);
        }

        $xt->setTopicTitle($_POST['topic_title']);

        if (isset($_POST['topic_imgurl']) && '' != $_POST['topic_imgurl']) {
            $xt->setTopicImgurl($_POST['topic_imgurl']);
        }

        if (isset($_POST['xoops_upload_file'])) {
            $fldname = $HTTP_POST_FILES[$_POST['xoops_upload_file'][0]];

            $fldname = (get_magic_quotes_gpc()) ? stripslashes($fldname['name']) : $fldname['name'];

            if (trim('' != $fldname)) {
                $sfiles = new sFiles();

                $dstpath = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/images/topics';

                $destname = $sfiles->createUploadName($dstpath, $fldname, true);

                $permittedtypes = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png'];

                $uploader = new XoopsMediaUploader($dstpath, $permittedtypes, $xoopsModuleConfig['maxuploadsize']);

                $uploader->setTargetFileName($destname);

                if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
                    if ($uploader->upload()) {
                        $xt->setTopicImgurl(basename($destname));
                    } else {
                        echo _AM_UPLOAD_ERROR;
                    }
                } else {
                    echo $uploader->getErrors();
                }
            }
        }

        $xt->store();

        $notificationHandler = xoops_getHandler('notification');

        $tags = [];

        $tags['TOPIC_NAME'] = $_POST['topic_title'];

        $notificationHandler->triggerEvent('global', 0, 'new_category', $tags);

        redirect_header('index.php?op=topicsmanager', 1, _AM_DBUPDATED);
    } else {
        echo 'Topic exists!';
    }

    exit();
}

switch ($op) {
    case 'newarticle':
        xoops_cp_header();
        adminmenu(1);
        echo '<h4>' . _AM_CONFIG . '</h4>';
        require_once XOOPS_ROOT_PATH . '/class/module.textsanitizer.php';
        // $xoopsModule->printAdminMenu();
        // echo "<br>";
        noticiasubmissions();
        autoStories();
        lastStories();
        expStories();
        echo '<br>';
        echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";
        echo '<h4>' . _AM_POSTNEWARTICLE . '</h4>';
        $type = 'admin';
        $title = '';
        $topicdisplay = 0;
        $topicalign = 'R';
        $ihome = 1;
        $hometext = '';
        $bodytext = '';
        $notifypub = 1;
        $nohtml = 0;
        $approve = 0;
        $nosmiley = 0;
        $autodate = '';
        $expired = '';
        $topicid = 0;
        $published = time();
        if (file_exists(XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/main.php')) {
            require_once dirname(__DIR__) . '/language/' . $xoopsConfig['language'] . '/main.php';
        } else {
            require_once dirname(__DIR__) . '/language/english/main.php';
        }
        $approveprivilege = 1;
        include '../include/storyform.inc.php';
        echo '</td></tr></table>';
        break;
    case 'delete':
        if (!empty($ok)) {
            if (empty($storyid)) {
                redirect_header('index.php?op=newarticle', 2, _AM_EMPTYNODELETE);

                exit();
            }

            $story = new noticiasStory($storyid);

            $story->delete();

            $sfiles = new sFiles();

            $filesarr = [];

            $filesarr = $sfiles->getAllbyStory($storyid);

            if (count($filesarr) > 0) {
                foreach ($filesarr as $onefile) {
                    $onefile->delete();
                }
            }

            xoops_comment_delete($xoopsModule->getVar('mid'), $storyid);

            xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'story', $storyid);

            redirect_header('index.php?op=newarticle', 1, _AM_DBUPDATED);

            exit();
        }
            xoops_cp_header();
            echo '<h4>' . _AM_CONFIG . '</h4>';
            xoops_confirm(['op' => 'delete', 'storyid' => $storyid, 'ok' => 1], 'index.php', _AM_RUSUREDEL);

        break;
    case 'topicsmanager':
        topicsmanager();
        break;
    case 'addTopic':
        addTopic();
        break;
    case 'delTopic':
        delTopic();
        break;
    case 'modTopic':
        modTopic();
        break;
    case 'modTopicS':
        modTopicS();
        break;
    case 'default':
    default:
        xoops_cp_header();
        adminmenu(0);
        echo '<h4>' . _AM_CONFIG . '</h4>';
        echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";
        echo " - <b><a href='index.php?op=topicsmanager'>" . _AM_TOPICSMNGR . '</a></b>';
        echo "<br><br>\n";
        echo " - <b><a href='index.php?op=newarticle'>" . _AM_PEARTICLES . "</a></b>\n";
        echo "<br><br>\n";
        echo " - <b><a href='groupperms.php'>" . _AM_GROUPPERM . "</a></b>\n";
        echo "<br><br>\n";
        echo " - <b><a href='" . XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid') . "'>" . _AM_GENERALCONF . '</a></b>';
        echo '</td></tr></table>';
        break;
}

xoops_cp_footer();
