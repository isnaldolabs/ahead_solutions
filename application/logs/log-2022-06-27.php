<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-06-27 12:39:50 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-06-27 19:16:18 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 19:17:09 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 19:17:35 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 19:45:54 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 19:47:29 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 19:47:36 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 19:51:47 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 19:51:56 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 20:36:30 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`active`
FROM `auth_users` `us`
WHERE md5(us.user_id) = '1679091c5a880faf6fb5e6087eb1b2dc'
ERROR - 2022-06-27 20:38:57 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`active`
FROM `auth_users` `us`
WHERE md5(us.user_id) = 'c9f0f895fb98ab9159f51fd0297e236d'
ERROR - 2022-06-27 20:39:58 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`active`
FROM `auth_users` `us`
WHERE md5(us.user_id) = '1679091c5a880faf6fb5e6087eb1b2dc'
ERROR - 2022-06-27 20:40:35 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`active`
FROM `auth_users` `us`
WHERE md5(us.user_id) = '8f14e45fceea167a5a36dedd4bea2543'
ERROR - 2022-06-27 20:44:37 --> Query error: Duplicate entry 'jferreira@Adecoagro.com' for key 'uc_email' - Invalid query: INSERT INTO `auth_users` (`user_id`, `email`, `active`, `nick_name`, `full_name`, `password`) VALUES ('', 'jferreira@Adecoagro.com', 1, 'João (TI)', 'Joao Augusto Menezes Ferreira', 'c0eee32faa7634df496a529a01d5e09a')
ERROR - 2022-06-27 20:44:37 --> Houve uma falha ao incluir a safra.
ERROR - 2022-06-27 20:44:46 --> Query error: Duplicate entry 'jferreira@Adecoagro.com' for key 'uc_email' - Invalid query: INSERT INTO `auth_users` (`user_id`, `email`, `active`, `nick_name`, `full_name`, `password`) VALUES ('', 'jferreira@Adecoagro.com', 1, 'João (TI)', 'Joao Augusto Menezes Ferreira', 'c0eee32faa7634df496a529a01d5e09a')
ERROR - 2022-06-27 20:44:46 --> Houve uma falha ao incluir a safra.
ERROR - 2022-06-27 20:46:12 --> Query error: Duplicate entry 'jferreira@Adecoagro.com' for key 'uc_email' - Invalid query: INSERT INTO `auth_users` (`user_id`, `email`, `active`, `nick_name`, `full_name`, `password`) VALUES ('', 'jferreira@Adecoagro.com', 1, 'João', 'Joao Augusto Menezes Ferreira', 'b2478a4a0e4b1dc878f0bd0fb09c72f4')
ERROR - 2022-06-27 20:46:12 --> Houve uma falha ao incluir a safra.
ERROR - 2022-06-27 21:02:52 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 50
ERROR - 2022-06-27 21:04:05 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 5
ERROR - 2022-06-27 21:04:08 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
LEFT JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 10
ERROR - 2022-06-27 21:19:25 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 10
