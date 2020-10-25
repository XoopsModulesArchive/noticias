<?php

include '../../mainfile.php';
require_once __DIR__ . '/class/class.sfiles.php';

$myts = MyTextSanitizer::getInstance(); // MyTextSanitizer object
$fileid = (isset($_GET['fileid'])) ? (int)$_GET['fileid'] : 0;
if (empty($fileid)) {
    redirect_header('index.php', 2, _ERRORS);

    exit();
}

$sfiles = new sFiles($fileid);
$sfiles->updateCounter();
$url = XOOPS_UPLOAD_URL . '/' . $sfiles->getDownloadname();
if (!preg_match("/^ed2k*:\/\//i", $url)) {
    header("Location: $url");
}
echo '<html><head><meta http-equiv="Refresh" content="0; URL=' . htmlspecialchars($url, ENT_QUOTES | ENT_HTML5) . '"></meta></head><body></body></html>';
exit();
