-- $Id: data.sql,v 1.2 2003/04/30 19:51:00 robbat2 Exp $
-- MySQL dump 9.07
--
-- Host: localhost    Database: rats
---------------------------------------------------------
-- Server version	4.0.12-log

--
-- Current Database: rats
--

USE rats;

--
-- Dumping data for table 'Actions'
--

INSERT INTO Actions VALUES (0000000001,'aB',NULL,'Bookings','add'),(0000000002,'eB',NULL,'Bookings','edit'),(0000000003,'dB',NULL,'Bookings','delete'),(0000000004,'vB',NULL,'Bookings','view'),(0000000005,'aC',NULL,'CheckOuts','add'),(0000000006,'eC',NULL,'CheckOuts','edit'),(0000000007,'dC',NULL,'CheckOuts','delete'),(0000000008,'vC',NULL,'CheckOuts','view'),(0000000009,NULL,NULL,'GroupActionMapping','add'),(0000000010,NULL,NULL,'GroupActionMapping','edit'),(0000000011,NULL,NULL,'GroupActionMapping','delete'),(0000000012,NULL,NULL,'GroupActionMapping','view'),(0000000013,'aG',NULL,'Groups','add'),(0000000014,'eG',NULL,'Groups','edit'),(0000000015,'dG',NULL,'Groups','delete'),(0000000016,'vG',NULL,'Groups','view'),(0000000017,'aV',NULL,'Vendors','add'),(0000000018,'eV',NULL,'Vendors','edit'),(0000000019,'dV',NULL,'Vendors','delete'),(0000000020,'vV',NULL,'Vendors','view'),(0000000021,'aN',NULL,'Notes','add'),(0000000022,'eN',NULL,'Notes','edit'),(0000000023,'dN',NULL,'Notes','delete'),(0000000024,'vN',NULL,'Notes','view'),(0000000025,'aO',NULL,'Objects','add'),(0000000026,'eO',NULL,'Objects','edit'),(0000000027,'dO',NULL,'Objects','delete'),(0000000028,'vO',NULL,'Objects','view'),(0000000029,'aOT',NULL,'ObjectTypes','add'),(0000000030,'eOT',NULL,'ObjectTypes','edit'),(0000000031,'dOT',NULL,'ObjectTypes','delete'),(0000000032,'vOT',NULL,'ObjectTypes','view'),(0000000033,'aP',NULL,'Purchases','add'),(0000000034,'eP',NULL,'Purchases','edit'),(0000000035,'dP',NULL,'Purchases','delete'),(0000000036,'vP',NULL,'Purchases','view'),(0000000037,'aU',NULL,'Users','add'),(0000000038,'eU',NULL,'Users','edit'),(0000000039,'dU',NULL,'Users','delete'),(0000000040,'vU',NULL,'Users','view'),(0000000041,'aUGM',NULL,'UserGroupMapping','add'),(0000000042,'eUGM',NULL,'UserGroupMapping','edit'),(0000000043,'dUGM',NULL,'UserGroupMapping','delete'),(0000000044,'vUGM',NULL,'UserGroupMapping','view'),(0000000045,NULL,NULL,'Actions','add'),(0000000046,NULL,NULL,'Actions','edit'),(0000000047,NULL,NULL,'Actions','delete'),(0000000048,NULL,NULL,'Actions','view'),(0000000049,NULL,NULL,'Transactions','add'),(0000000050,NULL,NULL,'Transactions','edit'),(0000000051,NULL,NULL,'Transactions','delete'),(0000000052,NULL,NULL,'Transactions','view');

--
-- Dumping data for table 'Bookings'
--


--
-- Dumping data for table 'CheckOuts'
--

INSERT INTO CheckOuts VALUES (0000000016,0000000002,0000000003,'2002-12-26 15:11:28');

--
-- Dumping data for table 'GroupActionMapping'
--


--
-- Dumping data for table 'Groups'
--

INSERT INTO Groups VALUES (0000000001,'Anonymous users'),(0000000009,'Notes administrators'),(0000000004,'Object administrators'),(0000000005,'ObjectType administrators'),(0000000007,'Permissions administrators'),(0000000003,'Power users'),(0000000008,'Transactions viewers'),(0000000006,'User administrators'),(0000000002,'Users');

--
-- Dumping data for table 'Notes'
--


--
-- Dumping data for table 'ObjectTypes'
--

INSERT INTO ObjectTypes VALUES (0000000001,1,'Test Object Type','Foo','Testing','special','softest','0000-00-14 00:00:00');

--
-- Dumping data for table 'Objects'
--

INSERT INTO Objects VALUES (0000000001,39345000001002,'',NULL,1,0000000000,NULL,'NA'),(0000000002,39345000001010,'Test',NULL,1,0000000000,NULL,'NA'),(0000000003,39345000001028,'Test2',NULL,1,0000000000,NULL,'NA');

--
-- Dumping data for table 'Purchases'
--


--
-- Dumping data for table 'Transactions'
--

INSERT INTO Transactions VALUES (0000000001,0000000000,'CheckOuts',0000000003,20021212050725,0000000006),(0000000002,0000000000,'CheckOuts',0000000005,20021212051426,0000000006),(0000000003,0000000000,'CheckOuts',0000000006,20021212051508,0000000006),(0000000004,0000000000,'CheckOuts',0000000008,20021212140506,0000000004),(0000000005,0000000000,'CheckOuts',0000000008,20021212140540,0000000006),(0000000006,0000000000,'CheckOuts',0000000009,20021212140554,0000000004),(0000000007,0000000000,'CheckOuts',0000000010,20021212140808,0000000004),(0000000008,0000000000,'CheckOuts',0000000009,20021212140814,0000000006),(0000000009,0000000000,'CheckOuts',0000000010,20021212140820,0000000004),(0000000010,0000000000,'CheckOuts',0000000011,20021212141017,0000000004),(0000000011,0000000000,'CheckOuts',0000000000,20021212143241,0000000004),(0000000012,0000000000,'CheckOuts',0000000000,20021212143409,0000000004),(0000000013,0000000000,'CheckOuts',0000000010,20021212143453,0000000006),(0000000014,0000000000,'CheckOuts',0000000000,20021212143458,0000000004),(0000000015,0000000000,'CheckOuts',0000000000,20021212143632,0000000004),(0000000016,0000000000,'CheckOuts',0000000011,20021212143919,0000000004),(0000000017,0000000000,'CheckOuts',0000000012,20021212144639,0000000004),(0000000018,0000000000,'CheckOuts',0000000012,20021212144644,0000000004),(0000000019,0000000000,'CheckOuts',0000000011,20021212144647,0000000006),(0000000020,0000000000,'CheckOuts',0000000012,20021212145123,0000000004),(0000000021,0000000000,'CheckOuts',0000000012,20021212145202,0000000006),(0000000022,0000000000,'CheckOuts',0000000013,20021212145211,0000000004),(0000000023,0000000000,'CheckOuts',0000000013,20021212145222,0000000006),(0000000024,0000000000,'CheckOuts',0000000014,20021212150400,0000000004),(0000000025,0000000000,'CheckOuts',0000000014,20021212150419,0000000006),(0000000026,0000000000,'CheckOuts',0000000000,20021212150917,0000000004),(0000000027,0000000000,'CheckOuts',0000000015,20021212150917,0000000004),(0000000028,0000000000,'CheckOuts',0000000015,20021212151011,0000000006),(0000000029,0000000000,'CheckOuts',0000000000,20021212151128,0000000004),(0000000030,0000000000,'CheckOuts',0000000016,20021212151128,0000000004);

--
-- Dumping data for table 'UserGroupMapping'
--

INSERT INTO UserGroupMapping VALUES (0000000001,1,1),(0000000002,2,1),(0000000003,3,1);

--
-- Dumping data for table 'Users'
--

INSERT INTO Users VALUES (0000000001,29345003857006,'rjohnsob@sfu.ca','chinook'),(0000000002,29345003868516,'sluggett@sfu.ca','in_charge!'),(0000000003,29345003876956,'gordp@sfu.ca','cruiser');

--
-- Dumping data for table 'Vendors'
--

INSERT INTO Vendors VALUES (0000000001,'Silicon Graphics Interactive','1600 Amphitheatre Parkway\r\nMountain View, CA \r\n94043\r\nUSA'),(0000000002,'Microsoft Canada Co.','1950 Meadowvale Blvd\r\nMississauga, Ontario\r\nL5N 8L9\r\n\r\nCanadian Head Office: (905) 568-0434\r\nCustomer Inquiries: (877) 568-2495\r\nMicrosoft TT/TDD: (905) 568-9641\r\nMicrosoft Order Centre: (800) 933-4750\r\n\r\n\r\n');

