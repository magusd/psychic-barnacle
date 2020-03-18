<?php


namespace App\Http\Api\Fractal;


use Illuminate\Pagination\Paginator;

abstract class BaseFractal
{
    abstract public function transform($page);

    public function transformMany(Paginator $page)
    {
        return array_map(function($item){
           return $this->transform($item);
        },$page->items());
    }
}
