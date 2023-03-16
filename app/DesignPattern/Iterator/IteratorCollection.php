<?php
// Author: Gui Hui Chyi
namespace App\DesignPattern\Iterator;

use App\DesignPattern\Iterator\ItemIterator;
use App\DesignPattern\Iterator\IteratorCollectionInterface;

class IteratorCollection implements IteratorCollectionInterface
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function convertCollection(Object $items)
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    public function getIterator(): ItemIterator
    {
        return new ItemIterator($this);
    }

    public function getReverseIterator(): ItemIterator
    {
        return new ItemIterator($this, true);
    }
}
