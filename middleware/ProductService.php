<?php
namespace app\middleware;

use app\models\Product\Product;
use yii\web\NotFoundHttpException;

/**
 * Class ProductService
 * @package app\middleware
 */
class ProductService
{
    private static ?ProductService $instance = null;

    /**
     * ProductService constructor.
     * @param ProductService|null $instance
     */
    private function __construct()
    {
        //Singleton pattern
    }

    public static function getProductService(): ProductService
    {
        if (self::$instance == null)
        {
            self::$instance = new ProductService();
        }

        return self::$instance;
    }

    /**
     * @throws NotFoundHttpException
     */
    public function getProductById(int $id): Product
    {
        $product = Product::find()->byId($id)->one();

        if (!$product) {
            throw new NotFoundHttpException("Product with id: {$id} not found");
        }


    }
}