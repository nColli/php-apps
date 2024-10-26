CREATE TABLE User (
    id int NOT NULL,
    username varchar(32) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(100) NOT NULL,
    CONSTRAINT PK_Person PRIMARY KEY (id,username)
); 

CREATE TABLE Product (
    id int NOT NULL,
    name varchar(32) NOT NULL,
    price varchar(255) NOT NULL,
    CONSTRAINT PK_Person PRIMARY KEY (id,name)
); 