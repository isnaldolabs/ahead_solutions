<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-18 19:46:20 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-06-18 22:07:42 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '3'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2023-06-18 22:10:02 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '3'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
