<?php

// $Id: class.noticiasstory.php,v 1.1 2006/03/27 15:15:19 mikhail Exp $
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
// ------------------------------------------------------------------------- //

require_once XOOPS_ROOT_PATH . '/class/xoopsstory.php';
require_once XOOPS_ROOT_PATH . '/include/comment_constants.php';

class noticiasStory extends XoopsStory
{
    public $noticiastopic;   // XoopsTopic object

    public function __construct($storyid = -1)
    {
        $this->db = XoopsDatabaseFactory::getDatabaseConnection();

        $this->table = $this->db->prefix('stories');

        $this->topicstable = $this->db->prefix('topics');

        if (is_array($storyid)) {
            $this->makeStory($storyid);

            $this->noticiastopic = $this->topic();
        } elseif (-1 != $storyid) {
            $this->getStory((int)$storyid);

            $this->noticiastopic = $this->topic();
        }
    }

    public function getAllPublished($limit = 0, $start = 0, $checkRight = false, $topic = 0, $ihome = 0, $asobject = true)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();

        $myts = MyTextSanitizer::getInstance();

        $ret = [];

        $sql = 'SELECT * FROM ' . $db->prefix('stories') . ' WHERE published > 0 AND published <= ' . time() . ' AND (expired = 0 OR expired > ' . time() . ')';

        if (!empty($topic)) {
            $sql .= ' AND topicid=' . (int)$topic . ' AND (ihome=1 OR ihome=0)';
        } else {
            if ($checkRight) {
                global $xoopsUser;

                $moduleHandler = xoops_getHandler('module');

                $noticiasModule = $moduleHandler->getByDirname('noticias');

                $groups = $xoopsUser ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;

                $gpermHandler = xoops_getHandler('groupperm');

                $topics = $gpermHandler->getItemIds('noticias_view', $groups, $noticiasModule->getVar('mid'));

                $topics = implode(',', $topics);

                $sql .= ' AND topicid IN (' . $topics . ')';
            }

            if (0 == $ihome) {
                $sql .= ' AND ihome=0';
            }
        }

        if (!empty($uid) && (int)$uid > 0) {
            $sql .= ' AND uid=' . $uid;
        }

        $sql .= ' ORDER BY published DESC';

        $result = $db->query($sql, (int)$limit, (int)$start);

        while (false !== ($myrow = $db->fetchArray($result))) {
            if ($asobject) {
                $ret[] = new self($myrow);
            } else {
                $ret[$myrow['storyid']] = htmlspecialchars($myrow['title'], ENT_QUOTES | ENT_HTML5);
            }
        }

        return $ret;
    }

    // added new function to get all expired stories

    public function getAllExpired($limit = 0, $start = 0, $topic = 0, $ihome = 0, $asobject = true)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();

        $myts = MyTextSanitizer::getInstance();

        $ret = [];

        $sql = 'SELECT * FROM ' . $db->prefix('stories') . ' WHERE expired <= ' . time() . ' AND expired > 0';

        if (!empty($topic)) {
            $sql .= ' AND topicid=' . (int)$topic . ' AND (ihome=1 OR ihome=0)';
        } else {
            if (0 == $ihome) {
                $sql .= ' AND ihome=0';
            }
        }

        if (!empty($uid) && (int)$uid > 0) {
            $sql .= ' AND uid=' . $uid;
        }

        $sql .= ' ORDER BY expired DESC';

        $result = $db->query($sql, (int)$limit, (int)$start);

        while (false !== ($myrow = $db->fetchArray($result))) {
            if ($asobject) {
                $ret[] = new self($myrow);
            } else {
                $ret[$myrow['storyid']] = htmlspecialchars($myrow['title'], ENT_QUOTES | ENT_HTML5);
            }
        }

        return $ret;
    }

    public function getAllAutoStory($limit = 0, $asobject = true)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();

        $myts = MyTextSanitizer::getInstance();

        $ret = [];

        $sql = 'SELECT * FROM ' . $db->prefix('stories') . ' WHERE published > ' . time() . ' ORDER BY published ASC';

        $result = $db->query($sql, $limit, 0);

        while (false !== ($myrow = $db->fetchArray($result))) {
            if ($asobject) {
                $ret[] = new self($myrow);
            } else {
                $ret[$myrow['storyid']] = htmlspecialchars($myrow['title'], ENT_QUOTES | ENT_HTML5);
            }
        }

        return $ret;
    }

    /*
    * Get all submitted stories awaiting approval
    *
    * @param int $limit Denotes where to start the query
    * @param boolean $asobject true will return the stories as an array of objects, false will return storyid => title
    * @param boolean $checkRight whether to check the user's rights to topics
    */

    public function getAllSubmitted($limit = 0, $asobject = true, $checkRight = false)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();

        $myts = MyTextSanitizer::getInstance();

        $ret = [];

        $clause = '';

        $criteria = new CriteriaCompo(new Criteria('published', 0));

        if ($checkRight) {
            global $xoopsUser;

            if (!$xoopsUser) {
                return $ret;
            }

            $groups = $xoopsUser->getGroups();

            $gpermHandler = xoops_getHandler('groupperm');

            $moduleHandler = xoops_getHandler('module');

            $noticiasmodule = $moduleHandler->getByDirname('noticias');

            $allowedtopics = $gpermHandler->getItemIds('noticias_approve', $groups, $noticiasmodule->getVar('mid'));

            $criteria2 = new CriteriaCompo();

            foreach ($allowedtopics as $key => $topicid) {
                $criteria2->add(new Criteria('topicid', $topicid), 'OR');
            }

            $criteria->add($criteria2);
        }

        $criteria->setOrder('DESC');

        $criteria->setSort('created');

        $sql = 'SELECT * FROM ' . $db->prefix('stories');

        $sql .= ' ' . $criteria->renderWhere();

        $result = $db->query($sql, $limit, 0);

        while (false !== ($myrow = $db->fetchArray($result))) {
            if ($asobject) {
                $ret[] = new self($myrow);
            } else {
                $ret[$myrow['storyid']] = htmlspecialchars($myrow['title'], ENT_QUOTES | ENT_HTML5);
            }
        }

        return $ret;
    }

    public function getByTopic($topicid, $limit = 0)
    {
        $ret = [];

        $db = XoopsDatabaseFactory::getDatabaseConnection();

        $sql = 'SELECT * FROM ' . $db->prefix('stories') . ' WHERE topicid=' . (int)$topicid . ' AND published > 0 AND published <= ' . time() . ' AND (expired = 0 OR expired > ' . time() . ') ORDER BY published DESC';

        $result = $db->query($sql, (int)$limit, 0);

        while (false !== ($myrow = $db->fetchArray($result))) {
            $ret[] = new self($myrow);
        }

        return $ret;
    }

    public function countByTopic($topicid = 0)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();

        $sql = 'SELECT COUNT(*) FROM ' . $db->prefix('stories') . '
		WHERE expired >= ' . time() . '';

        if (0 != $topicid) {
            $sql .= ' AND  topicid=' . (int)$topicid;
        }

        $result = $db->query($sql);

        [$count] = $db->fetchRow($result);

        return $count;
    }

    public function countPublishedByTopic($topicid = 0, $checkRight = false)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();

        $sql = 'SELECT COUNT(*) FROM ' . $db->prefix('stories') . ' WHERE published > 0 AND published <= ' . time() . ' AND (expired = 0 OR expired > ' . time() . ')';

        if (!empty($topicid)) {
            $sql .= ' AND topicid=' . (int)$topicid;
        } else {
            $sql .= ' AND ihome=0';

            if ($checkRight) {
                global $xoopsUser, $xoopsModule;

                $groups = $xoopsUser ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;

                $gpermHandler = xoops_getHandler('groupperm');

                $topics = $gpermHandler->getItemIds('noticias_view', $groups, $xoopsModule->getVar('mid'));

                $topics = implode(',', $topics);

                $sql .= ' AND topicid IN (' . $topics . ')';
            }
        }

        $result = $db->query($sql);

        [$count] = $db->fetchRow($result);

        return $count;
    }

    public function topic_title()
    {
        return $this->noticiastopic->topic_title();
    }

    public function adminlink()
    {
        $ret = "&nbsp;[ <a href='" . XOOPS_URL . '/modules/noticias/submit.php?op=edit&amp;storyid=' . $this->storyid . "'>" . _EDIT . "</a> | <a href='" . XOOPS_URL . '/modules/noticias/admin/index.php?op=delete&amp;storyid=' . $this->storyid . "'>" . _DELETE . '</a> ]&nbsp;';

        return $ret;
    }

    public function imglink()
    {
        $ret = '';

        if ('' != $this->noticiastopic->topic_imgurl() && file_exists(XOOPS_ROOT_PATH . '/modules/noticias/images/topics/' . $this->noticiastopic->topic_imgurl())) {
            $ret = "<a href='"
                   . XOOPS_URL
                   . '/modules/noticias/index.php?storytopic='
                   . $this->topicid
                   . "'><img src='"
                   . XOOPS_URL
                   . '/modules/noticias/images/topics/'
                   . $this->noticiastopic->topic_imgurl()
                   . "' alt='"
                   . $this->noticiastopic->topic_title()
                   . "' hspace='10' vspace='10' align='"
                   . $this->topicalign()
                   . "'></a>";
        }

        return $ret;
    }

    public function textlink()
    {
        $ret = "<a href='" . XOOPS_URL . '/modules/noticias/index.php?storytopic=' . $this->topicid() . "'>" . $this->noticiastopic->topic_title() . '</a>';

        return $ret;
    }

    public function prepare2show()
    {
        global $xoopsUser, $xoopsConfig, $xoopsModule, $xoopsModuleConfig;

        $story = [];

        $story['id'] = $this->storyid();

        $story['poster'] = $this->uname();

        if (false !== $story['poster']) {
            $story['poster'] = "<a href='" . XOOPS_URL . '/userinfo.php?uid=' . $this->uid() . "'>" . $story['poster'] . '</a>';
        } else {
            if (3 != $xoopsModuleConfig['displayname']) {
                $story['poster'] = $xoopsConfig['anonymous'];
            }
        }

        $story['posttimestamp'] = $this->published();

        $story['posttime'] = formatTimestamp($story['posttimestamp']);

        $story['text'] = $this->hometext();

        $introcount = mb_strlen($story['text']);

        $fullcount = mb_strlen($this->bodytext());

        $totalcount = $introcount + $fullcount;

        $morelink = '';

        if ($fullcount > 1) {
            $morelink .= '<a href="' . XOOPS_URL . '/modules/noticias/article.php?storyid=' . $this->storyid() . '';

            $morelink .= '">' . _NW_READMORE . '</a> | ';

            $morelink .= sprintf(_NW_BYTESMORE, $totalcount);

            if (XOOPS_COMMENT_APPROVENONE != $xoopsModuleConfig['com_rule']) {
                $morelink .= ' | ';
            }
        }

        if (XOOPS_COMMENT_APPROVENONE != $xoopsModuleConfig['com_rule']) {
            $ccount = $this->comments();

            $morelink .= '<a href="' . XOOPS_URL . '/modules/noticias/article.php?storyid=' . $this->storyid() . '';

            $morelink2 = '<a href="' . XOOPS_URL . '/modules/noticias/article.php?storyid=' . $this->storyid() . '';

            if (0 == $ccount) {
                $morelink .= '">' . _NW_COMMENTS . '</a>';
            } else {
                if ($fullcount < 1) {
                    if (1 == $ccount) {
                        $morelink .= '">' . _NW_READMORE . '</a> | ' . $morelink2 . '">' . _NW_ONECOMMENT . '</a>';
                    } else {
                        $morelink .= '">' . _NW_READMORE . '</a> | ' . $morelink2 . '">';

                        $morelink .= sprintf(_NW_NUMCOMMENTS, $ccount);

                        $morelink .= '</a>';
                    }
                } else {
                    if (1 == $ccount) {
                        $morelink .= $morelink2 . '">' . _NW_ONECOMMENT . '</a>';
                    } else {
                        $morelink .= '">';

                        $morelink .= sprintf(_NW_NUMCOMMENTS, $ccount);

                        $morelink .= '</a>';
                    }
                }
            }
        }

        $story['morelink'] = $morelink;

        $story['adminlink'] = '';

        $approveprivilege = 0;

        $gpermHandler = xoops_getHandler('groupperm');

        if ($xoopsUser) {
            $groups = $xoopsUser->getGroups();
        } else {
            $groups = XOOPS_GROUP_ANONYMOUS;
        }

        if ($gpermHandler->checkRight('noticias_approve', $this->topicid(), $groups, $xoopsModule->getVar('mid'))) {
            $approveprivilege = 1;
        }

        if ($approveprivilege) {
            $story['adminlink'] = $this->adminlink();
        }

        $story['mail_link'] = 'mailto:?subject=' . sprintf(_NW_INTARTICLE, $xoopsConfig['sitename']) . '&amp;body=' . sprintf(_NW_INTARTFOUND, $xoopsConfig['sitename']) . ':  ' . XOOPS_URL . '/modules/noticias/article.php?storyid=' . $this->storyid();

        $story['imglink'] = '';

        $story['align'] = '';

        if ($this->topicdisplay()) {
            $story['imglink'] = $this->imglink();

            $story['align'] = $this->topicalign();
        }

        $story['title'] = "<a href='" . XOOPS_URL . '/modules/noticias/article.php?storyid=' . $this->storyid() . "'>" . $this->title() . '</a>';

        $story['hits'] = $this->counter();

        return $story;
    }

    public function uname()
    {
        $moduleHandler = xoops_getHandler('module');

        $module = $moduleHandler->getByDirname('noticias');

        $configHandler = xoops_getHandler('config');

        if ($module) {
            $moduleConfig = $configHandler->getConfigsByCat(0, $module->getVar('mid'));

            $option = $moduleConfig['displayname'];
        } else {
            $option = 1;
        }

        switch ($option) {
            case 1:        // Username
                return XoopsUser::getUnameFromId($this->uid);
            case 2:        // Display full name (if it is not empty)
                $thisuser = new XoopsUser($this->uid());
                $return = $thisuser->getVar('name');
                if ('' == $return) {
                    $return = $thisuser->getVar('uname');
                }

                return $return;
            case 3:        // Nothing
                return '';
        }
    }
}
