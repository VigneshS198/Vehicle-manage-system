<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\PurchaseModel;
use CodeIgniter\Controller;
use App\Controllers\Services;

class ProductController extends BaseController {

    public function index() {

        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('view_product')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view product.');
        }

        return view('product/index', ['section' => 'product/index']);
    }

    public function create() {

        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('add_product')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view product.');
        }

        return view('product/create', ['section' => 'product/create']);
    }

    public function save()
    {
        $purchaseModel = new PurchaseModel();

            $purchaseOrderData = [
                'vendor_name'    => $this->request->getPost('vendor_name'),
                'vendor_company' => $this->request->getPost('vendor_company'),
                'address'        => $this->request->getPost('address'),
                'mobile'         => $this->request->getPost('mobile'),
            ];

          $id =  $purchaseModel->insert($purchaseOrderData);

        $productModel = new ProductModel();

            $purchaseOrderId = $id;
            $productNames  = $this->request->getPost('product_name');
            $productCodes  = $this->request->getPost('product_code');
            $quantities    = $this->request->getPost('quantity');
            $prices        = $this->request->getPost('price');

            $productData = [];

            for ($i = 0; $i < count($productNames); $i++) {
                $productData[] = [
                    'purchase_order_id' => $purchaseOrderId,
                    'product_name'      => $productNames[$i],
                    'product_code'      => $productCodes[$i],
                    'quantity'          => $quantities[$i],
                    'price'             => $prices[$i],
                    'created_by'             => '1'
                ];
            }

            $productModel->insertBatch($productData);


            return $this->response->setJSON([
                'status' => true,
                'message' => 'Purchase order saved successfully!'
            ]);
        
    }

    public function list()
    {
        $model = new PurchaseModel();
        $purchase = $model->getAll();

        $data = [];

        foreach ($purchase as $p) {
            $productModel = new ProductModel();
             $val = $productModel->getPurchaseOrderSummary($p['id']);
            $data[] = [
                'purchase_order_id'      => $p['id'],
                'vendor_name'      => $p['vendor_name'],
                'vendor_company' => $p['vendor_company'],
                'total_quantity'         => $val['total_quantity'],
                'total_value'         => $val['total_value'],
                'created_at'          => $p['created_at'],
            ];
        }

        return $this->response->setJSON([
            'status' => true,
            'data'   => $data
        ]);
    }

}
