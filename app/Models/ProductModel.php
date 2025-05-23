<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['purchase_order_id', 'product_name', 'product_code', 'quantity', 'price'];
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
	  public function getPurchaseOrderSummary($purchaseOrderId)
    {
        $builder = $this->builder();
        $builder->select('SUM(quantity) as total_quantity, SUM(price) as total_amount, SUM(quantity * price) as total_value');
        $builder->where('purchase_order_id', $purchaseOrderId); 
        $query = $builder->get();
        return $query->getRowArray(); 
    }
     
}

