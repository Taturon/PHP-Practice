create table users (
	id int not null primary key auto_increment,
	name varchar(255),
	email varchar(255),
	team enum('bule','red','yellow'),
	score float,
	created datetime
);

insert into users (name,email,team,score,created) values
('Taturon','taturon@dotinstall.com','blue',5.5,'2020-6-8 20:30:00'),
('Fujiko', 'fujiko@dotinstall.com', 'yellow', 8.2, '2020-5-30 21:29:00'),
('dotinstall', 'dotinstall@dotinstall.com', 'red', 2.3, '2020-3-20 3:20:00');

create table posts(
	id int not null primary key auto_increment,
	user_id int not null,
	title varchar(255),
	body text,
	created datetime
);

insert into posts (user_id,title,body,created) values
(1,'title-1 by Taturon','body-1','2020-5-31 13:00:00'),
(1,'title-2 by Taturon','body-2','2020-6-21 12:00:00'),
(2,'title-3 by fujiko','body-3','2020-4-1 12:00:00'),
(3,'title-4 by dotinstall','body-4','2019-2-31 10:00:00'),
(3,'title-5 by dotinstall','body-5','2019-9-31 4:00:00');

select * from users;
select * from posts;
select users.name, posts.title from users, posts where users.id = posts.user_id;
select users.name, posts.title from users, posts where users.id = posts.user_id order by posts.created desc;
