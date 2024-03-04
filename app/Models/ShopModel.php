<?php

namespace App\Models;

use CodeIgniter\Model;

class ShopModel extends Model
{
    protected $table        = "shop";
    protected $primaryKey   = "id_shop";
    protected $allowedFields  = ["id_shop", "shop_name", "address" ,"create_date", "create_edit_date"];
    // ...
    public function getShop()
    {
        return $this->findAll();
    }
    public function addShop($data) {
        $builder = $this->db->table($this->table);
        $query = $builder->insert($data);
        return $query;
    }
    public function editShop($id, $data) {
        $shop_name = $data["shop_name"];
        $address = $data["address"];
        $query = $this->db->query(
            "
                UPDATE 
                    shop 
                SET 
                    shop_name = '$shop_name', 
                    address = '$address',
                    create_edit_date = CURRENT_TIMESTAMP()
                WHERE 
                    shop.id_shop = '$id'
            "
        );
        return $query;
    }
}