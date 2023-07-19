<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-03-16 10:44:29 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_stems_meter), 2) num_stems, `p1`.`pos_stems`, round(avg(a.num_diameter_avg), 2) num_diameter, `p2`.`pos_diameter`, round(avg(a.num_height_avg), 2) num_height, `p3`.`pos_height`, round(avg(a.tch_volumetric), 2) tch_volumetric, round(avg(a.tch_volumetric_minus15), 2) tch_volumetric_minus15, `p4`.`pos_tch`, round(avg(case when c.tch_volumetric_avg is null then 0.00 else c.tch_volumetric_avg end), 2) tch_volumetric_minus15_avg
FROM `vi_biometry_stems` `a`
LEFT JOIN (select b1.license_id, b1.protocol_id, avg(b1.tch_volumetric) tch_volumetric_avg from (select b.license_id, b.protocol_id, b.treatment_id, round(avg(b.tch_volumetric_minus15), 2) tch_volumetric from vi_biometry_stems b where b.license_id = 3 and md5(b.protocol_id) = "c20ad4d76fe97759aa27a0c99bff6710" group by b.license_id, b.protocol_id, b.treatment_id) b1) c ON (`c`.`license_id`=`a`.`license_id` and `c`.`protocol_id`=a.protocol_id)
JOIN (select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_stems_meter, @curRow_1 := @curRow_1 + 1 as pos_stems from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_stems_meter) num_stems_meter from vi_biometry_stems v2 where v2.license_id=3 and md5(v2.protocol_id)="c20ad4d76fe97759aa27a0c99bff6710" group by v2.license_id, v2.protocol_id, v2.treatment_id) v1 join (select @curRow_1 := 0) rn1 order by v1.num_stems_meter desc) p1 ON (`p1`.`license_id`=`a`.`license_id` and `p1`.`protocol_id`=`a`.`protocol_id` and `p1`.`treatment_id`=a.treatment_id)
JOIN (select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_diameter_avg, @curRow_2 := @curRow_2 + 1 as pos_diameter from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_diameter_avg) num_diameter_avg from vi_biometry_stems v2 where v2.license_id=3 and md5(v2.protocol_id)="c20ad4d76fe97759aa27a0c99bff6710" group by v2.license_id, v2.protocol_id, v2.treatment_id) v1 join (select @curRow_2 := 0) rn2 order by v1.num_diameter_avg desc) p2 ON (`p2`.`license_id`=`a`.`license_id` and `p2`.`protocol_id`=`a`.`protocol_id` and `p2`.`treatment_id`=a.treatment_id)
JOIN (select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_height_avg, @curRow_3 := @curRow_3 + 1 as pos_height from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_height_avg) num_height_avg from vi_biometry_stems v2 where v2.license_id=3 and md5(v2.protocol_id)="c20ad4d76fe97759aa27a0c99bff6710" group by v2.license_id, v2.protocol_id, v2.treatment_id) v1 join (select @curRow_3 := 0) rn3 order by v1.num_height_avg desc) p3 ON (`p3`.`license_id`=`a`.`license_id` and `p3`.`protocol_id`=`a`.`protocol_id` and `p3`.`treatment_id`=a.treatment_id)
JOIN (select v1.license_id, v1.protocol_id, v1.treatment_id, v1.tch_volumetric_minus15, @curRow_4 := @curRow_4 + 1 as pos_tch from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.tch_volumetric_minus15) tch_volumetric_minus15 from vi_biometry_stems v2 where v2.license_id=3 and md5(v2.protocol_id)="c20ad4d76fe97759aa27a0c99bff6710" group by v2.license_id, v2.protocol_id, v2.treatment_id) v1 join (select @curRow_4 := 0) rn4 order by v1.tch_volumetric_minus15 desc) p4 ON (`p4`.`license_id`=`a`.`license_id` and `p4`.`protocol_id`=`a`.`protocol_id` and `p4`.`treatment_id`=a.treatment_id)
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = 'c20ad4d76fe97759aa27a0c99bff6710'
GROUP BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`
ORDER BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_name`
