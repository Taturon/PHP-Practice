create table users (
	id int not null auto_increment primary key,
	name varchar(255),
	email varchar(32) unique,
	password char(32),
	score double,
	gender enum('M', 'F') default 'M',
	memo text,
	created datetime,
	key score (score)
);

insert into users (name, email, password, score, memo, created) values ("Taturon","example@gmail.com","xxx","10.9","memomemo","2020-5-8 18:30:00")
