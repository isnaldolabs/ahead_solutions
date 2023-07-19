<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-04-12 19:06:04 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_stems_meter), 2) num_stems, `p1`.`pos_stems`, round(avg(a.num_diameter_avg), 2) num_diameter, `p2`.`pos_diameter`, round(avg(a.num_height_avg), 2) num_height, `p3`.`pos_height`, round(avg(a.tch_volumetric), 2) tch_volumetric, round(avg(a.tch_volumetric_minus15), 2) tch_volumetric_minus15, `p4`.`pos_tch`, round(avg(case when c.tch_volumetric_avg is null then 0.00 else c.tch_volumetric_avg end), 2) tch_volumetric_minus15_avg
FROM `vi_biometry_stems` `a`
LEFT JOIN (select b1.license_id, b1.protocol_id, avg(b1.tch_volumetric) tch_volumetric_avg from (select b.license_id, b.protocol_id, b.treatment_id, round(avg(b.tch_volumetric_minus15), 2) tch_volumetric from vi_biometry_stems b where b.license_id = 1 and md5(b.protocol_id) = "eccbc87e4b5ce2fe28308fd9f2a7baf3" group by b.license_id, b.protocol_id, b.treatment_id) b1) c ON (`c`.`license_id`=`a`.`license_id` and `c`.`protocol_id`=a.protocol_id)
JOIN (select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_stems_meter, @curRow_1 := @curRow_1 + 1 as pos_stems from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_stems_meter) num_stems_meter from vi_biometry_stems v2 where v2.license_id=1 and md5(v2.protocol_id)="eccbc87e4b5ce2fe28308fd9f2a7baf3" group by v2.license_id, v2.protocol_id, v2.treatment_id) v1 join (select @curRow_1 := 0) rn1 order by v1.num_stems_meter desc) p1 ON (`p1`.`license_id`=`a`.`license_id` and `p1`.`protocol_id`=`a`.`protocol_id` and `p1`.`treatment_id`=a.treatment_id)
JOIN (select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_diameter_avg, @curRow_2 := @curRow_2 + 1 as pos_diameter from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_diameter_avg) num_diameter_avg from vi_biometry_stems v2 where v2.license_id=1 and md5(v2.protocol_id)="eccbc87e4b5ce2fe28308fd9f2a7baf3" group by v2.license_id, v2.protocol_id, v2.treatment_id) v1 join (select @curRow_2 := 0) rn2 order by v1.num_diameter_avg desc) p2 ON (`p2`.`license_id`=`a`.`license_id` and `p2`.`protocol_id`=`a`.`protocol_id` and `p2`.`treatment_id`=a.treatment_id)
JOIN (select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_height_avg, @curRow_3 := @curRow_3 + 1 as pos_height from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_height_avg) num_height_avg from vi_biometry_stems v2 where v2.license_id=1 and md5(v2.protocol_id)="eccbc87e4b5ce2fe28308fd9f2a7baf3" group by v2.license_id, v2.protocol_id, v2.treatment_id) v1 join (select @curRow_3 := 0) rn3 order by v1.num_height_avg desc) p3 ON (`p3`.`license_id`=`a`.`license_id` and `p3`.`protocol_id`=`a`.`protocol_id` and `p3`.`treatment_id`=a.treatment_id)
JOIN (select v1.license_id, v1.protocol_id, v1.treatment_id, v1.tch_volumetric_minus15, @curRow_4 := @curRow_4 + 1 as pos_tch from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.tch_volumetric_minus15) tch_volumetric_minus15 from vi_biometry_stems v2 where v2.license_id=1 and md5(v2.protocol_id)="eccbc87e4b5ce2fe28308fd9f2a7baf3" group by v2.license_id, v2.protocol_id, v2.treatment_id) v1 join (select @curRow_4 := 0) rn4 order by v1.tch_volumetric_minus15 desc) p4 ON (`p4`.`license_id`=`a`.`license_id` and `p4`.`protocol_id`=`a`.`protocol_id` and `p4`.`treatment_id`=a.treatment_id)
WHERE `a`.`license_id` = '1'
AND md5(a.protocol_id) = 'eccbc87e4b5ce2fe28308fd9f2a7baf3'
GROUP BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`
ORDER BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_name`
ERROR - 2022-04-12 19:15:16 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 19:17:09 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 19:19:51 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 19:20:06 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 19:20:16 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 19:21:17 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 19:21:28 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 19:21:49 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 19:22:20 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '1'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2022-04-12 21:00:36 --> SELECT `vps`.`license_id`, `vps`.`protocol_id`, `vps`.`num_order`, `vps`.`farm_code`, `vps`.`farm_name`, `vps`.`block_code`, `vps`.`plot_code`, `vps`.`treatment_name`, `vps`.`num_block`, `vps`.`sketch_id`, `ppc`.`compound_id`, `cp`.`name` `compound_name`, `cp`.`short_name` `compound_short_name`
FROM `vi_protocols_sketches` `vps`
JOIN `protocols_products_compounds` `ppc` ON (`ppc`.`license_id`=`vps`.`license_id` and `ppc`.`protocol_id`=`vps`.`protocol_id` and `ppc`.`treatment_id`=vps.treatment_id)
JOIN `compounds` `cp` ON (`cp`.`license_id`=`ppc`.`license_id` and `cp`.`compound_id`=ppc.compound_id)
WHERE `vps`.`license_id` = '1'
AND `vps`.`protocol_id` = '4'
ORDER BY `vps`.`license_id`, `vps`.`protocol_id`, `vps`.`num_order`, `vps`.`sketch_id`, `vps`.`num_block`, `ppc`.`compound_id`
