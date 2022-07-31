
update contest set start_time='2099-01-01 00:00:00' where start_time='0000-00-00 00:00:00';
update contest set end_time='2099-01-01 00:00:00' where end_time='0000-00-00 00:00:00';
 
CREATE TABLE `topic` ( `tid` int(11) NOT NULL auto_increment, `title` varbinary(60) NOT NULL, `status` int(2) NOT NULL default '0', `top_level` int(2) NOT NULL default '0', `cid` int(11) default NULL, `pid` int(11) NOT NULL, `author_id` varchar(20) NOT NULL, PRIMARY KEY (`tid`), KEY `cid` (`cid`,`pid`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ;

CREATE TABLE `reply` ( `rid` int(11) NOT NULL auto_increment, `author_id` varchar(20) NOT NULL, `time` datetime NOT NULL default '2000-01-01 00:00:01', `content` text NOT NULL, `topic_id` int(11) NOT NULL, `status` int(2) NOT NULL default '0', `ip` varchar(30) NOT NULL, PRIMARY KEY (`rid`), KEY `author_id` (`author_id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ;
ALTER TABLE `problem` DROP COLUMN `sample_Program`, DROP COLUMN `ratio`, DROP COLUMN `error`, DROP COLUMN `difficulty`, DROP COLUMN `submit_user`, DROP COLUMN `case_time_limit`; ;
;

CREATE TABLE `sim` ( `s_id` int(11) NOT NULL, `sim_s_id` int(11) NULL, `sim` int(11) NULL, PRIMARY KEY (`s_id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8;;

CREATE TABLE `mail` ( `mail_id` int(11) NOT NULL auto_increment, `to_user` varchar(20) NOT NULL default '', `from_user` varchar(20) NOT NULL default '', `title` varchar(200) NOT NULL default '', `content` text, `new_mail` tinyint(1) NOT NULL default '1', `reply` tinyint(4) default '0', `in_date` datetime default NULL, `defunct` char(1) NOT NULL default 'N', PRIMARY KEY (`mail_id`), KEY `uid` (`to_user`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000 ;
ALTER TABLE `solution` MODIFY COLUMN `pass_rate` DECIMAL(3,2) UNSIGNED NOT NULL DEFAULT 0,MODIFY COLUMN in_date datetime not null default '2009-06-13 19:00:00', MODIFY COLUMN `user_id` CHAR(48)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,MODIFY COLUMN `ip` CHAR(15)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `solution` DROP COLUMN `className`;
select langmask from contest limit 1;;
ALTER TABLE `contest` ADD COLUMN `langmask` TINYINT NOT NULL DEFAULT 0 COMMENT 'bits for LANG to mask' AFTER `private`;;
optimize table `compileinfo`,`contest` ,`contest_problem` ,`loginlog`,`news`,`privilege`,`problem` ,`solution`,`source_code`,`users`,`topic`,`reply`,`online`,`sim`,`mail`;;
;
ALTER TABLE `contest` MODIFY COLUMN `langmask` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'bits for LANG to mask';;
;

CREATE TABLE `runtimeinfo` ( `solution_id` int(11) NOT NULL DEFAULT '0', `error` text, PRIMARY KEY (`solution_id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8; ;

ALTER TABLE `solution` ADD COLUMN `pass_rate` DECIMAL(3,2) UNSIGNED NOT NULL DEFAULT 0 AFTER `judgetime`;;
ALTER TABLE `users` MODIFY COLUMN `user_id` varchar(48) NOT NULL DEFAULT '' COMMENT 'user_id';;
;
ALTER TABLE `topic` MODIFY COLUMN `author_id` varchar(48) NOT NULL DEFAULT '' COMMENT 'user_id';;
;
ALTER TABLE `mail` MODIFY COLUMN `to_user` varchar(48) NOT NULL DEFAULT '' COMMENT 'user_id',MODIFY COLUMN `from_user` varchar(48) NOT NULL DEFAULT '' COMMENT 'user_id';;
;
ALTER TABLE `reply` MODIFY COLUMN `author_id` varchar(48) NOT NULL DEFAULT '' COMMENT 'user_id';;
;
ALTER TABLE `news` MODIFY COLUMN `user_id` varchar(48) NOT NULL DEFAULT '' COMMENT 'user_id';;
;
ALTER TABLE `sim` ADD INDEX `Index_sim_id`(`sim_s_id`);;
;
ALTER TABLE `contest_problem` ADD INDEX `Index_contest_id`(`contest_id`);;
;
CREATE TABLE `custominput` ( `solution_id` int(11) NOT NULL DEFAULT '0', `input_text` text, PRIMARY KEY (`solution_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;;
ALTER TABLE `loginlog` ADD INDEX `user_time_index`(`user_id`, `time`);;
;
ALTER TABLE `contest` ADD `password` CHAR( 16 ) NOT NULL DEFAULT '' AFTER `langmask` ;
;
create TABLE `source_code_user` like source_code;
;
insert into source_code_user select * from source_code where solution_id not in (select solution_id from source_code_user) ;
;
ALTER TABLE `solution` ADD `judger` CHAR(16) NOT NULL DEFAULT 'LOCAL' ; ;
alter table solution modify column pass_rate decimal(3,2) NOT NULL DEFAULT 0;;
;
ALTER TABLE `solution` CHANGE `ip` `ip` CHAR( 46 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '';;
;
CREATE TABLE `printer` ( `printer_id` int(11) NOT NULL AUTO_INCREMENT, `user_id` char(48) NOT NULL, `in_date` datetime NOT NULL DEFAULT '2018-03-13 19:38:00', `status` smallint(6) NOT NULL DEFAULT '0', `worktime` timestamp NULL DEFAULT CURRENT_TIMESTAMP, `printer` CHAR(16) NOT NULL DEFAULT 'LOCAL', `content` text NOT NULL , PRIMARY KEY (`printer_id`) ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE `balloon` ( `balloon_id` int(11) NOT NULL AUTO_INCREMENT, `user_id` char(48) NOT NULL, `sid` int(11) NOT NULL , `cid` int(11) NOT NULL , `pid` int(11) NOT NULL , `status` smallint(6) NOT NULL DEFAULT '0', PRIMARY KEY (`balloon_id`) ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;;
create TABLE `share_code` ( `share_id` int(11) NOT NULL AUTO_INCREMENT, `user_id` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL, `title` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL, `share_code` text COLLATE utf8_unicode_ci, `language` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL, `share_time` datetime DEFAULT NULL, PRIMARY KEY (`share_id`) ) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;
alter TABLE `contest` ADD `user_id` CHAR( 48 ) NOT NULL DEFAULT 'admin' AFTER `password` ;
update contest c inner JOIN (SELECT * FROM privilege WHERE rightstr LIKE 'm%') p ON concat('m',contest_id)=rightstr set c.user_id=p.user_id;
alter TABLE `contest_problem` ADD `c_accepted` INT NOT NULL DEFAULT '0' AFTER `num` ,ADD `c_submit` INT NOT NULL DEFAULT '0' AFTER `c_accepted` ;;
update contest_problem cp inner join (select count(1) submit,contest_id cid,num from solution where contest_id>0 group by contest_id,num) sb on cp.contest_id=sb.cid and cp.num=sb.num set cp.c_submit=sb.submit;update contest_problem cp inner join (select count(1) ac,contest_id cid,num from solution where contest_id>0 and result=4 group by contest_id,num) sb on cp.contest_id=sb.cid and cp.num=sb.num set cp.c_accepted =sb.ac;
alter table solution add column nick char(20) not null default '' after user_id ;
update solution s inner join users u on s.user_id=u.user_id set s.nick=u.nick;
alter table privilege add index user_id_index(user_id);
ALTER TABLE `problem` CHANGE `time_limit` `time_limit` DECIMAL(10,3) NOT NULL DEFAULT '0';
