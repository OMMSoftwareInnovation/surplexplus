<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salecontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model('salemodel');
	   $this->load->model('sellermodel');
	   $this->load->model('buyermodel');
	   $this->load->library('form_validation');		
	}

	public function saleproductlist()
	{
		$perpage="12";
	 	$this->load->model("salemodel", "menu");
		$items = $this->menu->all();
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
		$config["nav_tag_open"]          = '<ul class="dropdown-submenu multi-level" role="menu" aria-labelledby="dropdownMenu">';
		$config["parent_tag_open"]       = '<li class="dropdown-submenu">';
		$config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>';
		$config["children_tag_open"]     = '<ul class="dropdown-menu">';
		$config["item_divider"]          = "<li class='divider'></li>";

		$this->multi_menu->initialize($config);
		
		$filtertype=$this->input->get("filtertype");

		if(!empty($this->input->get("page")))
		{
			$st = ceil(($this->input->get("page")-1) * $perpage);

			if ($filtertype=='0')
			{
				$data['product'] = $this->salemodel->saleproduct($st,$perpage);
			}
			if ($filtertype=='1')
			{
				$data['product'] = $this->salemodel->saleproduct1($st,$perpage);
			}
			if ($filtertype=='2')
			{
				$data['product'] = $this->salemodel->saleproduct2($st,$perpage);
			}
			if ($filtertype=='3')
			{
				$data['product'] = $this->salemodel->saleproduct3($st,$perpage);
			}
			if ($filtertype=='4')
			{
				$data['product'] = $this->salemodel->saleproduct4($st,$perpage);
			}
			if ($filtertype=='5')
			{
				$data['product'] = $this->salemodel->saleproduct5($st,$perpage);
			}

			$result = $this->load->view('data', $data);
			//print_r($result); die();
			echo json_encode($result);
		}
		else
		{
			$st=0;
			$data['product'] = $this->salemodel->saleproduct(0,$perpage);
			$this->load->view('header');
			$this->load->view('saleproductlist',$data);
			$this->load->view('footer');
		}
	}

	public function productbycate()
	{
		$id=$this->uri->segment(3);
		$perpage="12";

	 	$this->load->model("salemodel", "menu");
		$items = $this->menu->all();
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
		$config["nav_tag_open"]          = '<ul class="dropdown-submenu multi-level" role="menu" aria-labelledby="dropdownMenu">';
		$config["parent_tag_open"]       = '<li class="dropdown-submenu">';
		$config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>';
		$config["children_tag_open"]     = '<ul class="dropdown-menu">';
		$config["item_divider"]          = "<li class='divider'></li>";

		$this->multi_menu->initialize($config);
		
		$filtertype=$this->input->get("filtertype");

		if(!empty($this->input->get("page")))
		{
			$st = ceil(($this->input->get("page")-1) * $perpage);

			if ($filtertype=='0')
			{
				$data['product'] = $this->salemodel->productbycate($id,$st,$perpage);
				// if (count($data['product']) == "0")
				// {
				// 	// $st=0;
				// 	// $data['product'] = $this->salemodel->saleproduct(0,$perpage);
				// 	// $result = $this->load->view('data', $data);
				// 	// echo json_encode($result);
				// 	$this->saleproductlist();
				// }
			}
			if ($filtertype=='1')
			{
				$data['product'] = $this->salemodel->productbycate1($id,$st,$perpage);
			}
			if ($filtertype=='2')
			{
				$data['product'] = $this->salemodel->productbycate2($id,$st,$perpage);
			}
			if ($filtertype=='3')
			{
				$data['product'] = $this->salemodel->productbycate3($id,$st,$perpage);
			}
			if ($filtertype=='4')
			{
				$data['product'] = $this->salemodel->productbycate4($id,$st,$perpage);
			}
			if ($filtertype=='5')
			{
				$data['product'] = $this->salemodel->productbycate5($id,$st,$perpage);
			}

			$result = $this->load->view('data', $data);
			//print_r($result); die();
			echo json_encode($result);
		}
		else
		{
			$st=0;
			$data['product'] = $this->salemodel->saleproduct(0,$perpage);
			$this->load->view('header');
			$this->load->view('saleproductlist',$data);
			$this->load->view('footer');
		}
	}

	public function pricedsaleproduct()
	{
		$id=$this->uri->segment(3);
		$product['productdata']=$this->salemodel->pricedsaleproduct($id);
		$product['relateddata']=$this->salemodel->relatedproduct($product['productdata'][0]['product_category_id']);
		// print_r($product['relateddata']);
		$this->load->view('header');
		$this->load->view('pricedsaleproduct',$product);
		$this->load->view('footer');
	}

 	public function user_login()
	{
		$un=$this->input->post('username');
		$pw=$this->input->post('password');
		
		$result['data']=$this->salemodel->buyer_login($un,$pw);
			if ($result['data']!='false')
			{
				$buyer_id=$result['data'][0]->buyer_id;
				$buyer_username=$result['data'][0]->buyer_username;

		        $newdata = array(
				   'id'        => $buyer_id,
				   'username'  => $buyer_username,
				   'type'  	   		 => "buyer",
				   'logged_in' 		 => TRUE
			    );  
	 
		        $this->load->library('session');
		        $a=$this->session->set_userdata($newdata);
		   	    echo json_encode($result['data']);
	   	    }
	   	    else
	   	    {
	   	    	echo json_encode("false");
	      	}
	}

	public function profile()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');
	        $buyerdata['data']=$this->buyermodel->buyerprofile($uid);
	        $buyerdata['order']=$this->salemodel->orders($uid);
	        $buyerdata['notifi']=$this->salemodel->notification($uid,$utype);
	        //print_r($buyerdata['notifi']); die();
			$this->load->view('header');
			$this->load->view('buyerprofile',$buyerdata);
			$this->load->view('footer');
		}
	}

	public function onrequestsaleproduct()
	{
		$id=$this->uri->segment(3);
		$product['productdata']=$this->salemodel->pricedsaleproduct($id);
		$product['relateddata']=$this->salemodel->relatedproduct($product['productdata'][0]['product_category_id']);
		$product['p_seller']=$this->salemodel->product_manufacturer($id);
		 print_r($product['productdata']);

		$this->load->view('header');
		$this->load->view('onrequestsaleproduct',$product);
		$this->load->view('footer');
	}

	public function test()
	{
		$this->load->model("salemodel", "menu");
		$items = $this->menu->all();
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
		$config["nav_tag_open"]          = '<ul class="dropdown-submenu multi-level" role="menu" aria-labelledby="dropdownMenu">';		
		$config["parent_tag_open"]       = '<li class="dropdown-submenu">';			
		$config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>';	
		$config["children_tag_open"]     = '<ul class="dropdown-menu">';			
		$config["item_divider"]          = "<li class='divider'></li>";

		$this->multi_menu->initialize($config);
		$this->load->view('header');
		$this->load->view("test");
		$this->load->view('footer');		
	}

	public function addorder()
	{


// 			$config = Array(
// 		    'protocol' => 'smtp',
// 		    'smtp_host' => 'ssl://smtp.googlemail.com',
// 		    'smtp_port' => 465,
// 		    'smtp_user' => 'dudhiyamurtaza165@gmail.com',
// 		    'smtp_pass' => 'dudhiya6596',
// 		    'mailtype'  => 'html',
// /*		    'ssl' => array(
// 'verify_peer' => false,
// 'verify_peer_name' => false,
// 'allow_self_signed' => true
// )*/
 
		    
// 		     'charset'   => 'iso-8859-1'
// 			);
// 			$this->load->library('email',$config);
// 		/*	$this->email->initialize($config);*/
// 			/*$this->email->set_mailtype("html");*/
// 			$this->email->set_newline("\r\n");

// 			//Email content
// 			$htmlContent = '<h1>'.'APPROVAL for New product From</h1>';
// 			$htmlContent .= '<p></p>';

// 			$this->email->to('dudhiyamurtaza165@gmail.com');
// 			$this->email->from('sss');
// 			$this->email->subject('APPROVAL for New product From');
// 			$this->email->message($htmlContent);
// $this->email->SMTPOptions = array(
// 'ssl' => array(
// 'verify_peer' => false,
// 'verify_peer_name' => false,
// 'allow_self_signed' => true
// )
// );
// 			//Send email
// 			$this->email->send();

// echo $this->email->print_debugger();
// 		 die();



		$uname=$this->session->userdata('username');
		$uid=$this->session->userdata('id');
		$utype=$this->session->userdata('type');
		//print_r($this->input->post('id'));

		$buyerdata['buyer']=$this->salemodel->buyerdetail($uid);
		$buyerdata['product']=$this->salemodel->productdetail($this->input->post('id'));
		$bname=$buyerdata['buyer'][0]['buyer_name'];
		$pname=$buyerdata['product'][0]['product_name'];
		$pimg=$buyerdata['product'][0]['product_main_img'];
		$ostatus='1';
		if ($this->input->post('price')=='00')
		{
			$ostatus='3';
		}
		$data = array(
			'product_id' => $this->input->post('id'),
			'product_name' => $this->input->post('name'),
			'order_amount' => $this->input->post('price'),
			'seller_id' => $this->input->post('seller'),
			'buyer_id' => $uid,
			'order_status' => $ostatus
		);

		$this->salemodel->addorder($data);

		$data1 = array(
			'notification_subject' => $uname.' BUYER wants to purchase the <b>'.$this->input->post('name').'</b> from seller '.$this->input->post('seller'),
			'notification_text' =>  $uname.' BUYER wants to purchase the '.$this->input->post('name').' from seller '.$this->input->post('seller'),
			'notification_status' => '1',
			'sender_id' => $uid,
			'sender_type' => $utype,
			'receiver_id' => '1',
			'receiver_type' => 'admin'
		);
		$data2 = array(
			'notification_subject' => 'Order Notification!',
			'notification_text' => 'A BUYER wants to purchase your product the <b>'.$this->input->post('name').'</b> from You!',
			'notification_status' => '1',
			'sender_id' => '1',
			'sender_type' => 'admin',
			'receiver_id' => $this->input->post('seller'),
			'receiver_type' => 'seller'
		);
		$this->load->helper('notification_helper');

		 notification($data1);
		 notification($data2);


/*

		 $config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'itspljayesh@gmail.com',
		'smtp_pass' => '9662927581',
		'mailtype' => 'html',
		'charset' => 'iso-8859-1'
	    );

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from('itspljayesh@gmail.com', 'Anil Labs');
		
		$datamail = array(
		'user' => $bname,
		'pid' => $this->input->post('id'),
		'img' => $pimg,
		'pname' => $pname
		);
		$subject="Order Notification";
		$this->email->to('dudhiyamurtaza165@gmail.com'); // replace it with receiver mail id
		$this->email->subject($subject); // replace it with relevant subject
		$body ="ss"; //$this->load->view('notifi/to_buyer',$datamail,TRUE);
		$this->email->message($body);
		$this->email->send();
*/

		$data1['notify'] = '<script> swal("Success!", "Your order is in process now! Thank You!", "success");</script>';
		
        $buyerdata['data']=$this->buyermodel->buyerprofile($uid);
	    $buyerdata['order']=$this->salemodel->orders($uid);
	    $buyerdata['notifi']=$this->salemodel->notification($uid,$utype);
		$buyerdata['notify'] = '<script> swal("Success!", "Your order is in process now! Thank You!", "success");</script>';
       	$data=$buyerdata;
		$this->load->view('header');
		$this->load->view('buyerprofile',$data);
		$this->load->view('footer');
	}

	public function test1()
	{
		$id=$this->uri->segment(3);
		$product['productdata']=$this->salemodel->pricedsaleproduct($id);
		$this->load->view('test1',$product);
	}

}