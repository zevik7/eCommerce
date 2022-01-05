<?php

namespace mvc\models;

use mvc\models\traits\Filter;
use mvc\core\DB;

class Rating extends DB
{
    public function get($productId, $starFillter = 'all')
    {
        $query =
            "SELECT
            pr.id as productRatingId,
            pr.product_type_id as productTypeId,
            pr.user_id as userId,
            pr.star as productRatingStar,
            pr.comment as productRatingComment,
            pr.date as productRatingDate,
            pr.type as productRatingType,
            pt.label as productTypeLabel,
            pt.name as productTypeName,
            ur.name as userName,
            img.url as imageUrl
            FROM product_ratings pr
            INNER JOIN product_types pt
            ON pr.product_type_id = pt.id
            INNER JOIN users ur
            ON ur.id = pr.user_id
            INNER JOIN images img
            ON img.imageable_id = ur.id
            WHERE pt.product_id = ?
            AND img.imageable_type = 'user'
            AND img.type ='avatar' ";

        if ($starFillter !== 'all' && in_array($starFillter, [1,2,3,4,5])) {
            $query .= " AND pr.star = $starFillter ";
        }

        $result = $this->readDB($query, [$productId]);

        return $result;
    }
}
