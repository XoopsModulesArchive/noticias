<?php

// $Id: noticias_top.php,v 1.1 2006/03/27 15:15:17 mikhail Exp $
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

function b_noticias_top_show($options)
{
    global $xoopsDB;

    $myts = MyTextSanitizer::getInstance();

    $block = [];

    $options_new = array_slice($options, 3);

    $topicpick = '(' . implode(',', $options_new) . ')';

    if (0 == $options[3]) {
        $sql = 'SELECT storyid, title, published, expired, counter FROM
		      ' . $xoopsDB->prefix('stories') . ' WHERE published < ' . time() . '
		      AND published > 0 AND (expired = 0 OR expired > ' . time() . ') ORDER BY
		      ' . $options[0] . ' DESC';
    } else {
        $sql = 'SELECT storyid, title, published, expired, counter FROM
			       ' . $xoopsDB->prefix('stories') . ' WHERE published < ' . time() . '
			       AND published > 0 AND (expired = 0 OR expired > ' . time() . ') AND topicid in
                   ' . $topicpick . ' ORDER BY ' . $options[0] . ' DESC';
    }

    $result = $xoopsDB->query($sql, $options[1], 0);

    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        $noticias = [];

        $title = htmlspecialchars($myrow['title'], ENT_QUOTES | ENT_HTML5);

        if (mb_strlen($title) >= $options[2]) {
            $title = htmlspecialchars(xoops_substr($title, 0, ($options[2] - 1)), ENT_QUOTES | ENT_HTML5) . '...';
        }

        $noticias['title'] = $title;

        $noticias['id'] = $myrow['storyid'];

        if ('published' == $options[0]) {
            $noticias['date'] = formatTimestamp($myrow['published'], 's');
        } elseif ('counter' == $options[0]) {
            $noticias['hits'] = $myrow['counter'];
        }

        $block['stories'][] = $noticias;
    }

    return $block;
}

function b_noticias_top_edit($options)
{
    global $xoopsDB;

    $form = '' . _MB_NOTICIAS_ORDER . "&nbsp;<select name='options[]'>";

    $form .= "<option value='published'";

    if ('published' == $options[0]) {
        $form .= " selected='selected'";
    }

    $form .= '>' . _MB_NOTICIAS_DATE . "</option>\n";

    $form .= "<option value='counter'";

    if ('counter' == $options[0]) {
        $form .= " selected='selected'";
    }

    $form .= '>' . _MB_NOTICIAS_HITS . "</option>\n";

    $form .= "</select>\n";

    $form .= '&nbsp;' . _MB_NOTICIAS_DISP . "&nbsp;<input type='text' name='options[]' value='" . $options[1] . "'>&nbsp;" . _MB_NOTICIAS_ARTCLS . '';

    $form .= '&nbsp;<br>' . _MB_NOTICIAS_CHARS . "&nbsp;<input type='text' name='options[]' value='" . $options[2] . "'>&nbsp;" . _MB_NOTICIAS_LENGTH . '';

    $form .= "<br><br><br><select id='options[]' name='options[]' multiple='multiple'>";

    require_once XOOPS_ROOT_PATH . '/class/xoopsstory.php';

    $xt = new XoopsTopic($xoopsDB->prefix('topics'));

    $alltopics = $xt->getTopicsList();

    $alltopics[0]['title'] = 'All topics';

    ksort($alltopics);

    $size = count($options);

    foreach ($alltopics as $topicid => $topic) {
        $sel = '';

        for ($i = 2; $i < $size; $i++) {
            if ($options[$i] == $topicid) {
                $sel = " selected='selected'";
            }
        }

        $form .= "<option value='$topicid'$sel>" . $topic['title'] . '</option>';
    }

    $form .= '</select>';

    return $form;
}
