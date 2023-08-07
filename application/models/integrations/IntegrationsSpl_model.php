<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IntegrationsSpl_model extends CI_Model {

    protected $main_table = 'shared_integrations';

    public function __construct(){
        parent::__construct();
    }

    //-- available integrations ------------------------------------------------
    function get_all($pa_params){
        $this->db->select('si.integration_id, si.code, si.name integration_name, si.export, si.import,'.
                          'li.user_id, li.nick_name, li.num_records, li.num_errors, li.log_at');
        $this->db->from('shared_integrations si');
        $this->db->join('(select li.user_id, au.nick_name, li.code, li.num_records, li.num_errors, avg(li.log_at) log_at'.
                          ' from log_integrations_spl li'.
                          ' join auth_users au on (au.user_id = li.user_id)'.
                         ' where li.license_id = '.$pa_params['license_id'].
                           ' and li.protocol_id = '.$pa_params['protocol_id'].
                           ' and li.log_at = (select max(li2.log_at) log_at '.
                                              ' from log_integrations_spl li2 '.
                                             ' where li2.license_id = li.license_id '.
                                               ' and li2.code = li.code)'.
                         ' group by li.user_id, au.nick_name, li.code, li.num_records, li.num_errors) li', '(li.code = si.code)', 'left');
        $this->db->where('si.active', ACTIVE_YES);
        $this->db->where('si.is_sample', $pa_params['is_sample']);
        $this->db->where('si.code', $pa_params['shared_integration']);
        $this->db->order_by('si.code');
        return $this->db->get()->result();
    }

    //-- export templates ------------------------------------------------------
    function get_template($pa_params){
        $this->db->select('vps.license_id, vps.protocol_id, vps.num_order,'.
                          'vps.farm_code, vps.farm_name, vps.block_code, vps.plot_code,'.
                          'vps.treatment_name, vps.num_block, vps.sketch_id');
        $this->db->from('vi_protocols_sketches vps');
        $this->db->where('vps.license_id', $pa_params['license_id']);
        $this->db->where('vps.protocol_id', $pa_params['protocol_id']);
        $this->db->order_by('vps.num_order, vps.sketch_id, vps.num_block');
        return $this->db->get()->result();
    }

    function get_template_spl_compounds($pa_params){
        $this->db->select('vps.license_id, vps.protocol_id, vps.num_order,'.
                          'vps.farm_code, vps.farm_name, vps.block_code, vps.plot_code,'.
                          'vps.treatment_name, vps.num_block, vps.sketch_id,'.
                          'ppc.compound_id, cp.name compound_name, cp.short_name compound_short_name');
        $this->db->from('vi_protocols_sketches vps');
        $this->db->join('protocols_products_compounds ppc', '(ppc.license_id=vps.license_id and ppc.protocol_id=vps.protocol_id and ppc.treatment_id=vps.treatment_id)');
        $this->db->join('compounds cp', '(cp.license_id=ppc.license_id and cp.compound_id=ppc.compound_id)');
        $this->db->where('vps.license_id', $pa_params['license_id']);
        $this->db->where('vps.protocol_id', $pa_params['protocol_id']);
        $this->db->order_by('vps.license_id, vps.protocol_id, vps.num_order, vps.sketch_id, vps.num_block, ppc.compound_id');
        return $this->db->get()->result();
    }

    //-- adding records --------------------------------------------------------
    function add_log_spl($poRecord){
        $poRecord['log_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('log_integrations_spl', $poRecord);
    }

    function add_log_spl_alert($poRecord){
        $poRecord['alert_at']   = date('Y-m-d H:i:s');
        $poRecord['is_read']    = 0;
        $poRecord['aware_by']   = NULL;
        $poRecord['aware_at']   = NULL;
        return $this->db->insert('protocols_alerts', $poRecord);
    }

    function add_int_samples_analyze($poRecord){
        return $this->db->insert('int_samples_analyze', $poRecord);
    }

    function add_int_samples_weight($poRecord){
        return $this->db->insert('int_samples_weight', $poRecord);
    }

    function add_int_samples_stems($poRecord){
        return $this->db->insert('int_samples_stems', $poRecord);
    }

    function add_int_samples_height($poRecord){
        return $this->db->insert('int_samples_heights', $poRecord);
    }

    function add_int_samples_diameters($poRecord){
        return $this->db->insert('int_samples_diameters', $poRecord);
    }

    function add_int_samples_internodes($poRecord){
        return $this->db->insert('int_samples_internodes', $poRecord);
    }

    function add_int_samples_flowering($poRecord){
        return $this->db->insert('int_samples_flowering', $poRecord);
    }

    function add_int_samples_pith($poRecord){
        return $this->db->insert('int_samples_pith', $poRecord);
    }

    function add_int_samples_tillers($poRecord){
        return $this->db->insert('int_samples_tillers', $poRecord);
    }

    function add_int_samples_infestation($poRecord){
        return $this->db->insert('int_samples_infestation', $poRecord);
    }

    function add_int_samples_holes($poRecord){
        return $this->db->insert('int_samples_holes', $poRecord);
    }

    function add_int_samples_damages($poRecord){
        return $this->db->insert('int_samples_damages', $poRecord);
    }

    function add_int_samples_compounds($poRecord){
        return $this->db->insert('int_samples_compounds', $poRecord);
    }

    function add_int_samples_diseases($poRecord){
        return $this->db->insert('int_samples_diseases', $poRecord);
    }

    function add_int_samples_pests($poRecord){
        return $this->db->insert('int_samples_pests', $poRecord);
    }

    function add_int_samples_gaps($poRecord){
        return $this->db->insert('int_samples_gaps', $poRecord);
    }

    //-- deleting records ------------------------------------------------------
    function del_int_samples_analyze($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_analyze');
        }
    }

    function del_int_samples_weight($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_weight');
        }
    }

    function del_int_samples_stems($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_stems');
        }
    }

    function del_int_samples_heights($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_heights');
        }
    }

    function del_int_samples_diameters($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_diameters');
        }
    }

    function del_int_samples_internodes($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_internodes');
        }
    }

    function del_int_samples_flowering($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_flowering');
        }
    }

    function del_int_samples_pith($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_pith');
        }
    }

    function del_int_samples_tillers($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_tillers');
        }
    }

    function del_int_samples_infestation($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_infestation');
        }
    }

    function del_int_samples_holes($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_holes');
        }
    }

    function del_int_samples_damages($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_damages');
        }
    }

    function del_int_samples_compounds($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_compounds');
        }
    }

    function del_int_samples_diseases($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_diseases');
        }
    }

    function del_int_samples_pests($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_pests');
        }
    }

    function del_int_samples_gaps($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            $this->db->where('protocol_id', $pa_params['protocol_id']);
            return $this->db->delete('int_samples_gaps');
        }
    }

    //-- store procedures ------------------------------------------------------
    function sp_upd_samples_diseases($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $ls_store = 'call sp_update_samples_diseases_01(?,?)';
            return $this->db->query($ls_store, $pa_params);
        }
    }

    function sp_upd_samples_pests($pa_params){
        if($pa_params['license_id'] > 0 and $pa_params['protocol_id'] > 0){
            $ls_store = 'call sp_update_samples_pests_01(?,?)';
            return $this->db->query($ls_store, $pa_params);
        }
    }

}
