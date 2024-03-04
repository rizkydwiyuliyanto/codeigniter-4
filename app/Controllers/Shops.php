<?php

namespace App\Controllers;

use App\Models\ShopModel;

class Shops extends BaseController
{

    public function index()
    {
        $shops = new ShopModel();
        $data["shops"] = $shops->getShop();
        echo view('shops', $data);
    }
    public function addShop()
    {
        $shop = new ShopModel();
        $uniqueId = time() . '-' . mt_rand();
        $data = array(
            'id_shop'   => $uniqueId,
            'shop_name' => $this->request->getPost('shop_name'),
            'address'   => $this->request->getPost('address')
        );
        $shop->addShop($data);
        session()->setFlashdata(
            "message",
            '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               Success
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        '
        );
        return redirect("shops");
    }
    public function deleteShop($id)
    {
        $shop = new ShopModel();
        if ($shop->find($id)) {
            $shop->delete($id);
            session()->setFlashdata(
                "message",
                '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   Success
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            '
            );
            return redirect("shops");
        }
    }
    public function editShop($id)
    {
        $shop = new ShopModel();
        if ($shop->find($id)) {
            $shop->editShop($id, array(
                'shop_name' => $this->request->getPost('shop_name'),
                'address'   => $this->request->getPost('address'),
            ));
            session()->setFlashdata(
                "message",
                '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   Edit success
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            '
            );
            return redirect("shops");
        }
    }
}
