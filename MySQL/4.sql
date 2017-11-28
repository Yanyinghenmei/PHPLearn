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
