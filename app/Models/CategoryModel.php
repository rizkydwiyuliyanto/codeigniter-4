<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table        = "category";
    protected $primaryKey   = "id_category";
    protected $allowedFields  = ["id_category", "category_name","status","create_date","create_edit_date"];
    // public function getStaff()
    // {
    //     return $this->db->
    // }
    public function editCategory($id, $data)
    {
        $category_name = $data["category_name"];
        $status = $data["status"];
        $query = $this->db->query(
            "
                UPDATE 
                    category
                SET 
                    category_name = '$category_name', 
                    status = '$status',
                    create_edit_date = CURRENT_TIMESTAMP()
                WHERE 
                    category.id_category = '$id'
            "
        );
        return $query;
    }
}
