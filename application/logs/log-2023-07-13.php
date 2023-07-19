<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-07-13 18:52:18 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
FROM `auth_users` `us`
JOIN `auth_users_params` `ap` ON (`ap`.`user_id`=us.user_id)
JOIN `auth_users_licenses` `ul` ON (`ul`.`license_id`=`us`.`license_id_last` and `ul`.`user_id`=us.user_id)
JOIN `auth_users_groups` `gr` ON (`gr`.`license_id`=`ul`.`license_id` and `gr`.`user_id`=us.user_id)
JOIN `auth_groups` `ag` ON (`ag`.`license_id`=`gr`.`license_id` and `ag`.`group_id`=gr.group_id)
JOIN `auth_licenses` `al` ON (`al`.`license_id`=ul.license_id)
JOIN `auth_licenses_details` `ld` ON (`ld`.`license_id`=al.license_id)
LEFT JOIN `seasons` `se` ON (`se`.`license_id`=`ul`.`license_id` and `se`.`season_id`=ul.season_id_last)
WHERE `us`.`active` = 1
AND `ag`.`active` = 1
AND `ld`.`active` = 1
AND `us`.`email` = 'nboliveira@adecoagro.com'
AND `us`.`password` = 'de9e4dc46031044d7c256f286d7c2a4b'
