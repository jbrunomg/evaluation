<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomersModel extends Model {

    protected $table = 'customers';
    protected $primaryKey = 'idCustomers';
    protected $allowedFields = ['firstname','lastname','mobile','city','state','zip','email','gender','dateRegistre'];

    public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['idCustomers' => $id])->first();
    }

    public function insert_data_login($data)
    {            
        return $this->insert($data);
    }

    public function update_order($id,$data)
    {
        return $this->update($id, $data);
    }


}

?>