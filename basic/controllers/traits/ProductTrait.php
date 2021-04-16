<?php
namespace app\controllers\traits;

use app\models\Product\Product;
use Closure;

trait ProductTrait
{
    /**
     * @return \Closure
     */
    public function getProductMapper(): Closure
    {
        return function (Product $product): string {

            $productArray = $product->getAttributes();
            $productArray['category'] = $product->getCategory()->asArray()->one();

            return json_encode($productArray);
        };
    }
}