** BUGS **
Company accepts partak user
Cache delete in admin panel should be handled
\*\*
D:\\xamp\\php\\php.exe
################################### Database Migration #######################################
CREATE DATABASE partak_bi CHARACTER
SET 'utf8mb4' COLLATE 'utf8mb4_general_ci';
USE partak_bi;
CREATE TABLE companies_group ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `title` VARCHAR ( 200 ), active ENUM ( '0', '1' ) ) ENGINE = INNODB;
CREATE TABLE companies (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR ( 200 ),
primary_color VARCHAR ( 200 ),
secondary_color VARCHAR ( 200 ),
active ENUM ( '0', '1' ),
subdomain VARCHAR ( 200 ),
api VARCHAR ( 200 ),
logo VARCHAR ( 200 ),
description VARCHAR ( 400 ),
group_id INT DEFAULT NULL,
created_at TIMESTAMP NULL DEFAULT NULL,
updated_at TIMESTAMP NULL DEFAULT NULL,
CONSTRAINT company_to_company_group FOREIGN KEY ( group_id ) REFERENCES companies_group ( id )
) ENGINE = INNODB;
CREATE TABLE indicators_group ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `title` VARCHAR ( 200 ) ) ENGINE = INNODB;
CREATE TABLE indicators (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR ( 200 ),
active ENUM ( '0', '1' ),
indicator_group_id INT,
CONSTRAINT indicator_to_indicator_group FOREIGN KEY ( indicator_group_id ) REFERENCES indicators_group ( id ) ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE menus (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
route VARCHAR ( 200 ),
icon VARCHAR ( 200 ),
parent_id INT,
indicator_id INT,
title VARCHAR(200),
CONSTRAINT menu_to_menu FOREIGN KEY (parent_id) REFERENCES menus(id) ON DELETE CASCADE,
CONSTRAINT menu_to_indicator FOREIGN KEY ( indicator_id ) REFERENCES indicators ( id ) ON DELETE CASCADE,
INDEX menu_index(parent_id),
INDEX indicator_index(indicator_id)
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
`name` VARCHAR ( 200 ),
username VARCHAR ( 200 ),
`password` VARCHAR ( 200 ),
active ENUM ( '0', '1' ),
company_id INT,
created_at TIMESTAMP NULL DEFAULT NULL,
updated_at TIMESTAMP NULL DEFAULT NULL,
CONSTRAINT user_to_company FOREIGN KEY ( company_id ) REFERENCES companies ( id ) ON DELETE CASCADE
) ENGINE = INNODB;
CREATE TABLE graphs ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR ( 200 ), `title` VARCHAR ( 200 ) ) ENGINE = INNODB;
CREATE TABLE indicators_graph (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
indicator_id INT,
graph_id INT,
CONSTRAINT indicators_graph_to_indicators FOREIGN KEY ( indicator_id ) REFERENCES indicators ( id ) ON DELETE CASCADE,
CONSTRAINT indicators_graph_to_graphs FOREIGN KEY ( graph_id ) REFERENCES graphs ( id ) ON DELETE CASCADE,
INDEX indicator_index ( indicator_id ),
INDEX graph_index ( graph_id )
) ENGINE = INNODB;
CREATE TABLE inputs(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR (200),
`title` VARCHAR (200),
`size` INT
) ENGINE = INNODB;
CREATE TABLE indicators_input(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`indicator_id` INT,
`input_id` INT,
CONSTRAINT indicator_input_to_indicator FOREIGN KEY ( indicator_id ) REFERENCES indicators (id) ON DELETE CASCADE,
CONSTRAINT indicator_input_to_input FOREIGN KEY ( input_id ) REFERENCES inputs (id) ON DELETE CASCADE,
INDEX indicator_index ( indicator_id),
INDEX input_index (input_id)
) ENGINE = INNODB;
#######################################################################################
