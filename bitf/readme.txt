DROP TABLE bitf_account_activity;
DROP TABLE bitf_human_resource;


CREATE TABLE IF NOT EXISTS `bitf_human_resource` (
 `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
 `userid`,
 `incoming_fund`,
 `outgoing_fund`,
 `details`,
 `txndate`,
 `message`,
 `created`,
 `updated`   
)
VALUES (
1, 300, 0, 'confirmed', now(), 'refrenceid', now(), now()
);
