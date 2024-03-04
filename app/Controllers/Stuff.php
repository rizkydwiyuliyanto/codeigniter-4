<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\CategoryModel;
use App\Models\ShopModel;
use App\Models\StuffModel;

class Stuff extends BaseController
{
    public function index()
    {
        $shop = new ShopModel;
        $stuff = new StuffModel;
        $category = new CategoryModel;
        $data["shops"] = $shop->getShop();
        $data["stuff"] = $stuff->where("id_shop", $data["shops"][0]["id_shop"])->findAll();
        $data["category"] = $category->where("status","aktif")->findAll();
        $data["shop_name"] = $shop->where("id_shop", $data["shops"][0]["id_shop"])->first()["shop_name"];
        $data["id_shop"] = $data["shops"][0]["id_shop"];
        // $data["stuff"]
        echo view("stuff", $data);
    }
    public function filter($id)
    {
        $shop = new ShopModel;
        $stuff = new StuffModel;
        $category = new CategoryModel;
        $data["shops"] = $shop->getShop();
        $data["category"] = $category->where("status","aktif")->findAll();
        $data["stuff"] = $stuff->where("id_shop", $id)->findAll();
        $data["shop_name"] = $shop->where("id_shop", $id)->first()["shop_name"];
        $data["id_shop"] = $id;
        // $data["stuff"]
        echo view("stuff", $data);
    }
    public function addStuff($id_shop)
    {
        $stuff = new StuffModel;
        $uniqueId = time() . '-' . mt_rand();
        $data = array(
            "id_stuff" => $uniqueId,
            "id_shop" => $id_shop,
            "stuff_name" => $this->request->getPost("stuff_name"),
            "id_category" => $this->request->getPost("id_category"),
            "size" => $this->request->getPost("size"),
            "price" => $this->request->getPost("price")
        );
        $stuff->addStuff($data);
        session()->setFlashdata(
            "message",
            '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               Success
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        '
        );
        return redirect()->to("stuff/data_stuff/".$id_shop);
    }
    public function deleteStuff($id_stuff)
    {
        $response = response();
        $stuff = new StuffModel;
        if ($stuff->find($id_stuff)) {
            $stuff->delete($id_stuff);
            session()->setFlashdata(
                "message",
                '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   Success
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            '
            );

            $data = [
                'success' => true,
                'id'      => 123,
            ];

            return $this->response->setJSON($data);
        }
    }
    public function editStuff($id_stuff)
    {
        $stuff = new StuffModel();
        if ($stuff->find($id_stuff)){
            $data = array (
                "stuff_name" => $this->request->getPost("stuff_name"),
                "size" => $this->request->getPost("size"),
                "id_category" => $this->request->getPost("id_category"),
                "price" => $this->request->getPost("price")
            );
            $stuff->editStuff($id_stuff, $data);
            session()->setFlashdata(
                "message",
                '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   Edit success
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            '
            );
            return redirect()->back();
        }
    }
}
