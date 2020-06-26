<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 5/5/2019
 * Time: 6:32 PM
 */

class Realtime_model  extends CI_Model
{
    public $table = 'realtime';

    public function __construct()
    {
        parent::__construct();
    }

    function loadItem()
    {
        $this->db->select('reservation.keyword, reservation.item_num, reservation.id');
        $this->db->from('reservation');
        $this->db->where('reservation.status=', 'downloading');
        $this->db->group_by('reservation.keyword');
        $query = $this->db->get();
        $result = $query->result();
        if($result)
        {
            foreach ($result as $row)
            {
                $val = $this->ProductItem_model->productItemSave($row);
                $this->Reservation_model->data_update($row->id, $val);
            }
        }
    }

    function productItem_load($query)
    {
        $api_key = "?fields=quantity,listing_id,state&region=US&api_key=5nuye4b6qyaf43za5psqv4db";
        $api_url = "https://openapi.etsy.com/v2/listings/";
        $url = $api_url.$query.$api_key;
        $response = etsyApi_makeRequest($url, false);
        $result = json_decode($response['curlResult'], true);
        if($result) {
            return $result['results'];
        }
        return false;
    }

    public function load_data($cur_datetime)
    {


/*        $this->db->select('P.listing_id');
        $this->db->from('productitem as P');
        $this->db->JOIN('reservation as R', 'R.id=P.reservationId','left');
        $this->db->where('R.e_date >= ',$cur_datetime);
        $this->db->where('R.b_date <= ',$cur_datetime);
        $this->db->group_by('P.listing_id');
        $this->db->order_by('P.title', 'ASC');
        $query = $this->db->get();
        $result = $query->result();

        if ($result) {
            $listingIds = null;
            $count=0;
            foreach ($result as $row) {
                $count++;
                $listingIds .= strval($row->listing_id).",";
                if($count % 100 == 0)
                {
                    $temp = $this->productItem_load($listingIds);
                    if($temp) {
                        foreach ($temp as $listingdata) {
                            if($listingdata['state'] == 'active') {
                                $data = array(
                                    'listing_id' => $listingdata['listing_id'],
                                    'datetime' => $cur_datetime,
                                    'quantity' => $listingdata['quantity']
                                );
                                $this->db->insert('realtime', $data);
                            }
                        }
                        $listingIds = null;
                    }
                }
            }
            if($count % 100 != 0)
            {
                $temp = $this->productItem_load($listingIds);
                if($temp) {
                    foreach ($temp as $listingdata) {
                        if($listingdata['state'] == 'active') {
                            $data = array(
                                'listing_id' => $listingdata['listing_id'],
                                'datetime' => $cur_datetime,
                                'quantity' => $listingdata['quantity']
                            );
                            $this->db->insert('realtime', $data);
                        }
                    }
                }
            }
        }*/
    }

    public function loadReservation($curdate)
    {
        $this->db->select('reservation.keyword, reservation.item_num');
        $this->db->from('reservation');
        $this->db->where('reservation.status=', 'complete');
        $this->db->where('reservation.b_date>=',$curdate);
        $this->db->where('reservation.e_date<=',$curdate);
        $this->db->group_by('reservation.keyword');
        $query = $this->db->get();
        $result = $query->result();
        if($result)
        {
            foreach ($result as $row)
            {

            }
        }
    }

}