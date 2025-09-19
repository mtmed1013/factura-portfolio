CREATE DATABASE FactsPortfolio;

USE FactsPortfolio;

create table tbl_products (
    id int primary key auto_increment,
    name varchar(255) not null,
    description text,
    price decimal(10, 2) not null,
    stock int not null,
    created_at timestamp default current_timestamp
);

create table tbl_clients (
    id int primary key auto_increment,
    identification varchar(100) not null,
    first_name varchar(100) not null,
    last_name varchar(100) not null,
    email varchar(255) unique not null,
    phone varchar(20),
    created_at timestamp default current_timestamp,
    updated_at timestamp on update current_timestamp
);

alter table tbl_clients add estado char(1);

create table tbl_facts (
    id int primary key auto_increment,
    client_id int not null,
    created_at timestamp default current_timestamp,
    foreign key (client_id) references tbl_clients (id)
);

alter table tbl_facts add estado char(1);

create table tbl_fact_details (
    id int primary key auto_increment,
    fact_id int not null,
    product_id int not null,
    quantity int not null,
    final_price decimal(10, 2) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp on update current_timestamp,
    foreign key (fact_id) references tbl_facts (id),
    foreign key (product_id) references tbl_products (id)
);