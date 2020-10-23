create database Giftshopphp
use Giftshopphp
create table Admin
(
    Adminname varchar (30) primary key,
    password varchar (10);
);
insert into admin value ('admin','admin')
create table siteuser
(
    username varchar(30),
    password varchar(10),
    city varchar(10),
    Address varchar(50),
    Emailid varchar(100) primary key,
    contact varchar(10)
);
 create table product 
 (
     id int(10) primary key auto_increment,
     name varchar(30),
     image longtext,
     category varchar(30),
     price varchar(10),
     description varchar(200)
 );
 create table Booking
 (
     id int(10) primary key auto_increment,
     bookingdate varchar(10),
     customername varchar(10),
     Emailid varchar(10) primary key,
     contact varchar(10),
     city varchar(10),
      Address varchar(50),
      productname varchar(30),
      price varchar(10),
      quantity varchar(5),
      totalamount varchar(10),
      status varchar(20)
 );
  create table Feedback
  (
      id int(10) primary key auto_increment,
      name varchar(30),
      contact varchar(20),
      Emailid varchar(20),
      date varchar(50),
      Msg varchar(500)

  );
  create table category 
 (
     id int(10) primary key auto_increment,
    categoryname varchar(30),
     image longtext
 );