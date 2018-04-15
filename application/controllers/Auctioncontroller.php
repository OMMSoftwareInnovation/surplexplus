<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auctioncontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model('auctionmodel');
	   $this->load->model('salemodel');
	   $this->load->library('form_validation');
	}

	public function auction() 
	{
		$auction['auctions'] = $this->auctionmodel->liveauctions();
	    $cnt=0;				

	    for ($i=0; $i <count($auction['auctions']) ; $i++)
	    {
			$tt=explode(",", $auction['auctions'][$i]['id']);
			$aa=1;
			if(count($tt)>= 2)
			{  
				  //$cnt++;
				foreach ($tt as $key )
				{
					$data[$cnt][$aa]=$auction['auctiondata'] = $this->auctionmodel->auctiondata($key);
					$aa++;
				}
				$data[$cnt]['0']=$auction['auctiondata'][0]['auction_ed_time'];
			
				//		$data[$cnt]['stdate']=$auction['auctiondata'][0]['auction_st_time'];
				$cnt++;
				
			}
			else
			{
				$data[$cnt]['1']=$auction['auctiondata'] = $this->auctionmodel->auctiondata($tt[0]);
				$data[$cnt]['0']=$auction['auctiondata'][0]['auction_ed_time'];
				
				$cnt++;
			}
	    }
	     $dt['dt'][0]=$auction;
	     $dt['dt'][1]=$data;
		// print_r($auction['auctions']);
		// //print_r($dt);
		// die();

		$this->load->view('header');
		$this->load->view('auction',$dt);
		$this->load->view('footer');
	}

	public function auctionbycategory()
	{
		$this->load->model("auctionmodel", "menu");
		$items = $this->menu->all();
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
		$config["nav_tag_open"]          = '<ul class="dropdown-submenu multi-level" role="menu" aria-labelledby="dropdownMenu">';
		$config["parent_tag_open"]       = '<li class="dropdown-submenu">';
		$config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>';
		$config["children_tag_open"]     = '<ul class="dropdown-menu">';
		$config["item_divider"]          = "<li class='divider'></li>";

		$this->multi_menu->initialize($config);
		$auctionitems['items'] = $this->auctionmodel->auctionbycategory();
		//print_r($auctionitems['items']); die();
		$this->load->view('header');
		$this->load->view('auctionbycategory',$auctionitems);
		$this->load->view('footer');
	}

	public function auctionbycat()
	{
		$id=$this->uri->segment(3);

		$this->load->model("auctionmodel", "menu");
		$items = $this->menu->all();
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
		$config["nav_tag_open"]          = '<ul class="dropdown-submenu multi-level" role="menu" aria-labelledby="dropdownMenu">';
		$config["parent_tag_open"]       = '<li class="dropdown-submenu">';
		$config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>';
		$config["children_tag_open"]     = '<ul class="dropdown-menu">';
		$config["item_divider"]          = "<li class='divider'></li>";

		$this->multi_menu->initialize($config);
		$auctionitems['items'] = $this->auctionmodel->auctionbycat($id);
		//print_r($auctionitems['items']); die();
		$this->load->view('header');
		$this->load->view('auctionbycat',$auctionitems);
		$this->load->view('footer');
	}

	public function closedauctions()
	{
		$auction['auctions'] = $this->auctionmodel->closedauctions();
	    $cnt=0;				

            $data=array();
	    for ($i=0; $i <count($auction['auctions']) ; $i++)
	    {
			$tt=explode(",", $auction['auctions'][$i]['id']);
			$aa=1;
			if(count($tt)>= 2)
			{  
				  //$cnt++;
				foreach ($tt as $key )
				{
					$data[$cnt][$aa]=$auction['auctiondata'] = $this->auctionmodel->auctiondata($key);
					$aa++;
				}
				$data[$cnt]['0']=$auction['auctiondata'][0]['auction_ed_time'];
			
				//		$data[$cnt]['stdate']=$auction['auctiondata'][0]['auction_st_time'];
				$cnt++;
				
			}
			else
			{
				$data[$cnt]['1']=$auction['auctiondata'] = $this->auctionmodel->auctiondata($tt[0]);
				$data[$cnt]['0']=$auction['auctiondata'][0]['auction_ed_time'];
				
				$cnt++;
			}
	    }
	     $dt['dt'][0]=$auction;
	  
             $dt['dt'][1]=$data;
		// print_r($auction['auctions']);
		// //print_r($dt);
		// die();

		$this->load->view('header');
		$this->load->view('closedauctions',$dt);
		$this->load->view('footer');
	}

	public function auctionproductlist()
	{
		$aid=$this->input->post('acid'); 
		$auctionitems['items'] = $this->auctionmodel->aucitem($aid);
		$auctionitems['acd'] = $this->auctionmodel->getaucbyid($aid);
		//print_r($auctionitems);  die();
		$this->load->view('header');
		$this->load->view('auctionproductlist',$auctionitems);
		$this->load->view('footer');
	}

	public function auctionproduct()
	{
		$pid=$this->uri->segment(3);
		$productdata['product'] = $this->auctionmodel->aucitemdetail($pid);

		$aid=$productdata['product'][0]['auction_id'];
		$subid = $productdata['product'][0]['product_category_id'];
		$productdata['biddingdetail'] = $this->auctionmodel->biddingdetail($pid,$aid);

		$productdata['relateddata']=$this->salemodel->liveauctionproducts($aid);
		//print_r($productdata['relateddata']); die();
		$this->load->view('header');
		$this->load->view('auctionproduct',$productdata);
		$this->load->view('footer');
	}

	public function fetchbiddetails()
	{
		$aid=$this->input->post('aid');
		$pid = $this->input->post('pid');
		$productdata['product'] = $this->auctionmodel->aucitemdetail($pid);
		$productdata['biddingdetail'] = $this->auctionmodel->biddingdetail($pid,$aid);

		if (isset($productdata['biddingdetail'][0]['bidcount']))
		{
			$biddingdetailnew['bidcount'] = $productdata['biddingdetail'][0]['bidcount'];
			$biddingdetailnew['chb'] = $productdata['biddingdetail'][0]['maxbid'];
			$biddingdetailnew['inc'] = $productdata['product'][0]['bid_increment'];
			$biddingdetailnew['id']=$productdata['biddingdetail'][0]['auction_bid_id'];
		}
		else
		{
			$biddingdetailnew['bidcount'] = "0";
			$biddingdetailnew['chb'] = $productdata['product'][0]['strating_bid_price'];
			$biddingdetailnew['inc'] = $productdata['product'][0]['bid_increment'];
		}
		echo json_encode($biddingdetailnew);
	}

	public function addbid()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='buyer') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$aid = $this->input->post('aid');
			$pid = $this->input->post('pid');
			$mbid = $this->input->post('cbid');
			$bidcount = $this->input->post('cnt');
			
			$productdata['biddingdetail'] = $this->auctionmodel->biddingdetail($pid,$aid);
		  	
		    if(isset($productdata['biddingdetail'][0]['bidcount']))
		    {
				if ($productdata['biddingdetail'][0]['bidcount'] == $bidcount)
				{
					$data=array
					(
						'auction_id' => $aid,
						'buyer_id' => $uid,
						'auction_item_id' => $pid,
						'current_bid_price' => $mbid
					);

					$productdata = $this->auctionmodel->addbid($data);
					echo $productdata;
				}
				else
				{
					echo json_encode("FALSE");
				}
			}
			else
			{
				$data=array
				(
					'auction_id' => $aid,
					'buyer_id' => $uid,
					'auction_item_id' => $pid,
					'current_bid_price' => $mbid
				);

				$productdata = $this->auctionmodel->addbid($data);
				echo $productdata;			
			}
		}
	}

}