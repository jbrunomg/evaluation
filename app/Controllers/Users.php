<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;


class Users extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()
	{   	

		$users_model    = new UsersModel();
		$data['result'] = $users_model->getData();	

		$data['body'] = 'users/list';
		echo view('common/layout',$data);
	}


	public function editUser($id){		

		$users_model    = new UsersModel();
		$data['result'] = $users_model->getData($id);	

		$data['body'] = 'users/edit';
		echo view('common/layout',$data);
		
	}

	public function editUserToDB($id){
		
		$rules = [
			'firstname'  => 'required|min_length[3]|max_length[50]',
			'email'      => 'required|min_length[6]|max_length[50]|valid_email',
			'password'   => 'required|min_length[6]|max_length[60]', 
		];


		$users_model = new UsersModel();

		if ($this->validate($rules)){			
			$data = array(

				'firstname' =>  $this->request->getVar('firstname'),
				'lastname'  =>  $this->request->getVar('lastname'),				
				'mobile'    =>  $this->request->getVar('mobile'),				
				'city'      =>  $this->request->getVar('city'),
				'state'     =>  $this->request->getVar('state'),
				'zip'       =>  $this->request->getVar('zip'),
				'email'     =>  $this->request->getVar('email'),
				'level'     =>  $this->request->getVar('level'),
				'gender'    =>  $this->request->getVar('gender'),
				'newsletter' => $this->request->getVar('newsletter')

			);

			if($this->request->getVar('password') != ''){
			$password = array('password' => md5($this->request->getVar('password')));

			$data = array_merge($data, $password);
			}
			
			//var_dump($data);die();

			$users_model->update_order($id, $data);
 			return redirect()->to(base_url('users'));
			
		}
		else{

			$this->editUser($id);	
					
		}

	}

	public function deleteUser($id = null){
        $users_model   = new UsersModel();
        $data['user']  = $users_model->where('idUsers', $id)->delete($id);
        $this->session->setFlashdata('messageRegisterOk',' Registered delete Successfull!' );
        return $this->response->redirect(site_url('users'));
    }  


    public function viewUser($id){		

		$users_model    = new UsersModel();
		$data['result'] = $users_model->getData($id);	

		$data['body'] = 'users/view';
		echo view('common/layout',$data);
		
	}







}