<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homecontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model('homemodel');
	   $this->load->model('sellermodel');
	   $this->load->model('salemodel');
	   $this->load->model('buyermodel');
	   $this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('type');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
        //echo json_encode('success');
        redirect('homecontroller/index');
	}

	public function login()
	{	
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function user_login()
	{
		$un=$this->input->post('username',TRUE);
		$pw=$this->input->post('password',TRUE);
		
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');			
		}
		else
		{
	      	if($this->input->post('type'))
	      	{
				$result['data']=$this->sellermodel->seller_login($un,$pw);
				if ($result['data']!='false')
				{
					$seller_id=$result['data'][0]->seller_id;
					$seller_username=$result['data'][0]->seller_username;

			        $newdata = array(
					   'id'        => $seller_id,
					   'username'  => $seller_username,
					   'email'	   => $result['data'][0]->seller_email,
					   'type'  	   => "seller",
					   'logged_in' => TRUE
				    );  

			        $a=$this->session->set_userdata($newdata);

					$this->load->view('sellerpanel/header');
					$this->load->view('sellerpanel/index');
					$this->load->view('sellerpanel/footer');
		   	    }
		   	    else
		   	    {
		   	    	$data['error']='<div class="alert alert-danger"><strong>Error!</strong> Authentication Failed.</div>';
					$this->load->view('header');
					$this->load->view('login',$data);
					$this->load->view('footer');
		   	    }
	      	}

	      	else
	      	{
				$result['data']=$this->buyermodel->buyer_login($un,$pw);

				if ($result['data']!='false')
				{
					$buyer_id=$result['data'][0]->buyer_id;
					$buyer_username=$result['data'][0]->buyer_username;

			        $newdata = array(
					   'id'        => $buyer_id,
					   'username'  => $buyer_username,
					   'type'  	   => "buyer",
					   'logged_in' => TRUE
				    );  

			        $a=$this->session->set_userdata($newdata);

					$this->load->view('header');
					$this->load->view('index');
					$this->load->view('footer');
	   	    	}
		   	    else
		   	    {
		   	    	$data['error']='<div class="alert alert-danger"><strong>Error!</strong> Authentication Failed.</div>';
					$this->load->view('header');
					$this->load->view('login',$data);
					$this->load->view('footer');
		   	    }
			}
		}
	}

	public function forgotpassword()
	{
		$this->load->view('header');
		$this->load->view('forgotpassword');
		$this->load->view('footer');
	}

 	public function checkforgotpass()
	{
		$em=$this->input->post('email');
		$mn=$this->input->post('mobile');
	
      	if($this->input->post('type'))
      	{       
			$result['data']=$this->sellermodel->seller_checkforgotpass($em,$mn);
			if ($result['data']!='false')
			{
				$seller['id']=$result['data'][0]->seller_id;
				$seller['type']='seller';

				$this->load->view('header');
				$this->load->view('newpassword',$seller);
				$this->load->view('footer');
	   	    }
	   	    else
	   	    {
	   	    	$data['error']='<div class="alert alert-danger"><strong>Error!</strong> Authentication Failed.</div>';
				$this->load->view('header');
				$this->load->view('forgotpassword',$data);
				$this->load->view('footer');
	   	    }
      	}

      	else
      	{       
			$result['data']=$this->buyermodel->buyer_checkforgotpass($em,$mn);
			if ($result['data']!='false')
			{
				$buyer['id']=$result['data'][0]->buyer_id;
				$buyer['type']='buyer';

				$this->load->view('header');
				$this->load->view('newpassword',$buyer);
				$this->load->view('footer');
	   	    }
	   	    else
	   	    {
	   	    	$data['error']='<div class="alert alert-danger"><strong>Error!</strong> Authentication Failed.</div>';
				$this->load->view('header');
				$this->load->view('forgotpassword',$data);
				$this->load->view('footer');
	   	    }
		}
	}

 	public function updatepassword()
	{
		$id=$this->input->post('id');
		$type=$this->input->post('type');
		$password=$this->input->post('password');
	
      	if($type=='buyer')
      	{
			$this->buyermodel->buyer_updatepassword($id,$password);
      	}

      	else
      	{
			$this->sellermodel->seller_updatepassword($id,$password);
		}

		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function profile()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			if ($this->session->userdata('type')=='buyer')
			{
				$uid=$this->session->userdata('id');
				$utype=$this->session->userdata('type');
		        $buyerdata['data']=$this->buyermodel->buyerprofile($uid);
		        $buyerdata['order']=$this->salemodel->orders($uid);
	        	$buyerdata['notifi']=$this->salemodel->notification($uid,$utype);
		        //print_r($buyerdata['order']); die();
				$this->load->view('header');
				$this->load->view('buyerprofile',$buyerdata);
				$this->load->view('footer');
			}
			else
			{
				$this->load->view('sellerpanel/header');
				$this->load->view('sellerpanel/index');
				$this->load->view('sellerpanel/footer');
			}
		}
	}

	public function seller_registraion_view()
	{
		$this->load->view('header');
		$this->load->view('seller_registration');
		$this->load->view('footer');
	}

	public function seller_registraion()
	{
 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
 		$this->form_validation->set_rules('name2', 'Name', 'required|min_length[5]|max_length[30]');
 		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
 		$this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[10]|max_length[50]');
		$this->form_validation->set_rules('password', 'Paasword', 'required|min_length[6]|max_length[50]');
 		if ($this->form_validation->run() == FALSE) 
 		{
			$data['notify'] = '<script> swal("Success!", "Registration Failed! Please LogIn.", "success");</script>';
			$this->seller_registraion_view();
		}
		else 
		{
			$data = array(
			'seller_name' => $this->input->post('name1').$this->input->post('name2'),
			'seller_username' => $this->input->post('username'),
			'seller_email' => $this->input->post('email'),
			'seller_mobile' => $this->input->post('mobile'),
			'seller_company_name' => $this->input->post('company_name'),
			'seller_company_address' => $this->input->post('company_address'),
			'seller_password' => $this->input->post('confirm_password'),
			'gstin_number' => $this->input->post('gstinnumber'),
			'seller_status' => '0'
			);
			$this->sellermodel->seller_data_insert($data);  
			$data['notify'] = '<script> swal("Success!", "Registration successfull! Please LogIn.", "success");</script>';
			
			$this->load->view('header');
			$this->load->view('index',$data);
			$this->load->view('footer');
		}
	}

	public function buyer_registraion_view()
	{
		$this->load->view('header');
		$this->load->view('buyer_registration');
		$this->load->view('footer');
	}

	public function buyer_registraion()
	{
 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
 		$this->form_validation->set_rules('name2', 'Name', 'required|min_length[5]|max_length[30]');
 		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
 		$this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[10]|max_length[50]');
		$this->form_validation->set_rules('password', 'Paasword', 'required|min_length[6]|max_length[50]');
 		if ($this->form_validation->run() == FALSE) 
 		{
			$this->buyer_registraion_view();
		}
		else 
		{
			$data = array(
			'buyer_name' => $this->input->post('name1').$this->input->post('name2'),
			'buyer_username' => $this->input->post('username'),
			'buyer_email' => $this->input->post('email'),
			'buyer_mobile' => $this->input->post('mobile'),
			'buyer_company_name' => $this->input->post('company_name'),
			'buyer_company_address' => $this->input->post('company_address'),
			'buyer_password' => $this->input->post('confirm_password'),
			'buyer_status' => '0'
			);
			$this->buyermodel->buyer_data_insert($data); 
			$data['notify'] = '<script> swal("Success!", "Registration successfull! Please LogIn.", "success");</script>';
			
			$this->load->view('header');
			$this->load->view('index',$data);
			$this->load->view('footer');
		}
	}

    public function chk_seller_usr()
	{
		if(isset($_POST))
        {
            $seller_username = $_POST['seller_username'];
            $this->sellermodel->sellerusrchk($seller_username); 
        }
	}

    public function chk_seller_email()
	{
		if(isset($_POST))
        {
            $seller_email = $_POST['seller_email'];
            $this->sellermodel->selleremailchk($seller_email);
        }
	}

    public function chk_buyer_usr()
	{
		if(isset($_POST))
        {
            $seller_username = $_POST['seller_username'];
            $this->buyermodel->buyerusrchk($seller_username); 
        }
	}

    public function chk_buyer_email()
	{
		if(isset($_POST))
        {
            $seller_email = $_POST['seller_email'];
            $this->buyermodel->buyeremailchk($seller_email); 
        }
	}

	public function buyer_profileupdate()
	{
 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
 		$this->form_validation->set_rules('name2', 'Name', 'required|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
 		$this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[10]|max_length[50]');
 		if ($this->form_validation->run() == FALSE) 
 		{
			$this->profile();
		}
		else 
		{
			$data = array(
			'buyer_name' => $this->input->post('name1').$this->input->post('name2'),			
			'buyer_mobile' => $this->input->post('mobile'),
			'buyer_company_name' => $this->input->post('company_name'),
			'buyer_company_address' => $this->input->post('company_address')
			);

			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');
			$this->buyermodel->buyer_profileupdate($uid,$data);
			$buyerdata['data']=$this->buyermodel->buyerprofile($uid);
	        $buyerdata['notifi']=$this->salemodel->notification($uid,$utype);
		    $buyerdata['notify']='<script> swal("Great!", "Your profile updated successfully!", "success");</script>';

			$this->load->view('header');
			$this->load->view('buyerprofile',$buyerdata);
			$this->load->view('footer');
		}
	}

	public function seller_profileupdate()
	{
 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
 		$this->form_validation->set_rules('name2', 'Name', 'required|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
 		$this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[10]|max_length[50]');
 		if ($this->form_validation->run() == FALSE) 
 		{
			$this->profile();
		}
		else 
		{
			$data = array(
			'seller_name' => $this->input->post('name1').$this->input->post('name2'),
			'seller_mobile' => $this->input->post('mobile'),
			'seller_company_name' => $this->input->post('company_name'),
			'seller_company_address' => $this->input->post('company_address')
			);

			$uid=$this->session->userdata('id');
			$this->sellermodel->seller_profileupdate($uid,$data);
			$sellerdata['data']=$this->sellermodel->sellerprofile($uid);
		    $sellerdata['notify']='<script> swal("Great!", "Your profile updated successfully!", "success");</script>';
			   
			$this->load->view('header');
			$this->load->view('sellerprofile',$sellerdata);
			$this->load->view('footer');
		}
	}

	public function searchbar()
	{
		$data['response'] = 'false';
		if(!empty($this->input->post("term")))
		{
			$term = $this->input->post("term");

			$query=$this->homemodel->searchbar($term);
			$query2=$this->homemodel->searchbar1($term);
			//print_r($query);

			if( ! empty($query) )
        	{
				$data['response'] = 'true'; //Set response
				$data['message'] = array(); //Create array

				foreach( $query as $row )
				{
					$data['message'][] =
					array(
					'id'=>"p-".$row->product_id,
					'value' => $row->product_name
					);
				}
				// print_r($query2);
                  if($query2[0]->count>0){  
				foreach( $query2 as $row )
				{  


					$data['message'][] =
					array(
					'id'=>"m-".$row->p_manufacturer,
					'value' => $row->p_manufacturer." (".$row->count.")"
					);
				}
			}
        	}

	        if('IS_AJAX')
	        {
	            echo json_encode($data); //echo json string if ajax request
	             
	        }
			
		}
	}

	public function results()
	{
		$search = $this->uri->segment(3);
		$search1 = explode("-",$search);
		//print_r($search1[0]);

		if ($search1[0] == "p")
		{
			$page = "results";
			$productdata['product'] = $this->homemodel->productsearch($search1[1]);
			//print_r($productdata['product']); die();
		}
		else
		{
			$page = "mresults";
			$productdata['product'] = $this->homemodel->manufacsearch($search1[1]);
			//print_r($productdata['product']); die();
		}

		$this->load->view('header');
		$this->load->view($page,$productdata);
		$this->load->view('footer');
	}

}