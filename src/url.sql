create database db1;
create table url (id bigint not null auto_increment primary key, longurl varchar(8000), shorturl varchar(8000));
show databases;
use db1;
insert into url (longurl) values ("www.yoursite.com/pricing?utm_source=active%20users&utm_medium=email&utm_campaign=feature%20launch&utm_content=bottom%20cta%20button");
insert into url (longurl) values ("https://www.1hotels.com/winter-solstice-2017?utm_source=1+Hotels&utm_campaign=a103b5e098-EMAIL_CAMPAIGN_2017_11_07&utm_medium=email&utm_term=0_fae0e4b2bc-a103b5e098-12403241");
insert into url (longurl) values ("https://store.playstation.com/en-us/product/UP0006-CUSA05770_00-DLXPREORDER00000?utm_campaign=swbf2_hd_us_gam_socv_twt_holo&utm_medium=social&utm_source=twitter");
delete from url;
select * from url;
