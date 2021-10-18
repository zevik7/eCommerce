<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class Rating extends DB{

    function __construct()
    {
        parent::__construct();
    }

    public function get(){

        $query = 
            "SELECT
            ca.id as cartId,
            ca.product_type_id as productTypeId, 
            ca.quantity as cartQuantity, 
            ca.date as cartDate, 
            pt.name as productTypeName, 
            pt.price as productTypePrice,
            pt.freight_cost as productFreightCost,
            pd.name as productName,
            pd.discount as productDiscount,
            img.url as imageUrl
            FROM ecommerce.carts ca
            INNER JOIN product_types pt
            ON pt.id = ca.product_type_id
            INNER JOIN products pd
            ON pt.product_id = pd.id
            INNER JOIN images img
            ON pd.id = img.imageable_id
            WHERE ca.user_id = ?
            AND img.type = 'thumb'
            AND img.imageable_type = 'product'";

        $result = $this->readDB($query, [$this->userId]);

        return $result;
    }

    public function add($typeId, $quantity)
    {

        $query = 
        "INSERT INTO 
        carts
        (user_id, product_type_id, quantity)
        VALUES
        ( ?, ?, ?)";

        $result = $this->writeDB($query, [$this->userId, $typeId, $quantity]);
        return $result;
    }

    public function delete($id)
    {
        $query = 
        "DELETE FROM carts
        WHERE id=?;";

        $result = $this->writeDB($query, [$id]);
        return $result;
    }

    public function getQty($typeId)
    {
        $query = 
        "SELECT 
        count(id) as count
        FROM carts c
        WHERE c.product_type_id = ?
        AND c.user_id = ?";

        $result = $this->readDB($query, [$typeId, $this->userId]);

        return $result[0]['count'];
    }
}
?>