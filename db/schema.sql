-- $Id: schema.sql,v 1.12 2003/06/12 18:13:07 robbat2 Exp $
-- MySQL dump 9.07
--
-- Host: localhost    Database: rats
-- Server version	4.0.12-log

--
-- Current Database: rats
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ rats;

USE rats;

--
-- Table structure for table 'Actions'
--

DROP TABLE IF EXISTS Actions;
CREATE TABLE Actions (
  ActionID int(10) unsigned zerofill NOT NULL auto_increment,
  ActionCode varchar(16) default NULL,
  ActionBarcode bigint(14) default NULL,
  ActionGenericTable enum('Actions','Bookings','CheckOuts','GroupActionMapping','Groups','Vendors','Notes','Objects','ObjectTypes','Purchases','Users','UserGroupMapping','Transactions') NOT NULL default 'Objects',
  ActionType enum('add','edit','delete','view') NOT NULL default 'view',
  PRIMARY KEY  (ActionID),
  UNIQUE KEY TableAction (ActionGenericTable,ActionType),
  UNIQUE KEY ActionBarcode (ActionBarcode),
  KEY ActionGenericTable (ActionGenericTable)
) TYPE=InnoDB COMMENT='Action Type Data';

--
-- Table structure for table 'Bookings'
--

DROP TABLE IF EXISTS Bookings;
CREATE TABLE Bookings (
  BookingID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(10) NOT NULL default '0',
  ObjectID int(10) NOT NULL default '0',
  BookingStartDate datetime NOT NULL default '0000-00-00 00:00:00',
  BookingEndDate datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (BookingID)
) TYPE=InnoDB;

--
-- Table structure for table 'CheckOuts'
--

DROP TABLE IF EXISTS CheckOuts;
CREATE TABLE CheckOuts (
  CheckOutID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(10) unsigned zerofill NOT NULL default '0000000000',
  ObjectID int(10) unsigned zerofill NOT NULL default '0000000000',
  CheckOutDate timestamp(14) NOT NULL,
  CheckOutDueDate datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (CheckOutID),
  UNIQUE KEY ObjectID (ObjectID),
  KEY UserID (UserID)
) TYPE=InnoDB;

--
-- Table structure for table 'GroupActionMapping'
--

DROP TABLE IF EXISTS GroupActionMapping;
CREATE TABLE GroupActionMapping (
  GroupActionMappingID int(10) unsigned zerofill NOT NULL auto_increment,
  ActionID int(10) unsigned zerofill NOT NULL default '0000000000',
  GroupID int(10) unsigned zerofill NOT NULL default '0000000000',
  PRIMARY KEY  (GroupActionMappingID),
  UNIQUE KEY GroupActionMapping (GroupID,ActionID)
) TYPE=InnoDB;

--
-- Table structure for table 'Groups'
--

DROP TABLE IF EXISTS Groups;
CREATE TABLE Groups (
  GroupID int(10) unsigned zerofill NOT NULL auto_increment,
  GroupName varchar(255) NOT NULL default '',
  PRIMARY KEY  (GroupID),
  UNIQUE KEY GroupName (GroupName)
) TYPE=InnoDB COMMENT='Group Data';

--
-- Table structure for table 'Notes'
--

DROP TABLE IF EXISTS Notes;
CREATE TABLE Notes (
  NoteID int(10) unsigned zerofill NOT NULL auto_increment,
  NoteMimeType varchar(255) NOT NULL default 'text/plain',
  NoteData mediumtext NOT NULL,
  NoteGenericTable enum('Actions','Bookings','CheckOuts','GroupActionMapping','Groups','Vendors','Notes','Objects','ObjectTypes','Purchases','Users','UserGroupMapping') NOT NULL default 'Objects',
  NoteGenericID int(10) unsigned zerofill NOT NULL default '0000000000',
  NoteDate timestamp(14) NOT NULL,
  UserID int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (NoteID),
  KEY NoteMimeType (NoteMimeType),
  KEY NoteParent (NoteGenericTable,NoteGenericID),
  KEY NoteUserID (UserID),
  KEY NoteDate (NoteDate)
) TYPE=InnoDB;

--
-- Table structure for table 'ObjectTypes'
--

DROP TABLE IF EXISTS ObjectTypes;
CREATE TABLE ObjectTypes (
  ObjectTypeID int(10) unsigned zerofill NOT NULL auto_increment,
  VendorID int(10) NOT NULL default '0',
  ObjectTypeDescription text NOT NULL,
  ObjectTypeModel varchar(255) NOT NULL default '',
  ObjectTypeGenericName varchar(255) NOT NULL default '',
  ObjectTypeClass enum('special','group','room','service','equipment','reference') NOT NULL default 'equipment',
  ObjectTypePriority enum('hardest','hard','medium','soft','softest') NOT NULL default 'medium',
  ObjectTypeLoanDuration datetime NOT NULL default '0000-00-14 00:00:00',
  PRIMARY KEY  (ObjectTypeID),
  KEY ObjectTypeModel (ObjectTypeModel),
  KEY ObjectTypeGenericName (ObjectTypeGenericName),
  KEY ObjectTypeClass (ObjectTypeClass),
  KEY ManufacterID (VendorID),
  KEY ObjectTypePriority (ObjectTypePriority)
) TYPE=InnoDB COMMENT='Object Type Data';

--
-- Table structure for table 'Objects'
--

DROP TABLE IF EXISTS Objects;
CREATE TABLE Objects (
  ObjectID int(10) unsigned zerofill NOT NULL auto_increment,
  ObjectBarcode bigint(14) NOT NULL default '30000000000000',
  ObjectName varchar(255) NOT NULL default '',
  ObjectSerialNumber varchar(255) default NULL,
  ObjectTypeID int(10) NOT NULL default '0',
  PurchaseID int(10) unsigned zerofill NOT NULL default '0000000000',
  ObjectGroupID int(10) unsigned zerofill default NULL,
  ObjectInGroup enum('NA','IN','OUT') NOT NULL default 'NA',
  PRIMARY KEY  (ObjectID),
  UNIQUE KEY ObjectBarcode (ObjectBarcode),
  KEY ObjectTypeID (ObjectTypeID),
  KEY ObjectName (ObjectName),
  KEY PurchaseID (PurchaseID)
) TYPE=InnoDB COMMENT='Object Information';

--
-- Table structure for table 'Purchases'
--

DROP TABLE IF EXISTS Purchases;
CREATE TABLE Purchases (
  PurchaseID int(10) unsigned zerofill NOT NULL auto_increment,
  PurchaseDetails text NOT NULL,
  VendorID int(11) default NULL,
  PRIMARY KEY  (PurchaseID),
  KEY VendorID (VendorID)
) TYPE=InnoDB COMMENT='Purchases Data';

--
-- Table structure for table 'Transactions'
--

DROP TABLE IF EXISTS Transactions;
CREATE TABLE Transactions (
  TransactionID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(10) unsigned zerofill default '0000000000',
  GenericID int(10) unsigned zerofill NOT NULL default '0000000000',
  TransactionDate timestamp(14) NOT NULL,
  ActionID int(10) unsigned zerofill NOT NULL default '0000000000',
  PRIMARY KEY  (TransactionID),
  KEY UserID (UserID),
  KEY ActionID (ActionID)
) TYPE=InnoDB COMMENT='Transaction Data';

--
-- Table structure for table 'UserGroupMapping'
--

DROP TABLE IF EXISTS UserGroupMapping;
CREATE TABLE UserGroupMapping (
  UserGroupMappingID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(10) unsigned NOT NULL default '0',
  GroupID int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (UserGroupMappingID),
  UNIQUE KEY UserGroupMapping (UserID,GroupID)
) TYPE=InnoDB;

--
-- Table structure for table 'Users'
--

DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
  UserID int(10) unsigned zerofill NOT NULL auto_increment,
  UserBarcode bigint(14) NOT NULL default '20000000000000',
  UserLogin varchar(255) NOT NULL default '',
  UserPassword varchar(255) NOT NULL default '',
  PRIMARY KEY  (UserID),
  UNIQUE KEY UserLogin (UserLogin),
  UNIQUE KEY UserBarcode (UserBarcode)
) TYPE=InnoDB COMMENT='User Data';

--
-- Table structure for table 'Vendors'
--

DROP TABLE IF EXISTS Vendors;
CREATE TABLE Vendors (
  VendorID int(10) unsigned zerofill NOT NULL auto_increment,
  VendorName varchar(255) NOT NULL default '',
  VendorDetails text NOT NULL,
  PRIMARY KEY  (VendorID),
  KEY VendorName (VendorName)
) TYPE=InnoDB COMMENT='Vendors Data';

