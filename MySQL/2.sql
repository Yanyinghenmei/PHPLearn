-- 创建数据库 imooc
CREATE DATABASE IF NOT EXISTS imooc DEFAULT CHARACTER SET UTF8;

-- 打开数据库
USE imooc;

-- 用户表 user
CREATE TABLE IF NOT EXISTS user(
  id INT,
  username VARCHAR(20),
  password char(32),
  email VARCHAR(50),
  age TINYINT,
  card CHAR(18),
  tel CHAR(11),
  salary FLOAT(8,2),
  married TINYINT(1),
  addr VARCHAR(100),
  sex ENUM('男','女','保密')
)ENGINE=INNODB CHARSET=UTF8;

-- 查看当前数据库下的数据表
SHOW TABLES;

-- 查看user表详细信息
SHOW CREATE TABLE user;

-- 三种方式查看表结构
DESC user;
DESCRIBE user;
SHOW COLUMNS FORM user;

-- 删除当前数据库下的表
DORP TABLE IF EXISTS user;






















--
