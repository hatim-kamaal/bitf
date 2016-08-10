DROP TABLE bitf_account_activity;
DROP TABLE bitf_human_resource;


CREATE TABLE IF NOT EXISTS `bitf_human_resource` (
 `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `referral` bigint DEFAULT 0,
 `itsid` varchar(8) UNIQUE NOT NULL,
 `emailid` varchar(250) UNIQUE NOT NULL,
 `userpwd` varchar(250) DEFAULT "none",
 `fullname` varchar(250) DEFAULT "none",
 `vcode` varchar(250) DEFAULT "unverified",  
 `pannumber` varchar(12) DEFAULT "none",
 `donation_amount` int DEFAULT 300,
 `donation_frequency` varchar(12) DEFAULT "monthly",
 `donation_start` date,
 `account_number` varchar(25) DEFAULT "none",
 `account_name` varchar(200) DEFAULT "none",
 `bank_name` varchar(100) DEFAULT "none",
 `role` int(1) DEFAULT 0,
 `status` boolean DEFAULT true,
 `created` datetime,
 `updated` datetime  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `bitf_account_activity` (
 `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `userid` bigint,
 `incoming_fund` bigint DEFAULT 0,
 `outgoing_fund` bigint DEFAULT 0,
 `details` varchar(250) DEFAULT "",
 `txndate` date,
 `message` varchar(250) DEFAULT "",
 `created` datetime,
 `updated` datetime,  
 
 FOREIGN KEY (userid)
      REFERENCES bitf_human_resource(id)
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO bitf_human_resource (
 `itsid`,
 `emailid`,
 `userpwd`,
 `fullname`,
 `vcode`,  
 `donation_amount`,
 `donation_start`,
 `role`, 
  `created`,
 `updated`   
 ) VALUES
 ( '30359589', 'hatim.kamaal@gmail.com', 'kamaal', 'Hatim Kamal', 'verified', 500, '2016/03/01', 9, now(), now() );

INSERT INTO bitf_account_activity (
 `userid`, `incoming_fund`, `outgoing_fund`, `details`,
 `txndate`, `message`, `created`, `updated` ) VALUES (
1, 300, 0, 
'NEFT-N065160134880672-HATIM KAMAL--00521140110184',
'2016/3/5', 
'NEFT-N065160134880672-HATIM KAMAL--00521140110184',
now(), now() );

INSERT INTO bitf_account_activity (
 `userid`, `incoming_fund`, `outgoing_fund`, `details`,
 `txndate`, `message`, `created`, `updated` ) VALUES (
1, 300, 0, 
'NEFT-N096160143045956-HATIM KAMAL--00521140110184',
'2016/4/5', 
'NEFT-N096160143045956-HATIM KAMAL--00521140110184',
now(), now() );


/* Mufaddal Poonawala */

INSERT INTO bitf_human_resource (
 `itsid`, `emailid`, `userpwd`, `fullname`, `vcode`,  
 `donation_amount`, `donation_start`, `role`,   `created`,
 `updated` ) VALUES 
 ( '30377784', 'mufaddal.poonawala@gmail.com', 
 'mufaddal.poonawala', 'Mufaddal Poonawala', 'verified', 
 500, '2016/03/01', 8, now(), now() );

INSERT INTO bitf_account_activity (
 `userid`, `incoming_fund`, `outgoing_fund`, `details`,
 `txndate`, `message`, `created`, `updated` ) VALUES (
2, 300, 0, 'BIL/000928710702/30377784_MufaddalPoo/NSP', '2016/3/5', 'BIL/000928710702/30377784_MufaddalPoo/NSP', now(), now() );

INSERT INTO bitf_account_activity (
 `userid`, `incoming_fund`, `outgoing_fund`, `details`,
 `txndate`, `message`, `created`, `updated` ) VALUES (
2, 300, 0, 'BIL/000945924322/30377784_MufaddalPoo/NSP', '2016/4/5', 'BIL/000945924322/30377784_MufaddalPoo/NSP', now(), now() );

INSERT INTO bitf_account_activity (
 `userid`, `incoming_fund`, `outgoing_fund`, `details`,
 `txndate`, `message`, `created`, `updated` ) VALUES (
2, 300, 0, 'BIL/000963237202/30377784_MufaddalPoo/NSP', '2016/5/5', 'BIL/000963237202/30377784_MufaddalPoo/NSP', now(), now() );




/* Moiz jinia */
INSERT INTO bitf_human_resource (
 `itsid`, `emailid`, `userpwd`, `fullname`, `vcode`,  
 `donation_amount`, `donation_start`, `role`,   `created`,
 `updated` ) VALUES 
 ( '30386655', 'moiz.jinia@gmail.com', 
 'moiz.jinia', 'Moiz Jinia', 'verified', 
 500, '2016/03/01', 8, now(), now() );

INSERT INTO bitf_account_activity (
 `userid`, `incoming_fund`, `outgoing_fund`, `details`,
 `txndate`, `message`, `created`, `updated` ) VALUES (
3, 300, 0, 
'BIL/000927996849/30386655 Moiz Jinia/NSP',
'2016/3/4', 
'BIL/000927996849/30386655 Moiz Jinia/NSP',
now(), now() );

INSERT INTO bitf_account_activity (
 `userid`, `incoming_fund`, `outgoing_fund`, `details`,
 `txndate`, `message`, `created`, `updated` ) VALUES (
3, 300, 0, 
'BIL/000945017579/30386655 Moiz Jinia/NSP',
'2016/4/4', 
'BIL/000945017579/30386655 Moiz Jinia/NSP',
now(), now() );

INSERT INTO bitf_account_activity (
 `userid`, `incoming_fund`, `outgoing_fund`, `details`,
 `txndate`, `message`, `created`, `updated` ) VALUES (
3, 300, 0, 
'BIL/000962463016/30386655 Moiz Jinia/NSP',
'2016/5/4', 
'BIL/000962463016/30386655 Moiz Jinia/NSP',
now(), now() );



