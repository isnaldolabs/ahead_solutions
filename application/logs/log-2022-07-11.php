<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-11 19:04:48 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 50
ERROR - 2022-07-11 20:21:40 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 50
ERROR - 2022-07-11 20:29:33 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-07-11 20:29:39 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 10
ERROR - 2022-07-11 20:29:44 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 10, 10
