<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}

	public function index()
	{
		//$result['products']=$this->welcome_model->cart_data();
		$this->load->view('welcome_message');
	}
	function add()
	{
		$id = $this->uri->segment(3);
		//echo $id; exit;
		$this->db->select('*');
		$this->db->from('tbl_products');
		$this->db->where('id',$id);
		$query=$this->db->get();
		$row=$query->row();

		 $data = array(
	        'id'      => $id,
	        'qty'     => 1,
	        'price'   => $row->product_price,
	        'name'    => $row->product_name,
	        'options' => array('Size'=>$row->size,'Brand'=>$row->brand)
           );

$this->cart->insert($data);

redirect('welcome','refresh');
	}

	public function cart()
	{
		$this->load->view('cart');
	}

	

	public function register_action()
	{
		//print_r($_POST);
		//$name=$this->input->post('username');
		//echo $name;
		$this->form_validation->set_rules('username', 'Person Name', 'trim|required|regex_match[/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/]');
		$this->form_validation->set_rules('usermobile', 'Person Mobile', 'trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('useremail', 'Person Email', 'trim|required|valid_email|is_unique[users.user_email]');
		$this->form_validation->set_rules('useraddress','address','trim|required');
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			
			$para = array('name'=>$this->input->post('username'),
				'mobile'=>$this->input->post('usermobile'),
				'email'=>$this->input->post('useremail'),
				'address'=>$this->input->post('useraddress')
			);


			$this->welcome_model->insert_record($para,$this->cart->contents());

        }


		//redirect('welcome/cart','refresh');
    }


	
}
		

		/*if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}

		else
		{
			echo "Ok";exit;
			//unset($_POST['usercpassword']);
			//$_POST['userpassword'] = do_hash($_POST['userpassword']);
			print_r($_POST);

			
			if($this->welcome_model->insert_record($_POST))
			{
				echo "user added";
			}
			

		}

		if($this->form_validation->run())
		{
			$para = array
				('user_name'=>$this->input->post('username'),
				'user_mobile'=>$this->input->post('usermobile'),
				'user_email'=>$this->input->post('useremail'),
				'address'=>$this->input->post('address'));
			
			
			$response = $this->welcome_model->insert_record($para);
		}
		else
		{
			$response =validation_errors();
		}
		echo json_encode($response,TRUE);
	}*/


