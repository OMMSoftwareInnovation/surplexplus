<?php 

class Salemodel extends CI_Model
{

	public function __construct() 
	{
	    parent::__construct(); 
	    $this->load->database();
	}

    public function salecategory()
    {
        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function salesubcategory()
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $query = $this->db->get();
        return $query->result_array();
    }
    
	public function all()
	{
		return $this->db->get("menus")
					->result_array();
	}

    public function saleproduct($st,$ed)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_status','2');
        $this->db->limit($ed,$st);
        $this->db->order_by('product_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saleproduct1($st,$ed)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_status','2');
        $this->db->limit($ed,$st);
        $this->db->order_by('product_name','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saleproduct2($st,$ed)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_status','2');
        $this->db->limit($ed,$st);
        $this->db->order_by('product_name','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saleproduct3($st,$ed)
    {
        $this->db->select('*,cast(product_price AS decimal) AS product_price');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_status','2');
        $this->db->where('product_type','1');
        $this->db->order_by('product_price');
        $this->db->limit($ed,$st);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saleproduct4($st,$ed)
    {
        $this->db->select('*,cast(product_price AS decimal) AS product_price');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_status','2');
        $this->db->where('product_type','1');
        $this->db->order_by('product_price','desc');
        $this->db->limit($ed,$st);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saleproduct5($st,$ed)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_status','2');
        $this->db->where('product_type','2');
        $this->db->order_by('product_id','desc');
        $this->db->limit($ed,$st);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function productbycate($id,$st,$ed)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_subcategory_id',$id);
        $this->db->where('product_status','2');
        $this->db->limit($ed,$st);
        $this->db->order_by('product_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function productbycate1($id,$st,$ed)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_subcategory_id',$id);
        $this->db->where('product_status','2');
        $this->db->limit($ed,$st);
        $this->db->order_by('product_name','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function productbycate2($id,$st,$ed)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_subcategory_id',$id);
        $this->db->where('product_status','2');
        $this->db->limit($ed,$st);
        $this->db->order_by('product_name','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function productbycate3($id,$st,$ed)
    {
        $this->db->select('*,cast(product_price AS decimal) AS product_price');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_subcategory_id',$id);
        $this->db->where('product_status','2');
        $this->db->where('product_type','1');
        $this->db->order_by('product_price');
        $this->db->limit($ed,$st);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function productbycate4($id,$st,$ed)
    {
        $this->db->select('*,cast(product_price AS decimal) AS product_price');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_subcategory_id',$id);
        $this->db->where('product_status','2');
        $this->db->where('product_type','1');
        $this->db->order_by('product_price','desc');
        $this->db->limit($ed,$st);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function productbycate5($id,$st,$ed)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_subcategory_id',$id);
        $this->db->where('product_status','2');
        $this->db->where('product_type','2');
        $this->db->order_by('product_id','desc');
        $this->db->limit($ed,$st);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pricedsaleproduct($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();

    }


    public function product_manufacturer($id){
        $this->db->select('s.seller_name');
        $this->db->from('products as p');
        $this->db->join('surplex_seller as s','p.seller_id=s.seller_id');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();



        
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

    public function buyer_login($username,$password)
    {
        $this->db->select('*');
        $this->db->from('surplex_buyer');
        $this->db->where("buyer_username",$username);
        $this->db->where("buyer_password",$password);
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

    function addorder($data)
    {
        $this->db->insert('surplex_order', $data);
    }

    public function relatedproduct($cid)
    {
        $this->db->select('*');
        $this->db->from('products');
        $where = '(action_status="1" or action_status = "3")';
        $this->db->where($where);
        $this->db->where('product_price != "no"');
        $this->db->where('product_category_id',$cid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function orders($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_order');
        $this->db->where('buyer_id',$id);
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

    public function productdetail($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function notification($id,$type)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $this->db->order_by('notification_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function liveauctionproducts($aid)
    {
        $this->db->select('surplex_auction_item.reserved_price,surplex_auction_item.strating_bid_price,surplex_auction_item.bid_increment,count(surplex_auction_bid.auction_bid_id) as bidcount,MAX(surplex_auction_bid.current_bid_price) as maxbid,surplex_auction_bid.buyer_id,products.product_main_img,products.product_name,products.product_id,products.seller_id,products.product_imgs,surplex_auction_item.auction_item_id');
        $this->db->from('surplex_auction_item');
        $this->db->where('surplex_auction_item.auction_id',$aid);
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $this->db->join('surplex_auction_bid', 'surplex_auction_bid.auction_item_id = surplex_auction_item.auction_item_id','LEFT');
        $this->db->order_by('surplex_auction_bid.auction_bid_id','desc');
        $this->db->GROUP_BY('surplex_auction_item.auction_item_id');
        $query = $this->db->get();
        return $query->result_array();
    }

}