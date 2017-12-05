-- 测试update
UPDATE `user` SET age=23 WHERE id=1;
UPDATE `user` SET age=age+10;
UPDATE `user` SET age=age+1 WHERE age>5;
UPDATE `user` SET age=10,email=DEFAULT WHERE age>10;

-- 测试delete
DELETE FROM `uesr` WHERE id=3;
DELETE FROM `user` WHERE username='daniel';
