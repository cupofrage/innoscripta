<?php


namespace app\models\Category;


use yii\db\ActiveQuery;
/**
 * Class CategoryQuery
 *
 * @method Category one($db = NULL)
 * @method Category[] all($db = NULL)
 */
class CategoryQuery extends ActiveQuery
{
    public function byId(int $id): CategoryQuery
    {
        return $this->andWhere(["id" => $id]);
    }
}