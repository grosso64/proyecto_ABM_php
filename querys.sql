insert into usuario values('usuario1','clave1','analista');
insert into usuario values('','','',);
insert into usuario values('','','',);
insert into usuario values('','','',);



create table usuario(
    usuario varchar(255) primary key,
    clave varchar(255) not null,
    rol varchar(255) not null
)