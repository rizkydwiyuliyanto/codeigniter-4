<?php

namespace App\Controllers;

use App\Models\BoxModel;
use App\Models\CategoryModel;
use App\Models\ItemsListModel;
use App\Models\ShopModel;
use App\Models\ShoppingModel;
use App\Models\StuffModel;
use CodeIgniter\API\ResponseTrait;
use stdClass;

class Shopping extends BaseController
{
    public function index($status)
    {
        $shopping = new ShoppingModel;
        $itemsList = new ItemsListModel;
        $stuff = new StuffModel;
        $shop = new ShopModel;
        $data["shops"] = $shop->findAll();
        $data["items"] = $itemsList->findAll();
        $data["shopping"] = $shopping->where("status", $status)->orderBy("date", "DESC")->findAll();
        echo view("shopping", $data);
    }
    public function addShopping()
    {
        $shopping = new ShoppingModel;
        $uniqueId = time() . '-' . mt_rand();
        $data = array(
            "id_shopping_list" => $uniqueId,
            "date" => $this->request->getPost("date")
        );
        $shopping->insert($data);
        session()->setFlashdata(
            "message",
            '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               Success
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        '
        );
        return redirect("shopping");
    }
    public function finishPayment($id_shopping_list)
    {
        $shopping = new ShoppingModel;
        $itemList = new ItemsListModel;
        $box = new BoxModel;
        $data["items_list"] = $itemList->getItemsList($id_shopping_list);
        foreach ($data["items_list"] as $a) :
            for ($x = 1; $x <= $a["sum"]; $x++) {
                $uniqueId = time() . '-' . mt_rand();
                $data = array(
                    "id_box" => $uniqueId,
                    "id_stuff" => $a["id_stuff"]
                );
                $box->insert($data);
            }
        endforeach;
        $data = array(
            "total" => $this->request->getPost("total_shopping-hidden"),
            "money_have" => $this->request->getPost("money_have"),
            "money_left" => $this->request->getPost("money_left-hidden"),
        );
        $shopping->finishPayment_($id_shopping_list, $data);
        session()->setFlashdata(
            "message",
            '
                <div class="alert alert-success alert-dismissible fade show" role="alert">Success
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            '
        );
        return redirect("shopping");
    }
    public function getItems()
    {
        $stuff = new StuffModel;
        $category = new CategoryModel;
        $id_shop = $this->request->getVar("shop");
        $id_category = $this->request->getVar("category");
        $data["category"] = $category->where("status", "aktif")->findAll();
        if (is_null($id_category)) {
            $data["stuff"] = $stuff->where("id_shop", $id_shop)->findAll();
        } else {
            $data["stuff"] = $stuff->where("id_shop", $id_shop)->where("id_category", $id_category)->findAll();
        }
        return $this->response->setJSON($data);
    }
    public function addItemsList($id_shopping_list)
    {
        $itemsList = new ItemsListModel;
        $uniqueId = time() . '-' . mt_rand();
        $data = array(
            "id_item_list" => $uniqueId,
            "id_shopping_list" => $id_shopping_list,
            "id_stuff" => $this->request->getPost("id_stuff"),
            "sum" => $this->request->getPost("sum"),
            "discount" => $this->request->getPost("discount"),
            "total_price" => $this->request->getPost("total_price-hidden"),
        );
        $itemsList->insert($data);
        return redirect("shopping");
    }
    public function getItemsList($id_shopping_list)
    {
        $itemsList = new ItemsListModel;
        $shop = $itemsList->getShop($id_shopping_list);
        $x = array();
        foreach ($shop as $a) :
            $x[$a["shop_name"]] = $itemsList->getItemsList_x2($id_shopping_list, $a["id_shop"]);
        // array_push($x, $itemsList->getItemsList_x2($id_shopping_list, $a["id_shop"]));
        endforeach;
        $data["values"] = $x;
        return $this->response->setJSON($data);
    }
    public function changeStatus($id_shopping_list)
    {
        $shopping = new ShoppingModel;
        // $shopping->changeStatus($id_shopping_list);
        return redirect("box");
    }
    public function deleteItem($id_item_list)
    {
        $itemList = new ItemsListModel;
        $itemList->delete($id_item_list);
        return redirect()->back();
    }
    public function deleteList($id_shopping_list)
    {
        $shopping = new ShoppingModel;
        $shopping->delete($id_shopping_list);
        session()->setFlashdata(
            "message",
            '
                <div class="alert alert-success alert-dismissible fade show" role="alert">Success
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            '
        );
        return redirect()->back();
    }
    public function editShopping($id_shopping_list)
    {
        $shopping = new ShoppingModel;
        $data = array(
            "date" => $this->request->getPost("date")
        );
        $shopping->editShopping($id_shopping_list, $data);
        return redirect()->back();
    }
}
