<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-07 17:35:00 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=1    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '1'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-06-07 17:37:20 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=1    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '1'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-06-07 17:37:29 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=1    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '1'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-06-07 17:45:20 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 50
ERROR - 2023-06-07 17:47:15 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 50
ERROR - 2023-06-07 17:47:20 --> SELECT `usg`.`user_group_id`, `usg`.`user_id`, `us`.`full_name`, `us`.`email`, `us`.`nick_name`, `us`.`active`, `usg`.`group_id`, `gr`.`name` `group_name`, `gr`.`is_admin`
FROM `auth_users_groups` `usg`
JOIN `auth_users` `us` ON (`us`.`user_id`=usg.user_id)
JOIN `auth_groups` `gr` ON (`gr`.`license_id`=`usg`.`license_id` and `gr`.`group_id`=usg.group_id)
WHERE `usg`.`license_id` = '1'
ORDER BY `us`.`full_name`
 LIMIT 100000
ERROR - 2023-06-07 18:11:00 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
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
ERROR - 2023-06-07 18:12:42 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-06-07 18:14:31 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-06-07 18:14:47 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '3'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
