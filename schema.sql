create database php1tom;
use php1tom;

create table post(
	id int not null auto_increment primary key,
	title varchar(128),
	description varchar(512),
	created_at datetime
);

create table category(
	id int not null auto_increment primary key,
	title varchar(128)
);

create table post_category(
	post_id int not null,
	category_id int not null,
	foreign key (post_id) references post(id),
	foreign key (category_id) references category(id)
);
