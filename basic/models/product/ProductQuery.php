<?php


namespace app\models\Product;


use yii\db\ActiveQuery;
/**
 * Class ProductQuery
 *
 * @method Product one($db = NULL)
 * @method Product[] all($db = NULL)
 */
class ProductQuery extends ActiveQuery
{
    public function byId(int $id): ProductQuery
    {
        return $this->andWhere(["id" => $id]);
    }
}