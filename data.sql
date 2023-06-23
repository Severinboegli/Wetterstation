drop database if exists wetterstation;
create database wetterstation;
use wetterstation;

create table datas(
    datas_ID int not null auto_increment,
    recorded_time date,
    temp float,
    pressure float,
    humidity float,
    primary key(datas_ID)
);