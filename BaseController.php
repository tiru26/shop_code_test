<?php

namespace Arden;

abstract class BaseController
{
    protected $modelData;
    protected $productsData;

    abstract public function getModelData();
    abstract public function getTopProductsData();
}