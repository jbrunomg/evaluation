<?php
namespace App\Models;
use CodeIgniter\Model;

class CustomersModel extends Model {

	protected $table = 'customers';
	protected $table_subo = 'subordinate';

	
	public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['idCustomers' => $id])->first();
    }


	public function insert_data($data, $table, $data2, $table2) {
		
		$this->db->transBegin();
		
		
		$this->db->table($table)->insert($data);
		
		$id = $this->db->insertID();
		

		foreach ($data2 as $value) {
							
			$data_info = array(
				'firstname' =>  $value['sub_firstname'],
				'lastname'  =>  $value['sub_lastname'],				
				'mobile'    =>  $value['sub_mobile'],
				'customers_id' => $id
			);	

			$this->db->table($table2)->insert($data_info);	

	    }

		
		if ($this->db->transStatus() === FALSE)	{
			$this->db->transRollback();
			
			return false;
		} else {
			$this->db->transCommit();
			
			return true;
		}
	}
	
	function update_user($account_id, $user_name, $info_id, $full_name) {
		$this->db->transStart();
		
		$data_account = array(
			'user_name' => $user_name
		);
		
		$this->db->table($this->table_cust)->where('account_id', $account_id)->update($data_account);
		
		$data_info = array(
			'full_name' => $full_name
		);
		
		$this->db->table($this->table_subo)->where('info_id', $info_id)->update($data_info);
		
		$this->db->transComplete();

		if ($this->db->transStatus() === FALSE) {
			return false;
		}
		
		return true;
	}
	
	function delete_user($account_id, $info_id) {
		$this->db->transStart();
		
		$this->db->table($this->table_subo)->where('info_id', $info_id)->delete();
		
		$this->db->table($this->table_cust)->where('account_id', $account_id)->delete();		
		
		$this->db->transComplete();

		if ($this->db->transStatus() === FALSE) {
			return false;
		}
		
		return true;
	}
	
}