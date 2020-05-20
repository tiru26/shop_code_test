<?php

namespace Arden;

class ShopController extends BaseController
{
    public function __construct()
    {
        $model = new OpeningTimesModel();
        $this->modelData = $model->getData();

        $products = new TopProductsModel();
        $this->productsData = $products->getData();
    }

    public function getModelData() {
        return $this->modelData;
    }

    public function getTopProductsData() {
        return $this->productsData;
    }

}