<?php

namespace App\Models;

use CodeIgniter\Model;

class StuffModel extends Model
{
    protected $table        = "stuff";
    protected $primaryKey   = "id_stuff";
    protected $allowedFields  = ["id_stuff", "stuff_name", "id_shop", "size", "id_category", "price","create_date", "create_edit_date"];
    public function addStuff($data)
    {
        $builder = $this->db->table($this->table);
        $query = $builder->insert($data);
        return $query;
    }
    public function editStuff($id, $data)
    {
        $stuff_name = $data["stuff_name"];
        $size = $data["size"];
        $id_category = $data["id_category"];
        $price = $data["price"];
        $query = $this->db->query(
            "
                UPDATE 
                    stuff
                SET 
                    stuff_name = '$stuff_name', 
                    size = '$size',
                    id_category = '$id_category',
                    price = '$price',
                    create_edit_date = CURRENT_TIMESTAMP()
                WHERE 
                    stuff.id_stuff = '$id'
            "
        );
        return $query;
    }
}
