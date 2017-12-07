-- 创建表
CREATE TABLE `user1`(
  `id` INT UNSIGNED AUTO_INCREMENT KEY,
  `username` VARCHAR(20) NOT NULL UNIQUE,
  `age` TINYINT UNSIGNED NOT NULL DEFAULT 18,
  `sex` ENUM('男','女','保密') NOT NULL DEFAULT '保密',
  `married` TINYINT(1) NOT NULL DEFAULT 0,
  `salary` FLOAT(8,2) NOT NULL DEFAULT 0
)ENGINE=InnoDB CHARSET=UTF8;
-- 添加字段
ALTER TABLE user1 ADD `addr` VARCHAR(20) NOT NULL DEFAULT '北京';
-- 修改字段
ALTER TABLE user1 MODIFY `addr` VARCHAR(20) NOT NULL DEFAULT '北京' AFTER `sex`;

-- 插入字段
INSERT user1 VALUES(1,'Daniel',12,'男','北京',1,5000);

INSERT user1(usename,age,sex,addr,married,salary)
VALUES('Jans',23,'女','张家口',0,7000);

INSERT user1 SET username='Joe',age='23',sex='女',addr='张家口',salary=45000;

INSERT user1 VALUES
(NULL,'张三',36,'男','蓬莱',0,2300),
(NULL,'张三丰',42,'男','武当',0,2300),
(NULL,'张卫健',32,'男','香港',0,2300),
(NULL,'李四',62,'男','上阿辉',0,2300),
(NULL,'李时珍',56,'男','长安',0,2300),
(NULL,'宋书航',34,'男','核心世界',0,2300),
(NULL,'白',72,'男','闭关',0,2300);

-- 查询
SELECT * FROM user1 WHERE id=1;
SELECT username,addr,age FROM user1;

-- 查询learn数据库下的user1表中的所有记录
SELECT * FROM learn.user1;

-- 别名
SELECT id AS '编号',username AS '用户名',sex AS '性别' FROM learn.user1;

-- 给表起别名
SELECT id,username,age FROM user1 as u;

-- 表名.字段名
SELECT user1.id,user1.username,user1.age FROM user1;


-- WHERE 测试
SELECT id,username,age FROM user1 WHERE id=5;

-- 添加desc字段
ALTER TABLE `user1` ADD `desc` VARCHAR(100);

-- 更新id<=7的用户 desc = this is a test
UPDATE `user1` SET `desc`='this is a test' WHERE id<=6;

-- 检测desc 为空的用户
SELECT * FROM `user1` WHERE `desc`=NULL; -- 失败
SELECT * FROM `user1` WHERE `desc`<>NULL;

-- IS NOT NULL
SELECT * FROM `user1` WHERE `desc` IS NOT NULL;

-- 测试范围
SELECT * FROM `user1` WHERE `age` BETWEEN 15 AND 30;
SELECT * FROM `user1` WHERE `age` NOT BETWEEN 15 AND 30;

SELECT * FROM `user1` WHERE `salary` BETWEEN 0 AND 3000;

-- 指定集合 IN
SELECT * from `user1` WHERE `age` IN(23);
SELECT * from `user1` WHERE `age` NOT IN(23);
SELECT * from `user1` WHERE `username` IN('Joe');

-- 逻辑与AND 逻辑或OR
SELECT * from `user1` WHERE `married`=0 AND `salary`=2300 AND `age`=72;
SELECT * from `user1` WHERE `id`=1 OR `sex`='女';
SELECT * from `user1` WHERE `salary` BETWEEN 3000 AND 5000 AND `sex`='男';

-- like
SELECT * from `user1` WHERE `username` LIKE 'Joe';
SELECT * from `user1` WHERE `username` LIKE '%三%';
SELECT * from `user1` WHERE `username` LIKE '张%';

-- 用户名为三位的用户
SELECT * from `user1` WHERE `username` LIKE '___';










--