<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{   
  public function __construct()
  {
    parent :: __construct();
    $this->load->database();
  }

  public function checkadmin($email,$password)
  {
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $this->db->where('active',1);
    $query=$this->db->get();
    return $query->result_array();
  }

  public function addproduct($data = array())
  {
    $insert=$this->db->insert('allproduct',$data);
    return $this->db->insert_id();
  }

  public function allproduct()
  {
    $this->db->select('*');
    $this->db->from("allproduct");
    $this->db->where('active',1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function updateproduct($data=array())
  {
    $this->db->where('productid',$data['productid']);
    $this->db->update("allproduct",$data);
    return true;
  }
  public function getproduct($productid)
  {
    $this->db->select('*');
    $this->db->from("allproduct");
    $this->db->where('productid',$productid);
    $this->db->where('active',1);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function inserteditproduct($data=array())
  {
    $this->db->where('productid',$data['productid']);
    $this->db->update("allproduct",$data);
    return true;
  }
  public function addnewuser($data = array())
  {
    $insert=$this->db->insert('user',$data);
    return $this->db->insert_id();
  }
  public function alluser()
  {
    $this->db->select('*');
    $this->db->from("user");
    $this->db->where('active',1);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function updateuser($data=array())
  {
    $this->db->where('userid',$data['userid']);
    $this->db->update("user",$data);
    return true;
  }
  public function getuser($userid)
  {
    $this->db->select('*');
    $this->db->from("user");
    $this->db->where('userid',$userid);
    $this->db->where('active',1);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function insertuseredit($data=array())
  {
    $this->db->where('userid',$data['userid']);
    $this->db->update("user",$data);
    return true;
  }
}