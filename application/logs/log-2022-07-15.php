<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-15 12:46:08 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '3'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-07-15 17:54:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`g...' at line 3 - Invalid query: SELECT `gf`.`license_id`, `gf`.`farm_id`, `gf`.`code`, `gf`.`name`, `gp`.`distance`, `gp`.`total_area`, `gp`.`tons`, `sm`.`season_dist`, `sm`.`season_area`, `sm`.`season_tons`
FROM `gu_farms` `gf`
LEFT JOIN (select gp.license_id, gp.season_id, gp.farm_id, round(avg(gp.distance),3) distance, round(sum(gp.total_area),3) total_area, round(sum(gp.tons),3) tons from gu_plots gp where gp.license_id = 3   and gp.season_id =  group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`gf`.`license_id` and `gp`.`farm_id`=gf.farm_id)
LEFT JOIN (select sm.license_id, sm.season_id, round(avg(sm.distance),3) season_dist, round(sum(sm.total_area),3) season_area, round(sum(sm.tons),3) season_tons from gu_plots sm where sm.license_id = 3   and sm.season_id =  group by sm.license_id, sm.season_id) sm ON (`sm`.`license_id`=gf.license_id)
WHERE `gf`.`license_id` = '3'
ORDER BY `gf`.`name`
 LIMIT 100000
ERROR - 2022-07-15 17:54:07 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/prepare/GuFarm_model.php 38
ERROR - 2022-07-15 18:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`g...' at line 3 - Invalid query: SELECT `gf`.`license_id`, `gf`.`farm_id`, `gf`.`code`, `gf`.`name`, `gp`.`distance`, `gp`.`total_area`, `gp`.`tons`, `sm`.`season_dist`, `sm`.`season_area`, `sm`.`season_tons`
FROM `gu_farms` `gf`
LEFT JOIN (select gp.license_id, gp.season_id, gp.farm_id, round(avg(gp.distance),3) distance, round(sum(gp.total_area),3) total_area, round(sum(gp.tons),3) tons from gu_plots gp where gp.license_id = 3   and gp.season_id =  group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`gf`.`license_id` and `gp`.`farm_id`=gf.farm_id)
LEFT JOIN (select sm.license_id, sm.season_id, round(avg(sm.distance),3) season_dist, round(sum(sm.total_area),3) season_area, round(sum(sm.tons),3) season_tons from gu_plots sm where sm.license_id = 3   and sm.season_id =  group by sm.license_id, sm.season_id) sm ON (`sm`.`license_id`=gf.license_id)
WHERE `gf`.`license_id` = '3'
ORDER BY `gf`.`name`
 LIMIT 100
ERROR - 2022-07-15 18:27:51 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/prepare/GuFarm_model.php 38
ERROR - 2022-07-15 18:38:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`g...' at line 3 - Invalid query: SELECT `gf`.`license_id`, `gf`.`farm_id`, `gf`.`code`, `gf`.`name`, `gp`.`distance`, `gp`.`total_area`, `gp`.`tons`, `sm`.`season_dist`, `sm`.`season_area`, `sm`.`season_tons`
FROM `gu_farms` `gf`
LEFT JOIN (select gp.license_id, gp.season_id, gp.farm_id, round(avg(gp.distance),3) distance, round(sum(gp.total_area),3) total_area, round(sum(gp.tons),3) tons from gu_plots gp where gp.license_id = 3   and gp.season_id =  group by gp.license_id, gp.season_id, gp.farm_id) gp ON (`gp`.`license_id`=`gf`.`license_id` and `gp`.`farm_id`=gf.farm_id)
LEFT JOIN (select sm.license_id, sm.season_id, round(avg(sm.distance),3) season_dist, round(sum(sm.total_area),3) season_area, round(sum(sm.tons),3) season_tons from gu_plots sm where sm.license_id = 3   and sm.season_id =  group by sm.license_id, sm.season_id) sm ON (`sm`.`license_id`=gf.license_id)
WHERE `gf`.`license_id` = '3'
ORDER BY `gf`.`name`
 LIMIT 100000
ERROR - 2022-07-15 18:38:43 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/prepare/GuFarm_model.php 38
