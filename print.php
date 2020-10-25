<?php

// $Id: print.php,v 1.1 2006/03/27 15:15:16 mikhail Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://xoopscube.org>                             //
// ------------------------------------------------------------------------- //
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
require dirname(__DIR__, 2) . '/mainfile.php';

$storyid = isset($_GET['storyid']) ? (int)$_GET['storyid'] : 0;
if (empty($storyid)) {
    redirect_header('index.php');
}
require_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/class.noticiasstory.php';

function PrintPage($storyid)
{
    global $xoopsConfig, $xoopsModule, $xoopsUser;

    $myts = MyTextSanitizer::getInstance();

    $story = new noticiasStory($storyid);

    $datetime = formatTimestamp($story->published());

    $gpermHandler = xoops_getHandler('groupperm');

    if (is_object($xoopsUser)) {
        $groups = $xoopsUser->getGroups();
    } else {
        $groups = XOOPS_GROUP_ANONYMOUS;
    }

    if (!$gpermHandler->checkRight('noticias_view', $story->topicid(), $groups, $xoopsModule->getVar('mid'))) {
        if (!$gpermHandler->checkRight('noticias_submit', $story->topicid(), $groups, $xoopsModule->getVar('mid'))) {
            if (!$gpermHandler->checkRight('noticias_approve', $story->topicid(), $groups, $xoopsModule->getVar('mid'))) {
                redirect_header('index.php', 3, _NOPERM);

                exit();
            }
        }
    }

    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">';

    echo '<html><head>';

    echo '<meta http-equiv="Content-Type" content="text/html; charset=' . _CHARSET . '">';

    echo '<title>' . $xoopsConfig['sitename'] . ' - ' . htmlspecialchars($story->topic_title(), ENT_QUOTES | ENT_HTML5) . ' - ' . htmlspecialchars($story->title(), ENT_QUOTES | ENT_HTML5) . '</title>';

    echo '<meta name="AUTHOR" content="' . $xoopsConfig['sitename'] . '">';

    echo '<meta name="COPYRIGHT" content="Copyright (c) 2001 by ' . $xoopsConfig['sitename'] . '">';

    echo '<meta name="DESCRIPTION" content="' . $xoopsConfig['slogan'] . '">';

    echo '<meta name="GENERATOR" content="' . XOOPS_VERSION . '">';

    echo '<body bgcolor="#ffffff" text="#000000" onload="window.print()">
    	<table border="0"><tr><td align="center">
    	<table border="0" width="640" cellpadding="0" cellspacing="1" bgcolor="#000000"><tr><td>
    	<table border="0" width="640" cellpadding="20" cellspacing="1" bgcolor="#ffffff"><tr><td align="center">
    	<img src="' . XOOPS_URL . '/images/logo.gif" border="0" alt=""><br><br>
    	<h3>' . $story->title() . '</h3>
    	<small><b>' . _NW_DATE . '</b>&nbsp;' . $datetime . ' | <b>' . _NW_TOPICC . '</b>&nbsp;' . $story->topic_title() . '</small><br><br></td></tr>';

    echo '<tr valign="top" style="font:12px;"><td>' . $story->hometext() . '<br>';

    $bodytext = $story->bodytext();

    $bodytext = str_replace('[pagebreak]', '<br style="page-break-after:always;">', $bodytext);

    if ('' != $bodytext) {
        echo $bodytext . '<br><br>';
    }

    echo '</td></tr></table></td></tr></table>
	<br><br>';

    printf(_NW_THISCOMESFROM, $xoopsConfig['sitename']);

    echo '<br><a href="' . XOOPS_URL . '/">' . XOOPS_URL . '</a><br><br>
    	' . _NW_URLFORSTORY . ' <!-- Tag below can be used to display Permalink image --><!--img src="' . XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/images/x.gif" /--><br>
    	<a href="' . XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/article.php?storyid=' . $story->storyid() . '">' . XOOPS_URL . '/article.php?storyid=' . $story->storyid() . '</a>
    	</td></tr></table>
    	</body>
    	</html>
    	';
}

PrintPage($storyid);
