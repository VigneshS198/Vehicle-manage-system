<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
     protected $table = 'purchase_order';
    protected $primaryKey = 'id';
    protected $allowedFields = ['vendor_name', 'vendor_company', 'address', 'mobile', 'created_by'];
    protected $useTimestamps = true;


     public function getAll()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }
	    public function saveOrder(array $data)
	{
	     $this->insert($data);  
	    return $this->getInsertID();
	}
     
}

