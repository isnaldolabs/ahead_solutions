<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-03-12 18:59:32 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/u392812041/domains/aheadagro.com.br/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2023-03-12 18:59:32 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT `a`.`sketch_id`, `a`.`treatment_id`, `a`.`num_block`, `a`.`parcel_id`, `a`.`type_id`, `a`.`plot_id`, `a`.`parcel_code`, `a`.`variety_id`, `a`.`treatment_name`, `a`.`num_order`, (select ma.sketch_id from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select max(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order < a.num_order)) as before_id, (select ma.sketch_id  from vi_protocols_sketches ma  where ma.license_id = a.license_id  and ma.protocol_id = a.protocol_id  and ma.num_block = a.num_block  and ma.num_order = (select min(s.num_order)  from vi_protocols_sketches s  where s.license_id = a.license_id  and s.protocol_id = a.protocol_id  and s.num_block = a.num_block  and s.num_order > a.num_order)) as next_id
FROM `vi_protocols_sketches` `a`
WHERE `a`.`license_id` = '3'
AND md5(a.protocol_id) = '70efdf2ec9b086079795c442636b55fb'
ORDER BY `a`.`num_order`
ERROR - 2023-03-12 18:59:32 --> Severity: error --> Exception: Call to a member function result() on bool /home/u392812041/domains/aheadagro.com.br/public_html/application/models/protocols/ProtocolsSketches_model.php 42
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/137/2/138/1
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/138/1/137/2
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/138/3/139/2
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/139/2/138/3
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/139/4/140/3
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/140/3/139/4
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/140/5/141/4
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/141/4/140/5
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/141/6/142/5
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/142/5/141/6
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/142/7/143/6
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/143/6/142/7
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/143/8/144/7
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/144/7/143/8
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/144/9/145/8
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/145/8/144/9
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/145/10/146/9
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/146/9/145/10
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/146/11/147/10
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/147/10/146/11
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/147/12/148/11
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/148/11/147/12
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/148/13/149/12
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/149/12/148/13
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/149/14/150/13
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/150/13/149/14
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/150/15/151/14
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/151/14/150/15
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/151/16/152/15
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/152/15/151/16
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/152/17/153/16
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/153/16/152/17
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/153/18/154/17
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/154/17/153/18
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/154/19/155/18
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/155/18/154/19
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/155/20/156/19
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/156/19/155/20
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/156/21/158/20
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/158/20/156/21
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/158/22/157/21
ERROR - 2023-03-12 18:59:47 --> http://www.aheadagro.com.br/rt-protocols-sketches-db-upd-order/157/21/158/22
