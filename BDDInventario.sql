/*==============================================================*/
/* NOMBRE DE LA BASE DE DATOS ------------>>>>>>>> inventario                                    */
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     21/6/2018 19:38:16                           */
/*==============================================================*/


drop table if exists ADMINISTRADOR;

drop table if exists AJUSTEPRODUCTO;

drop table if exists BODEGUERO;

drop table if exists PRODUCTO;

/*==============================================================*/
/* Table: ADMINISTRADOR                                         */
/*==============================================================*/
create table ADMINISTRADOR
(
   IDADMINISTRADOR      int not null AUTO_INCREMENT,
   CEDULA               varchar(10) not null,
   NOMBREADMINISTRADOR  varchar(100) not null,
   FECHANACIMIENTO      date not null,
   CIUDADNACIMIENTO     varchar(50) not null,
   DIRECCION            varchar(100) not null,
   TELEFONO             varchar(10) not null,
   ESTADO               char not null default 'A',
   ROL                  char not null default 'A',
   EMAIL                varchar(50) not null,
   PASSWORD             varchar(50) not null,
   primary key (IDADMINISTRADOR)
);

/*==============================================================*/
/* Table: AJUSTEPRODUCTO                                        */
/*==============================================================*/
create table AJUSTEPRODUCTO
(
   IDAJUSTE             int not null AUTO_INCREMENT,
   IDPRODUCTO           int,
   NUMEROAJUSTE         varchar(15) not null,
   CABECERA             varchar(100) not null,
   FECHAAJUSTE          date not null,
   DETALLE              int not null,
   CANTIDAD             int not null,
   primary key (IDAJUSTE)
);

/*==============================================================*/
/* Table: BODEGUERO                                             */
/*==============================================================*/
create table BODEGUERO
(
   IDBODEGUERO          int not null AUTO_INCREMENT,
   CEDULA               varchar(10) not null,
   NOMBREBODEGUERO      varchar(100) not null,
   FECHANACIMIENTO      date not null,
   CIUDADNACIMIENTO     varchar(50) not null,
   DIRECCION            varchar(100) not null,
   TELEFONO             varchar(10) not null,
   ESTADO               char not null default 'A',
   ROL                  char not null default 'B',
   EMAIL                varchar(50) not null,
   PASSWORD             varchar(50) not null,
   primary key (IDBODEGUERO)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   IDPRODUCTO           int not null AUTO_INCREMENT,
   CODIGO               varchar(8) not null,
   NOMBREPRODUCTO       varchar(100) not null,
   DESCRIPCION          varchar(200) not null,
   IVA                  char not null default 'S',
   COSTO                float(8,2) not null,
   PVP                  float(8,2) not null,
   ESTADO               char not null default 'A',
   primary key (IDPRODUCTO)
);

alter table AJUSTEPRODUCTO add constraint FK_REFERENCE_1 foreign key (IDPRODUCTO)
      references PRODUCTO (IDPRODUCTO) on delete restrict on update restrict;


INSERT INTO `administrador` (`IDADMINISTRADOR`, `CEDULA`, `NOMBREADMINISTRADOR`, `FECHANACIMIENTO`, `CIUDADNACIMIENTO`, `DIRECCION`, `TELEFONO`, `ESTADO`, `ROL`, `EMAIL`, `PASSWORD`) VALUES (NULL, '1003756937', 'Jordy', '1994-09-19', 'Arenillas', 'Priorato', '0983697528', 'A', 'A', 'admin@gmail.com', 'admin.1234');