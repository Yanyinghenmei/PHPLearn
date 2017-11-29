-- 字符型测试(char)

CREATE TABLE test_str(
  a CHAR(5),
  b VARCHAR(5)
);

INSERT test_str(a,b) VALUES('','');
INSERT test_str(a,b) VALUES('a','a');
INSERT test_str(a,b) VALUES('ab','ab');
INSERT test_str(a,b) VALUES('abc','abc');
INSERT test_str(a,b) VALUES('abcd','abcd');
INSERT test_str(a,b) VALUES('abcde','abcde');
INSERT test_str(a,b) VALUES('abcdef','abcdef');
INSERT test_str(a,b) VALUES(' 1 ',' 1 ');

-- CHAR 默认存储数据的时候, 会用空格填充到指定长度; 而在检索的时候会去掉后面的空格
-- VARCHAR 在保存的时候不会自动填充, 在检索的时候也不会去掉数据后面的空格

-- TEXT 的列不能有默认值
CREATE TABLE test_text(
  content TEXT DEFAULT 'THIS THE TEST'
);
-- 报错: ERROR 1101 (42000): BLOB/TEXT column 'content' can't have a default value
-- TEXT 在检索过程中不存在大小写转换

-- 测试枚举类型
CREATE TABLE test_enum(
  sex ENUM('男','女','保密')
);

INSERT test_enum(sex) VALUES('男');
INSERT test_enum(sex) VALUES(NULL);
INSERT test_enum(sex) VALUES(1);

-- 测试集合
CREATE TABLE test_set(
  a SET('A','B','C','D','E','F')
);

INSERT test_set(a) VALUES('A');
INSERT test_set(a) VALUES('B');
INSERT test_set(a) VALUES('C','B','F'); -- 错误的
INSERT test_set(a) VALUES('C,B,A'); -- 正确的
INSERT test_set(a) VALUES('CBA'); -- 错误的
INSERT test_set(a) VALUES('C,B,H'); -- 正确的
