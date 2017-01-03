<?php

namespace AppBundle\Pagination;

class PaginatedCollection
{
    protected $items;
    protected $totalItems;
    protected $count;

    public function __construct(array $items, $totalItems)
    {
        $this->items = $items;
        $this->totalItems = $totalItems;
        $this->count = count($items);
    }
}
