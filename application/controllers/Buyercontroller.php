<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyercontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model('sellermodel');
	   $this->load->library('form_validation');
	}

}