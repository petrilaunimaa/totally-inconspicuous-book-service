create table products (
    productid int primary key auto_increment,
    name varchar(100) not null,
    shortname varchar(100) not null,
    manufacturer varchar(100) not null,
    descfile varchar(100) not null,
    price INT
);


insert into products (name,shortname,manufacturer,descfile,price) values ("Testi kuulokkeet","TO-T01","Toilettenbürstenbenutzungsanweisung","TO-T01.html",99);
insert into products (name,shortname,manufacturer,descfile,price) values ("Testi kuulokkeet","TO-T021","Toilettenbürstenbenutzungsanweisung","TO-T02.html",45);
