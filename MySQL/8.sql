-- 测试主键 primary key
CREATE TABLE test_primarykey(
  id INT UNSIGNED PRIMARY KEY,
  username VARCHAR(20)
);
INSERT test_primarykey(id,username) VALUES(1,'Daniel');
INSERT test_primarykey(username) VALUES('daniel');

CREATE TABLE test_key(
  id INT UNSIGNED KEY,
  username VARCHAR(20)
);

CREATE TABLE test_endkey(
  id INT UNSIGNED,
  username VARCHAR(20),
  PRIMARY KEY(id)
);

-- 复合主键 复合主键同时相同才是重复记录
CREATE TABLE test_reunitekey(
  id INT UNSIGNED,
  tel VARCHAR(20),
  username VARCHAR(20),
  PRIMARY KEY(id,tel)
);

INSERT test_reunitekey(id,tel,username) VALUES(0,'18231056960','Daniel');
INSERT test_reunitekey(id,tel,username) VALUES(0,'13716756947','Daniel');
INSERT test_reunitekey(id,tel,username) VALUES(0,'18231056960','Jans');

-- AOTO_INCREMENT 自动增长,默认从1开始,每次已经有的编号最大值上+1
-- 一个表中只能有一个自动增长项, 并且必须是主键或者复合主键
CREATE TABLE test_auto_increment(
  id INT UNSIGNED KEY AUTO_INCREMENT,
  username VARCHAR(20)
);

INSERT test_auto_increment(username) VALUES('a');
INSERT test_auto_increment(username) VALUES('b');
INSERT test_auto_increment(username) VALUES('c');
INSERT test_auto_increment(id,username) VALUES(NULL,'c');
INSERT test_auto_increment(id,username) VALUES(DEFAULT,'c');
INSERT test_auto_increment(id,username) VALUES(15,'e');
INSERT test_auto_increment(username) VALUES('f');

-- ZEROFILL
CREATE TABLE test_auto_zerofill(
  id INT(5) UNSIGNED ZEROFILL AUTO_INCREMENT,
  username VARCHAR(20)
);

INSERT test_auto_zerofill(username) VALUES('daniel');


-- 选择题  创建失败, 因为number不是key
CREATE TABLE score(
  number INT UNSIGNED KEY AUTO_INCREMENT,
  stuname VARCHAR(20) NOT NULL
);
