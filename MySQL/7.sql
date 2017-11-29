-- [D] HH:MM:SS 表示天, 范围是0~34
-- 测试time类型
CREATE TABLE test_time(
  a TIME
);

INSERT test_time(a) VALUES('12:23:43');
INSERT test_time(a) VALUES('2 12:23:43');
INSERT test_time(a) VALUES('20:30');
INSERT test_time(a) VALUES('0 20:30');
INSERT test_time(a) VALUES('22');         -- 22秒
INSERT test_time(a) VALUES('2 22');       -- 2天2小时
INSERT test_time(a) VALUES('22 122323');  -- 插入陈宫结果不对
INSERT test_time(a) VALUES('122323');     -- 相当于'12:23:23'
INSERT test_time(a) VALUES('0');
INSERT test_time(a) VALUES(0);
INSERT test_time(a) VALUES(NOW());
INSERT test_time(a) VALUES(current_time);

-- 测试date类型 YYYY-MM-DD  YYYYMMDD
CREATE TABLE test_date(
  a DATE
);
INSERT test_date(a) VALUES('2017-02-23');
INSERT test_date(a) VALUES('20140312');
INSERT test_date(a) VALUES('1234|03&11');  -- 自由指定分隔符
INSERT test_date(a) VALUES('230312');      -- 年份:70~99装换成19**, 0~69转换成20**;
INSERT test_date(a) VALUES('691209');
INSERT test_date(a) VALUES(NOW());
INSERT test_date(a) VALUES(current_date);

-- 测试datetime
CREATE TABLE test_datetime(
  a DATETIME
);
INSERT test_datetime(a) VALUES('2002-02-23 12:23:43');
INSERT test_datetime(a) VALUES('720312111111');
INSERT test_datetime(a) VALUES('690312111111');  -- 年份:70~99装换成19**, 0~69转换成20**;
INSERT test_datetime(a) VALUES(NOW());

-- 测试timestamp
CREATE TABLE test_timestamp(
  a TIMESTAMP
);
INSERT test_timestamp(a) VALUES('1970-10-23 12:12:12');


-- 以下下四种方式会得到当前系统的时间
INSERT test_timestamp(a) VALUES(CURRENT_TIMESTAMP); -- (a) 可以不写
INSERT test_timestamp(a) VALUES(NOW());             -- (a) 可以不写
INSERT test_timestamp(a) VALUES(NULL);              -- (a) 可以不写
INSERT test_timestamp VALUES();


-- 测试year  1901-2155
-- 0 插入结果是0000
-- '0' 插入结果是2000
-- 00-69 -> 20**
-- 70-99 -> 19**
CREATE table test_year(
  a YEAR
);
INSERT test_year(a) VALUES(1901);
INSERT test_year(a) VALUES(1900);
INSERT test_year(a) VALUES(2156);
INSERT test_year(a) VALUES('0');
INSERT test_year(a) VALUES(0);









--
