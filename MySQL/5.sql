-- 浮点型测试
-- 浮点型包括 float(M,D) Double(M,D) decimal(M,D)
CREATE TABLE test_float(
  a FLOAT(6,2),
  b DOUBLE(6,2),
  c DECIMAL(6,2)
);

INSERT test_float(a,b,c) VALUES(4.123,2.6,5.5);

-- DECIMAL 默认只保留整数, 如果精度要求比较高, 选择decimal
