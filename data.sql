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

insert into datas values(null,recorded_time,temp,pressure,humidity);

// leeren einer Tabelle
//DELETE FROM <Tablename>;