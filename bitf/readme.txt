
CREATE TABLE IF NOT EXISTS `bitf_member` (
 `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `userid` varchar(250) DEFAULT "",
 `userpwd` varchar(250) DEFAULT "",
 `firstname` varchar(250) DEFAULT "",
 `lastname` varchar(250) DEFAULT "",
 `verification` boolean DEFAULT true,
 `vcode` varchar(250) DEFAULT "",  
 `status` boolean DEFAULT true 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `bitf_profile` (
 `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `memberid` bigint,
 `firstname` varchar(250) DEFAULT "",
 `lastname` varchar(250) DEFAULT "",
 `itsid` int(8),
 `pannumber` varchar(12) DEFAULT "",
 `bankname` varchar(12) DEFAULT "",
 `pledgeamount` bigint,
 `pledgedate` date
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
