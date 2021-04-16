<?php


namespace app\controllers;

use app\controllers\traits\ProductTrait;
use app\middleware\ProductService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProductController extends Controller
{
    use ProductTrait;

    /**
     * @throws NotFoundHttpException
     */
    public function actionFindOne($id)
    {
        $service = ProductService::getProductService();

        echo $this->getProductMapper()($service->getProductById($id));
    }
}