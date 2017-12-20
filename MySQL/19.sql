-- 创建表, 把stu的数据写入

CREATE TABLE `temp_stu`(
  id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL UNIQUE
) SELECT id,username FROM stu;

INSERT temp_stu(username) SELECT content FROM news;

CREATE TABLE `test_stu` LIKE `temp_stu`;
INSERT test_stu(username) SELECT username FROM temp_stu;

INSERT test_stu SET username=(SELECT username FROM temp_stu WHERE id=2);

-- 过滤重复记录
SELECT DISTINCT(username) FROM test_stu;

-- UNION(过滤重复记录) UNION ALL(不过滤重复记录)
SELECT username FROM temp_stu
UNION
SELECT username FROM test_stu;
