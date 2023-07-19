<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-15 11:56:51 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
FROM `vi_samples_analyze_average` `a`
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_1 := @curRow_1 + 1 as pos_atr 
                            from vi_samples_analyze_average b 
                            join (select @curRow_1 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="70efdf2ec9b086079795c442636b55fb" 
                           order by b.num_atr desc) p1 ON (`p1`.`license_id`=`a`.`license_id` and `p1`.`protocol_id`=`a`.`protocol_id` and `p1`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_2 := @curRow_2 + 1 as pos_tch 
                            from vi_samples_analyze_average b 
                            join (select @curRow_2 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="70efdf2ec9b086079795c442636b55fb" 
                           order by b.num_tch desc) p2 ON (`p2`.`license_id`=`a`.`license_id` and `p2`.`protocol_id`=`a`.`protocol_id` and `p2`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_3 := @curRow_3 + 1 as pos_tah 
                            from vi_samples_analyze_average b 
                            join (select @curRow_3 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="70efdf2ec9b086079795c442636b55fb" 
                           order by b.num_tah desc) p3 ON (`p3`.`license_id`=`a`.`license_id` and `p3`.`protocol_id`=`a`.`protocol_id` and `p3`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_4 := @curRow_4 + 1 as pos_wei 
                            from vi_samples_analyze_average b 
                            join (select @curRow_4 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="70efdf2ec9b086079795c442636b55fb" 
                           order by b.num_wei desc) p4 ON (`p4`.`license_id`=`a`.`license_id` and `p4`.`protocol_id`=`a`.`protocol_id` and `p4`.`treatment_id`=a.treatment_id)
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = '70efdf2ec9b086079795c442636b55fb'
GROUP BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
ORDER BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`
