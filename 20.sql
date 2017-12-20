
-- 无限级分类
CREATE TABLE `cate`(
  `id` SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `cateName` VARCHAR(100) NOT NULL UNIQUE,
  `pId` SMALLINT UNSIGNED NOT NULL DEFAULT 0
);

INSERT cate(cateName,pId) VALUES
('服装',0),
('数码',0),
('玩具',0);

INSERT cate(cateName,pId) VALUES
('男装',1),
('女装',1),
('内衣',1);

INSERT cate(cateName,pId) VALUES
('电视',2),
('冰箱',2),
('洗衣机',2);

INSERT cate(cateName,pId) VALUES
('爱马仕',3),
('LV',3),
('GUCCI',3);

INSERT cate(cateName,pId) VALUES
('夹克',4),
('衬衫',4),
('裤子',4);

INSERT cate(cateName,pId) VALUES
('液晶电视',7),
('等离子电视',7),
('背投电视',7);

-- 查询所有分类信息, 并得到父分类
SELECT s.id,s.cateName AS sCateName,p.cateName AS pCateName
FROM cate AS s
LEFT JOIN cate AS p
ON s.pId=p.id;

-- 查询所有的分类及子分类
SELECT p.id,p.cateName AS pCateName,s.cateName AS sCateName
FROM cate AS s
RIGHT JOIN cate AS p
ON s.pId=p.id;

-- 查询所有分类及子分类数目
SELECT p.id,p.cateName AS pCateName,COUNT(p.cateName) AS count
FROM cate AS s
RIGHT JOIN cate AS p
ON s.pId=p.id
GROUP BY p.cateName;

-- 查询所有分类及子分类的名称和数目
SELECT p.id,p.cateName AS pCateName,
GROUP_CONCAT(s.cateName) AS sCateName,
COUNT(s.cateName) AS count
FROM cate AS p
LEFT JOIN cate AS s
ON s.pId=p.id
GROUP BY p.cateName
ORDER BY p.id;



















--
