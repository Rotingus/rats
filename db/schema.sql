-- $Id: schema.sql,v 1.1 2002/11/12 10:03:34 robbat2 Exp $



-- 
-- Table structure for table `Actions`
-- 

CREATE TABLE Actions (
  ActionID int(10) unsigned zerofill NOT NULL auto_increment,
  ActionName varchar(255) NOT NULL default '',
  ActionCode varchar(16) NOT NULL default '',
  PRIMARY KEY  (ActionID),
  UNIQUE KEY ActionCode (ActionCode)
) TYPE=MyISAM COMMENT='Action Type Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Bookings`
-- 

CREATE TABLE Bookings (
  BookingsID int(10) unsigned zerofill NOT NULL auto_increment,
  UserID int(11) NOT NULL default '0',
  ObjectID int(11) NOT NULL default '0',
  BookingsStartDate datetime NOT NULL default '0000-00-00 00:00:00',
  BookingsEndDate datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (BookingsID)
) TYPE=MyISAM;
-- --------------------------------------------------------

-- 
-- Table structure for table `CheckOuts`
-- 

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

CREATE TABLE Groups (
  GroupID int(10) unsigned zerofill NOT NULL auto_increment,
  GroupName varchar(255) NOT NULL default '',
  PRIMARY KEY  (GroupID),
  UNIQUE KEY UserGroupName (GroupName)
) TYPE=MyISAM COMMENT='User GROUP Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Manufacters`
-- 

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

CREATE TABLE Notes (
  NoteID int(11) unsigned zerofill NOT NULL auto_increment,
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

CREATE TABLE ObjectTypes (
  ObjectTypeID int(10) unsigned zerofill NOT NULL auto_increment,
  ManufacterID int(11) NOT NULL default '0',
  ObjectTypeDescription text NOT NULL,
  ObjectTypeModel varchar(255) NOT NULL default '',
  ObjectTypeGenericName varchar(255) NOT NULL default '',
  ObjectTypePriority enum('hardest','hard','medium','soft','softest') NOT NULL default 'medium',
  ObjectTypeLoanDuration datetime NOT NULL default '0000-00-14 00:00:00',
  PRIMARY KEY  (ObjectTypeID),
  KEY ObjectTypeModel (ObjectTypeModel),
  KEY ObjectTypeGenericName (ObjectTypeGenericName),
  KEY ManufacterID (ManufacterID),
  KEY ObjectTypePriority (ObjectTypePriority)
) TYPE=MyISAM COMMENT='Object Type Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Objects`
-- 

CREATE TABLE Objects (
  ObjectID int(10) unsigned zerofill NOT NULL auto_increment,
  ObjectBarcode bigint(14) NOT NULL default '30000000000000',
  ObjectName varchar(255) NOT NULL default '',
  ObjectSerialNumber varchar(255) default NULL,
  ObjectTypeID int(11) NOT NULL default '0',
  PurchaseID  int(10) unsigned zerofill NOT NULL default '0000000000',
  PRIMARY KEY  (ObjectID),
  UNIQUE KEY ObjectBarcode (ObjectBarcode),
  KEY ObjectTypeID (ObjectTypeID),
  KEY ObjectName (ObjectName),
  KEY PurchaseID  (PurchaseID )
) TYPE=MyISAM COMMENT='Object Information';
-- --------------------------------------------------------

-- 
-- Table structure for table `Purchases`
-- 

CREATE TABLE Purchases (
  PurchaseID int(10) unsigned zerofill NOT NULL auto_increment,
  PurchaseInfo text NOT NULL,
  PRIMARY KEY  (PurchaseID)
) TYPE=MyISAM COMMENT='Purchases Data';
-- --------------------------------------------------------

-- 
-- Table structure for table `Transactions`
-- 

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

CREATE TABLE Users (
  UserID int(10) unsigned zerofill NOT NULL auto_increment,
  UserBarcode bigint(14) NOT NULL default '20000000000000',
  UserLogin varchar(255) NOT NULL default '',
  UserPassword varchar(255) NOT NULL default '',
  PRIMARY KEY  (UserID),
  UNIQUE KEY UserLogin (UserLogin),
  UNIQUE KEY UserBarcode (UserBarcode)
) TYPE=MyISAM COMMENT='User Data';

    
