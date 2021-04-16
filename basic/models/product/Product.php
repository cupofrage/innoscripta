<?php

namespace app\models\Product;

use app\models\Category\Category;
use app\models\Category\CategoryQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Product".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $sku
 * @property int $category_id
 * @property int $is_deleted
 *
 * @property Category $category
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'Product';
    }

    /**
     * @inheritdoc
     * @return ProductQuery
     */
    public static function find(): ProductQuery
    {
        return new ProductQuery(static::class);
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'sku', 'category_id'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['category_id', 'is_deleted'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['sku'], 'string', 'max' => 25],
            [['sku'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @return CategoryQuery
     */
    public function getCategory(): CategoryQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'sku' => 'Sku',
            'category_id' => 'Category ID',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
