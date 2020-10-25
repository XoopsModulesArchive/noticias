<?php

require dirname(__DIR__, 3) . '/include/cp_header.php';

xoops_cp_header();
if ($xoopsModule->getVar('version') > 120) {
    redirect_header('index.php', 3, _AM_NOTICIAS_UPGRADECOMPLETE);

    exit();
}

$sql = 'CREATE TABLE ' . $xoopsDB->prefix('stories_files') . " (
  fileid int(8) unsigned NOT NULL auto_increment,
  filerealname varchar(255) NOT NULL default '',
  storyid int(8) unsigned NOT NULL default '0',
  date int(10) NOT NULL default '0',
  mimetype varchar(64) NOT NULL default '',
  downloadname varchar(255) NOT NULL default '',
  counter int(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (fileid),
  KEY storyid (storyid)
) ENGINE = ISAM;";
if ($xoopsDB->query($sql)) {
    echo _AM_NOTICIAS_UPGRADECOMPLETE . " - <a href='" . XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=noticias'>" . _AM_UPDATEMODULE . '</a>';
} else {
    echo _AM_NOTICIAS_UPGRADEFAILED;
}
xoops_cp_footer();
