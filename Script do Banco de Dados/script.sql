drop database if exists `pfi`;
create database `pfi`;
use `pfi`;

create table `usuarios`(
	id int not null auto_increment primary key,
    nome varchar(40) not null,
    email varchar(40) not null,
    senha varchar(10) not null);

create table `categorias`(
	id int not null auto_increment primary key,
    nome varchar(20) not null,
    descricao varchar(100) not null
    usuarios_id int not null);

create table `tipos`(
	id int not null auto_increment primary key,
    nome varchar(20) not null,
    descricao varchar(100) not null
    usuarios_id int not null);

create table `despesas`(
	id int not null auto_increment primary key,
    descricao varchar(100) not null,
    valor float not null,
    data date not null,
	categoria_id int not null,
    repeticao int not null,
    usuarios_id int not null);
    

create table `receitas`(
	id int not null auto_increment primary key,
    descricao varchar(100) not null,
    valor float not null,
    data date not null,
	tipo_id int not null,
    repeticao int not null,
    usuarios_id int not null);
    
create table `metas`(
	id int not null auto_increment primary key,
    descricao varchar(100) not null,
    valor float not null,
    parcela_mensal float not null,
	tempo varchar(45) not null,
    usuarios_id int not null);
    

create table `limites_gastos`(
	id int not null auto_increment primary key,
    alimentacao float not null,
    lazer float not null,
    saude float not null,
    estudo float not null,
    casa float not null,
    compra float not null,
    viagem float not null,
    cuidado float not null,
    trabalho float not null,
    usuarios_id int not null);
    
