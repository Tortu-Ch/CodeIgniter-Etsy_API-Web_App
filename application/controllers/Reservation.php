<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 4/29/2019
 * Time: 8:19 PM
 */

class Reservation extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->page_data['page']->menu = 'reservation';
    }

    public function index()
    {
        $this->page_data['page']->data = $this->Reservation_model->data_list();
        $this->load->view('reservation/index', $this->page_data);
    }

    public function add()
    {
        $val['b_date'] = $this->input->post('re_date1');
        $val['e_date'] = $this->input->post('re_date2');
        $val['keyword'] = $this->input->post('keyword');
        $this->Reservation_model->data_search($val);
        $this->index();
    }

    public function delete($id)
    {
        $this->Reservation_model->delete('id',$id);
        $this->index();
    }
}