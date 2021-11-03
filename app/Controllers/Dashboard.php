<?php namespace App\Controllers;
use CodeIgniter\Controller;
//use App\Models\DashboardModel;


class Dashboard extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()
	{   		
		
		$data['body'] = 'dashboard/index';
		echo view('common/layout',$data);
	}

}

