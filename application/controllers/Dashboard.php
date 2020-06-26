<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
        $datetime = date('m/d/Y h:i:s', time());
        $datetimesplit = explode(' ',$datetime);
        $datesplit = explode('/', $datetimesplit[0]);
        $timesplit = explode(':',$datetimesplit[1]);
        $this->page_data['page']->datetime1 = $datesplit[2]."-".$datesplit[0]."-".$datesplit[1]." 00:00";
        $this->page_data['page']->datetime2 = $datesplit[2]."-".$datesplit[0]."-".$datesplit[1]
            ." ".$timesplit[0].":".$timesplit[1];

        $this->page_data['page']->menu = 'dashboard';
		$this->load->view('dashboard', $this->page_data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */