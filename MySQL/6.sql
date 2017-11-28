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
