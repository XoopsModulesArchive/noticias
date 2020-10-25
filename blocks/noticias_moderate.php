<?php

// $Id: noticias_moderate.php,v 1.1 2006/03/27 15:15:17 mikhail Exp $
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

function b_noticias_topics_moderate()
{
    require_once XOOPS_ROOT_PATH . '/class/xoopstopic.php';

    require_once XOOPS_ROOT_PATH . '/modules/noticias/class/class.noticiasstory.php';

    $block = [];

    $block['lang_story_title'] = _MB_TITLE;

    $block['lang_story_date'] = _MB_POSTED;

    $block['lang_story_author'] = _MB_POSTER;

    $block['lang_story_action'] = _MB_ACTION;

    $block['lang_story_topic'] = _MB_TOPIC;

    $storyarray = noticiasStory:: getAllSubmitted();

    if (count($storyarray) > 0) {
        foreach ($storyarray as $noticiastory) {
            $title = $noticiastory->title();

            if (!isset($title) || ('' == $title)) {
                $linktitle = "<a href='" . XOOPS_URL . '/modules/noticias/index.php?op=edit&amp;storyid=' . $noticiastory->storyid() . "' target='_blank'>" . _AD_NOSUBJECT . '</a>';
            } else {
                $linktitle = "<a href='" . XOOPS_URL . '/modules/noticias/submit.php?op=edit&amp;storyid=' . $noticiastory->storyid() . "' target='_blank'>" . $title . '</a>';
            }

            $story['title'] = $linktitle;

            $story['date'] = formatTimestamp($noticiastory->created());

            $story['author'] = "<a href='" . XOOPS_URL . '/userinfo.php?uid=' . $noticiastory->uid() . "'>" . $noticiastory->uname() . '</a>';

            $story['action'] = "<a href='" . XOOPS_URL . '/modules/noticias/index.php?op=delete&amp;storyid=' . $noticiastory->storyid() . "'>" . _MB_DELETE . '</a>';

            $story['topic_title'] = $noticiastory->topic_title();

            $block['stories'][] = &$story;

            unset($story);
        }
    }

    return $block;
}
