#
# Table structure for table `stories_files`
#

CREATE TABLE stories_files (
    fileid       INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    filerealname VARCHAR(255)    NOT NULL DEFAULT '',
    storyid      INT(8) UNSIGNED NOT NULL DEFAULT '0',
    date         INT(10)         NOT NULL DEFAULT '0',
    mimetype     VARCHAR(64)     NOT NULL DEFAULT '',
    downloadname VARCHAR(255)    NOT NULL DEFAULT '',
    counter      INT(8) UNSIGNED NOT NULL DEFAULT '0',
    PRIMARY KEY (fileid),
    KEY storyid (storyid)
)
    ENGINE = ISAM;
