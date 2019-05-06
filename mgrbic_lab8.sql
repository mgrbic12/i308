Create table bookcase(bcid int auto_increment,location varchar(50),shelf_num int, capacity int,primary key (bcid))engine = innodb;
Create table book_bookcase(bookid int, bcid int, quantity int, foreign key(bcid) References book(bookid), foreign key(bookid) References bookcase(bcid))engine = innodb;

#1.Find the Name of the customers and title of the book who purchased books in October 2017. Do not display duplicates
SELECT DISTINCT c.name, c.title
FROM ctb as c
WHERE DATE_FORMAT(c.tdate, '%b %Y') = ('Oct 2017');

#2.List the book titles and total quantity in stock.
SELECT b.title, SUM(bc.quantity)
FROM book AS b, book_bookcase AS bc
WHERE b.bookid = bc.bookid;

#3.Update Jenny’s phone number to be 999-867-5309
UPDATE customer
SET customer.phone = '999-867-5309'
WHERE customer.name = 'Jenny';

#4.Add the column “type” to the book table and update the data in the type column of the books table to include two different types of books. 
ALTER TABLE book
ADD COLUMN type varchar (15);

UPDATE book
SET book.type = 'ebook'
WHERE book.bookid = 1001;

UPDATE book
SET book.type = 'paperback'
WHERE book.bookid = 1002;

UPDATE book
SET book.type = 'ebook'
WHERE book.bookid = 1003;