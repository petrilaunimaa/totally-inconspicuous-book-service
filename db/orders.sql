create table orders (
    orderid int primary key auto_increment,
    userid int,
    orderdate DATETIME NOT NULL,
    tilausvaihe char(1) NOT NULL,
    bookid int,
    productid int,
    FOREIGN KEY (userid) REFERENCES user_account (userid),
    FOREIGN KEY (bookid) REFERENCES books (id),
    FOREIGN KEY (productid) REFERENCES products (productid)
);

/*tilausvaihe: M jos myyty, O jos odottaa maksua, P jos palautettu, V jos vuokralla*/
/*joko bookid tai productid täytetään! < pitää huomioida koodissa*/

/*esimerkkilause:*/
INSERT INTO orders (userid,orderdate,tilausvaihe,bookid,productid) values (1,now(),'M',3,NULL);

/*haetaan*/
SELECT books.*, products.* FROM orders, books, products, user_account 
WHERE
(orders.bookid=books.id
OR orders.productid=)
AND user_account.userid=1





/* kirjasivu */
SELECT books.* FROM orders, books, user_account WHERE orders.bookid=books.id AND user_account.userid=1