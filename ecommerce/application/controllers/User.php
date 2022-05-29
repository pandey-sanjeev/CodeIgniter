<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
		$this->load->library('session');
		$this->load->model('User_model');

    }
    public function index()
	{
		if($this->session->userdata('userLoggedIn') == 1)
        {
			redirect('user/userdashboard');
		}else
        {
			$this->load->view('user/userindex');	
		}
	}
    public function signupuserform()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
			redirect('user/userdashboard');
		}else
        {
			$this->load->view('user/signupuserform');	
		}
    }
    public function usersignup()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
			redirect('user/userdashboard');
		}else
        {
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
                'active'=>1,
                'created_date'=>date('Y-m-d H:i:s'),
            );
            $userid=$this->User_model->usersignup($dataArray);
            if ($userid)
            {
                $this->session->set_flashdata('Message','You have sucessfully sign up. Please, log in');
                redirect('user/index');
            }else
            {
                $this->session->set_flashdata('Message','error ! Please, Sign up again !');
                redirect('user/index');
            }
        }  
    }
    public function userlogin()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
			redirect('user/userdashboard');
		}else
        {
			$this->load->view('user/userlogin');	
		}
	}
    public function checkuser()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
			redirect('user/userdashboard');
		}else
        {
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $data=$this->User_model->checkuser($email,$password); 
            if(count($data) > 0)
            {
                $this->session->set_userdata('userLoggedIn',1);
                $this->session->set_userdata('userData',$data);
                redirect('user/userdashboard');
            }else
            {
                $this->session->set_flashdata('Message','error ! Please, enter valid details again !');
                redirect('user/userlogin');
            }		
        }
    }
    public function userdashboard()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
		$user_info=$this->session->userdata('userData')[0];
        $allproduct=$this->User_model->allproduct();
        $data['products']=$allproduct;
        $this->load->view("user/userdashboard",$data);
        }else
        {
            redirect('user/index');
        }
    }
    public function userlogout()
	{
		$this->session->sess_destroy();
		redirect('user/index');
	}
    public function userprofile()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
            $user_info=$this->session->userdata('userData')[0];
            $userid=$user_info['userid'];
            $data['userdata']=$this->User_model->userInformation($userid)[0];
            $this->load->view("user/userprofile",$data);
		}else
        {
            redirect('user/index');
		}
    }
    public function userupdate()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
            $name=$this->input->post('name');
            $fathername=$this->input->post('fathername');
            $dob=$this->input->post('dob');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $address=$this->input->post('address');
            $userid=$this->input->post('userid');
            $dataArray = array(
                'name' =>$name ,
                'fathername'=>$fathername, 
                'dob'=>$dob, 
                'email' =>$email ,
                'password'=>$password,
                'address'=>$address,
                'userid'=>$userid,
            );
            $updateid=$this->User_model->userupdate($dataArray);
            if ($updateid)
            {
                $this->session->set_flashdata('Message','You have sucessfully updated your Profile.');
                redirect('user/userprofile');
            }else
            {
                $this->session->set_flashdata('Message','error ! Please, try again !');
                redirect('user/userprofile');
            }  
		}else
        {
            redirect('user/index');
		}
    }
    public function insertcart()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
            $user_info=$this->session->userdata('userData')[0];
            $productid = $this->uri->segment(3);
            $userid=$user_info['userid'];

            $dataArray = array(
				'productid'=>$productid,
                'userid'=>$userid,
                'is_deleted'=>1
            );
            $orderid=$this->User_model->orderproduct($dataArray);
            if ($orderid)
            {
                $this->session->set_flashdata('Message','You have sucessfully ordered ');
                redirect('user/userdashboard');
            }else
            {
                $this->session->set_flashdata('Message','error ! product not ordered !');
                redirect('user/userdashboard');
            } 
		}else
        {
            redirect('user/index');
		}
    }
    public function orderlist()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
            $user_info=$this->session->userdata('userData')[0];
            $userid=$user_info['userid'];
            $orderproduct=$this->User_model->orderInformation($userid);
            $data['orderproducts']=$orderproduct;
            $this->load->view("user/userorder",$data);
		}else
        {
            redirect('user/index');
		}
    }
    public function removeorder()
    {
        if($this->session->userdata('userLoggedIn') == 1)
        {
            $user_info=$this->session->userdata('userData')[0];
            $productid = $this->uri->segment(3);
            $userid=$user_info['userid'];
            $orderdetail=$this->User_model->orderdetail($productid,$userid);
            $orderid=$orderdetail[0]['orderid'];
            // print_r($orderdetail); exit;
			if ($orderid)
            {
                $dataArray = array(
				'orderid'=>$orderid,
				'is_deleted' =>0,
				);
                // print_r($dataArray); exit;
				$lastupdate=$this->User_model->deleteorder($dataArray);
				if ($lastupdate)
                {
					$this->session->set_flashdata('Message', 'Order Cancel successfully !');
					redirect('user/orderlist');
				}else
                {
                    $this->session->set_flashdata('Message', 'Error ! Order Not Cancel !');
					redirect('user/orderlist');
				}
			}
            
		}else
        {
            redirect('user/index');
		}
    }
}