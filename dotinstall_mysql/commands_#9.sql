create table users (
	id int not null primary key auto_increment,
	name varchar(255),
	email varchar(255),
	team enum('blue', 'red', 'yellow'),
	score double,
	created datetime
);

insert into users (name, email, team, score, created) values
('Taturon', 'taturon@dotinstall.com', 'blue', 10.9, '2020-6-8 19:20:00'),
('Fujiko', 'fujiko@dotinstall.com', 'yellow', 8.2, '2020-5-30 21:29:00'),
('dotinstall', 'dotinstall@dotinstall.com', 'red', 2.3, '2020-3-20 3:20:00'),
('sasaki', 'sasaki@dotinstall.jp', 'blue', 4.5, '2019-4-1 00:00:00'),
('kimura', '', 'yellow', 7.4, '2009-3-2 12:31:20'),
('tanaka', 'tanaka@dotinstall.jp', 'blue', 4.2, '2021-21-31 88:99:00');
