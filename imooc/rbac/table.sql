-RBAC用户表
create table user(
	id int unsigned auto_increment primary key,
	name varchar(20) not null default '',
	email varchar(30) not null default '',
	is_super tinyint(1) not null default '0',
	status tinyint(1) not null default '0',
	created_time TIMESTAMP,
	updated_time TIMESTAMP
);


-RBAC用户角色表
create table user_role(
	id int unsigned auto_increment primary key,
	uid int unsigned not null,
	role_id int unsigned not null,
	created_time TIMESTAMP
);
-RBAC权限表
create table access(
	id int unsigned auto_increment primary key,
	title varchar(50) not null default '',
	urls varchar(50) not null default '',
	status tinyint(1) not null default '0',
	updated_time TIMESTAMP,
	created_time TIMESTAMP
);
-RBAC角色表
create table role(
	id int unsigned auto_increment primary key,
	name varchar(50) not null default '',
	status tinyint(1) not null default '0',
	created_time TIMESTAMP,
	updated_time TIMESTAMP
);
-RBAC角色权限表
create table role_access(
	id int unsigned  auto_increment primary key,
	role_id int not null,
	access_id int not null,
	cerated_time TIMESTAMP
);