create database db_ead
default character set utf8
default collate utf8_general_ci;

use db_ead;


create table tbl_categoria
(	
    cd_categoria int primary key auto_increment,
    ds_categoria varchar(150) not null    
)
default charset utf8;


create table tbl_marca
(	
    cd_marca int primary key auto_increment,
    nm_marca varchar(50) not null    
)
default charset utf8;


create table tbl_carro
(	
    cd_carro int primary key auto_increment,
    cd_categoria int not null,
    nm_carro varchar(150) not null,
    cd_marca int not null,
    vl_preco decimal(15,2) not null,
    qt_estoque int not null,
    ds_resumo_carro text not null,
    sg_lancamento enum('S','N') not null,
    camin_img varchar (255) not null,
    constraint fk_cat foreign key(cd_categoria) references tbl_categoria(cd_categoria),
    constraint fk_marca foreign key(cd_marca) references tbl_marca(cd_marca)
)  
default charset utf8;

insert into tbl_categoria -- insira na tabela categoria
values(default,'Esportivo'),
(default, 'Crossover'),
(default, 'Cupê'),
(default, 'Jipe');

select * from tbl_marca;
select * from tbl_categoria;
select * from tbl_carro;

insert into tbl_marca
values(default,'Ferrari'),		-- codigo 1
(default, 'Lamborghini'),					-- codigo 2	
(default, 'Koenigsegg'),					-- codigo 3
(default, 'Bugatti'),				-- codigo 4
(default, 'Porsche'),				-- codigo 5
(default, 'Audi'),				-- codigo 6
(default, 'BMW'),					-- codigo 7
(default, 'Land Rover');			-- codigo 8


insert into tbl_carro
values
(Default,'1','Ferrari 458 Italia','1','7000000.00','100','<P> Carro extremamente veloz e bonito</P>','S','458'),
 
(Default,'1','Bugatti Chiron','4','7000000.00','150','<P> Comparado a um avião, Bugatti Chiron está no mercado</p>','S','Veyron'),

(Default,'1','Koenigsegg Agera R','3','8000000.00','100','<p> Koenigsegg é um dos carros mais velozes do mundo</p>','S','koen'),
 
(Default,'1','Lamborghini Veneno','2','9000000.00','200','<p> Como um touro, temo a Lamborghini, carro magnífico</p>','S','lamboven');


insert into tbl_carro
values
(Default,'2','Landi Rover Evoque','8','350000.00','100','<P> Carro extremamente confortavél e maravilhoso</P>','S','evo'),
 
(Default,'2','Audi Q3','6','250000.00','150','<P> Tecnologia avançada, com charme de executivo</p>','N','aud'),

(Default,'2','BMW X4','7','450000.00','100','<p> Carro espaçoso, confortavél e perfeito para um dia de passeio</p>','N','bmx4'),
 
(Default,'2','Porsche Panamera','5','400000.00','200','<p> Carro veloz, bonito e grande, Porsche Cayenne</p>','N','Pan');

select count(*) from tbl_carro;

select * from tbl_carro;

select nm_carro, vl_preco from tbl_carro;

select * from tbl_marca;

select * from tbl_categoria;

create view vw_carro
as select 
	tbl_carro.cd_carro,
    tbl_categoria.ds_categoria,
    tbl_carro.nm_carro,
    tbl_marca.nm_marca,
    tbl_carro.vl_preco,
    tbl_carro.qt_estoque,
    tbl_carro.ds_resumo_carro,
    tbl_carro.sg_lancamento,
    tbl_carro.camin_img
from tbl_carro inner join tbl_marca
	on tbl_carro.cd_marca = tbl_marca.cd_marca
inner join tbl_categoria
on tbl_carro.cd_categoria = tbl_categoria.cd_categoria;

select * from vw_carro;

select * from vw_carro where nm_carro like '%o%';

select nm_carro, vl_preco, camin_img from vw_carro where ds_categoria = 'Esportivo';


create table tbl_usuario
(
	cd_usuario int primary key auto_increment,
    nm_usuario varchar (80) not null,
    ds_email varchar (80) not null,
    ds_senha varchar(6) not null,
    ds_status boolean not null,
    ds_endereco varchar (80) not null,
    ds_cidade varchar (30) not null,
    no_cep char (9) not null
)
default charset utf8;


insert into tbl_usuario
values(default, 'Johnny', 'johnny@hotmail.com', '123456', 1, 'Rua Guaipa 1021', 'São Paulo','02345-000');

insert into tbl_usuario
values(default, 'Messi', 'Messi@hotmail.com', '123456', 0, 'Rua Dubai 10', 'Espanha','03456-000');

insert into tbl_usuario
values(default, 'Neymar', 'Neymar@hotmail.com', '123456', 0, 'Rua Emirades 11', 'Santos','02345-000');



select * from tbl_usuario;

create user 'ead'@'localhost' identified with mysql_native_password by '123456789';
grant all privileges on db_ead.* to 'ead'@'localhost' with grant option;

select nm_usuario from tbl_usuario where cd_usuario = 1;

select * from tbl_carro;
select * from tbl_marca;
delete from tbl_carro where cd_carro = 18;

update tbl_carro
set camin_img = 'Pan.jpg'
where cd_carro = 8;

update tbl_carro
set vl_preco = '4000000.00'
where cd_carro = 1;

create table tbl_venda(
cd_venda int(11) primary key auto_increment,
no_Ticket varchar(13) not null,
cd_cliente int(11) not null,
cd_carro int(11) not null,
qt_carro int(11) not null,
vl_item decimal(10,2) not null,
vl_total_item decimal(10,2) generated always as ((qt_carro * vl_item)) virtual,
dt_venda date not null
)default charset = utf8;

insert into tbl_venda(no_Ticket, cd_cliente, cd_carro, qt_carro, vl_item, dt_venda)
values (111222333, 2, 1,2,50.20, '2020-10-02');

select * from tbl_venda;

create view vw_Venda
as select
	tbl_venda.no_Ticket,
    tbl_venda.cd_cliente,
    tbl_venda.dt_Venda,
    tbl_venda.qt_carro,
    tbl_venda.vl_total_item,
    tbl_carro.nm_carro
from tbl_venda inner join tbl_carro
on tbl_venda.cd_carro = tbl_carro.cd_carro;

select * from vw_venda where cd_cliente = 3;












