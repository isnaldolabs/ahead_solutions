<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-04 10:23:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`g...' at line 3 - Invalid query: SELECT `gf`.`license_id`, `gf`.`farm_id`, `gf`.`code`, `gf`.`name`, `gp`.`distance`, `gp`.`total_area`, `gp`.`tons`, `sm`.`season_dist`, `sm`.`season_area`, `sm`.`season_tons`
FROM `gu_farms` `gf`
LEFT JOIN (select gp.license_id, gp.season_id, gp.farm_id, round(avg(gp.distance),3) distance, round(sum(gp.total_area),3) total_area, round(sum(gp.tons),3) tons from gu_plots gp where gp.license_id = 4   and gp.season_id =  group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`gf`.`license_id` and `gp`.`farm_id`=gf.farm_id)
LEFT JOIN (select sm.license_id, sm.season_id, round(avg(sm.distance),3) season_dist, round(sum(sm.total_area),3) season_area, round(sum(sm.tons),3) season_tons from gu_plots sm where sm.license_id = 4   and sm.season_id =  group by sm.license_id, sm.season_id) sm ON (`sm`.`license_id`=gf.license_id)
WHERE `gf`.`license_id` = '4'
ORDER BY `gf`.`name`
 LIMIT 5
ERROR - 2022-10-04 10:23:25 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/prepare/GuFarm_model.php 38
ERROR - 2022-10-04 10:24:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`g...' at line 3 - Invalid query: SELECT `gf`.`license_id`, `gf`.`farm_id`, `gf`.`code`, `gf`.`name`, `gp`.`distance`, `gp`.`total_area`, `gp`.`tons`, `sm`.`season_dist`, `sm`.`season_area`, `sm`.`season_tons`
FROM `gu_farms` `gf`
LEFT JOIN (select gp.license_id, gp.season_id, gp.farm_id, round(avg(gp.distance),3) distance, round(sum(gp.total_area),3) total_area, round(sum(gp.tons),3) tons from gu_plots gp where gp.license_id = 4   and gp.season_id =  group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`gf`.`license_id` and `gp`.`farm_id`=gf.farm_id)
LEFT JOIN (select sm.license_id, sm.season_id, round(avg(sm.distance),3) season_dist, round(sum(sm.total_area),3) season_area, round(sum(sm.tons),3) season_tons from gu_plots sm where sm.license_id = 4   and sm.season_id =  group by sm.license_id, sm.season_id) sm ON (`sm`.`license_id`=gf.license_id)
WHERE `gf`.`license_id` = '4'
ORDER BY `gf`.`name`
 LIMIT 5
ERROR - 2022-10-04 10:24:25 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/prepare/GuFarm_model.php 38
