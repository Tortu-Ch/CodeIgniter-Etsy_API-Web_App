<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 4/26/2019
 * Time: 4:11 AM
 */

class Main extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(isset($_POST['bdate']))$this->page_data['page']->bdate = $_POST['bdate'];
        if(isset($_POST['edate']))$this->page_data['page']->edate = $_POST['edate'];
        if(isset($_POST['sh_keyword']))$this->page_data['page']->keywordId = $_POST['sh_keyword'];
        if(isset($_POST['topItem']))$this->page_data['page']->topItem = $_POST['topItem'];
        if(isset($_POST['subItem']))$this->page_data['page']->subItem = $_POST['subItem'];
        if(isset($_POST['subsubItem']))$this->page_data['page']->subsubItem = $_POST['subsubItem'];
        if($this->page_data['page']->keywordId != null) {
            $datearray = $this->Reservation_model->getkeyword($this->page_data['page']->keywordId);
            $this->page_data['page']->mindate = $datearray->b_date;
            $this->page_data['page']->maxdate = $datearray->e_date;
            if($this->page_data['page']->bdate == '')$this->page_data['page']->bdate = $datearray->b_date;
            if($this->page_data['page']->edate == '')$this->page_data['page']->edate = $datearray->e_date;
  //          $this->page_data['listingdata'] = $this->ProductItem_model->getItem($this->page_data['page']);
 //           $this->page_data['category_data'] = $this->Categories_model->getCategory($this->page_data['listingdata']);
            $this->page_data['category_data'] = false;
        }
        $this->page_data['page']->menu = 'main';
        $this->load->view('main/index', $this->page_data);
    }

    public function getListingData($keywordId,$topItem,$subItem,$subsubItem)
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $num = 0;
        $data = array();
        if($keywordId>0) {
            $items = $this->ProductItem_model->getItem($keywordId, $topItem, $subItem, $subsubItem);
            $no = 0;
            $data = array();
            foreach ($items->result() as $row) {
                $no++;
                $data[] = array(
                    $no,
                    '<a href="'.$row->url.'" target="_blank">'.PT_ShortText($row->title, 65)."</a>",
                    '',
                    ''
                );
            }
            $num = $items->num_rows();
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $num,
            "recordsFiltered" => $num,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
}