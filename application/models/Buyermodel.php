<?php 

class Buyermodel extends CI_Model
{

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

	function buyer_data_insert($data)
	{
		$this->db->insert('surplex_buyer', $data);
	}

    public function buyerusrchk($usr) 
    {
        $qry = 'SELECT count(*) as cnt from surplex_buyer where buyer_username= ? ';
        $res = $this->db->query($qry,array( $usr ))->result();
        if ($res[0]->cnt > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function buyeremailchk($usr) 
    {
        $qry = 'SELECT count(*) as cnt from surplex_buyer where buyer_email= ? ';
        $res = $this->db->query($qry,array( $usr ))->result();
        if ($res[0]->cnt > 0) {
            echo '1';
        } else {
            echo '0';
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

    public function buyerprofile($uid)
    {
        $this->db->select('*');
        $this->db->from('surplex_buyer');
        $this->db->where('buyer_id',$uid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function buyer_checkforgotpass($email,$mobile)
    {
        $this->db->select('*');
        $this->db->from('surplex_buyer');
        $this->db->where("buyer_email",$email);
        $this->db->where("buyer_mobile",$mobile);
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

    public function buyer_updatepassword($id,$password)
    {
        $this->db->where('buyer_id',$id);
        $data= array('buyer_password' =>$password);
        $query=$this->db->update('surplex_buyer',$data);
        return $query;
    }

    public function buyer_profileupdate($id,$data)
    {
        $this->db->where('buyer_id',$id);
        $query=$this->db->update('surplex_buyer',$data);
        return $query;
    }

}