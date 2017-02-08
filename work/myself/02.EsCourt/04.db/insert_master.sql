/*
-- Query: 
-- Date: 2017-01-25 13:37
*/
INSERT INTO `menber_types` (`id`,`title`) VALUES (NULL,'管理者');
INSERT INTO `menber_types` (`id`,`title`) VALUES (NULL,'プレミアム');
INSERT INTO `menber_types` (`id`,`title`) VALUES (NULL,'ベーシック');
INSERT INTO `menber_types` (`id`,`title`) VALUES (NULL,'公営');
INSERT INTO `menber_types` (`id`,`title`) VALUES (NULL,'私営');


/*
-- Query: 
-- Date: 2017-01-25 13:38
*/
INSERT INTO `masters` (`id`,`email`,`password`,`member_type_id`) VALUES (NULL,'yahagi1989@gmail.com','welcome1',1);


/*
-- Query: 
-- Date: 2017-01-25 13:38
*/
INSERT INTO `administrators` (`id`,`created`,`modified`,`deleted`,`crawler_path`,`reserver_path`,`name`,`postcode`,`address`,`email`,`password`,`tel`,`member_type_id`) VALUES (NULL,NULL,NULL,NULL,NULL,NULL,'東京都',NULL,NULL,NULL,NULL,NULL,4);
INSERT INTO `administrators` (`id`,`created`,`modified`,`deleted`,`crawler_path`,`reserver_path`,`name`,`postcode`,`address`,`email`,`password`,`tel`,`member_type_id`) VALUES (NULL,NULL,NULL,NULL,NULL,NULL,'目黒区',NULL,NULL,NULL,NULL,NULL,4);


/*
-- Query: 
-- Date: 2017-01-25 13:37
*/
INSERT INTO `jobs` (`id`,`name`) VALUES (NULL,'学生');
INSERT INTO `jobs` (`id`,`name`) VALUES (NULL,'会社員');
INSERT INTO `jobs` (`id`,`name`) VALUES (NULL,'公務員');
INSERT INTO `jobs` (`id`,`name`) VALUES (NULL,'経営者');
INSERT INTO `jobs` (`id`,`name`) VALUES (NULL,'自営業');
INSERT INTO `jobs` (`id`,`name`) VALUES (NULL,'テニス関連業務');
INSERT INTO `jobs` (`id`,`name`) VALUES (NULL,'その他');


/*
-- Query: 
-- Date: 2017-01-25 13:38a
*/
INSERT INTO `notifies` (`id`,`name`) VALUES (NULL,'即決');
INSERT INTO `notifies` (`id`,`name`) VALUES (NULL,'要確認');


/*
-- Query: 
-- Date: 2017-01-25 13:36
*/
INSERT INTO `court_types` (`id`,`name`) VALUES (NULL,'オムニコート');
INSERT INTO `court_types` (`id`,`name`) VALUES (NULL,'クレーコート');
INSERT INTO `court_types` (`id`,`name`) VALUES (NULL,'ハードコート');


/*
-- Query: 
-- Date: 2017-01-25 13:36
*/
INSERT INTO `properties` (`id`, `key`,`value`) VALUES (NULL, 'batchkey', 'welcome1');
