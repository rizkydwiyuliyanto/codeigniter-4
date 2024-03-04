<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
    public function index()
    {
        $category = new CategoryModel;
        $data["category"] = $category->findAll();
        echo view("category", $data);
    }
    public function addCategory()
    {
        $category = new CategoryModel;
        $uniqueId = time() . '-' . mt_rand();
        $data = array(
            "id_category" => $uniqueId,
            "category_name" => $this->request->getPost("category_name"),
            "status" => "aktif"
        );
        $category->insert($data);
        session()->setFlashdata(
            "message",
            '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               Success
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        '
        );
        return redirect()->to("stuff/data_category");
    }
    public function deleteCategory($id_category)
    {
        $response = response();
        $category = new CategoryModel;
        if ($category->find($id_category)) {
            $category->delete($id_category);
            session()->setFlashdata(
                "message",
                '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       Delete Success
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
    public function editCategory($id_category)
    {
        $category = new CategoryModel;
        if ($category->find($id_category)) {
            $data = array(
                "category_name" => $this->request->getPost("category_name"),
                "status" => $this->request->getPost("status")
            );
            $category->editCategory($id_category, $data);
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
        };
    }
}
