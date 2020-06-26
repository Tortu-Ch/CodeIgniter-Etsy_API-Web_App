<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 4/28/2019
 * Time: 11:31 AM
 */

class Categories_model extends MY_Model
{
    public $table = 'categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function data_Save($val)
    {
    /*    $data = array(
            'category_id' => $val['category_id'],
            'name' => $val['name'],
            'meta_title' => $val['meta_title'],
            'meta_keywords' => $val['meta_keywords'],
            'meta_description' => $val['meta_description'],
            'page_description' => $val['page_description'],
            'page_title' => $val['page_title'],
            'category_name' => $val['category_name'],
            'short_name' => $val['short_name'],
            'long_name' => $val['long_name'],
            'num_children' => $val['num_children']
        );
        $this->db->insert('categories', $data);*/
    }

    public function getItem()
    {
        $this->db->select('categories.name, categories.id, categories.category_id');
        $this->db->from('categories');
        $this->db->where('categories.num_children =0');
        $this->db->group_by('categories.name');
        $this->db->order_by('categories.id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getCategory_name($categoryId)
    {
        $subItem = null;
        $this->db->select('categories.long_name ');
        $this->db->from('categories');
        $this->db->where('categories.category_id =',$categoryId);
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $row){
            return $row->long_name;
        }
        return null;
    }

    private function findCategory($val1, $val2)
    {
        foreach ($val1 as $row)
        {
            if($row == $val2)return false;
        }
        return true;
    }


    public function getCategory(array $listing_data)
    {
        if($listing_data)
        {
            $myArray = json_decode(json_encode($listing_data), true);
            $myArray = array_orderby($myArray, 'category_name', SORT_ASC);
            $topName = array();
            $subName = array();
            $subsubName = array();
            foreach ($myArray as $l_data)
            {
                $ca_array = explode(" > ", $l_data['category_name']);
                if($this->findCategory($topName, $ca_array[0]) == true)$topName[]=$ca_array[0];
                if(count($ca_array)>1) {
                    if ($this->findCategory($subName, $ca_array[0] .' > '.$ca_array[1]) == true) {
                        $subName[] = $ca_array[0] . ' > ' . $ca_array[1];
                    }
                }
                if(count($ca_array)>2) {
                    if ($this->findCategory($subsubName, $l_data['category_name']) == true) {
                        $subsubName[] = $l_data['category_name'];
                    }
                }
            }
            $res = array(
                'topCategory'=>$topName,
                'subCategory'=>$subName,
                'subsubCategory'=>$subsubName
            );
            return $res;
        }

        return null;
    }
}