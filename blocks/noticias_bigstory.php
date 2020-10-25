<?php

// $Id: noticias_bigstory.php,v 1.1 2006/03/27 15:15:17 mikhail Exp $
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

function b_noticias_bigstory_show()
{
    global $xoopsDB;

    $myts = MyTextSanitizer::getInstance();

    $block = [];

    $tdate = mktime(0, 0, 0, date('n'), date('j'), date('Y'));

    $result = $xoopsDB->query('SELECT storyid, title FROM ' . $xoopsDB->prefix('stories') . ' WHERE published > ' . $tdate . ' AND published < ' . time() . ' AND (expired > ' . time() . ' OR expired = 0) ORDER BY counter DESC', 1, 0);

    [$fsid, $ftitle] = $xoopsDB->fetchRow($result);

    if (!$fsid && !$ftitle) {
        $block['message'] = _MB_NOTICIAS_NOTYET;
    } else {
        $block['message'] = _MB_NOTICIAS_TMRSI;

        $block['story_title'] = htmlspecialchars($ftitle, ENT_QUOTES | ENT_HTML5);

        $block['story_id'] = $fsid;
    }

    return $block;
}