<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 5/3/2019
 * Time: 5:53 PM
 */

class LoadCountry extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Country_model');
    }

    function loadFromApi()
    {
        $this->page_data['page']->menu = 'loadFromApi';
        $this->load->view('etsy_load/loadFromApi', $this->page_data);
    }

    function dataSave()
    {
        $co_url = $this->api_data['api_url'].'/countries';
        $url = $co_url.'?'.$this->api_data['api_key'];
        $response = etsyApi_makeRequest($url, false);
        $etsycounty = json_decode($response['curlResult'], true);
        if ($etsycounty)
        {
            $topCategory = $etsycounty['results'];
            foreach ($topCategory as $topRow) {
                $this->Country_model->data_Save($topRow);
            }
        }
        $this->loadFromApi();
    }
}