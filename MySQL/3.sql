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

-- INSERT [INTO] tbl_name(id,username,...) VALUES(1,...);

-- 向user插入一套记录
INSERT user(id,username,password,email,age,card,tel,salary,married,addr,sex)
VALUES(1,'Daniel','123456','113135372@qq.com','19','13072619920119021x','18231056960',888888.68,0,'北京','男');

-- 查询表中所有记录 SELECT * FROM tbl_name;
SELECT * FROM user;
