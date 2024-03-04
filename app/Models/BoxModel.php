<?php

namespace App\Models;

use CodeIgniter\Model;

class BoxModel extends Model
{
    protected $table = "box";
    protected $primaryKey = "id_box";
    protected $allowedFields = ["id_box", "id_stuff", "stock", "create_date", "status", "create_edit_date"];
    public function getData($month)
    {
        $builder = $this->db->table("box");
        $selectColumn = [
            "shop.shop_name",
            "stuff.stuff_name",
            "stuff.price",
            "stuff.id_stuff",
            "stuff.size",
            "box.create_date",
            "MONTH(box.create_date) as 'Estd. MONTH'",
            "category.category_name",
            "COUNT(stuff.id_stuff) AS jumlah"
        ];
        if ($month) {
            $query = $builder->select(
                join(",", $selectColumn)
            )
                ->join("stuff", "stuff.id_stuff = box.id_stuff", "left")
                ->join("category", "category.id_category = stuff.id_category", "left")
                ->join("shop", "shop.id_shop = stuff.id_shop", "left")
                ->where("box.status", "active")
                ->where("MONTH(box.create_date)", $month)
                ->groupBy('stuff.id_stuff')
                ->get()->getResultArray();
        } else {
            $query = $builder->select(
                join(",", $selectColumn)
            )
                ->join("stuff", "stuff.id_stuff = box.id_stuff", "left")
                ->join("category", "category.id_category = stuff.id_category", "left")
                ->join("shop", "shop.id_shop = stuff.id_shop", "left")
                ->where("box.status", "active")
                ->groupBy('stuff.id_stuff')
                ->get()->getResultArray();
        }
        return $query;
    }
    public function deleteStuff($id_box)
    {
        $builder = $this->db->table("box");
        $query = $builder->where("id_box", $id_box)->delete();
        return $query;
    }
    public function updateBox($id_box)
    {
        $date = date("Y-m-d H:i:s");
        $builder = $this->db->table("box");
        $query = $builder->where("id_box", $id_box)->update(array("status" => "not active", "create_edit_date" => $date));
        return $query;
    }
    public function get_expenses($year)
    {
        $query = $this->db->query(
            "
            SELECT
                COALESCE(SUM(stuff.price),
                0) AS expense,
                m.month,
                COUNT(stuff.id_stuff) AS jumlah
            FROM
            (
                SELECT
                    '01' AS MONTH
                UNION ALL
                SELECT
                    '02' AS MONTH
                UNION ALL
                SELECT
                    '03' AS MONTH
                UNION ALL
                SELECT
                    '04' AS MONTH
                UNION ALL
                SELECT
                    '05' AS MONTH
                UNION ALL
                SELECT
                    '06' AS MONTH
                UNION ALL
                SELECT
                    '07' AS MONTH
                UNION ALL
                SELECT
                    '08' AS MONTH
                UNION ALL
                SELECT
                    '09' AS MONTH
                UNION ALL
                SELECT
                    '10' AS MONTH
                UNION ALL
                SELECT
                    '11' AS MONTH
                UNION ALL
                SELECT
                    '12' AS MONTH
            ) m
            LEFT JOIN box ON YEAR(box.create_date)" . "=" . $year . "
            AND DATE_FORMAT(box.create_date, '%m') = m.month
            LEFT JOIN stuff ON stuff.id_stuff = box.id_stuff
            GROUP BY
                m.month;"
        )->getResultArray();
        return $query;
    }
}
