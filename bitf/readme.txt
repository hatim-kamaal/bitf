CREATE TABLE IF NOT EXISTS `bitf_member` (
 `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `email` varchar(250) NOT NULL,
 `passcode` varchar(250) NOT NULL,
 `fullname` varchar(250) NOT NULL,
 `mobile` varchar(15) NOT NULL,
 `itsid` int(8) NOT NULL,
 `pannumber` varchar(12) DEFAULT "",
 `verification` varchar(250) DEFAULT "",
 `role` int(2) DEFAULT 0,   
 `status` boolean DEFAULT FALSE 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `bitf_ticket` (
 `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `memberid` bigint,
 `studentname` varchar(250) DEFAULT "",
 `studentitsid` varchar(250) DEFAULT "",
 `mohalla` varchar(250) DEFAULT "",
 `address` varchar(250) DEFAULT "",
 `mobile` varchar(250) DEFAULT "",
 `email` varchar(250) DEFAULT "",
 `school` varchar(250) DEFAULT "",
 `standard` varchar(250) DEFAULT "",
 `board` varchar(250) DEFAULT "",
 `email` varchar(250) DEFAULT "",
 `madrasa` varchar(250) DEFAULT "",
 `paymentcycle` varchar(250) DEFAULT "",
 `totalfees` varchar(250) DEFAULT "",
 `selfcontribution` varchar(250) DEFAULT "",
 `trustcontribution` varchar(250) DEFAULT "",
 `fatheroccupation` varchar(250) DEFAULT "",
 `motheroccupation` varchar(250) DEFAULT "",
 `alreadyapplied` varchar(250) DEFAULT "",
 `previoussupporter` varchar(250) DEFAULT "",
 `remarks` varchar(250) DEFAULT ""
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `bitf_account` (
 `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `amount` bigint DEFAULT 0,
 `direction` varchar(1) DEFAULT "",
 `reference` varchar(250) DEFAULT "",
 `userid` bigint,
 `txndate` date,
 `message` varchar(250) DEFAULT ""
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO bitf_account (amount, direction, reference, userid, txndate) VALUES ()
