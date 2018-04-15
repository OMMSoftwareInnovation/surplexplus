<?php 

class Auctionmodel extends CI_Model
{

	public function __construct() 
	{
		parent::__construct(); 
		$this->load->database();
	}
    
    public function all()
    {
        return $this->db->get("auction_cat")
                    ->result_array();
    }

    public function liveauctions()
    {
        $this->db->select("surplex_auction.auction_st_time AS st,surplex_auction.auction_ed_time AS ed,GROUP_CONCAT(auction_id separator ',') AS id");
        $this->db->from('surplex_auction');     
        $this->db->where('surplex_auction.auction_status','3');
    /*    $this->db->where('DATE(surplex_auction.auction_st_time) BETWEEN DATE_SUB(NOW(), INTERVAL 10 DAY) AND DATE_SUB(NOW(), INTERVAL -10 DAY)');
        $this->db->where('(DATE_SUB(NOW(), INTERVAL -15 DAY) BETWEEN  DATE(surplex_auction.auction_st_time) AND 
        DATE(surplex_auction.auction_ed_time))  OR (NOW() BETWEEN  DATE(surplex_auction.auction_st_time) AND DATE(surplex_auction.auction_ed_time))');*/
        $this->db->GROUP_BY('DATE(surplex_auction.auction_ed_time)');
        $query = $this->db->get();
        return $query->result_array();

        // $sql = "SELECT *,count(*) as cnt FROM surplex_auction WHERE auction_status ='3'  GROUP BY DATE(auction_st_time) ";$query= $this->db->query($sql);
        // return $query->result_array();
        // $this->db->where(' TIME(surplex_auction.auction_ed_time) < NOW()  ');
        // $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');        
        // $this->db->order_by('DATE(surplex_auction.auction_st_time)');
    }

    public function closedauctions()
    {
        $this->db->select("surplex_auction.auction_st_time AS st,surplex_auction.auction_ed_time AS ed,GROUP_CONCAT(auction_id separator ',') AS id");
        $this->db->from('surplex_auction');     
        $this->db->where('surplex_auction.auction_status','4');
    /*    $this->db->where('DATE(surplex_auction.auction_st_time) BETWEEN DATE_SUB(NOW(), INTERVAL 10 DAY) AND DATE_SUB(NOW(), INTERVAL -10 DAY)');
        $this->db->where('(DATE_SUB(NOW(), INTERVAL -15 DAY) BETWEEN  DATE(surplex_auction.auction_st_time) AND 
        DATE(surplex_auction.auction_ed_time))  OR (NOW() BETWEEN  DATE(surplex_auction.auction_st_time) AND DATE(surplex_auction.auction_ed_time))');*/
        $this->db->GROUP_BY('DATE(surplex_auction.auction_ed_time)');
        $query = $this->db->get();
        return $query->result_array();
        // $sql = "SELECT *,count(*) as cnt FROM surplex_auction WHERE auction_status ='3'  GROUP BY DATE(auction_st_time) ";$query= $this->db->query($sql);
        // return $query->result_array();
        // $this->db->where(' TIME(surplex_auction.auction_ed_time) < NOW()  ');
        // $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');        
        // $this->db->order_by('DATE(surplex_auction.auction_st_time)');
    }

    public function auctionbycategory()
    {
        $this->db->select(
            'surplex_auction.auction_id,surplex_auction.auction_title,surplex_auction.auction_st_time,surplex_auction.auction_ed_time,
            surplex_auction_item.auction_item_id,surplex_auction_item.strating_bid_price,surplex_auction_item.bid_increment,surplex_auction_item.reserved_price,surplex_auction_item.auction_item_status,
            products.product_name,products.product_main_img,products.product_imgs,
            ,count(surplex_auction_bid.auction_bid_id) as bidcount,MAX(surplex_auction_bid.current_bid_price) as maxbid');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_status','3');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id','LEFT');
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $this->db->join('surplex_auction_bid', 'surplex_auction_bid.auction_item_id = surplex_auction_item.auction_item_id','LEFT');
        $this->db->order_by('surplex_auction_bid.auction_bid_id','desc');
        $this->db->GROUP_BY('surplex_auction_item.auction_item_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function auctionbycat($id)
    {
        $this->db->select(
            'surplex_auction.auction_id,surplex_auction.auction_title,surplex_auction.auction_st_time,surplex_auction.auction_ed_time,
            surplex_auction_item.auction_item_id,surplex_auction_item.strating_bid_price,surplex_auction_item.bid_increment,surplex_auction_item.reserved_price,surplex_auction_item.auction_item_status,
            products.product_name,products.product_main_img,products.product_imgs,
            ,count(surplex_auction_bid.auction_bid_id) as bidcount,MAX(surplex_auction_bid.current_bid_price) as maxbid');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_status','3');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id','LEFT');
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $this->db->where('products.product_subcategory_id',$id);
        $this->db->join('surplex_auction_bid', 'surplex_auction_bid.auction_item_id = surplex_auction_item.auction_item_id','LEFT');
        $this->db->order_by('surplex_auction_bid.auction_bid_id','desc');
        $this->db->GROUP_BY('surplex_auction_item.auction_item_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function auctiondata($id)
    {
        $this->db->select('surplex_auction.*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_id',$id);
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function aucitem($aid)
    {
        $this->db->select('surplex_auction_item.*,products.product_imgs,products.product_name,products.product_main_img,count(auction_bid_id) as bidcount,MAX(current_bid_price) as maxbid');
        $this->db->from('surplex_auction_item');
        $this->db->where('surplex_auction_item.auction_id',$aid);
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $this->db->join('surplex_auction_bid', 'surplex_auction_bid.auction_item_id = surplex_auction_item.auction_item_id','LEFT');
        $this->db->order_by('surplex_auction_bid.auction_bid_id','desc');
        $this->db->GROUP_BY('surplex_auction_item.auction_item_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getaucbyid($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_auction');
        $this->db->where('auction_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function aucitemdetail($pid)
    {
        $this->db->select('*,surplex_auction_item.auction_item_id');
        $this->db->from('surplex_auction_item');
        $this->db->where('surplex_auction_item.auction_item_id',$pid);
        $this->db->join('surplex_auction', 'surplex_auction.auction_id = surplex_auction_item.auction_id');
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function addbid($data)
    {
        $this->db->insert('surplex_auction_bid', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function biddingdetail($pid,$aid)
    {
        $this->db->select('*,count(auction_bid_id) as bidcount,MAX(current_bid_price) as maxbid');
        $this->db->from('surplex_auction_bid');
        $this->db->where('auction_item_id',$pid);
        $this->db->where('auction_id',$aid);
        $this->db->order_by('auction_bid_id','desc');
        $this->db->GROUP_BY('auction_item_id');
          $this->db->limit(1);
          $query = $this->db->get();
        return $query->result_array();
    }

}