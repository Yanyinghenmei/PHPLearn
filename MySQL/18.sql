

CREATE TABLE news_cate(
  `id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `cateName` VARCHAR(50) NOT NULL UNIQUE,
  `cateDesc` VARCHAR(100) NOT NULL DEFAULT '描述'
)ENGINE=InnoDB CHARSET=UTF8;

INSERT news_cate(cateName) VALUES
('国内新闻'),('国际新闻'),
('娱乐新闻'),('体育新闻');

CREATE TABLE news(
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(30) NOT NULL UNIQUE,
  `content` VARCHAR(300) NOT NULL,
  `cateId` TINYINT UNSIGNED NOT NULL
);
INSERT news(title,content,cateId) VALUES
('a','aaaaaa',1),
('b','bbbbbb',1),
('c','cccccc',4),
('d','dddddd',2),
('e','eeeeee',3);

-- 查询 news.id, title content
-- news_cate cateName
SELECT n.id,n.title,n.content,c.cateName
FROM news AS n
INNER JOIN news_cate AS c
ON n.cateId=c.id;

DELETE FROM news_cate WHERE id=2;

INSERT news(title,content,cateId) VALUES('f','ffffff',45);


DROP TABLE news;
DROP TABLE news_cate;


-- 添加外键
CREATE TABLE news_cate(
  `id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `cateName` VARCHAR(50) NOT NULL UNIQUE,
  `cateDesc` VARCHAR(100) NOT NULL DEFAULT '描述'
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE news(
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(30) NOT NULL UNIQUE,
  `content` VARCHAR(300) NOT NULL,
  `cateId` TINYINT UNSIGNED NOT NULL,
  FOREIGN KEY(cateId) REFERENCES news_cate(id)
);


-- 非法记录
INSERT news(title,content,cateId) values('z','zzzzzz',8);

-- 测试删除|修改父表的记录/删除父表
DELETE FROM news_cate WHERE id=2;
UPDATE news_cate SET id=10 WHERE id=1;
INSERT news_cate(cateName) VALUES('教育新闻');
UPDATE news_cate SET id=50 WHERE id=5;          -- 成功
DELETE FROM news_cate WHERE id=5;               -- 成功
DROP TABLE news_cate;                           -- 失败

DROP TABLE news;

-- 添加外键名字
CREATE TABLE news_cate(
  `id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `cateName` VARCHAR(50) NOT NULL UNIQUE,
  `cateDesc` VARCHAR(100) NOT NULL DEFAULT '描述'
)ENGINE=InnoDB CHARSET=UTF8;

CREATE TABLE news(
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(30) NOT NULL UNIQUE,
  `content` VARCHAR(300) NOT NULL,
  `cateId` TINYINT UNSIGNED NOT NULL,
  CONSTRAINT cateId_fk_newsCate FOREIGN KEY(cateId) REFERENCES news_cate(id)
);

ALTER TABLE news DROP FOREIGN KEY cateId_fk_newsCate;
ALTER TABLE news ADD FOREIGN KEY(cateId) REFERENCES news_cate(id);

ALTER TABLE news DROP FOREIGN KEY news_ibfk_1;

ALTER TABLE news
ADD CONSTRAINT cateId_fk_newsCate
FOREIGN KEY(cateId) REFERENCES news_cate(id);

ALTER TABLE news DROP FOREIGN KEY cateId_fk_newsCate;

INSERT news(title,content,cateId) VALUES('v','vvvvvv',34);
ALTER TABLE news ADD CONSTRAINT cateId_fk_newsCate
FOREIGN KEY(cateId) REFERENCES news_cate(id);

DELETE FROM news WHERE id=1;
ALTER TABLE news ADD CONSTRAINT cateId_fk_newsCate
FOREIGN KEY(cateId) REFERENCES news_cate(id);

ALTER TABLE news DROP FOREIGN KEY cateId_fk_newsCate;

-- 外键约束

-- 指定级联操作 delete cascade UPDATE CASCADE
ALTER TABLE news ADD FOREIGN KEY(cateId) REFERENCES news_cate(id)
ON DELETE CASCADE ON UPDATE CASCADE;

-- 测试
UPDATE news_cate SET id=11 WHERE id=1
DELETE FROM news_cate WHERE id=2;

-- 子查询
SELECT * FROM news WHERE cateId=(SELECT id FROM news_cate WHERE cateName='娱乐新闻');
SELECT * FROM news WHERE cateId IN (SELECT id FROM news_cate);
SELECT * FROM news WHERE id NOT IN (SELECT id FROM news_cate);


CREATE TABLE `stu`(
  `id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` CHARACTER(20) NOT NULL UNIQUE,
  `score` TINYINT UNSIGNED NOT NULL
)ENGINE=InnoDB;

INSERT `stu`(`username`,`score`) VALUES
('daniel',95),
('joe',90),
('zhangsan',69),
('lisi',78),
('wangwu',89),
('zhaoliu',34),
('huangqi',43),
('ceshi',77),
('tony',55);
INSERT `stu`(username,score) VALUES('bob',70);

CREATE TABLE `level`(
  id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

);

INSERT `level`(score) VALUES(90),(80),(70);

-- 查询出成绩优秀的同学
SELECT * FROM stu WHERE score>=(SELECT score FROM level WHERE id=1);

SELECT * FROM stu WHERE score BETWEEN
(SELECT score FROM level WHERE id=3) AND (SELECT score FROM level WHERE id=1);

-- EXISTS
SELECT * FROM stu WHERE EXISTS (SELECT id FROM stu WHERE id=1);
SELECT * FROM stu WHERE EXISTS (SELECT id FROM stu WHERE id=11);
SELECT * FROM stu WHERE NOT EXISTS (SELECT id FROM stu WHERE id=11);

-- 大于等于最小值
SELECT * FROM stu WHERE score>= ANY(SELECT score FROM level);
SELECT * FROM stu WHERE score>= SOME(SELECT score FROM level);

-- 大于等于最大值
SELECT * FROM stu WHERE score>= ALL(SELECT score FROM level);

-- 小于等于最大值
SELECT * FROM stu WHERE score<= ANY(SELECT score FROM level);
SELECT * FROM stu WHERE score<= SOME(SELECT score FROM level);

-- 小于最小值
SELECT * FROM stu WHERE score< ALL(SELECT score FROM level);

-- 等于任意值
SELECT * FROM stu WHERE score= ANY(SELECT score FROM level);

-- 不等于任意值
SELECT * FROM stu WHERE score!= ALL(SELECT score FROM level);













--
