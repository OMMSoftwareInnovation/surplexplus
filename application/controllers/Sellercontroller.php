<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellercontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->library('upload');
	   $this->load->model('sellermodel');
	   $this->load->model('salemodel');
	   $this->load->model('buyermodel');
	   $this->load->library('form_validation');
	}

	public function login()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/index');
			$this->load->view('sellerpanel/footer');
		}
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/index');
			$this->load->view('sellerpanel/footer');
		}
	}

	public function addproduct()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$product['category'] = $this->sellermodel->category();
			// print_r($product['category']);
			// die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/addproduct',$product);
		}
	}

	public function subcategory()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			header("location:" .site_url('homecontroller/login'));
		} 
		else
		{
			$id = $this->input->post('id');
			$subcategory=$this->sellermodel->subcategory($id);
			$subcategory1 = "<option value='0'>Select Sub-Category</option>";
			echo $subcategory1;
			for($i=0;$i< count($subcategory);$i++)
			{
				echo "<option value=".$subcategory[$i]['id'].">".$subcategory[$i]['name']."</option>"; 
			}
			$subcategory2 = "<option value='other'>Other</option>";
			echo $subcategory2;
		}
	}

	public function upload_product()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
	 		$id=$this->session->userdata('id');
			$stype=$this->session->userdata('type');
			//print_r($_POST); die();
	  // 		if (isset($this->input->post('subcategory')))
			// {
			// 	$type='1';
			// }
			// else
			// {
			// 	$type='2';
			// }

			$data=array
			(
				'seller_id'=>$id,
				'product_name'=>$this->input->post('name'),
				'product_description'=>$this->input->post('product_desc'),
				'product_summary'=>$this->input->post('summary'),
				'product_category_id'=>$this->input->post('category'),
				'product_subcategory_id'=>$this->input->post('subcategory'),
				'product_main_img'=>$this->input->post('main_image'),
				'product_imgs'=>$this->input->post('images'),
				'product_cat_info'=>$this->input->post('catotherinfo'),
				'product_subcat_info'=>$this->input->post('subcatotherinfo'),
				'p_name'=>$this->input->post('itemname'),
				'p_manufacturer'=>$this->input->post('manufacturer'),
				'p_model_type'=>$this->input->post('model_type'),
				'p_year_of_manufacture'=>$this->input->post('yofmenu'),
				'p_machine_condition'=>$this->input->post('machine_condi'),
				'p_machine_location'=>$this->input->post('machine_loc'),
				'p_weight_approx'=>$this->input->post('s_d_approx'),
				'p_size_dimensions_approx'=>$this->input->post('w_approx'),
				'product_status'=>'1'
			);

			//$config['global_xss_filtering'] = FALSE;

			$data1=array
			(
			'sender_id'=>$id,
			'sender_type'=>$stype,
			'receiver_type'=> 'admin',
			'receiver_id'=> '1',
			'notification_subject'=> 'APPROVAL for New product From '.$this->session->userdata('username'),
			'notification_text'=>'APPROVAL for New product From '.$this->session->userdata('username'),
			'notification_status'=>'1'
			);

			// $config = Array(
		 //    'protocol' => 'smtp',
		 //    'smtp_host' => 'ssl://smtp.googlemail.com',
		 //    'smtp_port' => 465,
		 //    'smtp_user' => 'itspljayesh@gmail.com',
		 //    'smtp_pass' => '9662927581',
		 //    'mailtype'  => 'html', 
		 //    'charset'   => 'iso-8859-1'
			// );
			// $this->load->library('email');
			// $this->email->initialize($config);
			// $this->email->set_mailtype("html");
			// $this->email->set_newline("\r\n");

			// //Email content
			// $htmlContent = '<h1>'.'APPROVAL for New product From'.$this->session->userdata('username').'</h1>';
			// $htmlContent .= '<p>'.$this->input->post('name').'-'.$this->session->userdata('username').'</p>';

			// $this->email->to('itspljayesh@gmail.com');
			// $this->email->from($this->session->userdata('email'),'APPROVAL');
			// $this->email->subject('APPROVAL for New product From'.$this->session->userdata('username'));
			// $this->email->message($htmlContent);

			// //Send email
			// $this->email->send();

			$this->sellermodel->newproductnotify($data1);
			$product['data'] = $this->sellermodel->upload_product($data);
			$status ['status']= "success";
			echo json_encode( $status);
		}
	}

	public function viewproduct()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$productdata['product']=$this->sellermodel->seller_product($uid);
			//print_r($productdata['product']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/viewproduct',$productdata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function neworders()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->neworders($uid);
			$orders['head'] = "New";
			//print_r($orders['order']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orders',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function approvedorders()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->approvedorders($uid);
			$orders['head'] = "Approved";
			//print_r($orders['order']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orders',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function profile()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$data['data']=$this->sellermodel->profile($uid);

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/profile',$data);
			$this->load->view('sellerpanel/footer');
		}
	}

    function multiupload()
    {
        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
    }

	public function deleteFile()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$iname=$this->uri->segment(3);
			$data['data']=$this->sellermodel->deleteFile($iname);
			unlink("files/".$iname);
			unlink("files/thumbnail/".$iname);
			echo json_encode("true");
		}
	}

	public function fetch_notification()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			if ($_POST['view']=="yes")
			{				
				$uid=$this->session->userdata('id');
				$utype=$this->session->userdata('type');
				$data['data']=$this->sellermodel->update_notification($uid,$utype);
			}
			else
			{
				$uid=$this->session->userdata('id');
				$utype=$this->session->userdata('type');
				$data['data']=$this->sellermodel->fetch_notification($uid,$utype);
				$output = '';
				if(count($data['data'])>0)
				{
					for($i=0;$i<count($data['data']);$i++)
					{
						$output .= '
						<li>
						<a href="'.site_url('sellercontroller/read_notification/').$data['data'][$i]["notification_id"].'" id="ntff">
						<strong>'.$data['data'][$i]["notification_subject"].'</strong><br />
						<small><em>'.$data['data'][$i]["notification_text"].'</em></small>
						</a>
						</li>';
					}
				}
				else
				{
					$output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
				}

				$data1 = array(
				'notification' => $output,
				'unseen_notification'  => count($data['data'])
				);

				echo json_encode($data1);
			}
		}
	}

	public function notification_view()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');
			$notification['notifi']=$this->sellermodel->notification_view($uid,$utype);
			// print_r($notification['notifi']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/notification',$notification);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function read_notification()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$nid=$this->uri->segment(3);
			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');

			$this->sellermodel->update_notification($nid,$uid,$utype);
			$notification['notifi']=$this->sellermodel->read_notification($nid,$uid,$utype);
			// print_r($notification['notifi']); die();

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/readnotification',$notification);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function productdetail()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			$productdata['product']=$this->sellermodel->productdetail($pid);
            $productdata['seller'] =$this->sellermodel->seller($productdata['product'][0]['seller_id']);
            $productdata['category'] =$this->sellermodel->category1($productdata['product'][0]['product_category_id']);
            
            if($productdata['product'][0]['product_subcategory_id'] == "other")
            {
            	$productdata['subcategory'][0]['name'] = $productdata['product'][0]['product_subcategory_id'];
            }
            else
            {
	            $productdata['subcategory'] = $this->sellermodel->subcategory1($productdata['product'][0]['product_subcategory_id']);
            }

			//print_r($productdata['subcategory']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/productdetail',$productdata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function orderdetail()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			$uid=$this->session->userdata('id');
			
			$productdata['order']=$this->sellermodel->neworders($pid);
			$productdata['highestprice']=$this->sellermodel->highestprice($pid);
			$productdata['productorders']=$this->sellermodel->productorders($pid);
			$productdata['product']=$this->sellermodel->productdetail($pid);
   			$productdata['category'] =$this->sellermodel->category1($productdata['product'][0]['product_category_id']);
   			$productdata['subcategory'] =$this->sellermodel->subcategory1($productdata['product'][0]['product_subcategory_id']);
   			$productdata['commissiondetails']=$this->sellermodel->commissiondetails($pid,$uid);
			$comm=$this->sellermodel->getcomm($uid);
		

			if(count($productdata['commissiondetails'])>0)
			{
				$productdata['comm']['rate']=$comm[0]['commission_amount'];
				$productdata['comm']['high']=$productdata['highestprice'][0]['max'];
				$productdata['comm']['total']=($productdata['highestprice'][0]['max']*$comm[0]['commission_amount'])/100;
		
				$productdata['comm']['newtotal']=$productdata['comm']['total']-$productdata['commissiondetails'][0]['commission_value'];
				$productdata['comm']['status']="yes";
				if($productdata['comm']['newtotal']==0)
				{
			    $productdata['comm']['status']="no";		
				}

			}
			else
			{
				$productdata['comm']['status']="yes";
				$productdata['comm']['rate']=$comm[0]['commission_amount'];
				$productdata['comm']['high']=$productdata['highestprice'][0]['max'];
				$productdata['comm']['firsttotal']=($productdata['highestprice'][0]['max']*$comm[0]['commission_amount'])/100;
			}



			 // for($i=0;$i<count($productdata['productorders']);$i++)
			 // {
			 // 	    if($productdata['productorders'][$i]['order_status']==1)
			 // 	    {
			 	    	
			 // 	    }
			 // }
             // print_r($productdata['order']);
             // die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orderdetail',$productdata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function orderapproval()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid = $this->session->userdata('id');
			$hp = $this->input->post('hp');
			$comrt = $this->input->post('comrt');
			$comtotal = $this->input->post('comtotal');
			$pid = $this->input->post('pid');
         	
         	$data1=array
			(
			'product_id'=>$pid,
			'seller_id'=>$uid,
			'commission_rate'=> $comrt,
			'commission_value'=> $comtotal,
			'commission_status'=>'1'
			);

			$commission=$this->sellermodel->addcommission($data1);

			$data2=array
			(
			'product_id'=>$pid,
			'comii_id'=>$commission,
			'seller_id'=>$uid,
			'tsc_amount'=> $comtotal,
			'tsc_status'=>'1'
			);

			$transaction=$this->sellermodel->addtransaction($data2);

   			$productdata['order']=$this->sellermodel->productorders($pid);

   			for ($i=0; $i <count($productdata['order']); $i++)
   			{
				if( $hp>=$productdata['order'][$i]['order_amount'] )
				{
					$orid = $productdata['order'][$i]['order_id'];
					$data3=array
					(
					'order_status'=>'2',
					);
					$this->sellermodel->updateorderstatus($orid,$data3);
				}
   			}
		}
	}

	public function buyerdata()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$bid = $this->input->post('bid');
			$buyerdta['buyer']=$this->sellermodel->buyerdata($bid);
			echo json_encode($buyerdta['buyer']);
		}
	}

	public function approvedorderreport()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->approvedorders($uid);
			//print_r($orders['order']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orderreport',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function rejectedorderreport()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->cancelledorders($uid);
			//print_r($orders['order']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orderreport',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function changeactionstatus()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id = $this->input->post('id');
			$status = $this->input->post('action_status');

			$data=array
			(
			'action_status'=>$status,
			);
			$orders=$this->sellermodel->changeactionstatus($id,$data);

			echo $orders;
		}
	}

	public function addauction()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$productdata['product']=$this->sellermodel->productselection($uid);
			//print_r($productdata['product']); die();

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/addauction',$productdata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function uploadauction()
	{
		if(isset($_FILES["file"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 100000000) && in_array($file_extension, $validextensions)) 
			{
				if ($_FILES["file"]["error"] > 0)
				{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
				}
				else
				{
					if (file_exists( base_url().'files/auctions/' . $_FILES["file"]["name"]))
					{
						echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
					}
					else
					{
						$sourcePath = $_FILES['file']['tmp_name'];
						$targetPath =  "./files/auctions/".$_FILES['file']['name'];
						move_uploaded_file($sourcePath,$targetPath);

						$id=$this->session->userdata('id');
						// $daterange = $this->input->post('daterange');
						// $dates = explode("-",$daterange);
						// 	$dates[0] =date("Y-m-d H:i:s", strtotime($dates[0]));
						// $dates[1] = date("Y-m-d H:i:s", strtotime($dates[1]));


						$data=array
						(
							'auction_by'=>$id,
							'auction_title'=>$this->input->post('title'),
							'auction_st_time'=>$this->input->post('daterange'),
							'auction_ed_time'=>$this->input->post('daterange1'),
							'auction_image'=>$targetPath,
							'auction_status'=>'1'
						);

						$auction['data'] = $this->sellermodel->uploadauction($data);

						echo json_encode($auction['data']);
					}
				}
			}
			else
			{
				//echo json_encode($auction['data']);
     			$id=$this->session->userdata('id');
				$data=array
				(
					'auction_by'=>$id,
					'auction_title'=>$this->input->post('title'),
					'auction_st_time'=>$this->input->post('daterange'),
					'auction_ed_time'=>$this->input->post('daterange1'),
					'auction_image'=>'1',
					'auction_status'=>'1'
				);

				$auction['data'] = $this->sellermodel->uploadauction($data);

				echo json_encode($auction['data']);
			}
		}
	}

	public function addaucitem()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$productdata['product']=$this->sellermodel->productdetail($this->input->post('proid'));
			if ($productdata['product'][0]['auction_status']=='0')
			{
				$data1=array
				(
				'auction_id'=> $this->input->post('aucid'),
				'product_id'=> $this->input->post('proid'),
				'strating_bid_price'=> $this->input->post('bid'),
				'bid_increment'=> $this->input->post('inc'),
				'reserved_price'=> $this->input->post('rspc'),
				'auction_item_status'=> '1'
				);

				$data2=array
				(
				'auction_status'=>'1',
				);
				$orders=$this->sellermodel->changeactionstatus($this->input->post('proid'),$data2);

				$this->sellermodel->addaucitem($data1);
				$status ['status']= "success";
				echo json_encode("success" );
			}				
		}
	}

	public function updateaucitem()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$productdata['product']=$this->sellermodel->productdetail($this->input->post('proid'));
			if ($productdata['product'][0]['auction_status']=='1')
			{
				$data1=array
				(
				'strating_bid_price'=> $this->input->post('bid'),
				'bid_increment'=> $this->input->post('inc'),
				'reserved_price'=> $this->input->post('rspc')
				);

				$this->sellermodel->updateaucitem($this->input->post('proid'),$this->input->post('aucid'),$data1);
				$status ['status']= "success";
				echo json_encode( $status);
			}				
		}
	}

	public function deleteaucitem()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$productdata['product']=$this->sellermodel->productdetail($this->input->post('proid'));
			if ($productdata['product'][0]['auction_status']=='1')
			{
				$aucid = $this->input->post('aucid');
				$proid = $this->input->post('proid');

				$data2=array
				(
				'auction_status'=>'0',
				);
				$orders=$this->sellermodel->changeactionstatus($this->input->post('proid'),$data2);

				$this->sellermodel->deleteaucitem($aucid,$proid);
				$status ['status']= "success";
				echo json_encode("success" );
			}				
		}
	}

	public function uploadaucimage()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$aucid = $this->input->post('aucnum');
			$auctions['auctions']=$this->sellermodel->fetchaucitem($aucid);
			$path = 'files/'.$auctions['auctions'][0]['product_main_img'];

			$data=array
			(
				'auction_image'=> $path,
			);

			$auctions['updateaucimg']=$this->sellermodel->updateaucimg($aucid,$data);
			echo $auctions['updateaucimg'];
			//$this->pendingauctions();
		}
	}

	public function pendingauctions()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id=$this->session->userdata('id');
			$auctions['auctions']=$this->sellermodel->pendingauctions($id);
            $auctions['nm'] = "Pending";
			//print_r($auctions['auctions']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/auctions',$auctions);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function activeauctions()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id=$this->session->userdata('id');
			$auctions['auctions']=$this->sellermodel->activeauctions($id);
            $auctions['nm'] = "Approved";
			//print_r($auctions['auctions']); die();

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/auctions',$auctions);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function liveauctions()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id=$this->session->userdata('id');
			$auctions['auctions']=$this->sellermodel->liveauctions($id);
            $auctions['nm'] = "Live";
			//print_r($auctions['auctions']); die();

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/auctions',$auctions);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function closedauctions()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id=$this->session->userdata('id');
			$auctions['auctions']=$this->sellermodel->closedauctions($id);
            $auctions['nm'] = "Closed";
			//print_r($auctions['auctions']); die();

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/closedauction',$auctions);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function rejectedauctions()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id=$this->session->userdata('id');
			$auctions['auctions']=$this->sellermodel->rejectedauctions($id);
            $auctions['nm'] = "Rejected";
			//print_r($auctions['auctions']); die();

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/auctions',$auctions);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function auctiondetail()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$aid=$this->uri->segment(3);
			$auction['auction']=$this->sellermodel->activeauctiondetail($aid);
			$auction['products']=$this->sellermodel->activeauctionproducts($aid);
            //print_r($auction['products']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/auctiondetail',$auction);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function closedauctiondetail()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$aid=$this->uri->segment(3);
			$auction['auction']=$this->sellermodel->closedauctiondetail($aid);
			$auction['products']=$this->sellermodel->activeauctionproducts($aid);
            //print_r($auction); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/closedauctiondetail',$auction);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function forsaleproduct()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id=$this->session->userdata('id');
			$products['products']=$this->sellermodel->forsaleproduct($id);
            //print_r($products['products']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/forsaleproduct',$products);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function submitproductsellingprice()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id = $this->input->post('id');
			$value = $this->input->post('value');

			$data=array
			(
			'product_price' => $value,
			'product_type'	=> '1'
			);
			$orders=$this->sellermodel->submitproductprice($id,$data);

			echo $orders;
		}
	}

	public function submitproductonreqprice()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$id = $this->input->post('id');

			$data=array
			(
			'product_price' => 'On Request',
			'product_type'	=> '2'
			);
			$orders=$this->sellermodel->submitproductprice($id,$data);

			echo $orders;
		}
	}

	public function onrequestorders()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->onrequestorders($uid);
			$orders['head'] = "On Request";
			//print_r($orders['order']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/onrequest',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function submitonreqprice()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');
			$uname=$this->session->userdata('username');
			$id = $this->input->post('oid');
			$bid = $this->input->post('bid');
			$pid = $this->input->post('pid');
			$value = $this->input->post('oprice');

			$data=array
			(
			'order_amount' => $value,
			'order_status' => '4'
			);
			$orders=$this->sellermodel->submitonreqprice($id,$data);

			$buyerdta['buyer']=$this->sellermodel->buyerdata($bid);
			$productdata['product']=$this->sellermodel->productdetail($pid);

			$data1 = array(
			'notification_subject' => 'Seller quoted price of the product you had requested!',
			'notification_text' =>  
			'<p>
				Hello '.$buyerdta['buyer'][0]['buyer_name'].',<br> <br> 

				The seller has responded to your request for the Item you had selected with the quote given below –
				<br><br>
				<a href='.site_url('salecontroller/onrequestsaleproduct/').$pid.'><img src='.base_url().'files/thumbnail/'.$productdata['product'][0]['product_main_img'].' style=width:100;height:100px;>'.$productdata['product'][0]['product_name'].'</a><br>
				<b>Rs.'. $value .'</b><br>
				Please click the button given below to accept this price and the seller will get in touch with you to take it further.<br>
				<form role="form" id="form1" method="post" action='.site_url('sellercontroller/updateorderstatusbybuyer1').'>

				<button type="submit"  name="ID" value='.$id.' form="form1">Accept</button><br>
				</form>
				Thank You! We will inform the seller of your acceptance of the quote.<br>
				Warm Regards,<br>
				Team Surplex Plus
			</p>',
			'notification_status' => '1',
			'sender_id' => '1',
			'sender_type' => 'admin',
			'receiver_id' => $bid,
			'receiver_type' => 'buyer'
			);
			$this->sellermodel->newproductnotify($data1);

			$data2 = array(
			'user' => $buyerdta['buyer'][0]['buyer_name'],
			'pid' => $pid,
			'img' => $productdata['product'][0]['product_main_img'],
			'pname' => $productdata['product'][0]['product_name'],
			'oid' => $id,
			'price' =>$value
			);
			$this->load->view('notifi/to_buyer_withsp',$data2);
			die();

			// echo $orders;
		}
	}

	public function updateorderstatusbybuyer()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$oid = $this->input->post('oid');
			$bid = $this->input->post('bid');

			$data=array
			(
			'order_status' => '2'
			);
			$orders=$this->sellermodel->updateorderstatusbybuyer($oid,$bid,$data);

			echo $orders;
		}
	}

	public function productreport()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$productdata['product']=$this->sellermodel->seller_product($uid);
			//print_r($orders['order']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/productreport',$productdata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function commissionreport()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$commissiondata['commission']=$this->sellermodel->sellercommission($uid);
			//print_r($commissiondata); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/commissionreport',$commissiondata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function updateorderstatusbybuyer1()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			// print_r($_POST);
			// die();
			$oid = $this->input->post('ID');
			$order['order']=$this->sellermodel->orderdetail1($oid);
			// print_r($order);
			// die();
			$bid=$order['order'][0]['buyer_id'];
			$data=array
			(
			'order_status' => '1'
			);
			$orders=$this->sellermodel->updateorderstatusbybuyer($oid,$bid,$data);

			$utype='buyer';
			$buyerdata['data']=$this->buyermodel->buyerprofile($bid);
	        $buyerdata['notifi']=$this->salemodel->notification($bid,$utype);
		    $buyerdata['notify']='<script> swal("Great!", "Your profile updated successfully!", "success");</script>';

			$this->load->view('header');
			$this->load->view('buyerprofile',$buyerdata);
			$this->load->view('footer');
		}
	}

	public function aucstatuschange()
	{
		$auction['auction']=$this->sellermodel->allauctiondetail();
		//print_r($auction['auction']);
		for ($i=0; $i <count($auction['auction']) ; $i++)
		{
			$A = $auction['auction'][$i]['auction_st_time'];
			$B = $auction['auction'][$i]['auction_ed_time'];
			$C = date("Y-m-d h:m:i");
			if (strtotime($C) >= strtotime($B))
			{
				// echo $C." <br>";
				$aid = $auction['auction'][$i]['auction_id'];
				//echo $aid."-----";
				$auction['products']=$this->sellermodel->liveauctionproducts($aid);
				//print_r($auction['products']);
				for ($j=0; $j <count(($auction['products'])) ; $j++)
				{
					$resp = $auction['products'][$j]['reserved_price'];
					$mbid = $auction['products'][$j]['maxbid'];
					$bcnt = $auction['products'][$j]['bidcount'];
					$pid  = $auction['products'][$j]['product_id'];
					$bid  = $auction['products'][$j]['buyer_id'];
					$sid  = $auction['products'][$j]['seller_id'];
				  $pname  = $auction['products'][$j]['product_name'];

					$data=array
					(
					'auction_status' => '4'
					);

					$data1 = array(
						'product_id' => $pid,
						'product_name' => $pname,
						'order_amount' => $mbid,
						'seller_id' => $sid,
						'buyer_id' => $bid,
						'order_status' => '1'
					);

					$data2 = array(
						'product_type' => "",
						'product_price' => "no",
						'action_status' => "",
						'auction_status' => "0"
					);

					if ($resp <= $mbid )
					{
						$this->sellermodel->addorder($data1);
						$this->sellermodel->aucstatuschange($aid,$data);
						$this->sellermodel->productdetailchange($pid,$data2);
					}
					else
					{
						$this->sellermodel->aucstatuschange($aid,$data);
						$this->sellermodel->productdetailchange($pid,$data2);
					}
				}
			}
		}
	}

}