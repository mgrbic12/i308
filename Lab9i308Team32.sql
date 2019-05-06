Team 32
I308 Lab 9 : M2
Max Grbic, Hunter Probus, EJ Santiago, Mitch Gilbert
3/18/2019

CREATE TABLE artist(aid int auto_increment, fname varchar(20), lname varchar(20), dob date, gender varchar(20), primary key (aid))engine = innodb;

CREATE TABLE band(bid int auto_increment, name varchar(20), year_formed int, primary key (bid))engine = innodb;

CREATE TABLE in_band(aid int, bid int, date_in date, date_out date, foreign key(aid) REFERENCES artist(aid), foreign key(bid) REFERENCES band(bid))engine = innodb;

CREATE TABLE album(albumid int auto_increment, published_year int, title varchar(50), price int, publisher varchar(20), format varchar(10), bid int, primary key(albumid), foreign key (bid) REFERENCES band(bid)) engine = innodb;

INSERT INTO band(bid, name, year_formed)
VALUES(1, 'Rockets', 2004),
(2, 'Cats', 2003),
(3, 'Dogs', 2005),
(4, 'Crickets', 2007),
(5, 'Beatles', 2009),
(6, 'Best Band', 2004);

INSERT INTO artist(aid, fname, lname, dob, gender)
VALUES (101,'Hunter', 'Probus', '03/19/1997', 'Male'),
(102, 'Max', 'Grbic', '09/15/1998', 'Male'),
(103, 'Mitch', 'Gilbert', '06/07/1998', 'Male'),
(104, 'Eric', 'Santiago', '07/20/1996', 'Male'),
(105, 'Stevie', 'Nicks', '07/20/1997', 'Female'),
(106, 'Miley', 'Cirus', '02/11/1992', 'Female'),
(107, 'John', 'Wick', '01/02/1990', 'Male'),
(108, 'Johnny', 'Cash', '02/10/1945', 'Male'),
(109, 'Marshall', 'Mathers', '04/14/1990', 'Male');


INSERT INTO album (albumid, published_year, title, price, publisher, format, bid)
VALUES (201, 2004, 'Launch', 10, 'Dunder', 'Vinyl', 1),
(202, 2003, 'Nip', 10, 'Mifflin', 'Cassette', 2),
(203, 2005, 'Treat', 10, 'Paper', 'CD', 3),
(204, 2007, 'Sounds', 10, 'Company', 'CD', 4),
(205, 2009, 'One', 10, 'LLC', 'Stream', 5),
(206, 2004, 'Hannah Montana', 10, 'Dwight', 'Stream', 6),
(207, 2005, 'Best Album', 15, 'Warner', 'CD', 1),
(208, 2006, 'Culture', 12, 'Atlantic', 'Stream', 1),
(209, 2005, 'So Icy', 10, 'Zaytoven', 'CD', 1),
(210, 2004, 'Sophisticated Montana', 10, 'Warner', 'Stream', 6),  
(211, 2006, 'City Montana', 21, 'Atlantic', 'Vinyl', 6),
(212, 2007, 'Country Montana', 15, 'Billy Ray', 'Stream', 6);


INSERT INTO in_band (aid, bid, date_in, date_out)
VALUES (101, 1, '03/10/2004', '06/02/2007'),
(102, 2, '10/07/2003', '02/14/2004'),
(103, 3, '01/25/2005', '11/18/2008'),
(104, 4, '05/22/2007', '07/16/2010'),
(105, 6, '02/15/2009', '08/09/2013'),
(106, 6, '05/26/2004', '12/04/2009'),
(103, 1, '04/23/2005', '10/14/2007'),
(107, 3, '02/02/2005', '12/11/2008'),
(108, 3, '04/12/2005', '08/24/2008'),
(109, 5, '06/19/2009', '11/06/2011');

UPDATE in_band
SET in_band.date_out = '05/11/2005'
WHERE artist.fname = 'Mitch';

UPDATE in_band
SET in_band.date_in = '03/17/2006'
WHERE artist.fname = 'Mitch';


SELECT a.fname, a.lname
FROM band AS b, in_band AS in, artist AS a
WHERE  b.bid=in.bid
AND a.aid=in.aid;


SELECT DISTINCT b.name, CONCAT(a.fname, ' ', a.lname) AS fullname
FROM band AS b, artist AS a, album AS al
WHERE al.title = 'Treat';


SELECT CONCAT(a.fname, ' ', a.lname) AS fullname, a.gender, DATE_FORMAT(a.dob, '%b %d %Y') AS bday, b.name
FROM artist AS a, band AS b, in_band AS in 
WHERE (TIMESTAMPDIFF(YEAR, a.dob, CURDATE()) > 21 OR (a.gender = 'Female')),
AND in.date_out = NULL;

