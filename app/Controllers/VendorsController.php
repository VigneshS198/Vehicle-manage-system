<?php
namespace App\Controllers;
use App\Models\VendorModel;
use CodeIgniter\Controller;
use App\Controllers\Services;

class VendorsController extends BaseController {

    public function index() {
        $model = new VendorModel();
        $data['Vendors'] = $model->findAll();
        return view('Vendors/index', $data);
    }

    public function create() {

        
        return view('vehicles/index', ['section' => 'vehicles/index']);
    }

    // public function edit($id) {
    //     $model = new VendorModel();
    //     if ($this->request->getMethod() === 'post') {
    //         $model->update($id, $this->request->getPost());
    //         return redirect()->to('/Vendors');
    //     }
    //     $data['Vendor'] = $model->find($id);
    //     return view('Vendors/edit', $data);
    // }
}
