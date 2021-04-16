<?php
namespace app\controllers;

/**
* Not rest controller, coz rest has no profit above web
*/
use app\controllers\traits\CategoryTrait;
use app\middleware\CategoryService;
use yii\web\Controller;

class CategoryController extends Controller
{
    use CategoryTrait;

    public function actionFindAll()
    {
        $service = CategoryService::getProductService();

        $categoryList = $service->getAllCategory();

        echo $this->getCategoryMapper()($categoryList);
    }

}