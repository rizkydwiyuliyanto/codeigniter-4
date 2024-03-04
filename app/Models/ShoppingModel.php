<?php

namespace App\Models;

use CodeIgniter\Model;

class ShoppingModel extends Model
{
    protected $table = "shopping_list";
    protected $primaryKey = "id_shopping_list";
    protected $allowedFields = ["id_shopping_list", "date", "total","status", "money_have", "money_left", "create_date", "create_edit_date"];
    public function finishPayment_($id, $data){
        {
            $money_left = $data["money_left"];
            $money_have = $data["money_have"];
            $total = $data["total"];
            $query = $this->db->query(
                "
                    UPDATE 
                        shopping_list 
                    SET 
                        status = 'moved',
                        money_have = '$money_have',
                        money_left = '$money_left',
                        total = '$total',
                        create_edit_date = CURRENT_TIMESTAMP()
                    WHERE 
                        shopping_list.id_shopping_list = '$id'
                "
            );
            return $query;
        }
    }
    public function editShopping($id, $data)
    {
        $date = $data["date"];
        $query = $this->db->query(
            "
                UPDATE
                    shopping_list
                SET
                    date='".$date."',
                    create_edit_date = CURRENT_TIMESTAMP()
                WHERE
                    id_shopping_list ='".$id."'
            "
        );
        return $query;
    }
}