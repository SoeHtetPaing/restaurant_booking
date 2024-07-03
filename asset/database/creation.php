<?php
    function createTable ($database) {
        $sql = "create table if not exists restaurant_location (id int primary key auto_increment, name varchar(100));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists restaurant (id int primary key auto_increment, name varchar(100), email varchar(100), phone varchar(15), address varchar(100), location int not null, imageqr varchar(100), password text, logo varchar(100), foreign key (location) references restaurant_location (id));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists restaurant_table (tid int primary key auto_increment, rid int not null, tname varchar(100), foreign key (rid) references restaurant (id));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists restaurant_chair (cid int primary key auto_increment, tid int not null, cno varchar(100), foreign key (tid) references restaurant_table (tid));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists restaurant_menu (mid int primary key auto_increment, rid int not null, mname varchar(100), madeby varchar(100), type varchar(100), price int, photo varchar(100), foreign key (rid) references restaurant (id));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists customer (id int primary key auto_increment, name varchar(100), email varchar(100), phone varchar(15), address varchar(100), password text, img varchar(100));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists booking (bid varchar(225) not null primary key, rid int not null, cid int not null, makedate date, maketime varchar(50), name varchar(100), phone varchar(15), bdate date, btime varchar(50), bill int, transaction varchar(100), status int, reject int, foreign key (rid) references restaurant (id), foreign key (cid) references customer (id));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists booking_chair (id int primary key auto_increment, bid varchar(225) not null, cid int not null, cno varchar(100), foreign key (bid) references booking (bid), foreign key (cid) references restaurant_chair (cid));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists booking_menu (id int primary key auto_increment, bid varchar(225) null, mid int not null, qty int, foreign key (bid) references booking (bid), foreign key (mid) references restaurant_menu (mid));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists page_user (email varchar(100) primary key not null, urole char(1));";
        if ($database->query($sql) === false) return false;

    }
    
    createTable($database);