<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-05 19:51:03 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/u392812041/domains/aheadagro.com.br/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2023-04-05 19:51:03 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT `a`.`sketch_id`, `a`.`treatment_id`, `a`.`num_block`, `a`.`parcel_id`, `a`.`type_id`, `a`.`plot_id`, `a`.`parcel_code`, `a`.`variety_id`, `a`.`treatment_name`, `a`.`num_order`, (select ma.sketch_id from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select max(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order < a.num_order)) as before_id, (select ma.sketch_id  from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select min(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order > a.num_order)) as next_id
FROM `vi_protocols_sketches` `a`
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = 'c51ce410c124a10e0db5e4b97fc2af39'
ORDER BY `a`.`num_order`
ERROR - 2023-04-05 19:51:03 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/protocols/ProtocolsSketches_model.php 42
