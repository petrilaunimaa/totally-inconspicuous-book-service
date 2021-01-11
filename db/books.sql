create table books (
    id int primary key auto_increment,
    name varchar(100) not null,
    author varchar(100) not null,
    category varchar(100) not null,
    year varchar(4) not null,
    length varchar(14) not null,
    price INT
);

insert into books (name,author,category,year,length,price) values ('Ei tää vaan onnistu','Pertti Pessimisti','Draama',2010,6342,15);
insert into books (name,author,category,year,length,price) values ('Pertin kootut','Pertti Pessimisti','Draama',2019,6246,15);
insert into books (name,author,category,year,length,price) values ('Pertin kootut Osa 2','Pertti Pessimisti','Draama',2020,6246,15);
insert into books (name,author,category,year,length,price) values ('Pertin kootut Osa 2','Pertti Pessimisti','Draama',2020,6246,15);

ALTER TABLE books
ADD price INT

UPDATE books
SET price = 15