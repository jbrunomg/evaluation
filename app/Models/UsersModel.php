<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model {

    protected $table = 'users';
    protected $primaryKey = 'idUsers';
    protected $allowedFields = ['firstname','lastname','mobile','city','state','zip','email','password','gender','dateRegistre','terms','newsletter','level'];
    

    public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['idUsers' => $id])->first();
    }

    public function insert_data_login($data)
    {            
        return $this->insert($data);
    }

    public function checkUserPassword($data){
        return $this->where(['email' => $data['email'], 'password' => md5($data['password'])])->first();
    }

    public function update_order($id,$data)
    {
        return $this->update($id, $data);
    }

    
}

?>