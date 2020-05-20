<?php

namespace Arden;

abstract class Model
{
    protected $data;

    /**
     * @return array
     */
    abstract public function getData();
}