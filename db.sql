create database `library`
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';

create table student(
        stuNumber int(10) unsigned not null primary key,
        stuName varchar(20) not null ,
        stuPassword varchar(100) not null,
        maxNumber int(2) unsigned not null,
        lendCount int (2) unsigned not null
) DEFAULT CHARSET=utf8;

create table admin(
        adminNumber int(10) unsigned not null primary key,
        adminName varchar(20) not null,
        adminPassword varchar(100) not null
) DEFAULT CHARSET=utf8;

create table bookinfo(
        bookNumber int(10) unsigned not null primary key,
        bookName varchar(30) not null,
        bookAuthor varchar(20) not null,
        bookPublishing varchar(20) not null,
        bookCategory varchar(20) not null,
        bookState int(2) unsigned not null
) DEFAULT CHARSET=utf8;

create table lend(
        stuNumber int(10) unsigned not null ,
        lendNumber int(10) unsigned not null,
        lendDate varchar(100) not null,
        deadline varchar(100) not null,
        renewtimes int(2) unsigned not null
) DEFAULT CHARSET=utf8;