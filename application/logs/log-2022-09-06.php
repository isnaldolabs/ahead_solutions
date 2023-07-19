<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-06 10:28:34 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 10
