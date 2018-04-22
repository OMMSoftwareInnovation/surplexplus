<?php 

class Sellermodel extends CI_Model
{

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

	function seller_data_insert($data)
	{
		$this->db->insert('surplex_seller', $data);
	}

    public function sellerusrchk($usr) 
    {
        $qry = 'SELECT count(*) as cnt from surplex_seller where seller_username= ? ';
        $res = $this->db->query($qry,array( $usr ))->result();
        if ($res[0]->cnt > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function selleremailchk($usr) 
    {
        $qry = 'SELECT count(*) as cnt from surplex_seller where seller_email= ? ';
        $res = $this->db->query($qry,array( $usr ))->result();
        if ($res[0]->cnt > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

	public function seller_login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('surplex_seller');
		$this->db->where("seller_username",$username);
        $this->db->where("seller_password",$password);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return "false";
		}
	}

    public function sellerprofile($uid)
    {
        $this->db->select('*');
        $this->db->from('surplex_seller');
        $this->db->where('seller_id',$uid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcomm($uid)
    {
        $this->db->select('commission_amount');
        $this->db->from('surplex_seller');
        $this->db->where('seller_id',$uid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function seller_checkforgotpass($email,$mobile)
    {
        $this->db->select('*');
        $this->db->from('surplex_seller');
        $this->db->where("seller_email",$email);
        $this->db->where("seller_mobile",$mobile);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return "false";
        }
    }

    public function seller_updatepassword($id,$password)
    {
        $this->db->where('seller_id',$id);
        $data= array('seller_password' =>$password);
        $query=$this->db->update('surplex_seller',$data);
        return $query;
    }

    public function seller_profileupdate($id,$data)
    {
        $this->db->where('seller_id',$id);
        $query=$this->db->update('surplex_seller',$data);
        return $query;
    }

    public function addproduct($data)
    {
        $this->db->insert('products',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;  
    }

    public function seller_product($uid)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('seller_id',$uid);
        $this->db->order_by('action_status','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function neworders($uid)
    {
        $this->db->select('surplex_order.*,products.product_main_img,count(order_id) as total,MAX(surplex_order.order_amount) as max');
        $this->db->from('surplex_order');
        $this->db->where('surplex_order.seller_id',$uid);
        $this->db->where('order_status','1');
        $this->db->GROUP_BY('surplex_order.product_id');
        $this->db->join('products', 'products.product_id = surplex_order.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function onrequestorders($uid)
    {
        $this->db->select('surplex_order.*,products.product_main_img');
        $this->db->from('surplex_order');
        $this->db->where('surplex_order.seller_id',$uid);
        $where = '(order_status="3" or order_status = "4")';
        $this->db->where($where);
        $this->db->join('products', 'products.product_id = surplex_order.product_id');
        $this->db->order_by('order_amount','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function approvedorders($uid)
    {
        $this->db->select('surplex_order.*,products.product_main_img,count(order_id) as total,MAX(surplex_order.order_amount) as max');
        $this->db->from('surplex_order');
        $this->db->where('surplex_order.seller_id',$uid);
        $this->db->where('order_status','2');
        $this->db->GROUP_BY('surplex_order.product_id');
        $this->db->join('products', 'products.product_id = surplex_order.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cancelledorders($uid)
    {
        $this->db->select('surplex_order.*,products.product_main_img,count(order_id) as total,MAX(surplex_order.order_amount) as max');
        $this->db->from('surplex_order');
        $this->db->where('surplex_order.seller_id',$uid);
        $this->db->where('order_status','3');
        $this->db->GROUP_BY('surplex_order.product_id');
        $this->db->join('products', 'products.product_id = surplex_order.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function profile($uid)
    {
        $this->db->select('*');
        $this->db->from('surplex_seller');
        $this->db->where('seller_id',$uid);
        $query = $this->db->get();
        return $query->result_array();
    }

    function upload_product($data)
    {
        $this->db->insert('products', $data);
    }

    public function category()
    {
        $this->db->select('*');
        $this->db->from('menus');
        $this->db->where('parent',NULL);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function subcategory($id)
    {
        $this->db->select('*');
        $this->db->from('menus');
        $this->db->where('parent',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function deleteFile($iname)
    {
        $this->db->where('file_name', $iname);
        $this->db->delete('img');
        return "true";
    }

    public function fetch_notification($id,$type)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $this->db->where('notification_status',"1");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_notification($nid,$id,$type)
    {
        $this->db->where('notification_id',$nid);
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $data= array('notification_status' =>"2");
        $query=$this->db->update('notification',$data);
        return $query;
    }

    public function notification_view($id,$type)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $this->db->order_by('notification_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function read_notification($nid,$id,$type)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('notification_id',$nid);
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $query = $this->db->get();
        return $query->result_array();
    }

    function newproductnotify($data1)
    {
        $this->db->insert('notification', $data1);
    }

    public function productdetail($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function seller($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_seller');
        $this->db->where('seller_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function category1($cid)
    {
        $this->db->select('name');
        $this->db->from('menus');
        $this->db->where('id',$cid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function subcategory1($sid)
    {
        $this->db->select('name');
        $this->db->from('menus');
        $this->db->where('id',$sid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function orderdetail($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_order');
        $this->db->where('product_id',$id);
        $this->db->order_by('order_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function orderdetail1($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_order');
        $this->db->where('order_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function buyerdetail($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_buyer');
        $this->db->where('buyer_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function totalorder($id,$st)
    {
        $this->db->select('count(*) as total,surplex_seller.package_id');
        $this->db->from('surplex_order');
        $this->db->where('surplex_order.seller_id',$id);
        $this->db->where('order_status '.$st);
        $this->db->join('surplex_seller', 'surplex_seller.seller_id = surplex_order.seller_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function packagevalue($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_package');
        $this->db->where('package_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateorderstatus($id,$data)
    {
        $this->db->where('order_id',$id);
        $query=$this->db->update('surplex_order',$data);
        return $query;
    }

    public function buyerdata($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_buyer');
        $this->db->where('buyer_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function changeactionstatus($id,$data)
    {
        $this->db->where('product_id',$id);
        $query=$this->db->update('products',$data);
        return $query;
    }

    public function productselection($uid)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('seller_id',$uid);
        $this->db->where('product_status','2');
        $this->db->where('auction_status','0');
        $where = '(action_status="2" or action_status = "3")';
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    function uploadauction($data)
    {
        $this->db->insert('surplex_auction', $data);
        $id = $this->db->insert_id();
        $q = $this->db->get_where('surplex_auction', array('auction_id' => $id));
        return $q->row();
    }

    function addaucitem($data)
    {
        $this->db->insert('surplex_auction_item', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function updateaucitem($pid,$aid,$data)
    {
        $this->db->where('auction_id',$aid);
        $this->db->where('product_id',$pid);
        $query=$this->db->update('surplex_auction_item',$data);
        return $query;
    }

    function deleteaucitem($aid,$pid)
    {
        $this->db->where('auction_id',$aid);
        $this->db->where('product_id',$pid);
        $this->db->delete('surplex_auction_item');
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function fetchaucitem($aid)
    {
        $this->db->select('products.product_main_img');
        $this->db->from('surplex_auction_item');
        $this->db->where('auction_id',$aid);
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pendingauctions($id)
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_by',$id);
        $this->db->where('surplex_auction.auction_status','1');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function activeauctions($id)
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_by',$id);
        $this->db->where('surplex_auction.auction_status','2');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function liveauctions($id)
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_by',$id);
        $this->db->where('surplex_auction.auction_status','3');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_ed_time','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function closedauctions($id)
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_by',$id);
        $this->db->where('surplex_auction.auction_status','4');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function rejectedauctions($id)
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_by',$id);
        $this->db->where('surplex_auction.auction_status','3');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function allauctiondetail()
    {
        $this->db->select('*');
        $this->db->from('surplex_auction');
        $this->db->where('auction_status','3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function activeauctiondetail($aid)
    {
        $this->db->select('*');
        $this->db->from('surplex_auction');
        $this->db->where('auction_id',$aid);
        $this->db->order_by('auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function closedauctiondetail($aid)
    {
        $this->db->select('*');
        $this->db->from('surplex_auction');
        $this->db->where('auction_id',$aid);
        $this->db->where('auction_status','4');
        $this->db->order_by('auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function activeauctionproducts($aid)
    {
        $this->db->select('surplex_auction_item.reserved_price,surplex_auction_item.strating_bid_price,surplex_auction_item.bid_increment,count(surplex_auction_bid.auction_bid_id) as bidcount,MAX(surplex_auction_bid.current_bid_price) as maxbid,products.product_main_img,products.product_name,products.product_id');
        $this->db->from('surplex_auction_item');
        $this->db->where('surplex_auction_item.auction_id',$aid);
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $this->db->join('surplex_auction_bid', 'surplex_auction_bid.auction_item_id = surplex_auction_item.auction_item_id','LEFT');
        $this->db->order_by('surplex_auction_bid.auction_bid_id','desc');
        $this->db->GROUP_BY('surplex_auction_item.auction_item_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function liveauctionproducts($aid)
    {
        $this->db->select('surplex_auction_item.reserved_price,surplex_auction_item.strating_bid_price,surplex_auction_item.bid_increment,count(surplex_auction_bid.auction_bid_id) as bidcount,MAX(surplex_auction_bid.current_bid_price) as maxbid,surplex_auction_bid.buyer_id,products.product_main_img,products.product_name,products.product_id,products.seller_id');
        $this->db->from('surplex_auction_item');
        $this->db->where('surplex_auction_item.auction_id',$aid);
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $this->db->join('surplex_auction_bid', 'surplex_auction_bid.auction_item_id = surplex_auction_item.auction_item_id','LEFT');
        $this->db->order_by('surplex_auction_bid.auction_bid_id','desc');
        $this->db->GROUP_BY('surplex_auction_item.auction_item_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function forsaleproduct($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('seller_id',$id);
        $this->db->where('product_status','2');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->order_by('product_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function submitproductprice($id,$data)
    {
        $this->db->where('product_id',$id);
        $query=$this->db->update('products',$data);
        return $query;
    }

    public function submitonreqprice($id,$data)
    {
        $this->db->where('order_id',$id);
        $query=$this->db->update('surplex_order',$data);
        return $query;
    }

    public function updateorderstatusbybuyer($oid,$bid,$data)
    {
        $this->db->where('order_id',$oid);
        $this->db->where('buyer_id',$bid);
        $query=$this->db->update('surplex_order',$data);
        return $query;
    }

    public function productorders($pid)
    {
        $this->db->select('surplex_order.*');
        $this->db->from('surplex_order');
        $this->db->where('product_id',$pid);
        $this->db->order_by('order_id','desc');        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function highestprice($pid)
    {
        $this->db->select('order_id,MAX(surplex_order.order_amount) as max');
        $this->db->from('surplex_order');
        $this->db->where('product_id',$pid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function commissiondetails($oid,$uid)
    {
        $this->db->order_by('commission_id','desc');
        $this->db->select('*');
        $this->db->from('surplex_commission');
        $this->db->where('product_id',$oid);
        $this->db->where('seller_id',$uid);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function addcommission($data)
    {
        $this->db->insert('surplex_commission', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function addtransaction($data)
    {
        $this->db->insert('surplex_transaction', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function sellercommission($uid)
    {
        $this->db->select('surplex_commission.*,MAX(commission_value) as max,products.product_name,products.product_main_img');
        $this->db->from('surplex_commission');
        $this->db->where('surplex_commission.seller_id',$uid);
        $this->db->GROUP_BY('surplex_commission.product_id');
        $this->db->join('products', 'products.product_id = surplex_commission.product_id');
        $this->db->order_by('commission_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateaucimg($aucid,$data)
    {
        $this->db->where('auction_id',$aucid);
        $query=$this->db->update('surplex_auction',$data);
        return $query;
    }

    public function aucstatuschange($id,$data)
    {
        $this->db->where('auction_id',$id);
        $query=$this->db->update('surplex_auction',$data);
        return $query;
    }

    function addorder($data)
    {
        $this->db->insert('surplex_order', $data);
    }

    public function productdetailchange($id,$data)
    {
        $this->db->where('product_id',$id);
        $query=$this->db->update('products',$data);
        return $query;
    }

     public  function getCountries() {
        $this->db->select('id,name');
        $this->db->from('countries');
        $query= $this->db->get();
       return $query->result_array();
   }

  // Fetch all states list by country id
  public  function getStates() {
        $this->db->select('id,name,country_id');
       $this->db->from('states');
       //$this->db->where('country_id',$countryId);
       $query= $this->db->get();
       return $query->result_array();
   
   }

 // Fetch all cities list by state id
  public function getCities() {
       $this->db->select('id,name,state_id');
       $this->db->from('cities');
      // $this->db->where('state_id',$stateId);
       $query= $this->db->get();
       return $query->result_array();
      }


}