<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 5/4/2019
 * Time: 1:34 AM
 */

class Realtime extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reservation_model');
        $this->load->model('ProductItem_model');
        $this->load->model('Realtime_model');
    }

    function index()
    {
        $curdate = date('Y-m-d');
        $this->Realtime_model->load_data($curdate);
    }

    function loadItem()
    {
        $this->Realtime_model->loadItem();
    }
}