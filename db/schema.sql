-- $Id: schema.sql,v 1.3 2002/11/13 21:19:54 robbat2 Exp $

-- 
-- Table structure for table `Actions`
-- 

DROP TABLE IF EXISTS Actions;
CREATE TABLE Actions (
  ActionID int(10) unsigned zerofill NOT NULL auto_increment,
  ActionCode varchar(16) NOT NULL default '',
  PRIMARY KEY  (ActionID),
  UNIQUE KEY ActionCode (ActionCode)
) TYPE=MyISAM COMMENT='Action Type Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Bookings`
-- 

DROP TABLE IF EXISTS Bookings;
CREATE TABLE Bookings (
  BookingsID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(10) NOT NULL default '0',
  ObjectID int(10) NOT NULL default '0',
  BookingsStartDate datetime NOT NULL default '0000-00-00 00:00:00',
  BookingsEndDate datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (BookingsID)
) TYPE=MyISAM;
-- --------------------------------------------------------

-- 
-- Table structure for table `CheckOuts`
-- 

DROP TABLE IF EXISTS CheckOuts;
CREATE TABLE CheckOuts (
  CheckOutID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(10) unsigned zerofill NOT NULL default '0000000000',
  ObjectID int(10) unsigned zerofill NOT NULL default '0000000000',
  CheckOutDueDate datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (CheckOutID),
  KEY UserID (UserID),
  KEY ObjectID (ObjectID)
) TYPE=MyISAM;
-- --------------------------------------------------------

-- 
-- Table structure for table `GroupActionMapping`
-- 

DROP TABLE IF EXISTS GroupActionMapping;
CREATE TABLE GroupActionMapping (
  GroupActionMappingID int(10) unsigned zerofill NOT NULL auto_increment,
  ActionID int(10) unsigned zerofill NOT NULL default '0000000000',
  GroupID int(10) unsigned zerofill NOT NULL default '0000000000',
  PRIMARY KEY  (GroupActionMappingID),
  UNIQUE KEY GroupActionMapping (ActionID,GroupID)
) TYPE=MyISAM;
-- --------------------------------------------------------

-- 
-- Table structure for table `Groups`
-- 

DROP TABLE IF EXISTS Groups;
CREATE TABLE Groups (
  GroupID int(10) unsigned zerofill NOT NULL auto_increment,
  GroupName varchar(255) NOT NULL default '',
  PRIMARY KEY  (GroupID),
  UNIQUE KEY GroupName (GroupName)
) TYPE=MyISAM COMMENT='Group Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Manufacters`
-- 

DROP TABLE IF EXISTS Manufacters;
CREATE TABLE Manufacters (
  ManufacterID int(10) unsigned zerofill NOT NULL auto_increment,
  ManufacterName varchar(255) NOT NULL default '',
  ManufacterDetails text NOT NULL,
  PRIMARY KEY  (ManufacterID),
  KEY ManufactersName (ManufacterName)
) TYPE=MyISAM COMMENT='Manufacters Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Notes`
-- 

DROP TABLE IF EXISTS Notes;
CREATE TABLE Notes (
  NoteID int(10) unsigned zerofill NOT NULL auto_increment,
  NoteMimeType varchar(255) NOT NULL default 'text/plain',
  NoteData mediumtext NOT NULL,
  GenericTable enum('Actions','Bookings','Groups','Manufacters','Objects','ObjectTypes','Purchases','Transactions','Users') NOT NULL default 'Objects',
  GenericID int(10) unsigned zerofill NOT NULL default '0000000000',
  PRIMARY KEY  (NoteID),
  KEY NoteMimeType (NoteMimeType),
  KEY NoteData (NoteData(128)),
  KEY NoteParent (GenericTable,GenericID)
) TYPE=MyISAM;
-- --------------------------------------------------------

-- 
-- Table structure for table `ObjectTypes`
-- 

DROP TABLE IF EXISTS ObjectTypes;
CREATE TABLE ObjectTypes (
  ObjectTypeID int(10) unsigned zerofill NOT NULL auto_increment,
  ManufacterID int(10) NOT NULL default '0',
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
  KEY ManufacterID (ManufacterID),
  KEY ObjectTypePriority (ObjectTypePriority)
) TYPE=MyISAM COMMENT='Object Type Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Objects`
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
) TYPE=MyISAM COMMENT='Object Information';
-- --------------------------------------------------------

-- 
-- Table structure for table `Purchases`
-- 

DROP TABLE IF EXISTS Purchases;
CREATE TABLE Purchases (
  PurchaseID int(10) unsigned zerofill NOT NULL auto_increment,
  PurchaseInfo text NOT NULL,
  PRIMARY KEY  (PurchaseID)
) TYPE=MyISAM COMMENT='Purchases Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Transactions`
-- 

DROP TABLE IF EXISTS Transactions;
CREATE TABLE Transactions (
  TransactionID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(10) unsigned zerofill NOT NULL default '0000000000',
  GenericTable enum('Actions','Bookings','GroupActionMapping','Groups','Manufacters','Notes','Objects','ObjectTypes','Purchases','Users','UserGroupMapping') NOT NULL default 'Actions',
  GenericID int(10) unsigned zerofill NOT NULL default '0000000000',
  TransactionDate timestamp(14) NOT NULL,
  ActionID int(10) unsigned zerofill NOT NULL default '0000000000',
  PRIMARY KEY  (TransactionID),
  KEY UserID (UserID),
  KEY ActionID (ActionID)
) TYPE=MyISAM COMMENT='Transaction Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `UserGroupMapping`
-- 

DROP TABLE IF EXISTS UserGroupMapping;
CREATE TABLE UserGroupMapping (
  UserGroupMappingID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(10) unsigned NOT NULL default '0',
  GroupID int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (UserGroupMappingID),
  UNIQUE KEY UserGroupMapping (UserID,GroupID)
) TYPE=MyISAM;
-- --------------------------------------------------------

-- 
-- Table structure for table `Users`
-- 

DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
  UserID int(10) unsigned zerofill NOT NULL auto_increment,
  UserBarcode bigint(14) NOT NULL default '20000000000000',
  UserLogin varchar(255) NOT NULL default '',
  UserPassword varchar(255) NOT NULL default '',
  PRIMARY KEY  (UserID),
  UNIQUE KEY UserBarcode (UserBarcode),
  UNIQUE KEY UserLogin (UserLogin)
) TYPE=MyISAM COMMENT='User Data';

    
