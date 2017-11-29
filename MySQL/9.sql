-- 测试 NOT NULL
CREATE TABLE test_notnull(
  a VARCHAR(20),
  b VARCHAR(20) NOT NULL
);
INSERT test_notnull(a,b) VALUES('','');
INSERT test_notnull(a,b) VALUES(NULL,NULL); -- 报错
INSERT test_notnull(a) VALUES(NULL);        -- 报错

-- DEFAULT 测试
CREATE TABLE test_default(
  id INT UNSIGNED AUTO_INCREMENT KEY,
  username VARCHAR(20) NOT NULL,
  age TINYINT UNSIGNED DEFAULT 18,
  email VARCHAR(20) NOT NULL DEFAULT '123123@qq.com'
);

INSERT test_default(username) VALUES('Deniel');
INSERT test_default(username,age) VALUES('Deniel',NULL);

CREATE TABLE test_default_enum(
  id INT UNSIGNED NOT NULL KEY AUTO_INCREMENT,
  sex ENUM('a','b','c') NOT NULL DEFAULT 'a'
);

INSERT test_default_enum(sex) VALUES(DEFAULT);

-- UNIQUE KEY 除NULL不可以重复, 可以有多个字段
CREATE TABLE test_unique(
  id INT UNSIGNED AUTO_INCREMENT KEY,
  username VARCHAR(20) NOT NULL UNIQUE KEY,
  email VARCHAR(20) UNIQUE KEY
);

INSERT test_unique(username) VALUES('a');


-- 因为AUTO_INREMENT 和 PRIMARY KEY 配合使用, 测试一下
CREATE TABLE test_autoandpri1(
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
); -- 成功
CREATE TABLE test_autoandpri2(
  id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
); -- 成功
CREATE TABLE test_autoandpri3(
  id INT(4) UNSIGNED AUTO_INCREMENT ZEROFILL PRIMARY KEY
); -- 失败
CREATE TABLE test_autoandpri4(
  id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY ZEROFILL
); -- 失败 好吧, 并不是auto_increment 和 primary key 挨着就可以...
CREATE TABLE test_autoandpri5(
  id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL
); -- 成功
CREATE TABLE test_autoandpri6(
  id INT(4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY
); -- 成功
