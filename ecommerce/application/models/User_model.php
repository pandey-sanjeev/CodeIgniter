<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{   
  public function __construct()
  {
    parent :: __construct();
    $this->load->database();
  }

  public function usersignup($data = array())
  {
    $insert=$this->db->insert('user',$data);
    return $this->db->insert_id();
  }

  public function checkuser($email,$password)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $query=$this->db->get();
    return $query->result_array();
  }
  public function allproduct()
  {
    $this->db->select('*');
    $this->db->from("allproduct");
    $this->db->where('active',1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function userInformation($userid)
  {
    $this->db->select('*');
    $this->db->from("user");
    $this->db->where('userid',$userid);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function userupdate($data=array())
  {
    $this->db->where('userid',$data['userid']);
    $this->db->update("user",$data);
    return true;
  }
  public function orderproduct($data=array())
  {
    $insert=$this->db->insert('userorderproduct',$data);
    return $this->db->insert_id();
  }
  public function orderInformation($userid)
  {
    $this->db->select('allproduct.*,userorderproduct.productid');
    $this->db->from('allproduct,userorderproduct');
    $this->db->where('userorderproduct.productid=allproduct.productid');
    $this->db->where('userid',$userid);
    $this->db->where('is_deleted',1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function orderdetail($productid,$userid)
  {
    $this->db->select('*');
    $this->db->from("userorderproduct");
    $this->db->where('productid',$productid);
    $this->db->where('userid',$userid);
    $this->db->where('is_deleted',1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function deleteorder($data=array())
  {
    $this->db->where('orderid',$data['orderid']);
    $this->db->update("userorderproduct",$data);
    return true;
  }
}