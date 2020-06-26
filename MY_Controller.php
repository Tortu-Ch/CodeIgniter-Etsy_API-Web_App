<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $page_data;
	public $api_data;
	public function __construct()
	{
		parent::__construct();

        date_default_timezone_set('america/new_york');
//		date_default_timezone_set( setting('timezone'));

		if(!is_logged()){
			redirect('login','refresh');
		}

		if( !empty($this->db->username) && !empty($this->db->hostname) && !empty($this->db->database) ){

        }else{
			$this->users_model->logout();
			die('Database is not configured');
		}

        $this->page_data['url'] = (object) [
            'assets' => assets_url().'/'
        ];

        $this->page_data['page'] = (object) [
            'title' => 'ProductReservation',
            'menu' => 'reservation',
            'submenu' => '',
            'keywordId' => '',
            'topItem' => '',
            'subItem' => '',
            'subsubItem' => '',
            'listingId'=>'',
            'edatetime'=>'',
            'bdatetime'=>'',
            'graphMode'=>''
        ];

        $this->page_data['category_data'] = (object)[
            'topCategory'=>'',
            'subCategory'=>'',
            'subsubCategory'=>''
        ];

        $this->page_data['listingdata'] = array(array(
            'id'=>'',
            'reservationId'=>'',
            'category_id'=>'',
            'category_name'=>'',
            'listing_id'=>'',
            'title'=>'',
            'price'=>'',
            'currency_code'=>'',
            'url'=>''
        ));

        $datetime = date('m/d/Y H:i:s', time());

        $this->page_data['page']->curdatetime = $datetime;

        $this->page_data['page']->date = date('Y-m-d');

        $this->api_data['api_key']='&fields=category_id,listing_id,title,price,currency_code,url&limit=100&offset=0&region=US&sort_on=score&api_key=5nuye4b6qyaf43za5psqv4db';
        $this->api_data['api_url']='https://openapi.etsy.com/v2/listings/active/?keywords=';
        $this->api_data['api_url_listingId'] = 'https://openapi.etsy.com/v2/listings/';
      //  ini_set('date.timezone', 'America/Los_Angeles');
	}
}
/* End of file My_Controller.php */
/* Location: ./application/core/My_Controller.php */