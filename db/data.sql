-- $Id: data.sql,v 1.7 2003/06/12 18:20:30 robbat2 Exp $
-- MySQL dump 9.07
--
-- Host: localhost    Database: rats
-- Server version	4.0.12-log

--
-- Current Database: rats
--

USE rats;

--
-- Dumping data for table 'Actions'
--

INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000001,'aB',NULL,'Bookings','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000002,'eB',NULL,'Bookings','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000003,'dB',NULL,'Bookings','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000004,'vB',NULL,'Bookings','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000006,'eC',NULL,'CheckOuts','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000008,'vC',NULL,'CheckOuts','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000009,'aGAM',NULL,'GroupActionMapping','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000010,'eGAM',NULL,'GroupActionMapping','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000011,'dGAM',NULL,'GroupActionMapping','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000012,'vGAM',NULL,'GroupActionMapping','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000013,'aG',NULL,'Groups','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000014,'eG',NULL,'Groups','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000015,'dG',NULL,'Groups','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000016,'vG',NULL,'Groups','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000017,'aV',NULL,'Vendors','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000018,'eV',NULL,'Vendors','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000019,'dV',NULL,'Vendors','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000020,'vV',NULL,'Vendors','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000021,'aN',NULL,'Notes','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000022,'eN',NULL,'Notes','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000023,'dN',NULL,'Notes','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000024,'vN',NULL,'Notes','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000025,'aO',NULL,'Objects','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000026,'eO',NULL,'Objects','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000027,'dO',NULL,'Objects','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000028,'vO',NULL,'Objects','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000029,'aOT',NULL,'ObjectTypes','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000030,'eOT',NULL,'ObjectTypes','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000031,'dOT',NULL,'ObjectTypes','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000032,'vOT',NULL,'ObjectTypes','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000033,'aP',NULL,'Purchases','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000034,'eP',NULL,'Purchases','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000035,'dP',NULL,'Purchases','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000036,'vP',NULL,'Purchases','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000037,'aU',NULL,'Users','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000038,'eU',NULL,'Users','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000039,'dU',NULL,'Users','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000040,'vU',NULL,'Users','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000041,'aUGM',NULL,'UserGroupMapping','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000042,'eUGM',NULL,'UserGroupMapping','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000043,'dUGM',NULL,'UserGroupMapping','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000044,'vUGM',NULL,'UserGroupMapping','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000045,'aA',NULL,'Actions','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000046,'eA',NULL,'Actions','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000047,'dA',NULL,'Actions','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000048,'vA',NULL,'Actions','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000049,'aT',NULL,'Transactions','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000050,'eT',NULL,'Transactions','edit');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000051,'dT',NULL,'Transactions','delete');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000052,'vT',NULL,'Transactions','view');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000053,'aC',NULL,'CheckOuts','add');
INSERT IGNORE INTO Actions (ActionID, ActionCode, ActionBarcode, ActionGenericTable, ActionType) VALUES (0000000054,'dC',NULL,'CheckOuts','delete');

--
-- Dumping data for table 'Bookings'
--


--
-- Dumping data for table 'CheckOuts'
--

INSERT IGNORE INTO CheckOuts (CheckOutID, UserID, ObjectID, CheckOutDate, CheckOutDueDate) VALUES (0000000026,0000000001,0000000004,20030507144335,'2003-05-21 14:43:35');

--
-- Dumping data for table 'GroupActionMapping'
--

INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000001,0000000004,0000000001);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000002,0000000008,0000000001);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000006,0000000020,0000000001);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000004,0000000024,0000000001);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000005,0000000028,0000000001);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000003,0000000032,0000000001);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000007,0000000005,0000000002);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000008,0000000007,0000000002);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000009,0000000012,0000000002);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000011,0000000016,0000000002);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000012,0000000036,0000000002);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000010,0000000040,0000000002);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000013,0000000044,0000000002);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000018,0000000001,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000019,0000000002,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000020,0000000003,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000021,0000000004,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000022,0000000006,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000023,0000000008,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000024,0000000009,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000025,0000000010,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000026,0000000011,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000027,0000000012,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000028,0000000013,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000029,0000000014,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000030,0000000015,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000031,0000000016,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000032,0000000017,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000033,0000000018,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000034,0000000019,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000035,0000000020,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000036,0000000021,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000037,0000000022,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000038,0000000023,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000039,0000000024,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000040,0000000025,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000041,0000000026,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000042,0000000027,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000043,0000000028,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000044,0000000029,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000045,0000000030,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000046,0000000031,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000047,0000000032,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000048,0000000033,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000049,0000000034,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000050,0000000035,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000051,0000000036,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000052,0000000037,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000053,0000000038,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000054,0000000039,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000055,0000000040,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000056,0000000041,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000057,0000000042,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000058,0000000043,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000059,0000000044,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000014,0000000045,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000015,0000000046,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000016,0000000047,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000017,0000000048,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000060,0000000049,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000061,0000000050,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000062,0000000051,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000063,0000000052,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000064,0000000053,0000000010);
INSERT IGNORE INTO GroupActionMapping (GroupActionMappingID, ActionID, GroupID) VALUES (0000000065,0000000054,0000000010);

--
-- Dumping data for table 'Groups'
--

INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000001,'Anonymous users');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000009,'Notes administrators');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000004,'Object administrators');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000005,'ObjectType administrators');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000007,'Permissions administrators');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000003,'Power users');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000010,'Super Administrators');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000008,'Transactions viewers');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000006,'User administrators');
INSERT IGNORE INTO Groups (GroupID, GroupName) VALUES (0000000002,'Users');

--
-- Dumping data for table 'Notes'
--


--
-- Dumping data for table 'ObjectTypes'
--

INSERT IGNORE INTO ObjectTypes (ObjectTypeID, VendorID, ObjectTypeDescription, ObjectTypeModel, ObjectTypeGenericName, ObjectTypeClass, ObjectTypePriority, ObjectTypeLoanDuration) VALUES (0000000001,1,'Test Object Type','Foo','Testing','special','softest','0000-00-14 00:00:00');
INSERT IGNORE INTO ObjectTypes (ObjectTypeID, VendorID, ObjectTypeDescription, ObjectTypeModel, ObjectTypeGenericName, ObjectTypeClass, ObjectTypePriority, ObjectTypeLoanDuration) VALUES (0000000002,3,'CrystalEyes Shutter Glasses IR Emitter','E-2','IR Emitter','equipment','soft','0000-00-14 00:00:00');

--
-- Dumping data for table 'Objects'
--

INSERT IGNORE INTO Objects (ObjectID, ObjectBarcode, ObjectName, ObjectSerialNumber, ObjectTypeID, PurchaseID, ObjectGroupID, ObjectInGroup) VALUES (0000000001,39345000001002,'',NULL,1,0000000000,NULL,'NA');
INSERT IGNORE INTO Objects (ObjectID, ObjectBarcode, ObjectName, ObjectSerialNumber, ObjectTypeID, PurchaseID, ObjectGroupID, ObjectInGroup) VALUES (0000000002,39345000001010,'Test',NULL,1,0000000000,NULL,'NA');
INSERT IGNORE INTO Objects (ObjectID, ObjectBarcode, ObjectName, ObjectSerialNumber, ObjectTypeID, PurchaseID, ObjectGroupID, ObjectInGroup) VALUES (0000000004,39345000001028,'IR Emitter',NULL,2,0000000001,NULL,'NA');

--
-- Dumping data for table 'Purchases'
--

INSERT IGNORE INTO Purchases (PurchaseID, PurchaseDetails, VendorID) VALUES (0000000001,'Stereographics:\r\ninvoice #: 0030465-IN\r\ninvoice date: 03/20/2003\r\norder #: 0020396\r\norder date: 03/19/2003\r\nsalesperson: MLH\r\ncustomer #: SFUSURR\r\n\r\n',3);

--
-- Dumping data for table 'Transactions'
--

INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000031,0000000000,0000000019,20030507120902,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000032,0000000000,0000000000,20030507121021,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000033,0000000000,0000000020,20030507121147,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000034,0000000000,0000000000,20030507121729,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000035,0000000000,0000000021,20030507121833,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000036,0000000000,0000000000,20030507121951,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000037,0000000000,0000000022,20030507122044,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000038,0000000000,0000000000,20030507122151,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000039,0000000000,0000000023,20030507125502,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000040,0000000000,0000000000,20030507141613,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000041,0000000000,0000000024,20030507143030,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000042,0000000000,0000000000,20030507143055,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000043,0000000000,0000000025,20030507143620,0000000000);
INSERT IGNORE INTO Transactions (TransactionID, UserID, GenericID, TransactionDate, ActionID) VALUES (0000000044,0000000000,0000000000,20030507144335,0000000000);

--
-- Dumping data for table 'UserGroupMapping'
--

INSERT IGNORE INTO UserGroupMapping (UserGroupMappingID, UserID, GroupID) VALUES (0000000001,1,1);
INSERT IGNORE INTO UserGroupMapping (UserGroupMappingID, UserID, GroupID) VALUES (0000000005,1,10);
INSERT IGNORE INTO UserGroupMapping (UserGroupMappingID, UserID, GroupID) VALUES (0000000002,2,1);
INSERT IGNORE INTO UserGroupMapping (UserGroupMappingID, UserID, GroupID) VALUES (0000000003,3,1);

--
-- Dumping data for table 'Users'
--

INSERT IGNORE INTO Users (UserID, UserBarcode, UserLogin, UserPassword) VALUES (0000000001,29345003857006,'rjohnsob@sfu.ca','chinook');
INSERT IGNORE INTO Users (UserID, UserBarcode, UserLogin, UserPassword) VALUES (0000000002,29345003868516,'sluggett@sfu.ca','in_charge!');
INSERT IGNORE INTO Users (UserID, UserBarcode, UserLogin, UserPassword) VALUES (0000000003,29345003876956,'gordp@sfu.ca','cruiser');

--
-- Dumping data for table 'Vendors'
--

INSERT IGNORE INTO Vendors (VendorID, VendorName, VendorDetails) VALUES (0000000001,'Silicon Graphics Interactive','1600 Amphitheatre Parkway\r\nMountain View, CA \r\n94043\r\nUSA');
INSERT IGNORE INTO Vendors (VendorID, VendorName, VendorDetails) VALUES (0000000002,'Microsoft Canada Co.','1950 Meadowvale Blvd\r\nMississauga, Ontario\r\nL5N 8L9\r\n\r\nCanadian Head Office: (905) 568-0434\r\nCustomer Inquiries: (877) 568-2495\r\nMicrosoft TT/TDD: (905) 568-9641\r\nMicrosoft Order Centre: (800) 933-4750\r\n\r\n\r\n');
INSERT IGNORE INTO Vendors (VendorID, VendorName, VendorDetails) VALUES (0000000003,'StereoGraphics Corporation','2171 East Francisco Blvd.\r\nSan Rafael, CA 94901\r\n(415) 459-4500');
INSERT IGNORE INTO Vendors (VendorID, VendorName, VendorDetails) VALUES (0000000004,'ATOP Computer','10083 136A St.\r\nSurrey, BC V3T 4G1\r\nhttp://www.atoponline.com/\r\nPhone: (604) 930-4838\r\nFax: 604-930-4848');

