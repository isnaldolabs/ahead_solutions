<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-03-29 02:07:50 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO) /home/u392812041/domains/aheadagro.com.br/public_html/application/views/protocols/protocols_result/vw_result_menu.php 84
ERROR - 2023-03-29 02:09:05 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
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
ERROR - 2023-03-29 02:09:45 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
FROM `vi_samples_analyze_average` `a`
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_1 := @curRow_1 + 1 as pos_atr 
                            from vi_samples_analyze_average b 
                            join (select @curRow_1 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="9bf31c7ff062936a96d3c8bd1f8f2ff3" 
                           order by b.num_atr desc) p1 ON (`p1`.`license_id`=`a`.`license_id` and `p1`.`protocol_id`=`a`.`protocol_id` and `p1`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_2 := @curRow_2 + 1 as pos_tch 
                            from vi_samples_analyze_average b 
                            join (select @curRow_2 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="9bf31c7ff062936a96d3c8bd1f8f2ff3" 
                           order by b.num_tch desc) p2 ON (`p2`.`license_id`=`a`.`license_id` and `p2`.`protocol_id`=`a`.`protocol_id` and `p2`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_3 := @curRow_3 + 1 as pos_tah 
                            from vi_samples_analyze_average b 
                            join (select @curRow_3 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="9bf31c7ff062936a96d3c8bd1f8f2ff3" 
                           order by b.num_tah desc) p3 ON (`p3`.`license_id`=`a`.`license_id` and `p3`.`protocol_id`=`a`.`protocol_id` and `p3`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_4 := @curRow_4 + 1 as pos_wei 
                            from vi_samples_analyze_average b 
                            join (select @curRow_4 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="9bf31c7ff062936a96d3c8bd1f8f2ff3" 
                           order by b.num_wei desc) p4 ON (`p4`.`license_id`=`a`.`license_id` and `p4`.`protocol_id`=`a`.`protocol_id` and `p4`.`treatment_id`=a.treatment_id)
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = '9bf31c7ff062936a96d3c8bd1f8f2ff3'
GROUP BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
ORDER BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`
ERROR - 2023-03-29 02:13:42 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
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
ERROR - 2023-03-29 13:01:17 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:01:20 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:02:01 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
FROM `vi_samples_analyze_average` `a`
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_1 := @curRow_1 + 1 as pos_atr 
                            from vi_samples_analyze_average b 
                            join (select @curRow_1 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="1f0e3dad99908345f7439f8ffabdffc4" 
                           order by b.num_atr desc) p1 ON (`p1`.`license_id`=`a`.`license_id` and `p1`.`protocol_id`=`a`.`protocol_id` and `p1`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_2 := @curRow_2 + 1 as pos_tch 
                            from vi_samples_analyze_average b 
                            join (select @curRow_2 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="1f0e3dad99908345f7439f8ffabdffc4" 
                           order by b.num_tch desc) p2 ON (`p2`.`license_id`=`a`.`license_id` and `p2`.`protocol_id`=`a`.`protocol_id` and `p2`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_3 := @curRow_3 + 1 as pos_tah 
                            from vi_samples_analyze_average b 
                            join (select @curRow_3 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="1f0e3dad99908345f7439f8ffabdffc4" 
                           order by b.num_tah desc) p3 ON (`p3`.`license_id`=`a`.`license_id` and `p3`.`protocol_id`=`a`.`protocol_id` and `p3`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_4 := @curRow_4 + 1 as pos_wei 
                            from vi_samples_analyze_average b 
                            join (select @curRow_4 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="1f0e3dad99908345f7439f8ffabdffc4" 
                           order by b.num_wei desc) p4 ON (`p4`.`license_id`=`a`.`license_id` and `p4`.`protocol_id`=`a`.`protocol_id` and `p4`.`treatment_id`=a.treatment_id)
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = '1f0e3dad99908345f7439f8ffabdffc4'
GROUP BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
ORDER BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`
ERROR - 2023-03-29 13:02:08 --> Severity: Warning --> Division by zero /home/u392812041/domains/aheadagro.com.br/public_html/application/helpers/math_model_helper.php 102
ERROR - 2023-03-29 13:02:08 --> Severity: Warning --> Division by zero /home/u392812041/domains/aheadagro.com.br/public_html/application/helpers/math_model_helper.php 155
ERROR - 2023-03-29 13:02:08 --> Severity: Warning --> Division by zero /home/u392812041/domains/aheadagro.com.br/public_html/application/helpers/math_model_helper.php 166
ERROR - 2023-03-29 13:02:08 --> Severity: Warning --> Division by zero /home/u392812041/domains/aheadagro.com.br/public_html/application/helpers/math_model_helper.php 166
ERROR - 2023-03-29 13:02:08 --> Severity: Warning --> Division by zero /home/u392812041/domains/aheadagro.com.br/public_html/application/helpers/math_model_helper.php 177
ERROR - 2023-03-29 13:02:08 --> Severity: Warning --> Division by zero /home/u392812041/domains/aheadagro.com.br/public_html/application/helpers/math_model_helper.php 177
ERROR - 2023-03-29 13:02:12 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
FROM `vi_samples_analyze_average` `a`
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_1 := @curRow_1 + 1 as pos_atr 
                            from vi_samples_analyze_average b 
                            join (select @curRow_1 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="1f0e3dad99908345f7439f8ffabdffc4" 
                           order by b.num_atr desc) p1 ON (`p1`.`license_id`=`a`.`license_id` and `p1`.`protocol_id`=`a`.`protocol_id` and `p1`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_2 := @curRow_2 + 1 as pos_tch 
                            from vi_samples_analyze_average b 
                            join (select @curRow_2 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="1f0e3dad99908345f7439f8ffabdffc4" 
                           order by b.num_tch desc) p2 ON (`p2`.`license_id`=`a`.`license_id` and `p2`.`protocol_id`=`a`.`protocol_id` and `p2`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_3 := @curRow_3 + 1 as pos_tah 
                            from vi_samples_analyze_average b 
                            join (select @curRow_3 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="1f0e3dad99908345f7439f8ffabdffc4" 
                           order by b.num_tah desc) p3 ON (`p3`.`license_id`=`a`.`license_id` and `p3`.`protocol_id`=`a`.`protocol_id` and `p3`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_4 := @curRow_4 + 1 as pos_wei 
                            from vi_samples_analyze_average b 
                            join (select @curRow_4 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="1f0e3dad99908345f7439f8ffabdffc4" 
                           order by b.num_wei desc) p4 ON (`p4`.`license_id`=`a`.`license_id` and `p4`.`protocol_id`=`a`.`protocol_id` and `p4`.`treatment_id`=a.treatment_id)
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = '1f0e3dad99908345f7439f8ffabdffc4'
GROUP BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
ORDER BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`
ERROR - 2023-03-29 13:11:01 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:11:56 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:13:17 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:13:26 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:16:22 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:16:54 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:18:54 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:20:26 --> SELECT `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name` `licensor_name`, round(avg(vsa.num_weight), 3) avg_weight, round(avg(v.royalties), 3) royalties, round(min(vsa.num_tph), 3) min_tph, round(max(vsa.num_tph), 3) max_tph, round(avg(vsa.num_tph), 3) avg_tph, round((avg(vsa.num_tph) / avg(v.royalties))*100, 2) viability
FROM `vi_samples_analyze` `vsa`
JOIN `vi_protocols_sketches` `vps` ON (`vps`.`license_id`=`vsa`.`license_id` and `vps`.`protocol_id`=`vsa`.`protocol_id` and `vps`.`sketch_id`=vsa.sketch_id)
JOIN `varieties` `v` ON (`v`.`license_id`=`vps`.`license_id` and `v`.`variety_id`=vps.variety_id)
JOIN `varieties_licensors` `vl` ON (`vl`.`license_id`=`v`.`license_id` and `vl`.`licensor_id`=v.licensor_id)
WHERE `vsa`.`license_id` = '3'
AND `vps`.`type_id` = 1
GROUP BY `vsa`.`license_id`, `v`.`licensor_id`, `vl`.`name`
ERROR - 2023-03-29 13:20:37 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:21:52 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:23:03 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:25:02 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:25:07 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:28:11 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:28:24 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:32:02 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:32:34 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 13:35:24 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
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
ERROR - 2023-03-29 13:36:00 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
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
ERROR - 2023-03-29 13:52:29 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
FROM `vi_samples_analyze_average` `a`
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_1 := @curRow_1 + 1 as pos_atr 
                            from vi_samples_analyze_average b 
                            join (select @curRow_1 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="6512bd43d9caa6e02c990b0a82652dca" 
                           order by b.num_atr desc) p1 ON (`p1`.`license_id`=`a`.`license_id` and `p1`.`protocol_id`=`a`.`protocol_id` and `p1`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_2 := @curRow_2 + 1 as pos_tch 
                            from vi_samples_analyze_average b 
                            join (select @curRow_2 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="6512bd43d9caa6e02c990b0a82652dca" 
                           order by b.num_tch desc) p2 ON (`p2`.`license_id`=`a`.`license_id` and `p2`.`protocol_id`=`a`.`protocol_id` and `p2`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_3 := @curRow_3 + 1 as pos_tah 
                            from vi_samples_analyze_average b 
                            join (select @curRow_3 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="6512bd43d9caa6e02c990b0a82652dca" 
                           order by b.num_tah desc) p3 ON (`p3`.`license_id`=`a`.`license_id` and `p3`.`protocol_id`=`a`.`protocol_id` and `p3`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_4 := @curRow_4 + 1 as pos_wei 
                            from vi_samples_analyze_average b 
                            join (select @curRow_4 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="6512bd43d9caa6e02c990b0a82652dca" 
                           order by b.num_wei desc) p4 ON (`p4`.`license_id`=`a`.`license_id` and `p4`.`protocol_id`=`a`.`protocol_id` and `p4`.`treatment_id`=a.treatment_id)
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = '6512bd43d9caa6e02c990b0a82652dca'
GROUP BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
ORDER BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`
ERROR - 2023-03-29 13:53:02 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
FROM `vi_samples_analyze_average` `a`
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_1 := @curRow_1 + 1 as pos_atr 
                            from vi_samples_analyze_average b 
                            join (select @curRow_1 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="c20ad4d76fe97759aa27a0c99bff6710" 
                           order by b.num_atr desc) p1 ON (`p1`.`license_id`=`a`.`license_id` and `p1`.`protocol_id`=`a`.`protocol_id` and `p1`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_2 := @curRow_2 + 1 as pos_tch 
                            from vi_samples_analyze_average b 
                            join (select @curRow_2 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="c20ad4d76fe97759aa27a0c99bff6710" 
                           order by b.num_tch desc) p2 ON (`p2`.`license_id`=`a`.`license_id` and `p2`.`protocol_id`=`a`.`protocol_id` and `p2`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_3 := @curRow_3 + 1 as pos_tah 
                            from vi_samples_analyze_average b 
                            join (select @curRow_3 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="c20ad4d76fe97759aa27a0c99bff6710" 
                           order by b.num_tah desc) p3 ON (`p3`.`license_id`=`a`.`license_id` and `p3`.`protocol_id`=`a`.`protocol_id` and `p3`.`treatment_id`=a.treatment_id)
JOIN (select b.license_id, b.protocol_id, b.treatment_id, @curRow_4 := @curRow_4 + 1 as pos_wei 
                            from vi_samples_analyze_average b 
                            join (select @curRow_4 := 0) r
                           where b.license_id=3 and md5(b.protocol_id)="c20ad4d76fe97759aa27a0c99bff6710" 
                           order by b.num_wei desc) p4 ON (`p4`.`license_id`=`a`.`license_id` and `p4`.`protocol_id`=`a`.`protocol_id` and `p4`.`treatment_id`=a.treatment_id)
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = 'c20ad4d76fe97759aa27a0c99bff6710'
GROUP BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
ORDER BY `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`
ERROR - 2023-03-29 14:01:17 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 14:03:12 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 17:42:32 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/u392812041/domains/aheadagro.com.br/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2023-03-29 17:42:32 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT `a`.`sketch_id`, `a`.`treatment_id`, `a`.`num_block`, `a`.`parcel_id`, `a`.`type_id`, `a`.`plot_id`, `a`.`parcel_code`, `a`.`variety_id`, `a`.`treatment_name`, `a`.`num_order`, (select ma.sketch_id from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select max(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order < a.num_order)) as before_id, (select ma.sketch_id  from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select min(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order > a.num_order)) as next_id
FROM `vi_protocols_sketches` `a`
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = 'c51ce410c124a10e0db5e4b97fc2af39'
ORDER BY `a`.`num_order`
ERROR - 2023-03-29 17:42:32 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/protocols/ProtocolsSketches_model.php 42
ERROR - 2023-03-29 17:44:41 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/u392812041/domains/aheadagro.com.br/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2023-03-29 17:44:41 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT `a`.`sketch_id`, `a`.`treatment_id`, `a`.`num_block`, `a`.`parcel_id`, `a`.`type_id`, `a`.`plot_id`, `a`.`parcel_code`, `a`.`variety_id`, `a`.`treatment_name`, `a`.`num_order`, (select ma.sketch_id from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select max(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order < a.num_order)) as before_id, (select ma.sketch_id  from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select min(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order > a.num_order)) as next_id
FROM `vi_protocols_sketches` `a`
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = 'c51ce410c124a10e0db5e4b97fc2af39'
ORDER BY `a`.`num_order`
ERROR - 2023-03-29 17:44:41 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/protocols/ProtocolsSketches_model.php 42
ERROR - 2023-03-29 17:56:37 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 18:04:28 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 18:05:04 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 18:05:33 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 18:07:13 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 18:08:06 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 18:12:17 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 19:11:03 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
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
ERROR - 2023-03-29 19:11:25 --> SELECT `a`.`license_id`, `a`.`protocol_id`, `a`.`treatment_id`, `a`.`treatment_name`, round(avg(a.num_atr), 1) num_atr, round(avg(a.num_tch), 1) num_tch, round(avg(a.num_tah), 1) num_tah, round(avg(a.num_wei), 1) num_wei, `p1`.`pos_atr`, `p2`.`pos_tch`, `p3`.`pos_tah`, `p4`.`pos_wei`
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
ERROR - 2023-03-29 19:46:23 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 19:46:30 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 19:47:19 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 19:47:59 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-03-29 22:35:53 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/u392812041/domains/aheadagro.com.br/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2023-03-29 22:35:53 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT `a`.`sketch_id`, `a`.`treatment_id`, `a`.`num_block`, `a`.`parcel_id`, `a`.`type_id`, `a`.`plot_id`, `a`.`parcel_code`, `a`.`variety_id`, `a`.`treatment_name`, `a`.`num_order`, (select ma.sketch_id from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select max(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order < a.num_order)) as before_id, (select ma.sketch_id  from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select min(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order > a.num_order)) as next_id
FROM `vi_protocols_sketches` `a`
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = 'c51ce410c124a10e0db5e4b97fc2af39'
ORDER BY `a`.`num_order`
ERROR - 2023-03-29 22:35:53 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/protocols/ProtocolsSketches_model.php 42
ERROR - 2023-03-29 22:36:44 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/u392812041/domains/aheadagro.com.br/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2023-03-29 22:36:44 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT `a`.`sketch_id`, `a`.`treatment_id`, `a`.`num_block`, `a`.`parcel_id`, `a`.`type_id`, `a`.`plot_id`, `a`.`parcel_code`, `a`.`variety_id`, `a`.`treatment_name`, `a`.`num_order`, (select ma.sketch_id from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select max(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order < a.num_order)) as before_id, (select ma.sketch_id  from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select min(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order > a.num_order)) as next_id
FROM `vi_protocols_sketches` `a`
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = 'c51ce410c124a10e0db5e4b97fc2af39'
ORDER BY `a`.`num_order`
ERROR - 2023-03-29 22:36:44 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/protocols/ProtocolsSketches_model.php 42
ERROR - 2023-03-29 22:37:09 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/u392812041/domains/aheadagro.com.br/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2023-03-29 22:37:09 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT `a`.`sketch_id`, `a`.`treatment_id`, `a`.`num_block`, `a`.`parcel_id`, `a`.`type_id`, `a`.`plot_id`, `a`.`parcel_code`, `a`.`variety_id`, `a`.`treatment_name`, `a`.`num_order`, (select ma.sketch_id from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select max(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order < a.num_order)) as before_id, (select ma.sketch_id  from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select min(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order > a.num_order)) as next_id
FROM `vi_protocols_sketches` `a`
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = 'c51ce410c124a10e0db5e4b97fc2af39'
ORDER BY `a`.`num_order`
ERROR - 2023-03-29 22:37:09 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/protocols/ProtocolsSketches_model.php 42
