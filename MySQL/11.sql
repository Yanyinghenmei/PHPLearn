-- 添加和删除字段
CREATE TABLE IF NOT EXISTS `user`(
  `id` INT UNSIGNED AUTO_INCREMENT KEY
);

-- 添加用户名字段
ALTER TABLE `user` ADD `username` VARCHAR(20);

-- 密码
ALTER TABLE `user` ADD `password` CHAR(32) NOT NULL;
INSERT user(username,password) VALUES('daniel','213456');

ALTER TABLE `user` ADD `email` VARCHAR(50) NOT NULL UNIQUE AFTER `username`;

-- 添加测试字段
ALTER TABLE `user` ADD `test` TINYINT NOT NULL DEFAULT 0 FIRST;

-- 删除测试字段 使用 DROP [COLUMN]
ALTER TABLE `user` DROP `test`;

-- 添加age, addr字段, 删除email字段
ALTER TABLE `user`
ADD `age` TINYINT UNSIGNED NOT NULL DEFAULT 0,
ADD `addr` VARCHAR(50) NOT NULL DEFAULT '北京',
DROP `email`;

-- 添加默认值
ALTER TABLE `user` ALTER `username` SET DEFAULT '烟影很美';

-- 删除默认值
ALTER TABLE `user` ALTER `age` DROP DEFAULT;

-- 添加地址字段
ALTER TABLE `user` ADD `addr` VARCHAR(100);
ALTER TABLE `user` ALTER `addr` SET DEFAULT '张家口';
ALTER TABLE `user` ALTER `addr` DROP DEFAULT;

ALTER TABLE `user` ADD(`test1` CHAR NOT NULL,`test2` CHAR NOT NULL);

-- MODIFY|CHANGE
ALTER TABLE `user` MODIFY `username` VARCHAR(25) DEFAULT '烟影很美' FIRST;
ALTER TABLE `user` MODIFY `username` VARCHAR(25) DEFAULT '烟影很美' AFTER `id`;

ALTER TABLE `user` CHANGE `test2` `phone` INT(11) NOT NULL DEFAULT 0;
ALTER TABLE `user` MODIFY `username` VARCHAR(25) NOT NULL UNIQUE DEFAULT 'yan';
ALTER TABLE `user` CHANGE `tel` VARCHAR(11) NOT NULL DEFAULT '123456'; -- 失败1064
ALTER TABLE `user` CHANGE `tel` `tel` VARCHAR(11) NOT NULL DEFAULT '123456'; -- 成功

-- 添加删除主键
CREATE TABLE `pri_user`(
  `id` INT UNSIGNED,
  username VARCHAR(20)
);
ALTER TABLE `pri_user` ADD PRIMARY KEY(`id`);
ALTER TABLE `pri_user` DROP PRIMARY KEY;

CREATE TABLE `pri_auto_user`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL
);

-- MODIFY 不能修改PRIMARY KEY 属性
ALTER TABLE `pri_auto_user` MODIFY `id` INT UNSIGNED PRIMARY KEY; -- 失败
-- 有AUTO_INCREMENT属性的主键, 需要先删除这个属性, 才能删除主键属性
ALTER TABLE `pri_auto_user` DROP PRIMARY KEY;-- 失败
ALTER TABLE `pri_auto_user` MODIFY `id` INT UNSIGNED; -- 成功
ALTER TABLE `pri_auto_user` DROP PRIMARY KEY;-- 成功




-- 测试添加和删除唯一
CREATE TABLE `unique_user`(
  id INT UNSIGNED AUTO_INCREMENT KEY,
  username VARCHAR(20) NOT NULL UNIQUE,
  password CHAR(32) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE
);

-- 删除唯一索引
ALTER TABLE `unique_user` DROP INDEX username;
-- 添加唯一属索引 KEY可以写为INDEX 默认使用字段名称为索引名称
ALTER TABLE `unique_user` ADD UNIQUE KEY(username);
-- 添加唯一索引  KEY可以写为INDEX 指定索引名称
ALTER TABLE `unique_user` ADD UNIQUE KEY uni_email(email);
-- 删除索引  这里只能写INDEX
ALTER TABLE `unique_user` DROP INDEX uni_email;
