<?php


namespace App\Http\Api\Fractal;


abstract class BaseFractal
{
    abstract public function transform($data);

    public function transformMany($data)
    {
        return array_map(function($item){
           return $this->transform($item);
        },$data);
    }
}
