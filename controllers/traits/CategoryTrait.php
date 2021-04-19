<?php
namespace app\controllers\traits;

use app\models\Category\Category;
use Closure;

trait CategoryTrait
{
    /**
     * @return Closure
     */
    public function getCategoryMapper(): Closure
    {

        return function (array $categoryList): string {
            $response = [];
            /**
             * @var Category[] $categoryList
             */
            foreach ($categoryList as $category) {
                $categoryArray = $category->getAttributes();
                $categoryArray['productList'] = $category->getProducts()->asArray()->all();

                $response = array_merge($response, $categoryArray);
            }

            return json_encode($response);
        };
    }
}