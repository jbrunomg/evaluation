<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomersModel;
use App\Models\SubordinateModel;


class Customers extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()
	{   	

		$customers_model    = new CustomersModel();
		$data['result'] = $customers_model->getData();	

		$data['body'] = 'customers/list';
		echo view('common/layout',$data);
	}

	public function addCustomers(){		

		$data['body'] = 'customers/add';
		echo view('common/layout',$data);
		
	}

	public function addUserToDB(){
		
		$rules = [
			'firstname'  => 'required|min_length[3]|max_length[50]',
			'email'      => 'required|min_length[6]|max_length[50]|valid_email|is_unique[customers.email]',			
		];

		$customers_model = new CustomersModel();		

		if ($this->validate($rules)){			
			$data = array(

				'firstname' =>  $this->request->getVar('firstname'),
				'lastname'  =>  $this->request->getVar('lastname'),				
				'mobile'    =>  $this->request->getVar('mobile'),				
				'city'      =>  $this->request->getVar('city'),
				'state'     =>  $this->request->getVar('state'),
				'zip'       =>  $this->request->getVar('zip'),
				'email'     =>  $this->request->getVar('email'),			
				'gender'    =>  $this->request->getVar('gender')				

			);

			$cont = $this->request->getVar('qtdSubordinate');

			for ($i=1; $i <= $cont; $i++) { 

                $dados[$i]['sub_firstname']  = $this->request->getVar('sub_firstname'.$i);
                $dados[$i]['sub_lastname']   = $this->request->getVar('sub_lastname'.$i);
                $dados[$i]['sub_mobile']     = $this->request->getVar('sub_mobile'.$i);
                $dados[$i]['customers_id']   = '';                
			
			}

	
			$result = $customers_model->insert_data($data,'customers',$dados,'subordinate');

			if ($result) {
				$this->session->setFlashdata('messageRegisterOk',' Registered Successfull. Please, login.' );
				return redirect()->to(base_url('customers'));

			}else{
				
				$this->session->setFlashdata('messageRegisterOk',' Erro.' );	

			}			


						
		}
		else{

			$this->addCustomers();	
					
		}

	}

	public function editCustomer($id){		

		$customers_model    = new CustomersModel();
		$data['result'] = $customers_model->getData($id);	

		$data['body'] = 'customers/edit';
		echo view('common/layout',$data);
		
	}

	public function editCustomerToDB($id){
		
		$rules = [
			'firstname'  => 'required|min_length[3]|max_length[50]',
			'email'      => 'required|min_length[6]|max_length[50]|valid_email',
		];


		$customers_model = new CustomersModel();

		if ($this->validate($rules)){			
			$data = array(

				'firstname' =>  $this->request->getVar('firstname'),
				'lastname'  =>  $this->request->getVar('lastname'),				
				'mobile'    =>  $this->request->getVar('mobile'),				
				'city'      =>  $this->request->getVar('city'),
				'state'     =>  $this->request->getVar('state'),
				'zip'       =>  $this->request->getVar('zip'),
				'email'     =>  $this->request->getVar('email'),			
				'gender'    =>  $this->request->getVar('gender')

			);


			$customers_model->update_order($id, $data);
 			return redirect()->to(base_url('customers'));
			
		}
		else{

			$this->editCustomer($id);	
					
		}

	}

	public function deleteCustomer($id = null){
        $customers_model   = new CustomersModel();
        $data['user']  = $customers_model->where('idCustomers', $id)->delete($id);
        $this->session->setFlashdata('messageRegisterOk',' Registered delete Successfull!' );
        return $this->response->redirect(site_url('customers'));
    }  


    public function viewCustomer($id){		

		$customers_model    = new CustomersModel();
		$data['result'] = $customers_model->getData($id);	

		$data['body'] = 'customers/view';
		echo view('common/layout',$data);
		
	}







}