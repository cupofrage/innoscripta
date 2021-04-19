<?php
namespace app\middleware;


use app\models\Category\Category;

class CategoryService
{
    private static ?CategoryService $instance = null;

    private function __construct()
    {
        //Singleton pattern
    }

    public static function getProductService(): CategoryService
    {
        if (self::$instance == null)
        {
            self::$instance = new CategoryService();
        }

        return self::$instance;
    }

    /**
     * @return Category[]
     */
    public function getAllCategory(): array
    {
        return Category::find()->all();
    }
}