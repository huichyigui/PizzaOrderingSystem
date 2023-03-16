<?php
// Author: Gui Hui Chyi
namespace App\DesignPattern\Iterator;

use App\DesignPattern\Iterator\ItemIterator;

interface IteratorCollectionInterface
{
    public function getItems();

    public function addItem($item);

    public function getIterator(): ItemIterator;

    public function getReverseIterator(): ItemIterator;
}
