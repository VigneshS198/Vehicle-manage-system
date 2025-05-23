<?php
namespace App\Controllers;
use App\Models\VehicleModel;
use CodeIgniter\Controller;
use App\Controllers\Services;

class VehiclesController extends BaseController {

    public function index() {

        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('view_vehicle')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view vehicles.');
        }

        return view('vehicles/index', ['section' => 'vehicles/index']);
    }
    
    public function checkin_list()
    {
        $model = new vehicleModel();
        $vehicles = $model->getAll();

        $data = [];

        foreach ($vehicles as $v) {
            $data[] = [
                'id'      => $v['id'],
                'vehicle_name'      => $v['vehicle_name'],
                'vehicle_photo_url' => base_url('uploads/' . $v['vehicle_photo']),
                'dc_number'         => $v['dc_number'],
                'po_number'         => $v['po_number'],
                'datetime'          => $v['date_time'],
                'status'          => $v['status'],
            ];
        }

        return $this->response->setJSON([
            'status' => true,
            'data'   => $data
        ]);
    }

    public function create() {
       
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('add_vehicle')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view vehicles.');
        }

      
        return view('vehicles/create', ['section' => 'vehicles/create']);

    }

    public function checkin(){


        $file = $this->request->getFile('vehicle_photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newfileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/', $newfileName);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid photo']);
        }

        $data = [
            'vehicle_name' => $this->request->getPost('vehicle_name'),
            'vehicle_photo' => $newfileName,
            'dc_number'     => $this->request->getPost('dc_number'),
            'po_number'     => $this->request->getPost('po_number'),
            'date_time'      => $this->request->getPost('datetime'),
            'status'      => 'checkin',
            'updated_at'      => date('Y-m-d H:i:s'),
            'created_by'      => '1'
        ];
        $model = new VehicleModel();

        if ($model->saveVehicleData($data)) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Vehicle Check-In Saved Successfully!'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to Save Vehicle Check-In!'
            ]);
        }
    }
    public function changeStatus($id)
    {

        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('mark_checked_out')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view vehicles.');
        }
        $vehicleModel = new VehicleModel();

        $vehicle = $vehicleModel->find($id);

        if (!$vehicle) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Vehicle not found']);
        }

        $newStatus = ($vehicle['status'] === 'checkin') ? 'checkout' : 'checkin';

        $vehicleModel->updatestatus($id, ['status' => $newStatus]);

        return $this->response->setStatusCode(200)->setJSON([
            'message' => 'Status updated',
            'newStatus' => $newStatus
        ]);
    }
}
