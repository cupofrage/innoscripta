<?php

namespace app\models\Category;

use app\models\Product\Product;
use app\models\Product\ProductQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Category".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $is_deleted
 *
 * @property Product[] $products
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Category';
    }
    /**
     * @inheritdoc
     * @return CategoryQuery
     */
    public static function find(): CategoryQuery
    {
        return new CategoryQuery(static::class);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['is_deleted'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return ProductQuery
     */
    public function getProducts(): ProductQuery
    {
        return $this->hasMany(ProductQuery::class, ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
