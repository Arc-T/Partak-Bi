Partak Project for BI Dashboard

Powered By Taha Hajivand

Customers - Status Indicator:

Provinces: [

    Isfahan:[

        Cities:[

            Baharestan:[

                Markazmokhaberat:[

                        Markazi:[

                            Filters:[
                        
                            StatusName => Count
                        ]
                    ]
                ]
            ]
        ]
    ]
]

Database Migration

CREATE DATABASE partak_bi CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_general_ci';

USE partak_bi;

CREATE TABLE companies_group (
 id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
 name VARCHAR ( 200 ), active ENUM ( '0', '1' )
) ENGINE = INNODB;


CREATE TABLE menus(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
route VARCHAR(200),
icon VARCHAR(200),
indicator_id INT,
CONSTRAINT menus_to_indicator FOREIGN KEY (indicator_id) REFERENCES indicators(id) ON DELETE CASCADE 
)ENGINE = INNODB;

CREATE TABLE companies (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR ( 200 ),
  primary_color VARCHAR ( 200 ),
  secondary_color VARCHAR ( 200 ),
  active ENUM ( '0', '1' ),
  subdomain VARCHAR ( 200 ),
  logo VARCHAR ( 200 ),
  description VARCHAR ( 400 ),
  group_id INT DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  CONSTRAINT company_to_company_group FOREIGN KEY ( group_id ) REFERENCES companies_group ( id ) 
) ENGINE = INNODB;

CREATE TABLE indicators_group (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR ( 200 )
) ENGINE = INNODB;
   
CREATE TABLE indicators (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR ( 200 ),
  active ENUM ( '0', '1' ),
  indicator_group_id INT,
  CONSTRAINT indicator_to_indicator_group FOREIGN KEY ( indicator_group_id ) REFERENCES indicators_group ( id ) ON DELETE CASCADE 
) ENGINE = INNODB;

CREATE TABLE companies_group_indicator (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  indicator_id INT,
  company_group_id INT,
  CONSTRAINT company_group_access_to_indicator FOREIGN KEY ( indicator_id ) REFERENCES indicators ( id ) ON DELETE CASCADE,
  CONSTRAINT company_group_access_to_company_group FOREIGN KEY ( company_group_id ) REFERENCES companies_group ( id ) ON DELETE CASCADE,
  INDEX indicator_index ( indicator_id ),
  INDEX company_group_index ( company_group_id ) 
) ENGINE = INNODB;

CREATE TABLE users (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR ( 200 ),
  username VARCHAR ( 200 ),
  password VARCHAR ( 200 ),
  active ENUM ( '0', '1' ),
  company_id INT,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  CONSTRAINT user_to_company FOREIGN KEY ( company_id ) REFERENCES companies ( id ) ON DELETE CASCADE ) ENGINE = INNODB;
	