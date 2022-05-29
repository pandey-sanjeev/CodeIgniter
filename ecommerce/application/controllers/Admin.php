<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
		$this->load->library('session');
		$this->load->model('Admin_model');
	}
    public function index()
	{
		if($this->session->userdata('adminLoggedIn') == 1)
        {
			redirect('admin/admindashboard');
		}else
        {
			$this->load->view('admin/adminlogin');	
		}
	} 
    public function checkadmin()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
			redirect('admin/dashboard');
		}else
        {
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $data=$this->Admin_model->checkadmin($email,$password); 
            if(count($data) > 0)
            {
                $this->session->set_userdata('adminLoggedIn',1);
                $this->session->set_userdata('adminData',$data);
                redirect('admin/admindashboard');
            }else
            {
                $this->session->set_flashdata('Message','error ! Please, enter valid details again !');
                redirect('admin/index');
            }
        }
    }
    public function admindashboard()
    {
		if($this->session->userdata('adminLoggedIn') == 1)
        {
		$admin_info=$this->session->userdata('adminData')[0];
        $allproduct=$this->Admin_model->allproduct();
        $data['products']=$allproduct;
        $this->load->view("admin/admindashboard",$data);
        }else
        {
            redirect('admin/index');
        }
    }
    
    public function adminprofile()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
		$admin_info=$this->session->userdata('adminData')[0];
        $this->load->view("admin/adminprofile");
        }else
        {
            redirect('admin/index');
        }  
    }
	public function adminlogout()
	{
		$this->session->sess_destroy();
		redirect('admin/index');
	}
    public function addproduct()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
		$admin_info=$this->session->userdata('adminData')[0];
        $this->load->view("admin/addproduct");
        }else
        {
            redirect('admin/index');
        } 
    }
    public function insertproduct()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
            $admin_info=$this->session->userdata('adminData')[0];
            $productname=$this->input->post('productname');
            $aboutproduct=$this->input->post('aboutproduct');
            $imagename=$_FILES['image']['name'];
			$tmpname=$_FILES['image']['tmp_name'];
			$imagepath="image/$imagename";
			move_uploaded_file($tmpname,"$imagepath");

            $dataArray = array(
				
				'productname' =>$productname,
                'aboutproduct'=>$aboutproduct,
                'image'=>$imagepath,
                'active'=>1,
				'adminid'=>$admin_info['adminid'],
				'created_date'=>date('Y-m-d H:i:s'),
				);
                $productId=$this->Admin_model->addproduct($dataArray);
                if ($productId)
                {
                    $this->session->set_flashdata('Message','New Product added ');
					redirect('admin/admindashboard');
                }else
                {
                    $this->session->set_flashdata('Message','error ! Product not added !');
					redirect('admin/admindashboard');
                }
        }else
        {
            redirect('admin/index');
        } 
    } 
    public function editproduct()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
		$admin_info=$this->session->userdata('adminData')[0];
        $productid = $this->uri->segment(3);
        $productdata=$this->Admin_model->getproduct($productid);
            // print_r($productdata);
			// exit;
        $data['productdata']=$productdata;
        $this->load->view("admin/editproduct" ,$data);
        }else
        {
            redirect('admin/index');
        } 
    }
    public function inserteditproduct()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
            $productname=$this->input->post('productname');
            $aboutproduct=$this->input->post('aboutproduct');
            $imagename=$_FILES['image']['name'];
			$tmpname=$_FILES['image']['tmp_name'];
			$imagepath="image/$imagename";
			$adminid = $this->input->post('adminid');
            $productid = $this->input->post('productid');

			if($imagename)
			{
			move_uploaded_file($tmpname,"$imagepath");
            $dataArray = array(
				'adminid'=>$adminid,
				'productname' =>$productname ,
				'aboutproduct'=>$aboutproduct, 
				'image'=>$imagepath,
                'productid'=>$productid,
				);
                // print_r($dataArray); exit;
                $lastupdate=$this->Admin_model->inserteditproduct($dataArray);
				if ($lastupdate)
                {
					$this->session->set_flashdata('Message', 'Product Updated successfully !');
					redirect('admin/admindashboard');
				}else
                {
                    $this->session->set_flashdata('Message', 'Error ! Product Not Updated !');
					redirect('admin/admindashboard');
				}
			}else
            {
                $dataArray = array(
                    'adminid'=>$adminid,
                    'productname' =>$productname ,
                    'aboutproduct'=>$aboutproduct,
                    'productid'=>$productid, 
                    );
                    // print_r($dataArray); exit;
                    $lastupdate=$this->Admin_model->inserteditproduct($dataArray);
                    if ($lastupdate)
                    {
                        $this->session->set_flashdata('Message', 'Product Updated successfully !');
                        redirect('admin/admindashboard');
                    }else
                    {
                        $this->session->set_flashdata('Message', 'Error ! Product Not Updated !');
                        redirect('admin/admindashboard');
                    }
            }
        }else
        {
			redirect('admin/index');
		}
	}  
    public function productdelete()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {				
			$productid = $this->uri->segment(3);
			if ($productid)
            {
				$dataArray = array(
				'productid'=>$productid,
				'active' =>0,
				);
				$lastupdate=$this->Admin_model->updateproduct($dataArray);
				if ($lastupdate)
                {
					$this->session->set_flashdata('Message', 'Product Deleted successfully !');
					redirect('admin/admindashboard');
				}else
                {
                    $this->session->set_flashdata('Message', 'Error ! Product Not Deleted !');
					redirect('admin/admindashboard');
				}
			}
		}else
        {
			redirect('admin/index');
		}
	} 
    public function adduser()
    {        
        if($this->session->userdata('adminLoggedIn') == 1)
        {
		$admin_info=$this->session->userdata('adminData')[0];
        $this->load->view("admin/adduser");
        }else
        {
            redirect('admin/index');
        } 
    }
    public function addnewuser()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
            $admin_info=$this->session->userdata('adminData')[0];
            $name=$this->input->post('name');
            $fathername=$this->input->post('fathername');
            $dob=$this->input->post('dob');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$address=$this->input->post('address');
            $dataArray = array(
				'name' =>$name ,
				'fathername'=>$fathername, 
				'dob'=>$dob, 
				'email' =>$email ,
				'password'=>$password,
				'address'=>$address,
				'adminid'=>$admin_info['adminid'],
                'active'=>1,
				'created_date'=>date('Y-m-d H:i:s'),
				);
                // print_r($dataArray); exit();
                $userid=$this->Admin_model->addnewuser($dataArray);
                if ($userid)
                {
                    $this->session->set_flashdata('Message','New User added ');
					redirect('admin/userlist');
                }else
                {
                    $this->session->set_flashdata('Message','error ! User not added !');
					redirect('admin/userlist');
                }
        }else
        {
            redirect('admin/index');
        } 
    } 
    public function userlist()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
		$admin_info=$this->session->userdata('adminData')[0];
        $alluser=$this->Admin_model->alluser();
        $data['users']=$alluser;
        // print_r($data['users']); exit;
        $this->load->view("admin/userlist",$data);
        }else
        {
            redirect('admin/index');
        } 
    } 
    public function userdelete()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {				
			$userid = $this->uri->segment(3);
			if ($userid)
            {
				$dataArray = array(
				'userid'=>$userid,
				'active' =>0,
				);
				$lastupdate=$this->Admin_model->updateuser($dataArray);
				if ($lastupdate)
                {
					$this->session->set_flashdata('Message', 'User Deleted successfully !');
					redirect('admin/userlist');
				}else
                {
                    $this->session->set_flashdata('Message', 'Error ! User Not Deleted !');
					redirect('admin/userlist');
				}
			}
		}else
        {
			redirect('admin/index');
		}
    }
    public function useredit()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
		$admin_info=$this->session->userdata('adminData')[0];
        $userid = $this->uri->segment(3);
        $userdata=$this->Admin_model->getuser($userid);
        $data['userdata']=$userdata;
        $this->load->view("admin/useredit",$data);
        }else
        {
            redirect('admin/index');
        } 
    }
    public function insertuseredit()
    {
        if($this->session->userdata('adminLoggedIn') == 1)
        {
        $admin_info=$this->session->userdata('adminData')[0];
        $name=$this->input->post('name');
        $fathername=$this->input->post('fathername');
        $dob=$this->input->post('dob');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $address=$this->input->post('address');
        $userid = $this->input->post('userid');

        $dataArray = array(
            'name' =>$name ,
            'fathername'=>$fathername, 
            'dob'=>$dob, 
            'email' =>$email ,
            'password'=>$password,
            'address'=>$address,
            'userid'=>$userid,
            'adminid'=>$admin_info['adminid'],
            'created_date'=>date('Y-m-d H:i:s'),
            );
            $lastupdate=$this->Admin_model->insertuseredit($dataArray);
            if ($lastupdate)
            {
                $this->session->set_flashdata('Message', 'User Updated successfully !');
                redirect('admin/userlist');
            }else
            {
                $this->session->set_flashdata('Message', 'Error ! User Not Updated !');
                redirect('admin/userlist');
            }
        }else
        {
            redirect('admin/index');
        } 
    }
}