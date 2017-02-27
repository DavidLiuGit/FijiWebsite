DROP TABLE tournament;	-- in case table is already defined

CREATE TABLE tournament (
    `id` INT,
    `name` VARCHAR(20) CHARACTER SET utf8,
    `elo` INT,
    `matches` INT,
    `nickname` VARCHAR(6) CHARACTER SET utf8
);
INSERT INTO tournament VALUES (1,'Muhammad Ammar Aamir',1000,0,NULL);
INSERT INTO tournament VALUES (2,'Jake Anderson',1000,0,NULL);
INSERT INTO tournament VALUES (3,'Ian Armour',1000,0,NULL);
INSERT INTO tournament VALUES (4,'Chris Bae',1000,0,NULL);
INSERT INTO tournament VALUES (5,'Alex Blum',1000,0,'Blum');
INSERT INTO tournament VALUES (6,'Matthew Chang',1000,0,NULL);
INSERT INTO tournament VALUES (7,'Greg Cheung',1000,0,'Vupesh');
INSERT INTO tournament VALUES (8,'Adam Cocco',1000,0,'Cocco');
INSERT INTO tournament VALUES (9,'Corey Ervin',1000,0,NULL);
INSERT INTO tournament VALUES (10,'Julian Gonsalves',1000,0,NULL);
INSERT INTO tournament VALUES (11,'Oliver Heitz',1000,0,NULL);
INSERT INTO tournament VALUES (12,'Stephen Joly',1000,0,'Joly');
INSERT INTO tournament VALUES (13,'Anthony Khoury',1000,0,NULL);
INSERT INTO tournament VALUES (14,'Alex Lin',1000,0,NULL);
INSERT INTO tournament VALUES (15,'Justin Lin',1000,0,NULL);
INSERT INTO tournament VALUES (16,'Michael Lioniello',1000,0,'Mike');
INSERT INTO tournament VALUES (17,'David Liu',1000,0,'Liu');
INSERT INTO tournament VALUES (18,'Marco E. Martin',1000,0,NULL);
INSERT INTO tournament VALUES (19,'Caleb Michalski',1000,0,NULL);
INSERT INTO tournament VALUES (20,'Chris Moen',1000,0,NULL);
INSERT INTO tournament VALUES (21,'Anderw Olechtchouk',1000,0,NULL);
INSERT INTO tournament VALUES (22,'Nathan Reeves',1000,0,NULL);
INSERT INTO tournament VALUES (23,'Ben Rubinoff',1000,0,'Ben');
INSERT INTO tournament VALUES (24,'Paul Suk',1000,0,NULL);
INSERT INTO tournament VALUES (25,'Sid Thakwani',1000,0,NULL);
INSERT INTO tournament VALUES (26,'Matthew Tran',1000,0,NULL);
INSERT INTO tournament VALUES (27,'Nikita Tsytsarkin',1000,0,'Nik');
INSERT INTO tournament VALUES (28,'Daniel Wardzinski',1000,0,'Dan');
INSERT INTO tournament VALUES (29,'Jim Xu',1000,0,NULL);
INSERT INTO tournament VALUES (30,'Benny Zappia',1000,0,NULL);
INSERT INTO tournament VALUES (31,'Eugene Zelenov',1000,0,NULL);
INSERT INTO tournament VALUES (32,'Andrei Roncea',1000,0,NULL);
INSERT INTO tournament VALUES (33,'Louie Li',1000,0,NULL);
INSERT INTO tournament VALUES (34,'Bernado Larrion',1000,0,NULL);
INSERT INTO tournament VALUES (35,'Dima Sochynev',1000,0,NULL);
