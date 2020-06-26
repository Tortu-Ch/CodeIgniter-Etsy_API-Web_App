<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 4/28/2019
 * Time: 11:30 AM
 */

class LoadCategories extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_model');
    }

    function index()
    {
        $this->page_data['page']->menu = 'loadCategories';
        $this->load->view('etsy_load/category_load', $this->page_data);
    }

    function loadFromApi()
    {
        $this->page_data['page']->menu = 'loadFromApi';
        $this->load->view('etsy_load/loadFromApi', $this->page_data);
    }

    function category_load($query)
    {
        $ca_url = $this->api_data['api_url'].'/taxonomy/categories/'.$query;
        $url = $ca_url.'?'.$this->api_data['api_key'];
        $response = etsyApi_makeRequest($url, false);
        $result = json_decode($response['curlResult'], true);
        if($result) return $result['results'];
        return false;
    }

    function dataSave()
    {
        ///findAllTopCategory//
/*
        $ca_url = $this->api_data['api_url'].'/taxonomy/categories';
        $url = $ca_url.$this->api_data['api_key'];
        $response = etsyApi_makeRequest($url, false);
        $top_ctg = json_decode($response['curlResult'], true);
        if ($top_ctg)
        {
            $topCategory = $top_ctg['results'];
            foreach ($test as $topRow) {
                $this->Categories_model->data_Save($topRow);
                $i++;
                $subCategory = null;
                if($i == 32){
                    $subCategory = $this->category_load($topRow->name);
                    if ($subCategory)
                    {
                        foreach ($subCategory as $subRow) {
                            $this->Categories_model->data_Save($subRow);
                            $subsubCategory = null;
                            $subsuburl = $topRow->name.'/'.$subRow['name'];
                            $subsubCategory = $this->category_load($subsuburl);
                            if ($subsubCategory) {
                                foreach ($subsubCategory as $subsubRow) {
                                    $this->Categories_model->data_Save($subsubRow);
                                }
                            }
                        }
                    }
                }
            }

        }*/

        $this->loadFromApi();
    }
}