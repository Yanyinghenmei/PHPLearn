CREATE DATABASE IF NOT EXISTS daniel DEFAULT CHARACTER SET 'UTF8';
USE daniel;

CREATE TABLE IF NOT EXISTS user(
  id INT UNSIGNED AUTO_INCREMENT KEY COMMENT '编号',
  username VARCHAR(20) NOT NULL UNIQUE COMMENT '用户名',
  age TINYINT UNSIGNED DEFAULT 18 COMMENT '年龄',
  email VARCHAR(50) NOT NULL DEFAULT '1113135372@qq.com' COMMENT '邮箱'
)ENGINE=InnoDB CHARSET=UTF8;

-- 不指定字段名称
INSERT `user` VALUE(1,'daniel',23,'asdf@qq.com');
INSERT `user` VALUES(NULL,'queen',24,'as22@qq.com');
INSERT `user` VALUES(NULL,'Jans',24,'as22@qq.com');

-- 列出指定制度按
INSERT `user`(username,email) VALUES('PDD','pdd@qq.com');

-- 一次插入多条
INSERT `user`(username,age,email) VALUES
('Bob',54,'jsjsjs@qq.com'),
('Jack',77,'slslsl@163.com'),
('Tom',22,'osoxoox@google.com');

-- INSERT SET
INSERT `user` SET username='Tim',age=21,email='lxoxox@qq.com';

-- 新建测试表
CREATE TABLE `test`(
  id INT UNSIGNED AUTO_INCREMENT KEY,
  username VARCHAR(20) NOT NULL UNIQUE,
  age TINYINT UNSIGNED DEFAULT 17,
  email VARCHAR(50) NOT NULL DEFAULT '123123@qq.com'
);
INSERT `test`(username,age,email) VALUES
('sougou',83,'aaa@qq.com'),
('douyu',67,NULL);

-- insert ... select ...
INSERT `user`(username,age,email) SELECT username,age,email FROM `test`;
