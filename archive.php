<?php

// $Id: archive.php,v 1.1 2006/03/27 15:15:16 mikhail Exp $
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
######################################################################
# Original version:
# [11-may-2001] Kenneth Lee - http://www.nexgear.com/
######################################################################

require dirname(__DIR__, 2) . '/mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'noticias_archive.html';
require XOOPS_ROOT_PATH . '/header.php';
require_once __DIR__ . '/class/class.noticiasstory.php';
require_once XOOPS_ROOT_PATH . '/language/' . $xoopsConfig['language'] . '/calendar.php';
//error_reporting(E_ALL);
$lastyear = 0;
$lastmonth = 0;

$months_arr = [1 => _CAL_JANUARY, 2 => _CAL_FEBRUARY, 3 => _CAL_MARCH, 4 => _CAL_APRIL, 5 => _CAL_MAY, 6 => _CAL_JUNE, 7 => _CAL_JULY, 8 => _CAL_AUGUST, 9 => _CAL_SEPTEMBER, 10 => _CAL_OCTOBER, 11 => _CAL_NOVEMBER, 12 => _CAL_DECEMBER];

$fromyear = (isset($_GET['year'])) ? (int)$_GET['year'] : 0;
$frommonth = (isset($_GET['month'])) ? (int)$_GET['month'] : 0;

$pgtitle = '';
if (0 != $fromyear && 0 != $frommonth) {
    $pgtitle = sprintf(' - %d - %d', $fromyear, $frommonth);
}
$myts = MyTextSanitizer::getInstance();
$xoopsTpl->assign('xoops_pagetitle', htmlspecialchars($xoopsModule->name(), ENT_QUOTES | ENT_HTML5) . ' - ' . htmlspecialchars(_NW_NOTICIASARCHIVES, ENT_QUOTES | ENT_HTML5) . $pgtitle);

$useroffset = '';
if (is_object($xoopsUser)) {
    $timezone = $xoopsUser->timezone();

    if (isset($timezone)) {
        $useroffset = $xoopsUser->timezone();
    } else {
        $useroffset = $xoopsConfig['default_TZ'];
    }
}
$result = $xoopsDB->query('SELECT published FROM ' . $xoopsDB->prefix('stories') . ' WHERE published>0 AND published<=' . time() . ' AND expired <= ' . time() . ' ORDER BY published DESC');
if (!$result) {
    exit();
}
    $years = [];
    $months = [];
    $i = 0;
    while (list($time) = $xoopsDB->fetchRow($result)) {
        $time = formatTimestamp($time, 'mysql', $useroffset);

        if (preg_match('/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/', $time, $datetime)) {
            $this_year = (int)$datetime[1];

            $this_month = (int)$datetime[2];

            if (empty($lastyear)) {
                $lastyear = $this_year;
            }

            if (0 == $lastmonth) {
                $lastmonth = $this_month;

                $months[$lastmonth]['string'] = $months_arr[$lastmonth];

                $months[$lastmonth]['number'] = $lastmonth;
            }

            if ($lastyear != $this_year) {
                $years[$i]['number'] = $lastyear;

                $years[$i]['months'] = $months;

                $months = [];

                $lastmonth = 0;

                $lastyear = $this_year;

                $i++;
            }

            if ($lastmonth != $this_month) {
                $lastmonth = $this_month;

                $months[$lastmonth]['string'] = $months_arr[$lastmonth];

                $months[$lastmonth]['number'] = $lastmonth;
            }
        }
    }
    $years[$i]['number'] = $this_year;
    $years[$i]['months'] = $months;
    $xoopsTpl->assign('years', $years);

if (0 != $fromyear && 0 != $frommonth) {
    $xoopsTpl->assign('show_articles', true);

    $xoopsTpl->assign('lang_articles', _NW_ARTICLES);

    $xoopsTpl->assign('currentmonth', $months_arr[$frommonth]);

    $xoopsTpl->assign('currentyear', $fromyear);

    $xoopsTpl->assign('lang_actions', _NW_ACTIONS);

    $xoopsTpl->assign('lang_date', _NW_DATE);

    $xoopsTpl->assign('lang_views', _NW_VIEWS);

    // must adjust the selected time to server timestamp

    $timeoffset = $useroffset - $xoopsConfig['server_TZ'];

    $monthstart = mktime(0 - $timeoffset, 0, 0, $frommonth, 1, $fromyear);

    $monthend = mktime(23 - $timeoffset, 59, 59, $frommonth + 1, 0, $fromyear);

    $monthend = ($monthend > time()) ? time() : $monthend;

    $sql = 'SELECT * FROM ' . $xoopsDB->prefix('stories') . " WHERE published >= $monthstart and published <= $monthend ORDER by published DESC";

    $result = $xoopsDB->query($sql);

    $count = 0;

    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        $article = new noticiasStory($myrow);

        $story = [];

        $story['title'] = "<a href='index.php?storytopic=" . $article->topicid() . "'>" . $article->topic_title() . "</a>: <a href='article.php?storyid=" . $article->storyid() . "'>" . $article->title() . '</a>';

        $story['counter'] = $article->counter();

        $story['date'] = formatTimestamp($article->published(), 'm', $useroffset);

        $story['print_link'] = 'print.php?storyid=' . $article->storyid();

        $story['mail_link'] = 'mailto:?subject=' . sprintf(_NW_INTARTICLE, $xoopsConfig['sitename']) . '&amp;body=' . sprintf(_NW_INTARTFOUND, $xoopsConfig['sitename']) . ':  ' . XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/article.php?storyid=' . $article->storyid();

        $xoopsTpl->append('stories', $story);

        $count++;
    }

    $xoopsTpl->assign('lang_printer', _NW_PRINTERFRIENDLY);

    $xoopsTpl->assign('lang_sendstory', _NW_SENDSTORY);

    $xoopsTpl->assign('lang_storytotal', sprintf(_NW_THEREAREINTOTAL, $count));
} else {
    $xoopsTpl->assign('show_articles', false);
}
$xoopsTpl->assign('lang_noticiasarchives', _NW_NOTICIASARCHIVES);
require XOOPS_ROOT_PATH . '/footer.php';
