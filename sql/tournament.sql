DROP TABLE tournament;	-- in case table is already defined

CREATE TABLE tournament (
    `id` INT,
    `name` VARCHAR(20) CHARACTER SET utf8,
    `elo` INT,
    `matches` INT,
    `nickname` VARCHAR(6) CHARACTER SET utf8,
PRIMARY KEY(id)
);
INSERT INTO tournament VALUES (1,'Muhammad Ammar Aamir',1848,0,NULL);
INSERT INTO tournament VALUES (2,'Jake Anderson',1848,0,NULL);
INSERT INTO tournament VALUES (3,'Ian Armour',1848,0,NULL);
INSERT INTO tournament VALUES (4,'Chris Bae',1848,0,NULL);
INSERT INTO tournament VALUES (5,'Alex Blum',1848,0,'Blum');
INSERT INTO tournament VALUES (6,'Matthew Chang',1848,0,NULL);
INSERT INTO tournament VALUES (7,'Greg Cheung',1848,0,'Vupesh');
INSERT INTO tournament VALUES (8,'Adam Cocco',1848,0,'Cocco');
INSERT INTO tournament VALUES (9,'Corey Ervin',1848,0,NULL);
INSERT INTO tournament VALUES (10,'Julian Gonsalves',1848,0,NULL);
INSERT INTO tournament VALUES (11,'Oliver Heitz',1848,0,NULL);
INSERT INTO tournament VALUES (12,'Stephen Joly',1848,0,'Joly');
INSERT INTO tournament VALUES (13,'Anthony Khoury',1848,0,NULL);
INSERT INTO tournament VALUES (14,'Alex Lin',1848,0,NULL);
INSERT INTO tournament VALUES (15,'Justin Lin',1848,0,NULL);
INSERT INTO tournament VALUES (16,'Michael Lioniello',1848,0,'Mike');
INSERT INTO tournament VALUES (17,'David Liu',1848,0,'Liu');
INSERT INTO tournament VALUES (18,'Marco E. Martin',1848,0,NULL);
INSERT INTO tournament VALUES (19,'Caleb Michalski',1848,0,NULL);
INSERT INTO tournament VALUES (20,'Chris Moen',1848,0,NULL);
INSERT INTO tournament VALUES (21,'Anderw Olechtchouk',1848,0,NULL);
INSERT INTO tournament VALUES (22,'Nathan Reeves',1848,0,NULL);
INSERT INTO tournament VALUES (23,'Ben Rubinoff',1848,0,'Ben');
INSERT INTO tournament VALUES (24,'Paul Suk',1848,0,NULL);
INSERT INTO tournament VALUES (25,'Sid Thakwani',1848,0,NULL);
INSERT INTO tournament VALUES (26,'Matthew Tran',1848,0,NULL);
INSERT INTO tournament VALUES (27,'Nikita Tsytsarkin',1848,0,'Nik');
INSERT INTO tournament VALUES (28,'Daniel Wardzinski',1848,0,'Dan');
INSERT INTO tournament VALUES (29,'Jim Xu',1848,0,NULL);
INSERT INTO tournament VALUES (30,'Benny Zappia',1848,0,NULL);
INSERT INTO tournament VALUES (31,'Eugene Zelenov',1848,0,NULL);
INSERT INTO tournament VALUES (32,'Andrei Roncea',1848,0,NULL);
INSERT INTO tournament VALUES (33,'Louie Li',1848,0,NULL);
INSERT INTO tournament VALUES (34,'Bernado Larrion',1848,0,NULL);
INSERT INTO tournament VALUES (35,'Dima Sochynev',1848,0,NULL);
