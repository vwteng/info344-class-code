-- create database
create database if not exists news character set = "UTF8";

-- use it
use news;

-- create the stories table
create or replace table stories (
    id int not null primary key auto_increment,
<<<<<<< HEAD
    url varchar(2048) not null,    
    title varchar(1024) not null,    
=======
    url varchar(2048) not null,
    title varchar(1024) null,       
>>>>>>> dd127347d12c8bb16a0f6d7fa4d2cd6133701c08
    votes int not null default 0,
    createdOn datetime not null default now()
);
