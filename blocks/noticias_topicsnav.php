<?php

// $Id: noticias_topicsnav.php,v 1.1 2006/03/27 15:15:17 mikhail Exp $
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

function b_noticias_topicsnav_show($options)
{
    global $xoopsDB, $xoopsUser;

    $block = [];

    $topicclause = '';

    if ('restrict' == $options[0]) {
        $groups = $xoopsUser ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;

        $gpermHandler = xoops_getHandler('groupperm');

        $moduleHandler = xoops_getHandler('module');

        $noticiasmodule = $moduleHandler->getByDirname('noticias');

        $topics = $gpermHandler->getItemIds('noticias_view', $groups, $noticiasmodule->getVar('mid'));

        $topicclause = 'AND topic_id IN (' . implode(',', $topics) . ')';
    }

    $sql = 'SELECT topic_id, topic_title FROM ' . $xoopsDB->prefix('topics') . " WHERE topic_pid=0 $topicclause ORDER BY topic_title";

    $result = $xoopsDB->query($sql);

    while (false !== ($topic = $xoopsDB->fetchArray($result))) {
        $block['topics'][] = ['id' => $topic['topic_id'], 'title' => $topic['topic_title']];
    }

    return $block;
}

function b_noticias_topicsnav_edit($options)
{
    $form = '' . _MB_NOTICIAS_RESTRICTTOPICS . "&nbsp;<select name='options[]'>";

    $form .= "<option value='restrict'";

    if ('restrict' == $options[0]) {
        $form .= " selected='selected'";
    }

    $form .= '>' . _YES . "</option>\n";

    $form .= "<option value='norestrict'";

    if ('norestrict' == $options[0]) {
        $form .= " selected='selected'";
    }

    $form .= '>' . _NO . "</option>\n";

    $form .= "</select>\n";

    return $form;
}
