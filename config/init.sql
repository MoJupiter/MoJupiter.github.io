create database Oyama_homepage_db;

drop user 'mizuki'@'localhost';

create user 'mizuki'@'localhost' identified by 'loveL0V3wAR3TU5wU5lkovec5';
grant all on Oyama_homepage_db.* to 'mizuki'@'localhost';

create table user{
	id int not null primary key auto_increment,
	user_name varchar(255) not null,
	password varchar(255) not null,
	body int,
	bangs int,
	back_hair int,
	eye int,
	tops int,
	bottoms int,
	login boolean,
	team int
};

desc user;
