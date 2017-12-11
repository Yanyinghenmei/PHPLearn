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

-- 测试分组
SELECT * from `user1` GROUP BY `sex`;
SELECT * from `user1` GROUP BY `addr`;

SELECT GROUP_CONCAT(`username`),GROUP_CONCAT(`age`),`sex`,`addr`
FROM `user1` GROUP BY `sex`;

-- 测试COUNT()
SELECT COUNT(*) AS total_users FROM `user1`;
SELECT COUNT(`desc`) FROM `user1`;

-- 按照sex分组, 得到用户名详情, 分别统计组中的总人数
SELECT GROUP_CONCAT(username),COUNT(*) AS total_count,sex FROM user1
GROUP BY sex;

-- 按照addr分钟, 得到用户名详情, 总人数, 年龄综合, 年龄最大值
SELECT GROUP_CONCAT(username),
COUNT(*) AS total_count,SUM(age) AS sum_age, MAX(age) AS max_age
FROM user1 GROUP BY addr;

SELECT sex,GROUP_CONCAT(username) AS user_names,
COUNT(*) AS total_count,
SUM(salary) AS sum_salary,
MAX(salary) AS max_salary,
MIN(salary) AS min_salary,
AVG(salary) AS avg_salary
FROM user1 GROUP BY sex;

SELECT GROUP_CONCAT(username) AS user_names,
COUNT(*) AS total_count FROM user1 GROUP BY sex
WITH ROLLUP;

SELECT GROUP_CONCAT(username) AS user_names,
COUNT(*) AS total_count FROM user1 GROUP BY addr
WITH ROLLUP; -- 末尾加一个查询的综合

SELECT sex,GROUP_CONCAT(username) AS user_names,
COUNT(*) AS total_count,
SUM(salary) AS sum_salary,
MAX(salary) AS max_salary,
MIN(salary) AS min_salary,
AVG(salary) AS avg_salary
FROM user1 GROUP BY 1; -- 按照位置指定分组的字段

SELECT GROUP_CONCAT(username) AS usersDetail,SUM(age)
FROM user1 WHERE age>=15 GROUP BY sex WITH ROLLUP;

-- HAVING 测试  对分组结果进行二次筛选, 组中总人数等于1
SELECT addr,GROUP_CONCAT(username),COUNT(*) AS total_count
FROM user1 GROUP BY 1 HAVING COUNT(*)<=>1;

SELECT addr,GROUP_CONCAT(username),COUNT(*) AS total_count
FROM user1 GROUP BY 1 HAVING total_count<=>1;

-- 练习
SELECT GROUP_CONCAT(username),
COUNT(*) AS total_count,
SUM(salary) AS sum_salary,
MAX(salary) AS max_salary,
MIN(salary) AS min_salary,
AVG(salary) AS avg_salary
FROM user1 GROUP BY addr
having avg_salary>=5000;

CREATE TABLE student(
  id INT UNSIGNED AUTO_INCREMENT KEY,
  grade TINYINT UNSIGNED DEFAULT 0,
  age TINYINT UNSIGNED DEFAULT 0
);


-- 测试排序
SELECT * FROM user1 ORDER BY salary DESC;
SELECT * FROM user1 ORDER BY age;
SELECT * FROM user1 ORDER BY age DESC;

-- 按照多个字段排序  salary一样的话, 按照age排序
SELECT * FROM user1 ORDER BY salary DESC, age DESC;

-- 随机排序
SELECT * FROM user1 ORDER BY RAND();

-- 测试limit 显示前3条
SELECT * FROM user1 LIMIT 3;
SELECT * FROM user1 ORDER BY id DESC LIMIT 0,3;
-- 偏移3, 显示5条
SELECT * FROM user1 ORDER BY id DESC LIMIT 3,5;

-- var page=1, page_size=10;
SELECT * from user1 LIMIT (page-1)*page_size,page_size;


-- 练习
UPDATE `user1` SET age=age+5 LIMIT 3;
UPDATE `user1` SET age=age-10 ORDER BY id DESC LIMIT 3;

-- 删除前三条
DELETE FROM `user1` LIMIT 3;
DELETE FROM `user1` ORDER BY id LIMIT 3;

DELETE FROM `user1` ORDER BY id DESC LIMIT 3;

-- 综合练习
SELECT salary,
GROUP_CONCAT(username) AS user_names,
COUNT(*) total_count,
SUM(age) AS sum_age,
MAX(age) AS max_age,
MIN(age) AS min_age,
AVG(age) AS avg_age
FROM user1
WHERE id>=3
GROUP BY salary HAVING salary>=5000
ORDER BY total_count DESC
LIMIT 0,1;







--
