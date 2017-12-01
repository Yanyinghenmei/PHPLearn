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
