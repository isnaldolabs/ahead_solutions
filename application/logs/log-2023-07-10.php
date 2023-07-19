<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-07-10 17:00:08 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
ERROR - 2023-07-10 18:25:55 --> SELECT `us`.`user_id`, `us`.`email`, `us`.`nick_name`, `us`.`full_name`, `us`.`license_id_last`, `al`.`license_id`, `al`.`name` `license_name`, `al`.`short_name` `license_short_name`, `ag`.`name` `group_name`, `ag`.`is_admin`, `ul`.`season_id_last`, `se`.`name` `season_name`, `ap`.`lines_page`
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
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 8 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 330
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 9 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 331
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 10 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 332
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 11 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 333
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 12 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 334
ERROR - 2023-07-10 19:10:39 --> Severity: Notice --> Undefined offset: 13 /home/u392812041/domains/aheadagro.com.br/public_html/application/controllers/integrations/IntegrationsSpl.php 335
ERROR - 2023-07-10 19:10:39 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/u392812041/domains/aheadagro.com.br/public_html/system/core/Exceptions.php:271) /home/u392812041/domains/aheadagro.com.br/public_html/system/helpers/url_helper.php 564
ERROR - 2023-07-10 19:31:53 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '3'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
