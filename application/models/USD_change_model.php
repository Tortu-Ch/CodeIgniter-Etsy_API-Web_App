<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 5/9/2019
 * Time: 9:18 AM
 */

class USD_change_model extends MY_Model
{
    public $table = 'usd_change';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_rate($currency_code)
    {
        $this->db->select('usd_change.rate');
        $this->db->from('usd_change');
        $this->db->where('usd_change.currency_code = ', $currency_code);
        $this->db->Group_by('usd_change.currency_code');
        $query = $this->db->get();
        $result = $query->result();
        if($result)
        {
            foreach ($result as $row)
            {
                return $row->rate;
            }
        }
        return 0;
    }

    public function add()
    {
        $this->db->select('productitem.currency_code');
        $this->db->from('productitem');
        $this->db->where('productitem.currency_code !=', 'USD');
        $this->db->group_by('productitem.currency_code');
        $query = $this->db->get();
        $result = $query->result();
        if($result)
        {
            foreach ($result as $row)
            {
                $rate = currencyConverter($row->currency_code,'USD');
                if($this->get_rate($row->currency_code)>0)
                {
                    $data = array('rate'=>$rate);
                    $this->db->where('currency_code', $row->currency_code);
                    $this->db->update($this->table,$data);
                }
                else{
                    $data = array(
                        'currency_code'=>$row->currency_code,
                        'rate'=>$rate
                    );
                    $this->db->insert($this->table, $data);
                }
            }
        }
    }
}