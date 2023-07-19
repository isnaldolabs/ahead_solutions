<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-31 18:58:29 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
