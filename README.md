****************************** CRITICAL *************************************
/**
*! User accepts Admin user
*! Cache delete in admin panel should be handled
*! try-catch in queries
*! logging system should be handled
*! colors around buttons of user panel should be fixed
*! empty result from api should be handled
*! user token will be expired if 1 day passes and user is still logged in
*! validation rules should be implemented
*/

************************** CLEAN UPS ****************************************

/**
* TODO : buttons hover color should be changed based on company primary and secondary colors
* TODO : a function to extract json data and renders charts for general and custom tabs
*/

************************** IMPROVEMENTS ****************************************

/**
** Its better to create a table named graph_details which holds all the graphs details whether its daily or custom
*/

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
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP NULL DEFAULT NULL,-- 	CONSTRAINT company_to_company_group FOREIGN KEY ( group_id ) REFERENCES companies_group ( id )
	
) ENGINE = INNODB;
CREATE TABLE indicators_group ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `title` VARCHAR ( 200 ) ) ENGINE = INNODB;
CREATE TABLE indicators (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR ( 200 ),
	active ENUM ( '0', '1' ),
	indicator_group_id INT,
	parent_id INT,
	route VARCHAR ( 200 ),
	icon VARCHAR ( 200 ),-- 	FOREIGN KEY ( indicator_group_id ) REFERENCES indicators_group ( id ) ON DELETE CASCADE,
-- 	FOREIGN KEY ( parent_id ) REFERENCES indicators ( id ) ON DELETE CASCADE
	
) ENGINE = INNODB;
CREATE TABLE indicators_daily_graph (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	indicator_id INT,
	graph_id INT,
	title VARCHAR ( 200 ),-- 	FOREIGN KEY ( indicator_id ) REFERENCES indicators ( id ) ON DELETE CASCADE,
-- 	FOREIGN KEY ( graph_id ) REFERENCES graphs ( id ) ON DELETE CASCADE,
	INDEX indicator_index ( indicator_id ),
	INDEX graph_index ( graph_id ) 
) ENGINE = INNODB;
CREATE TABLE companies_group_indicator ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, indicator_id INT, company_group_id INT, -- 	CONSTRAINT company_group_access_to_indicator FOREIGN KEY ( indicator_id ) REFERENCES indicators ( id ) ON DELETE CASCADE,
-- 	CONSTRAINT company_group_access_to_company_group FOREIGN KEY ( company_group_id ) REFERENCES companies_group ( id ) ON DELETE CASCADE,
INDEX indicator_index ( indicator_id ), INDEX company_group_index ( company_group_id ) ) ENGINE = INNODB;
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR ( 200 ),
	username VARCHAR ( 200 ),
	`password` VARCHAR ( 200 ),
	token VARCHAR ( 200 ),
	active ENUM ( '0', '1' ),
	company_id INT,
	created_at TIMESTAMP NULL DEFAULT NULL,
	updated_at TIMESTAMP NULL DEFAULT NULL,-- 	CONSTRAINT user_to_company FOREIGN KEY ( company_id ) REFERENCES companies ( id ) ON DELETE CASCADE
	
) ENGINE = INNODB;
CREATE TABLE graphs ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR ( 200 ), `title` VARCHAR ( 200 ) ) ENGINE = INNODB;
CREATE TABLE indicators_graph ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, indicator_id INT, graph_id INT, -- 	FOREIGN KEY ( indicator_id ) REFERENCES indicators ( id ) ON DELETE CASCADE,
-- 	FOREIGN KEY ( graph_id ) REFERENCES graphs ( id ) ON DELETE CASCADE,
INDEX indicator_index ( indicator_id ), INDEX graph_index ( graph_id ) ) ENGINE = INNODB;
CREATE TABLE inputs ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR ( 200 ), `title` VARCHAR ( 200 ), `size` INT ) ENGINE = INNODB;
CREATE TABLE graphs_input ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `graph_id` INT, `input_id` INT, -- 	FOREIGN KEY ( graph_id ) REFERENCES graphs ( id ) ON DELETE CASCADE,
-- 	FOREIGN KEY ( input_id ) REFERENCES inputs ( id ) ON DELETE CASCADE,
INDEX graph_index ( graph_id ), INDEX input_index ( input_id ) ) ENGINE = INNODB;
CREATE TABLE reports (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`title` VARCHAR ( 200 ),
	`active` ENUM ( '1', '0' ),
	`company_id` INT,
	`indicator_id` INT,
	`comment` TEXT,
	`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,-- 	FOREIGN KEY ( indicator_id ) REFERENCES indicators ( id ) ON DELETE CASCADE,
-- 	FOREIGN KEY ( company_id ) REFERENCES companies ( id ) ON DELETE CASCADE
	
) ENGINE = INNODB;
/* TODO: config id references to a table which holds every graph json config */
CREATE TABLE reports_graph (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`report_id` INT,
	`graph_id` INT,
	`size` ENUM ( 'B', 'M', 'S' ),
	`data` JSON,
	`comment` TEXT,
	`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP  NULL DEFAULT NULL,-- 	FOREIGN KEY ( report_id ) REFERENCES reports( id ) ON DELETE CASCADE, 
-- 	FOREIGN KEY ( graph_id ) REFERENCES graphs( id ) ON DELETE CASCADE
	INDEX report_index ( report_id ),
	INDEX graph_index ( graph_id ) 
) ENGINE = INNODB;
CREATE TABLE indicators_graph_input (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	indicator_id INT,
	graph_id INT,
	input_id INT,-- FOREIGN KEY (indicator_id) REFERENCES indicators(id) ON DELETE CASCADE,
-- FOREIGN KEY (graph_id) REFERENCES graphs(id) ON DELETE CASCADE,
-- FOREIGN KEY (input_id) REFERENCES inputs(id) ON DELETE CASCADE,
	INDEX indicator_index ( indicator_id ),
	INDEX graph_index ( graph_id ),
INDEX input_index ( input_id ) 
) ENGINE = INNODB;
#######################################################################################
