<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 5/3/2019
 * Time: 5:54 PM
 */

class Country_model extends MY_Model
{
    public $table = 'country';

    public function __construct()
    {
        parent::__construct();
    }

    public function getItem()
    {
        $this->db->select('country.country_id, country.iso_country_code, country.world_bank_country_code, country.name');
        $this->db->from('country');
        $this->db->order_by('country.name', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function data_Save($val)
    {
     /*   $data = array(
            'country_id' => $val['country_id'],
            'iso_country_code' => $val['iso_country_code'],
            'world_bank_country_code' => $val['world_bank_country_code'],
            'name' => $val['name'],
            'slug' => $val['slug'],
            'lat' => $val['lat'],
            'lon' => $val['lon'],
        );
        $this->db->insert('country', $data);*/
    }

}