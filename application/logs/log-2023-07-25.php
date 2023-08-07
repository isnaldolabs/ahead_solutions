ERROR - 2023-07-25 00:34:59 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = '827ccb0eea8a706c4c34a16891f84e7b'
ERROR - 2023-07-25 00:36:17 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'jaious@hotmail.com'
AND `us`.`password` = '40587990bbc19d57d70ab81fb7e67b3d'
ERROR - 2023-07-25 00:46:38 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'jaious@hotmail.com'
AND `us`.`password` = '40587990bbc19d57d70ab81fb7e67b3d'
ERROR - 2023-07-25 00:48:16 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'jaious@hotmail.com'
AND `us`.`password` = '40587990bbc19d57d70ab81fb7e67b3d'
ERROR - 2023-07-25 00:49:45 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'jaious@hotmail.com'
AND `us`.`password` = '40587990bbc19d57d70ab81fb7e67b3d'
ERROR - 2023-07-25 00:50:00 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`active`
FROM `auth_users` `us`
WHERE md5(us.user_id) = '98f13708210194c475687be6106a3b84'
ERROR - 2023-07-25 00:52:02 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 100000
ERROR - 2023-07-25 00:52:11 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 100000
ERROR - 2023-07-25 00:52:14 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '3'
ORDER BY `us`.`full_name`
 LIMIT 100000
ERROR - 2023-07-25 00:52:53 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = '827ccb0eea8a706c4c34a16891f84e7b'
ERROR - 2023-07-25 00:53:23 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = 'e10adc3949ba59abbe56e057f20f883e'
ERROR - 2023-07-25 00:53:37 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = 'e10adc3949ba59abbe56e057f20f883e'
ERROR - 2023-07-25 00:54:01 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = '40587990bbc19d57d70ab81fb7e67b3d'
ERROR - 2023-07-25 01:00:34 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = '40587990bbc19d57d70ab81fb7e67b3d'
ERROR - 2023-07-25 01:02:43 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = 'e10adc3949ba59abbe56e057f20f883e'
ERROR - 2023-07-25 01:02:48 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = 'e10adc3949ba59abbe56e057f20f883e'
ERROR - 2023-07-25 01:02:55 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = 'e10adc3949ba59abbe56e057f20f883e'
ERROR - 2023-07-25 01:03:18 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
AND `us`.`email` = 'isnaldomsms@gmail.com'
AND `us`.`password` = '40587990bbc19d57d70ab81fb7e67b3d'
ERROR - 2023-07-25 01:03:37 --> Query error: The user specified as a definer ('u392812041_aheadev_user'@'127.0.0.1') does not exist - Invalid query: SELECT `p`.`protocol_id`, `p`.`license_id`, `p`.`code`, `p`.`title`, `p`.`goal`, `p`.`dt_start`, `p`.`dt_end_planned`, `p`.`status`, `vpa`.`months_age`, `vpa`.`total_area`, `p`.`type_id`, `pt`.`name` `type_name`, `pt`.`short_name` `type_short_name`, `pt`.`color` `type_color`, `p`.`methodology_id`, `pm`.`name` `methodology_name`, `p`.`subline_id`, `rl`.`name` `line_name`, `rsl`.`name` `subline_name`, `p`.`repetitions`, `sm`.`area_portion`, `p`.`test_id`, `t`.`name` `type_test_name`, `p`.`designing_id`, `d`.`name` `designing_name`, `p`.`scheme_id`, `ps`.`name` `scheme_name`, `p`.`applicant_id`, `a`.`name` `applicant_name`, `p`.`responsible_id`, `r`.`name` `responsible_name`, `p`.`conclusion`, `p`.`rating`, round((datediff(curdate(), p.dt_start) / datediff(p.dt_end_planned, p.dt_start) * 100), 0) protocol_progress
FROM `protocols` `p`
JOIN `protocols_types` `pt` ON (`pt`.`type_id`=p.type_id)
JOIN `protocols_methodologies` `pm` ON (`pm`.`methodology_id`=p.methodology_id)
JOIN `research_sublines` `rsl` ON (`rsl`.`license_id`=`p`.`license_id` and `rsl`.`subline_id`=p.subline_id)
JOIN `research_lines` `rl` ON (`rl`.`license_id`=`rsl`.`license_id` and `rl`.`line_id`=rsl.line_id)
LEFT JOIN `types_tests` `t` ON (`t`.`license_id`=`p`.`license_id` and `t`.`test_id`=p.test_id)
LEFT JOIN `designing` `d` ON (`d`.`license_id`=`p`.`license_id` and `d`.`designing_id`=p.designing_id)
LEFT JOIN `planting_schemes` `ps` ON (`ps`.`license_id`=`p`.`license_id` and `ps`.`scheme_id`=p.scheme_id)
LEFT JOIN `teams` `a` ON (`a`.`license_id`=`p`.`license_id` and `a`.`team_id`=p.applicant_id)
LEFT JOIN `teams` `r` ON (`r`.`license_id`=`p`.`license_id` and `r`.`team_id`=p.responsible_id)
LEFT JOIN `vi_protocols_ages` `vpa` ON (`vpa`.`license_id`=`p`.`license_id` and `vpa`.`protocol_id`=p.protocol_id)
LEFT JOIN (select pp.license_id, pp.protocol_id, round(sum(gup.area),3) area_portion from protocols_varieties pp  join gu_parcels gup on (gup.license_id = pp.license_id and gup.parcel_id = pp.parcel_id) where pp.license_id = 1 group by pp.license_id, pp.protocol_id) sm ON (`sm`.`license_id`=`p`.`license_id` and `sm`.`protocol_id`=p.protocol_id)
WHERE `p`.`license_id` = '1'
ORDER BY `p`.`protocol_id` DESC
 LIMIT 5
ERROR - 2023-07-25 01:03:37 --> Severity: error --> Exception: Call to a member function result() on bool /Volumes/Macintosh HD/Projetos/Agro/Aplicacao/application/models/protocols/Protocols_model.php 52
ERROR - 2023-07-25 01:05:08 --> Query error: The user specified as a definer ('u392812041_aheadev_user'@'127.0.0.1') does not exist - Invalid query: SELECT `p`.`protocol_id`, `p`.`license_id`, `p`.`code`, `p`.`title`, `p`.`goal`, `p`.`dt_start`, `p`.`dt_end_planned`, `p`.`status`, `vpa`.`months_age`, `vpa`.`total_area`, `p`.`type_id`, `pt`.`name` `type_name`, `pt`.`short_name` `type_short_name`, `pt`.`color` `type_color`, `p`.`methodology_id`, `pm`.`name` `methodology_name`, `p`.`subline_id`, `rl`.`name` `line_name`, `rsl`.`name` `subline_name`, `p`.`repetitions`, `sm`.`area_portion`, `p`.`test_id`, `t`.`name` `type_test_name`, `p`.`designing_id`, `d`.`name` `designing_name`, `p`.`scheme_id`, `ps`.`name` `scheme_name`, `p`.`applicant_id`, `a`.`name` `applicant_name`, `p`.`responsible_id`, `r`.`name` `responsible_name`, `p`.`conclusion`, `p`.`rating`, round((datediff(curdate(), p.dt_start) / datediff(p.dt_end_planned, p.dt_start) * 100), 0) protocol_progress
FROM `protocols` `p`
JOIN `protocols_types` `pt` ON (`pt`.`type_id`=p.type_id)
JOIN `protocols_methodologies` `pm` ON (`pm`.`methodology_id`=p.methodology_id)
JOIN `research_sublines` `rsl` ON (`rsl`.`license_id`=`p`.`license_id` and `rsl`.`subline_id`=p.subline_id)
JOIN `research_lines` `rl` ON (`rl`.`license_id`=`rsl`.`license_id` and `rl`.`line_id`=rsl.line_id)
LEFT JOIN `types_tests` `t` ON (`t`.`license_id`=`p`.`license_id` and `t`.`test_id`=p.test_id)
LEFT JOIN `designing` `d` ON (`d`.`license_id`=`p`.`license_id` and `d`.`designing_id`=p.designing_id)
LEFT JOIN `planting_schemes` `ps` ON (`ps`.`license_id`=`p`.`license_id` and `ps`.`scheme_id`=p.scheme_id)
LEFT JOIN `teams` `a` ON (`a`.`license_id`=`p`.`license_id` and `a`.`team_id`=p.applicant_id)
LEFT JOIN `teams` `r` ON (`r`.`license_id`=`p`.`license_id` and `r`.`team_id`=p.responsible_id)
LEFT JOIN `vi_protocols_ages` `vpa` ON (`vpa`.`license_id`=`p`.`license_id` and `vpa`.`protocol_id`=p.protocol_id)
LEFT JOIN (select pp.license_id, pp.protocol_id, round(sum(gup.area),3) area_portion from protocols_varieties pp  join gu_parcels gup on (gup.license_id = pp.license_id and gup.parcel_id = pp.parcel_id) where pp.license_id = 1 group by pp.license_id, pp.protocol_id) sm ON (`sm`.`license_id`=`p`.`license_id` and `sm`.`protocol_id`=p.protocol_id)
WHERE `p`.`license_id` = '1'
ORDER BY `p`.`protocol_id` DESC
 LIMIT 5
ERROR - 2023-07-25 01:05:08 --> Severity: error --> Exception: Call to a member function result() on bool /Volumes/Macintosh HD/Projetos/Agro/Aplicacao/application/models/protocols/Protocols_model.php 52
ERROR - 2023-07-25 01:07:51 --> Query error: The user specified as a definer ('u392812041_aheadev_user'@'127.0.0.1') does not exist - Invalid query: SELECT `p`.`protocol_id`, `p`.`license_id`, `p`.`code`, `p`.`title`, `p`.`goal`, `p`.`dt_start`, `p`.`dt_end_planned`, `p`.`status`, `vpa`.`months_age`, `vpa`.`total_area`, `p`.`type_id`, `pt`.`name` `type_name`, `pt`.`short_name` `type_short_name`, `pt`.`color` `type_color`, `p`.`methodology_id`, `pm`.`name` `methodology_name`, `p`.`subline_id`, `rl`.`name` `line_name`, `rsl`.`name` `subline_name`, `p`.`repetitions`, `sm`.`area_portion`, `p`.`test_id`, `t`.`name` `type_test_name`, `p`.`designing_id`, `d`.`name` `designing_name`, `p`.`scheme_id`, `ps`.`name` `scheme_name`, `p`.`applicant_id`, `a`.`name` `applicant_name`, `p`.`responsible_id`, `r`.`name` `responsible_name`, `p`.`conclusion`, `p`.`rating`, round((datediff(curdate(), p.dt_start) / datediff(p.dt_end_planned, p.dt_start) * 100), 0) protocol_progress
FROM `protocols` `p`
JOIN `protocols_types` `pt` ON (`pt`.`type_id`=p.type_id)
JOIN `protocols_methodologies` `pm` ON (`pm`.`methodology_id`=p.methodology_id)
JOIN `research_sublines` `rsl` ON (`rsl`.`license_id`=`p`.`license_id` and `rsl`.`subline_id`=p.subline_id)
JOIN `research_lines` `rl` ON (`rl`.`license_id`=`rsl`.`license_id` and `rl`.`line_id`=rsl.line_id)
LEFT JOIN `types_tests` `t` ON (`t`.`license_id`=`p`.`license_id` and `t`.`test_id`=p.test_id)
LEFT JOIN `designing` `d` ON (`d`.`license_id`=`p`.`license_id` and `d`.`designing_id`=p.designing_id)
LEFT JOIN `planting_schemes` `ps` ON (`ps`.`license_id`=`p`.`license_id` and `ps`.`scheme_id`=p.scheme_id)
LEFT JOIN `teams` `a` ON (`a`.`license_id`=`p`.`license_id` and `a`.`team_id`=p.applicant_id)
LEFT JOIN `teams` `r` ON (`r`.`license_id`=`p`.`license_id` and `r`.`team_id`=p.responsible_id)
LEFT JOIN `vi_protocols_ages` `vpa` ON (`vpa`.`license_id`=`p`.`license_id` and `vpa`.`protocol_id`=p.protocol_id)
LEFT JOIN (select pp.license_id, pp.protocol_id, round(sum(gup.area),3) area_portion from protocols_varieties pp  join gu_parcels gup on (gup.license_id = pp.license_id and gup.parcel_id = pp.parcel_id) where pp.license_id = 1 group by pp.license_id, pp.protocol_id) sm ON (`sm`.`license_id`=`p`.`license_id` and `sm`.`protocol_id`=p.protocol_id)
WHERE `p`.`license_id` = '1'
ORDER BY `p`.`protocol_id` DESC
 LIMIT 5
ERROR - 2023-07-25 01:07:51 --> Severity: error --> Exception: Call to a member function result() on bool /Volumes/Macintosh HD/Projetos/Agro/Aplicacao/application/models/protocols/Protocols_model.php 52
ERROR - 2023-07-25 01:12:49 --> Query error: The user specified as a definer ('u392812041_aheadev_user'@'127.0.0.1') does not exist - Invalid query: SELECT `p`.`protocol_id`, `p`.`license_id`, `p`.`code`, `p`.`title`, `p`.`goal`, `p`.`dt_start`, `p`.`dt_end_planned`, `p`.`status`, `vpa`.`months_age`, `vpa`.`total_area`, `p`.`type_id`, `pt`.`name` `type_name`, `pt`.`short_name` `type_short_name`, `pt`.`color` `type_color`, `p`.`methodology_id`, `pm`.`name` `methodology_name`, `p`.`subline_id`, `rl`.`name` `line_name`, `rsl`.`name` `subline_name`, `p`.`repetitions`, `sm`.`area_portion`, `p`.`test_id`, `t`.`name` `type_test_name`, `p`.`designing_id`, `d`.`name` `designing_name`, `p`.`scheme_id`, `ps`.`name` `scheme_name`, `p`.`applicant_id`, `a`.`name` `applicant_name`, `p`.`responsible_id`, `r`.`name` `responsible_name`, `p`.`conclusion`, `p`.`rating`, round((datediff(curdate(), p.dt_start) / datediff(p.dt_end_planned, p.dt_start) * 100), 0) protocol_progress
FROM `protocols` `p`
JOIN `protocols_types` `pt` ON (`pt`.`type_id`=p.type_id)
JOIN `protocols_methodologies` `pm` ON (`pm`.`methodology_id`=p.methodology_id)
JOIN `research_sublines` `rsl` ON (`rsl`.`license_id`=`p`.`license_id` and `rsl`.`subline_id`=p.subline_id)
JOIN `research_lines` `rl` ON (`rl`.`license_id`=`rsl`.`license_id` and `rl`.`line_id`=rsl.line_id)
LEFT JOIN `types_tests` `t` ON (`t`.`license_id`=`p`.`license_id` and `t`.`test_id`=p.test_id)
LEFT JOIN `designing` `d` ON (`d`.`license_id`=`p`.`license_id` and `d`.`designing_id`=p.designing_id)
LEFT JOIN `planting_schemes` `ps` ON (`ps`.`license_id`=`p`.`license_id` and `ps`.`scheme_id`=p.scheme_id)
LEFT JOIN `teams` `a` ON (`a`.`license_id`=`p`.`license_id` and `a`.`team_id`=p.applicant_id)
LEFT JOIN `teams` `r` ON (`r`.`license_id`=`p`.`license_id` and `r`.`team_id`=p.responsible_id)
LEFT JOIN `vi_protocols_ages` `vpa` ON (`vpa`.`license_id`=`p`.`license_id` and `vpa`.`protocol_id`=p.protocol_id)
LEFT JOIN (select pp.license_id, pp.protocol_id, round(sum(gup.area),3) area_portion from protocols_varieties pp  join gu_parcels gup on (gup.license_id = pp.license_id and gup.parcel_id = pp.parcel_id) where pp.license_id = 1 group by pp.license_id, pp.protocol_id) sm ON (`sm`.`license_id`=`p`.`license_id` and `sm`.`protocol_id`=p.protocol_id)
WHERE `p`.`license_id` = '1'
ORDER BY `p`.`protocol_id` DESC
 LIMIT 5
ERROR - 2023-07-25 01:12:49 --> Severity: error --> Exception: Call to a member function result() on bool /Volumes/Macintosh HD/Projetos/Agro/Aplicacao/application/models/protocols/Protocols_model.php 52
