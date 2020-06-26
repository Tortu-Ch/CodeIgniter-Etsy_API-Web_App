<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 4/26/2019
 * Time: 4:12 AM
 */

class Graph extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function display($id, $cur_date, $flag)
    {
        $this->page_data['page']->listingId = $id;
        $this->page_data['page']->curdate = $cur_date;
        $this->page_data['page']->menu = $this->ProductItem_model->getItemTitle($id);
        $this->page_data['page']->graphMode = $flag;
        $this->load->view('graph/index', $this->page_data);
    }
}