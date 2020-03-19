<?php


namespace App\Http\Api\Fractal;


use Illuminate\Contracts\Pagination\Paginator;

abstract class BaseFractal
{
    abstract public function transform($page);

    public function transformMany(Paginator $page)
    {
        $data = array_map(function($item){
           return $this->transform($item);
        },$page->items());

        return [
            'data' => $data,
            'pagination' => [
                'current' => $page->currentPage(),
                'next' => $page->nextPageUrl(),
                'last' => $page->lastPage(),
            ]
        ];
    }
}
