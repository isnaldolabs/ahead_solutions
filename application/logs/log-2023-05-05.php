<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-05 19:11:16 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
