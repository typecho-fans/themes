CREATE TABLE `typecho_links_upgrade` (
  `lid` INTEGER NOT NULL PRIMARY KEY,
  `name` varchar(200) default NULL,
  `url` varchar(200) default NULL,
  `sort` varchar(200) default NULL,
  `image` varchar(200) default NULL,
  `description` varchar(200) default NULL,
  `user` varchar(200) default NULL,
  `order` int(10) default '0'
);
INSERT INTO `typecho_links_upgrade` (`lid`, `name`, `url`, `sort`, `image`, `description`, `user`, `order`)
SELECT `lid`, `name`, `url`, NULL, NULL, `description`, NULL, `order` FROM `typecho_links`;
DROP TABLE `typecho_links`;
CREATE TABLE `typecho_links` (
  `lid` INTEGER NOT NULL PRIMARY KEY,
  `name` varchar(200) default NULL,
  `url` varchar(200) default NULL,
  `sort` varchar(200) default NULL,
  `image` varchar(200) default NULL,
  `description` varchar(200) default NULL,
  `user` varchar(200) default NULL,
  `order` int(10) default '0'
);
INSERT INTO `typecho_links` SELECT * FROM `typecho_links_upgrade`;
DROP TABLE `typecho_links_upgrade`;
