<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;


class Home extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()
	{   
		return view('login');
	}


	public function registration()
	{		
		echo view ('formRegister');		
	}


	public function insertData(){


		$rules = [
			'fname'        => 'required|min_length[3]|max_length[50]',
			'email'        => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
			'userpassword' => 'required|min_length[6]|max_length[60]', 
		];

		// Codeigniter 3: $this->load->model("UsersModel");
		$users_model = new UsersModel();

		// Codeigniter 3: $this->load->library("session");
		// $session = \Config\Services::session();

		// codeignter 3 : $this->input->post("...");

		if ($this->validate($rules)){
			$data = array(

				'firstname'    => $this->request->getVar('fname'),
				'lastname'     => $this->request->getVar('lname'),
				'email'        => $this->request->getVar('email'),				
				'password'     => md5($this->request->getVar('userpassword')),
				'terms'        => ($this->request->getVar('terms') == 1) ? 1 : 0,
				'newsletter'   => ($this->request->getVar('newsletter') == 1) ? 1 : 0, 
				'dateRegistre' => date('Y-m-d H:i:s'),
				'level'	       => 'Active'

			);

			// var_dump($data);die();

			$users_model->insert_data_login($data);
			$this->session->setFlashdata('messageRegisterOk',' Registered Successfull. Please, login.' );
			return redirect()->to(base_url('home'));
			
		}
		else{

			$this->registration();	
					
		}
		
	}


	public function loginUser(){
		
		$rules = [
			'email'   => 'required|min_length[6]|max_length[50]|valid_email',
			'password'=> 'required|min_length[5]|max_length[60]', 
		];

		$users_model = new UsersModel();
	//	$session = \Config\Services::session();
		 
		if ($this->validate($rules)){
			$data = array(				

				'email' => $this->request->getVar('email'),

				'password' => $this->request->getVar('password')

			);

			
			
			if(!($userRow = $users_model->checkUserPassword($data))){				
				$this->session->setFlashdata('loginFail',' Incorrect username (your e-mail) or password.' );				
				return redirect()->to(base_url('home'));

			}else{				
				
				$data['idUsers']   = $userRow['idUsers'];
				$data['firstname'] = $userRow['firstname'];
				$data['lastname']  = $userRow['lastname'];
				$data['email']     = $userRow['email'];
								
				$this->session->set($data);

				// die(base_url('dashboard'));

				return redirect()->to(base_url('dashboard'));			
				
			}
			

		}
		else {
			return view('login');
			
		}

	
	} 



	public function logout(){
//		$session = \Config\Services::session();
		$data['firstname'] = "";
		$data['lastname'] = "";
		$data['email']="";
		$data['password']="";
		$this->session->set($data);
		$this->session->destroy();
		return redirect()->to(base_url('home'));
		

	}



	//--------------------------------------------------------------------

}
