CREATE DATABASE IF NOT EXISTS `test2` DEFAULT CHARSET 'UTF8';

CREATE table `emp`(
  `id` INT UNSIGNED AUTO_INCREMENT KEY,
  `username` VARCHAR(20) NOT NULL UNIQUE,
  `age` TINYINT UNSIGNED NOT NULL DEFAULT 18,
  `sex` ENUM('男','女','保密') NOT NULL DEFAULT '保密',
  `addr` VARCHAR(20) NOT NULL DEFAULT '北京',
  depId TINYINT UNSIGNED NOT NULL COMMENT '部门对应的编号'
);
INSERT emp(username,age,depId) VALUES('king',23,1),
('Daniel',25,2),
('Joe',24,3),
('Rose',26,1),
('John',29,2),
('Bob',32,3);

INSERT emp(username,age,depId) VALUES('测试用户',89,5);
INSERT emp(username,age,depID) VALUES('Cat',28,4);

CREATE TABLE `dep`(
  `id` TINYINT UNSIGNED AUTO_INCREMENT KEY,
  `depName` VARCHAR(50) NOT NULL,
  `depDesc` VARCHAR(100) NOT NULL DEFAULT ''
)ENGINE=InnoDB CHARSET=UTF8;

INSERT dep(depName,depDesc) VALUES('PHP教学部','研发PHP课件'),
('JAVA教学部','研发JAVA课件'),
('WEB教学部','研发WEB课件'),
('iOS教学部','研发iOS课件');

-- 查询emp信息, 部门名称
SELECT emp.id,emp.username,emp.age,dep.depName FROM emp,dep; -- 笛卡尔积

-- 内连接查询
SELECT e.id,e.username,e.age,d.depName
FROM emp AS e INNER JOIN dep AS d ON e.depId=d.id;

-- 左外链接查询
SELECT e.id,e.username,e.age,e.addr,
d.id,d.depName,d.depDesc
FROM emp AS e
LEFT OUTER JOIN dep AS d
ON d.id=e.depId;

-- 右外链接查询
SELECT e.id,e.username,e.age,e.addr,
d.id,d.depName,d.depDesc
FROM emp AS e
RIGHT OUTER JOIN dep AS d
ON d.id=e.depId;



CREATE TABLE `user`(
  `id` TINYINT UNSIGNED AUTO_INCREMENT KEY,
  `username` VARCHAR(20) NOT NULL UNIQUE,
  `email` VARCHAR(50) NOT NULL DEFAULT '13435372@qq.com',
  `proName` VARCHAR(10) NOT NULL DEFAULT '河北省'
);
INSERT user(username,proName) VALUES
('a','北京'),
('b','河北'),
('c','哈尔滨'),
('d','上海'),
('e','深圳'),
('f','广州'),
('g','重庆');

CREATE TABLE `pro`(
  `id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `proName` VARCHAR(10) NOT NULL UNIQUE
);
INSERT pro(proName) VALUES('北京'),('上海'),('深圳');

CREATE TABLE `user`(
  `id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(20) NOT NULL UNIQUE,
  `email` VARCHAR(50) NOT NULL DEFAULT '123123@qq.com',
  `proId` TINYINT UNSIGNED NOT NULL
);
INSERT user(username,proId) VALUES
('a',1),('b',3),
('c',2),('d',1),
('e',1),('f',2),
('g',3),('h',1);

-- 内连接查询
SELECT u.id,u.username,p.proName
FROM user AS u
JOIN pro AS p
ON u.proId=p.id;

UPDATE `pro` SET proName='首都' WHERE id=1;


CREATE TABLE `goodsType`(
  `id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `cateName` VARCHAR(50) NOT NULL UNIQUE,
  `cateDesc` VARCHAR(100) NOT NULL DEFAULT '未填写商品描述'
);
INSERT goodsType(cateName) VALUES('母婴'),('服装'),('电子');

CREATE TABLE `goodsList`(
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `productName` VARCHAR(50) NOT NULL UNIQUE,
  `price` FLOAT(8,2) NOT NULL DEFAULT 1,
  `cateId` TINYINT UNSIGNED NOT NULL,
  `adminId` TINYINT UNSIGNED NOT NULL
);
INSERT goodsList(productName,price,cateId,adminId) VALUES
('ipone9',9888,3,1),
('adidas',388,2,2),
('nike',9888,2,2),
('奶瓶',9888,1,1);

-- 查询pro.id,pro.name.pro.price | cate.name
SELECT p.id,p.productName,p.cateId,c.cateName
FROM goodsList AS p
INNER JOIN goodsType AS c
ON p.cateId=c.id;

-- 管理员 id,name,email,proName
SELECT u.id,u.username,p.proName
FROM user AS u
INNER JOIN pro AS p
ON u.proId=p.id;

-- goods.id name price cate adminname email
SELECT g.id,g.productName,g.price,c.cateName,u.username,u.email
FROM goodsList AS g
INNER JOIN goodsType AS c ON g.cateId=c.id
INNER JOIN user AS u ON g.adminId=u.id
WHERE g.price>500
ORDER BY g.price DESC
LIMIT 0,2;

-- 价格小于500







--
