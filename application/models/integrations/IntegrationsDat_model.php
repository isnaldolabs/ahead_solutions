<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IntegrationsDat_model extends CI_Model {

    protected $main_table = 'shared_integrations';

    public function __construct(){
        parent::__construct();
    }

    //-- available integrations ------------------------------------------------
    function get_all($pa_params){
        $this->db->select('si.integration_id, si.code, si.name integration_name, si.export, si.import,'.
                          'li.user_id, li.nick_name, li.num_records, li.num_errors, li.log_at');
        $this->db->from('shared_integrations si');
        $this->db->join('(select li.user_id, au.nick_name, li.code, li.num_records, li.num_errors, li.log_at'.
                          ' from log_integrations_dat li'.
                          ' join auth_users au on (au.user_id = li.user_id)'.
                         ' where li.license_id = '.$pa_params['license_id'].
                           ' and li.log_at = (select max(li2.log_at) log_at '.
                                              ' from log_integrations_dat li2 '.
                                             ' where li2.license_id = li.license_id '.
                                               ' and li2.code = li.code)'.
                         ' ) li', '(li.code = si.code)', 'left');
        $this->db->where('si.active', ACTIVE_YES);
        $this->db->where('si.is_sample', $pa_params['is_sample']);
        $this->db->order_by('si.code');
        return $this->db->get()->result();
    }

    //-- export templates ------------------------------------------------------
    function get_template_soils($pa_params){
        $this->db->select('a.license_id, a.soil_id, a.name, a.short_name');
        $this->db->from('soils a');
        $this->db->where('a.license_id', $pa_params['license_id']);
        $this->db->order_by('a.license_id');
        return $this->db->get()->result();
    }

    function get_template_varieties($pa_params){
        $this->db->select('a.license_id, a.variety_id, a.name, a.maturity_id, b.name maturity_name');
        $this->db->from('varieties a');
        $this->db->join('maturation b', '(b.license_id=a.license_id and b.maturity_id=a.maturity_id)', 'left');
        $this->db->where('a.license_id', $pa_params['license_id']);
        $this->db->order_by('a.variety_id');
        return $this->db->get()->result();
    }

    function get_template_teams($pa_params){
        $this->db->select('a.license_id, a.team_id, a.name, a.email');
        $this->db->from('teams a');
        $this->db->where('a.license_id', $pa_params['license_id']);
        $this->db->order_by('a.team_id');
        return $this->db->get()->result();
    }

    function get_template_products($pa_params){
        $this->db->select('a.license_id, a.product_id, a.name, a.manufacturer_id, b.name manufacturer_name');
        $this->db->from('products a');
        $this->db->join('manufacturers b', '(b.license_id=a.license_id and b.manufacturer_id=a.manufacturer_id)', 'left');
        $this->db->where('a.license_id', $pa_params['license_id']);
        $this->db->order_by('a.product_id');
        return $this->db->get()->result();
    }

    function get_template_compounds($pa_params){
        $this->db->select('a.license_id, a.compound_id, a.name, a.short_name');
        $this->db->from('compounds a');
        $this->db->where('a.license_id', $pa_params['license_id']);
        $this->db->order_by('a.compound_id');
        return $this->db->get()->result();
    }

    function get_template_geographical_units($pa_params){
        $this->db->select('gf.license_id, gf.unit_id, bu.name unit_name,'.
                        'gf.farm_id, gf.name farm_name,'.
                        'gp.region_id, gr.name region_name,'.
                        'gp.season_id, gp.block_code, gp.plot_code,'.
                        'gp.variety_id, v.name variety_name, v.maturity_id, m.name maturity_name,'.
                        'gp.cutting_id, c.name cutting_name,'.
                        'gp.soil_id, s.name soil_name, s.short_name soil_short_name,'.
                        'gp.environment_id, e.name environment_name,'.
                        'gp.spacing_id, sp.name spacing_name,'.
                        'gp.distance, gp.total_area, gp.production_area, gp.tons,'.
                        'gp.dt_planting, gp.dt_cutting');
        $this->db->from('gu_farms gf');
        $this->db->join('business_units bu', '(bu.license_id=gf.license_id and bu.unit_id=gf.unit_id)');
        $this->db->join('gu_plots gp', '(gp.license_id=gf.license_id and gp.farm_id=gf.farm_id)');
        $this->db->join('gu_regions gr', '(gr.license_id=gp.license_id and gr.region_id=gp.region_id)', 'left');
        $this->db->join('varieties v', '(v.license_id=gp.license_id and v.variety_id=gp.variety_id)', 'left');
        $this->db->join('maturation m', '(m.license_id=v.license_id and m.maturity_id=v.maturity_id)', 'left');
        $this->db->join('cuttings c', '(c.license_id=gp.license_id and c.cutting_id=gp.cutting_id)', 'left');
        $this->db->join('soils s', '(s.license_id=gp.license_id and s.soil_id=gp.soil_id)', 'left');
        $this->db->join('environments e', '(e.license_id=gp.license_id and e.environment_id=gp.environment_id)', 'left');
        $this->db->join('spacing sp', '(sp.license_id=gp.license_id and sp.spacing_id=gp.spacing_id)', 'left');
        $this->db->where('gf.license_id', $pa_params['license_id']);
        $this->db->where('gp.season_id', $pa_params['season_id']);
        $this->db->order_by('gf.farm_id, gp.block_code, gp.plot_code');
        return $this->db->get()->result();
    }

    function get_template_diseases($pa_params){
        $this->db->select('a.license_id, a.disease_id, a.name, a.short_name, a.agent');
        $this->db->from('diseases a');
        $this->db->where('a.license_id', $pa_params['license_id']);
        $this->db->order_by('a.disease_id');
        return $this->db->get()->result();
    }

    function get_template_pests($pa_params){
        $this->db->select('a.license_id, a.pest_id, a.name');
        $this->db->from('pests a');
        $this->db->where('a.license_id', $pa_params['license_id']);
        $this->db->order_by('a.pest_id');
        return $this->db->get()->result();
    }

    //-- adding records --------------------------------------------------------
    function add_log_dat($poRecord){
        $poRecord['log_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('log_integrations_dat', $poRecord);
    }

    function add_int_dat_soils($poRecord){
        return $this->db->insert('int_dat_soils', $poRecord);
    }

    function add_int_dat_varieties($poRecord){
        return $this->db->insert('int_dat_varieties', $poRecord);
    }

    function add_int_dat_geographical_units($poRecord){
        return $this->db->insert('int_dat_geographical_units', $poRecord);
    }

    function add_int_dat_teams($poRecord){
        return $this->db->insert('int_dat_teams', $poRecord);
    }

    function add_int_dat_products($poRecord){
        return $this->db->insert('int_dat_products', $poRecord);
    }

    function add_int_dat_compounds($poRecord){
        return $this->db->insert('int_dat_compounds', $poRecord);
    }

    function add_int_dat_diseases($poRecord){
        return $this->db->insert('int_dat_diseases', $poRecord);
    }

    function add_int_dat_pests($poRecord){
        return $this->db->insert('int_dat_pests', $poRecord);
    }

    //-- deleting records ------------------------------------------------------
    function del_int_dat_soils($pa_params){
        if($pa_params['license_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            return $this->db->delete('int_dat_soils');
        }
    }

    function del_int_dat_varieties($pa_params){
        if($pa_params['license_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            return $this->db->delete('int_dat_varieties');
        }
    }

    function del_int_dat_geographical_units($pa_params){
        if($pa_params['license_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            return $this->db->delete('int_dat_geographical_units');
        }
    }

    function del_int_dat_teams($pa_params){
        if($pa_params['license_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            return $this->db->delete('int_dat_teams');
        }
    }

    function del_int_dat_products($pa_params){
        if($pa_params['license_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            return $this->db->delete('int_dat_products');
        }
    }

    function del_int_dat_compounds($pa_params){
        if($pa_params['license_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            return $this->db->delete('int_dat_compounds');
        }
    }

    function del_int_dat_diseases($pa_params){
        if($pa_params['license_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            return $this->db->delete('int_dat_diseases');
        }
    }

    function del_int_dat_pests($pa_params){
        if($pa_params['license_id'] > 0){
            $this->db->where('license_id', $pa_params['license_id']);
            return $this->db->delete('int_dat_pests');
        }
    }

}
