create database db1;
create table url (id bigint not null auto_increment primary key, longurl varchar(8000), shorturl varchar(8000));
show databases;
use db1;
insert into url (longurl) values ("www.yoursite.com/pricing?utm_source=active%20users&utm_medium=email&utm_campaign=feature%20launch&utm_content=bottom%20cta%20button");
delete from url;