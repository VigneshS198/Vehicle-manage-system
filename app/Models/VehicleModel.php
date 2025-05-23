<?php

namespace App\Models;

use CodeIgniter\Model;

class vehicleModel extends Model
{
    protected $table = 'vehicle'; 
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'vehicle_name',
        'vehicle_photo',
        'dc_number',
        'po_number',
        'date_time',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true; 

     public function getAll()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }
     public function saveVehicleData($data)
    {
        return $this->save($data); // Insert or update data
    }
      public function findVehicle($id)
    {
        return $this->where('id', $id)->first();
    }

   public function updatestatus($id, $newStatus)
{
    return $this->update($id, ['status' => $newStatus]);
}
}

