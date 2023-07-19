<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-06 18:50:30 --> Query error: Duplicate entry '1-21-173-2022-11-03-1' for key 'uc_samples_stems_01' - Invalid query: INSERT INTO `samples_stems` (`stem_id`, `protocol_id`, `license_id`, `sketch_id`, `dt_sample`, `spot_id`, `num_stems`) VALUES ('', '21', '1', '173', '2022-11-03', '1', '28')
ERROR - 2023-05-06 18:50:30 --> Houve uma falha ao gravar o registro.</br>
ERROR - 2023-05-06 18:50:42 --> Query error: Duplicate entry '1-21-173-2022-11-03-1' for key 'uc_samples_stems_01' - Invalid query: INSERT INTO `samples_stems` (`stem_id`, `protocol_id`, `license_id`, `sketch_id`, `dt_sample`, `spot_id`, `num_stems`) VALUES ('', '21', '1', '173', '2022-11-03', '1', '28')
ERROR - 2023-05-06 18:50:42 --> Houve uma falha ao gravar o registro.</br>
ERROR - 2023-05-06 18:50:52 --> Query error: Duplicate entry '1-21-173-2022-11-03-1' for key 'uc_samples_stems_01' - Invalid query: INSERT INTO `samples_stems` (`stem_id`, `protocol_id`, `license_id`, `sketch_id`, `dt_sample`, `spot_id`, `num_stems`) VALUES ('', '21', '1', '173', '2022-11-03', '1', '28')
ERROR - 2023-05-06 18:50:52 --> Houve uma falha ao gravar o registro.</br>
ERROR - 2023-05-06 18:57:42 --> Severity: Warning --> Division by zero /home/u392812041/domains/aheadagro.com.br/public_html/application/helpers/math_model_helper.php 96
ERROR - 2023-05-06 19:17:58 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=1    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '1'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
ERROR - 2023-05-06 20:35:07 --> SELECT `v`.`check_status`, `v`.`check_status_name`, count(*) amount, round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc
FROM `vi_checks_status` `v`
JOIN (select t.license_id, count(*) total   from vi_checks_status t  where t.license_id=3    and t.protocol_status=1  group by t.license_id) t ON (`t`.`license_id`=v.license_id)
WHERE `v`.`license_id` = '3'
AND `v`.`protocol_status` = 1
GROUP BY `v`.`check_status`, `v`.`check_status_name`
