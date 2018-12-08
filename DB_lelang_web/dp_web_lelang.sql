/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 12                       */
/* Created on:     04/12/2018 02:55:37                          */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_ITEM_LEL_BID_ON_BIDDER') then
    alter table ITEM_LELANG
       delete foreign key FK_ITEM_LEL_BID_ON_BIDDER
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ITEM_LEL_MELELANGK_AUCTIONE') then
    alter table ITEM_LELANG
       delete foreign key FK_ITEM_LEL_MELELANGK_AUCTIONE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ITEM_LEL_RELATIONS_RIWAYAT_') then
    alter table ITEM_LELANG
       delete foreign key FK_ITEM_LEL_RELATIONS_RIWAYAT_
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_RIWAYAT__RELATIONS_ITEM_LEL') then
    alter table RIWAYAT_LELANG
       delete foreign key FK_RIWAYAT__RELATIONS_ITEM_LEL
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_RIWAYAT__RIWAYAT_B_BIDDER') then
    alter table RIWAYAT_LELANG
       delete foreign key FK_RIWAYAT__RIWAYAT_B_BIDDER
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_RIWAYAT__RIWAYAT_P_AUCTIONE') then
    alter table RIWAYAT_LELANG
       delete foreign key FK_RIWAYAT__RIWAYAT_P_AUCTIONE
end if;

drop index if exists AUCTIONER.AUCTIONER_PK;

drop table if exists AUCTIONER;

drop index if exists BIDDER.BIDDER_PK;

drop table if exists BIDDER;

drop index if exists ITEM_LELANG.BID_ON_FK;

drop index if exists ITEM_LELANG.RELATIONSHIP_5_FK;

drop index if exists ITEM_LELANG.MELELANGKAN_FK;

drop index if exists ITEM_LELANG.ITEM_LELANG_PK;

drop table if exists ITEM_LELANG;

drop index if exists RIWAYAT_LELANG.RIWAYAT_BIDON_FK;

drop index if exists RIWAYAT_LELANG.RIWAYAT_PELELANGAN_FK;

drop index if exists RIWAYAT_LELANG.RELATIONSHIP_6_FK;

drop index if exists RIWAYAT_LELANG.RIWAYAT_LELANG_PK;

drop table if exists RIWAYAT_LELANG;

/*==============================================================*/
/* Table: AUCTIONER                                             */
/*==============================================================*/
create table AUCTIONER 
(
   ID_AUCTIONER         integer                        not null,
   NO_KTP               integer                        not null,
   NAMA_AUCTIONER       varchar(15)                    not null,
   NICKNAME_AUCTIONER   varchar(10)                    not null,
   EMAIL_AUCTIONER      varchar(15)                    not null,
   ALAMT_AUCTIONER      varchar(50)                    not null,
   NO_HP_AUCTIONER      varchar(15)                    not null,
   NO_ATM_AUCTIONER     varchar(13)                    not null,
   PASSWORD_AUCTIONER   varchar(20)                    not null,
   constraint PK_AUCTIONER primary key (ID_AUCTIONER)
);

/*==============================================================*/
/* Index: AUCTIONER_PK                                          */
/*==============================================================*/
create unique index AUCTIONER_PK on AUCTIONER (
ID_AUCTIONER ASC
);

/*==============================================================*/
/* Table: BIDDER                                                */
/*==============================================================*/
create table BIDDER 
(
   ID_BIDDER            integer                        not null,
   NAMA_BIDDER          varchar(20)                    not null,
   EMAIL_BIDDER         varchar(15)                    not null,
   NO_HP_BIDDER         varchar(15)                    not null,
   ALAMAT_BIDDER        varchar(50)                    not null,
   NO_ATM_BIDDER        varchar(13)                    null,
   PASSWORD_BIDDER      varchar(20)                    not null,
   constraint PK_BIDDER primary key (ID_BIDDER)
);

/*==============================================================*/
/* Index: BIDDER_PK                                             */
/*==============================================================*/
create unique index BIDDER_PK on BIDDER (
ID_BIDDER ASC
);

/*==============================================================*/
/* Table: ITEM_LELANG                                           */
/*==============================================================*/
create table ITEM_LELANG 
(
   ID_ITEM              integer                        not null,
   ID_AUCTIONER         integer                        null,
   ID_BIDDER            integer                        null,
   NO_RIWAYAT           integer                        null,
   NAMA_ITEM            varchar(20)                    not null,
   JUDUL_ITEM           varchar(8)                     not null,
   DESKRIPSI_ITEM       varchar(150)                   not null,
   DURASI_LELANG        timestamp                      not null,
   constraint PK_ITEM_LELANG primary key (ID_ITEM)
);

/*==============================================================*/
/* Index: ITEM_LELANG_PK                                        */
/*==============================================================*/
create unique index ITEM_LELANG_PK on ITEM_LELANG (
ID_ITEM ASC
);

/*==============================================================*/
/* Index: MELELANGKAN_FK                                        */
/*==============================================================*/
create index MELELANGKAN_FK on ITEM_LELANG (
ID_AUCTIONER ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_5_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_5_FK on ITEM_LELANG (
NO_RIWAYAT ASC
);

/*==============================================================*/
/* Index: BID_ON_FK                                             */
/*==============================================================*/
create index BID_ON_FK on ITEM_LELANG (
ID_BIDDER ASC
);

/*==============================================================*/
/* Table: RIWAYAT_LELANG                                        */
/*==============================================================*/
create table RIWAYAT_LELANG 
(
   NO_RIWAYAT           integer                        not null,
   ID_AUCTIONER         integer                        null,
   ID_BIDDER            integer                        null,
   ID_ITEM              integer                        null,
   WAKTU_LELANG         date                           not null,
   constraint PK_RIWAYAT_LELANG primary key (NO_RIWAYAT)
);

/*==============================================================*/
/* Index: RIWAYAT_LELANG_PK                                     */
/*==============================================================*/
create unique index RIWAYAT_LELANG_PK on RIWAYAT_LELANG (
NO_RIWAYAT ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_6_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_6_FK on RIWAYAT_LELANG (
ID_ITEM ASC
);

/*==============================================================*/
/* Index: RIWAYAT_PELELANGAN_FK                                 */
/*==============================================================*/
create index RIWAYAT_PELELANGAN_FK on RIWAYAT_LELANG (
ID_AUCTIONER ASC
);

/*==============================================================*/
/* Index: RIWAYAT_BIDON_FK                                      */
/*==============================================================*/
create index RIWAYAT_BIDON_FK on RIWAYAT_LELANG (
ID_BIDDER ASC
);

alter table ITEM_LELANG
   add constraint FK_ITEM_LEL_BID_ON_BIDDER foreign key (ID_BIDDER)
      references BIDDER (ID_BIDDER)
      on update restrict
      on delete restrict;

alter table ITEM_LELANG
   add constraint FK_ITEM_LEL_MELELANGK_AUCTIONE foreign key (ID_AUCTIONER)
      references AUCTIONER (ID_AUCTIONER)
      on update restrict
      on delete restrict;

alter table ITEM_LELANG
   add constraint FK_ITEM_LEL_RELATIONS_RIWAYAT_ foreign key (NO_RIWAYAT)
      references RIWAYAT_LELANG (NO_RIWAYAT)
      on update restrict
      on delete restrict;

alter table RIWAYAT_LELANG
   add constraint FK_RIWAYAT__RELATIONS_ITEM_LEL foreign key (ID_ITEM)
      references ITEM_LELANG (ID_ITEM)
      on update restrict
      on delete restrict;

alter table RIWAYAT_LELANG
   add constraint FK_RIWAYAT__RIWAYAT_B_BIDDER foreign key (ID_BIDDER)
      references BIDDER (ID_BIDDER)
      on update restrict
      on delete restrict;

alter table RIWAYAT_LELANG
   add constraint FK_RIWAYAT__RIWAYAT_P_AUCTIONE foreign key (ID_AUCTIONER)
      references AUCTIONER (ID_AUCTIONER)
      on update restrict
      on delete restrict;

