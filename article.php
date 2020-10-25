<?php

// $Id: article.php,v 1.1 2006/03/27 15:15:16 mikhail Exp $
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

include '../../mainfile.php';
require_once 'class/class.noticiasstory.php';
require_once __DIR__ . '/class/class.sfiles.php';
foreach ($_POST as $k => $v) {
    ${$k} = $v;
}

$storyid = $_GET['storyid'] ?? 0;
$storyid = (int)$storyid;
if (empty($storyid)) {
    redirect_header('index.php', 2, _NW_NOSTORY);

    exit();
}

$myts = MyTextSanitizer::getInstance();
// set comment mode if not set

$article = new noticiasStory($storyid);
if (0 == $article->published() || $article->published() > time()) {
    redirect_header('index.php', 2, _NW_NOSTORY);

    exit();
}
$gpermHandler = xoops_getHandler('groupperm');
if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
} else {
    $groups = XOOPS_GROUP_ANONYMOUS;
}
if (!$gpermHandler->checkRight('noticias_view', $article->topicid(), $groups, $xoopsModule->getVar('mid'))) {
    if (!$gpermHandler->checkRight('noticias_submit', $article->topicid(), $groups, $xoopsModule->getVar('mid'))) {
        if (!$gpermHandler->checkRight('noticias_approve', $article->topicid(), $groups, $xoopsModule->getVar('mid'))) {
            redirect_header('index.php', 3, _NOPERM);

            exit();
        }
    }
}

$storypage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
// update counter only when viewing top page
if (empty($_GET['com_id']) && 0 == $storypage) {
    $article->updateCounter();
}
$GLOBALS['xoopsOption']['template_main'] = 'noticias_article.html';
require_once XOOPS_ROOT_PATH . '/header.php';
$story['id'] = $storyid;
$story['posttime'] = formatTimestamp($article->published());
$story['title'] = $article->textlink() . '&nbsp;:&nbsp;' . $article->title();
$story['text'] = $article->hometext();
$bodytext = $article->bodytext();

if ('' != trim($bodytext)) {
    $articletext = explode('[pagebreak]', $bodytext);

    $story_pages = count($articletext);

    if ($story_pages > 1) {
        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

        $pagenav = new XoopsPageNav($story_pages, 1, $storypage, 'page', 'storyid=' . $storyid);

        $xoopsTpl->assign('pagenav', $pagenav->renderNav());

        //$xoopsTpl->assign('pagenav', $pagenav->renderImageNav());

        if (0 == $storypage) {
            $story['text'] .= '<br><br>' . $articletext[$storypage];
        } else {
            $story['text'] = $articletext[$storypage];
        }
    } else {
        $story['text'] .= '<br><br>' . $bodytext;
    }
}

$story['poster'] = $article->uname();
if ($story['poster']) {
    $story['posterid'] = $article->uid();

    $story['poster'] = '<a href="' . XOOPS_URL . '/userinfo.php?uid=' . $story['posterid'] . '">' . $story['poster'] . '</a>';
} else {
    $story['poster'] = '';

    $story['posterid'] = 0;

    $story['poster'] = $xoopsConfig['anonymous'];
}
$story['morelink'] = '';
$story['adminlink'] = '';
unset($isadmin);
if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
    $isadmin = true;

    $story['adminlink'] = $article->adminlink();
}
$story['topicid'] = $article->topicid();
$story['imglink'] = '';
$story['align'] = '';
if ($article->topicdisplay()) {
    $story['imglink'] = $article->imglink();

    $story['align'] = $article->topicalign();
}
$story['hits'] = $article->counter();
$story['mail_link'] = 'mailto:?subject=' . sprintf(_NW_INTARTICLE, $xoopsConfig['sitename']) . '&amp;body=' . sprintf(_NW_INTARTFOUND, $xoopsConfig['sitename']) . ':  ' . XOOPS_URL . '/modules/noticias/article.php?storyid=' . $article->storyid();
$xoopsTpl->assign('story', $story);
$xoopsTpl->assign('lang_printerpage', _NW_PRINTERFRIENDLY);
$xoopsTpl->assign('lang_sendstory', _NW_SENDSTORY);
$xoopsTpl->assign('lang_on', _ON);
$xoopsTpl->assign('lang_postedby', _POSTEDBY);
$xoopsTpl->assign('lang_reads', _READS);
$xoopsTpl->assign('mail_link', 'mailto:?subject=' . sprintf(_NW_INTARTICLE, $xoopsConfig['sitename']) . '&amp;body=' . sprintf(_NW_INTARTFOUND, $xoopsConfig['sitename']) . ':  ' . XOOPS_URL . '/modules/noticias/article.php?storyid=' . $article->storyid());

$xoopsTpl->assign('lang_attached_files', _NW_ATTACHEDFILES);
$sfiles = new sFiles();
$filesarr = [];
$noticiasfiles = [];
$filesarr = $sfiles->getAllbyStory($storyid);
$filescount = count($filesarr);
$xoopsTpl->assign('attached_files_count', $filescount);
if ($filescount > 0) {
    foreach ($filesarr as $onefile) {
        $noticiasfiles[] = [
'file_id' => $onefile->getFileid(),
'visitlink' => XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/visit.php?fileid=' . $onefile->getFileid(),
'file_realname' => $onefile->getFileRealName(),
'file_attacheddate' => formatTimestamp($onefile->getDate()),
'file_mimetype' => $onefile->getMimetype(),
'file_downloadname' => XOOPS_UPLOAD_URL . '/' . $onefile->getDownloadname(),
        ];
    }

    $xoopsTpl->assign('attached_files', $noticiasfiles);
}
$xoopsTpl->assign('xoops_pagetitle', htmlspecialchars($xoopsModule->name(), ENT_QUOTES | ENT_HTML5) . ' - ' . htmlspecialchars($article->topic_title(), ENT_QUOTES | ENT_HTML5) . ' - ' . htmlspecialchars($article->title(), ENT_QUOTES | ENT_HTML5));
require XOOPS_ROOT_PATH . '/include/comment_view.php';

require XOOPS_ROOT_PATH . '/footer.php';
