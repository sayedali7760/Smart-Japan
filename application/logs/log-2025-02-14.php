<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-02-14 12:38:59 --> Query error: Unknown column 'U.username' in 'where clause' - Invalid query: SELECT `U`.*, `R`.`role_id`, `R`.`description`
FROM `user_details` as `U`
LEFT JOIN `user_roles` as `R` ON `U`.`position` = `R`.`role_id`
WHERE `U`.`username` = 'admin@nimsuae.com'
AND `U`.`password` = '202cb962ac59075b964b07152d234b70'
ERROR - 2025-02-14 12:39:04 --> Query error: Unknown column 'U.username' in 'where clause' - Invalid query: SELECT `U`.*, `R`.`role_id`, `R`.`description`
FROM `user_details` as `U`
LEFT JOIN `user_roles` as `R` ON `U`.`position` = `R`.`role_id`
WHERE `U`.`username` = 'admin@nimsuae.com'
AND `U`.`password` = '202cb962ac59075b964b07152d234b70'
ERROR - 2025-02-14 12:47:44 --> Query error: Table 'smart_japan.client_details' doesn't exist - Invalid query: SELECT *
FROM `client_details`
WHERE `id` = '742'
ERROR - 2025-02-14 12:48:42 --> Severity: Warning --> Undefined array key "fname" C:\xampp\htdocs\Smart-Japan\application\views\modules\general_settings\my_profile.php 51
ERROR - 2025-02-14 12:48:42 --> Severity: Warning --> Undefined array key "lname" C:\xampp\htdocs\Smart-Japan\application\views\modules\general_settings\my_profile.php 51
ERROR - 2025-02-14 12:48:42 --> Severity: Warning --> Undefined array key "phno" C:\xampp\htdocs\Smart-Japan\application\views\modules\general_settings\my_profile.php 65
ERROR - 2025-02-14 12:48:54 --> Severity: Warning --> Undefined array key "fname" C:\xampp\htdocs\Smart-Japan\application\views\modules\general_settings\my_profile.php 51
ERROR - 2025-02-14 12:48:54 --> Severity: Warning --> Undefined array key "lname" C:\xampp\htdocs\Smart-Japan\application\views\modules\general_settings\my_profile.php 51
ERROR - 2025-02-14 12:48:54 --> Severity: Warning --> Undefined array key "phno" C:\xampp\htdocs\Smart-Japan\application\views\modules\general_settings\my_profile.php 65
ERROR - 2025-02-14 13:31:41 --> Severity: Warning --> mysqli::real_connect(): (HY000/1130): Host '192.168.1.92' is not allowed to connect to this MariaDB server C:\xampp\htdocs\Smart-Japan\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2025-02-14 13:31:41 --> Unable to connect to the database
ERROR - 2025-02-14 14:17:47 --> Severity: Warning --> mysqli::real_connect(): (HY000/1130): Host '192.168.1.92' is not allowed to connect to this MariaDB server C:\xampp\htdocs\Smart-Japan\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2025-02-14 14:17:47 --> Unable to connect to the database
