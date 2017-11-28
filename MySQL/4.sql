-- 测试整型
CREATE TABLE test_int(
  a tinyint,
  b smallint,
  c mediumint,
  d int,
  e bigint
);

-- 超出数据的范围, 会产生截断现象
INSERT test_int(a) VALUES(-128);

-- 测试无符号;
CREATE TABLE test_unsigned(
  a tinyint,
  b tinyint unsigned
);

INSERT test_unsigned(a,b) VALUES(-12,-12);
INSERT test_unsigned(a,b) VALUES(0,0);
INSERT test_unsigned(a,b) VALUES(0,255);

-- 测试零填充 zerofill
CREATE TABLE test_zerofill(
  a tinyint ZEROFILL,
  b smallint ZEROFILL,
  c mediumint ZEROFILL,
  d int ZEROFILL,
  e bigint ZEROFILL
);

-- 下面的'2', 会导致ZEROFILL自动补全是两位, 可插入的数据范围不变,
-- 并且如果插入的数据位数超出, 插入结果不会截断
CREATE TABLE test_length(
  a tinyint(2) ZEROFILL,
  b smallint(2) ZEROFILL
);

-- 结果
INSERT test_length(a,b) VALUES(1231,1231);
INSERT test_length(a,b) VALUES(1,1);
SELECT * FROM test_length;
-- +------+------+
-- | a    | b    |
-- +------+------+
-- |  255 | 1231 |
-- |   01 |   01 |
-- +------+------+
