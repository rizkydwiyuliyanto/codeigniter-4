<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsListModel extends Model
{
    protected $table = "items_list";
    protected $primaryKey = "id_item_list";
    protected $allowedFields = ["id_item_list", "id_shopping_list", "id_stuff", "sum", "discount", "total_price"];
    public function getItemsList($id_shopping_list)
    {
        // $builder = $this->db->table($this->table);
        // return $builder->get()->getResultArray();
        $query = $this->db->query(
            "
                SELECT
                    items_list.id_item_list,
                    items_list.sum,
                    items_list.total_price,
                    stuff.id_stuff,
                    stuff.stuff_name,
                    shop.id_shop,
                    shop.shop_name
                FROM
                    items_list
                LEFT JOIN
                    stuff
                ON 
                    stuff.id_stuff = items_list.id_stuff
                LEFT JOIN
                    shop
                ON
                    shop.id_shop = stuff.id_shop
                WHERE
                    items_list.id_shopping_list = '" . $id_shopping_list . "'"
        )->getResultArray();
        return $query;
    }
    public function getShop($id_shopping_list)
    {
        $query = $this->db->query(
            "
                SELECT
                    shop.id_shop,
                    shop.shop_name
                FROM
                    items_list
                LEFT JOIN
                    stuff
                ON 
                    stuff.id_stuff = items_list.id_stuff
                LEFT JOIN
                    shop
                ON
                    shop.id_shop = stuff.id_shop
                WHERE
                    items_list.id_shopping_list = '" . $id_shopping_list . "'" .
                "
                GROUP BY
                    shop.id_shop
                ORDER BY
                    shop.shop_name
                "
        )->getResultArray();
        return $query;
    }
    public function getItemsList_x2($id_shopping_list, $id_shop)
    {
        // $builder = $this->db->table($this->table);
        // return $builder->get()->getResultArray();
        $query = $this->db->query(
            "
                SELECT
                    items_list.id_item_list,
                    items_list.sum,
                    items_list.total_price,
                    stuff.id_stuff,
                    stuff.price,
                    stuff.stuff_name,
                    shop.id_shop,
                    shop.shop_name
                FROM
                    items_list
                LEFT JOIN
                    stuff
                ON 
                    stuff.id_stuff = items_list.id_stuff
                LEFT JOIN
                    shop
                ON
                    shop.id_shop = stuff.id_shop
                WHERE
                    items_list.id_shopping_list = '" . $id_shopping_list . "'" .
                "
                AND
                    shop.id_shop ='" . $id_shop . "'"
        )->getResultArray();
        return $query;
    }
}
