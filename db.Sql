
Create database utilisateur;
Use Client;
drop table if exists Client;
create table Client
(
   id            varchar(254),
   fname                  varchar(254),
   lname               varchar(254),
   adress              varchar(254),
   phone            varchar(254),
   email                varchar(254),
   pwd                 varchar(254),
   primary key (id)
);


