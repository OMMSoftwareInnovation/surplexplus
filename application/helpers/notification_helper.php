<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function notification($var = '')
    {
//        return $var;

         $ci=& get_instance();
        $ci->load->database(); 

        $sql = "select * from table"; 
  $ci->db->insert('notification', $var);
   /*     $query = $ci->db->query($sql);
        $row = $query->result();*/
    }   
}