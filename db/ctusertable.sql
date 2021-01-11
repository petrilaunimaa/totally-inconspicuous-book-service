create table user_account (
    userid int primary key auto_increment,
    email varchar(100) not null unique,
    ownedbookids int,
    password varchar(255) not null,
    FOREIGN KEY (ownedbookids) REFERENCES ownedbooks (ownedbookids)
);

//insert into user_account (email,password) values ('testuser',md5('test123'));

insert into books (blend, owninguser) values ('test','1');

create table books (
    blend varchar(100) not null unique,
    owninguser int,
    FOREIGN KEY (owninguser) 
    REFERENCES user_account (userid)
);
