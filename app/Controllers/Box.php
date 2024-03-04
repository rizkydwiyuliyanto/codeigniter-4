<?php

use CodeIgniter\Controller;

namespace App\Controllers;

use App\Models\BoxModel;
use App\Models\ItemsListModel;

class Box extends BaseController
{
    public function index()
    {
        $box = new BoxModel;
        $month = $this->request->getVar("mth");
        if ($month == null) {
            $month = "1";
        }
        $data["box_items"] = $box->getData($month);
        echo view("box",  $data);
    }
    public function updateStatus($id_stuff)
    {
        $box = new BoxModel;
        $jumlah = $this->request->getPost("jumlah");
        for ($x = 1; $x <= $jumlah; $x++) {
            $data["item"] = $box->where("id_stuff", $id_stuff)->where("status","active")->first();
            $box->updateBox($data["item"]["id_box"]);
        }
        return redirect("box");
    }
    public function expenses()
    {
        $box = new BoxModel;
        $data["expenses"] = $box->get_expenses("2024");
        echo view("expenses", $data);
    }
}
