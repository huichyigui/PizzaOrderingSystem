<?php
// Author: Gui Hui Chyi
namespace App\DesignPattern\Iterator;

use App\DesignPattern\Iterator\IteratorInterface;

class ItemIterator implements IteratorInterface
{
    private $collection;
    private $position = 0;
    private $reverse = false;

    public function __construct($collection, $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
    }

    public function position()
    {
        return $this->position;
    }

    public function current()
    {
        return $this->collection->getItems()[$this->position];
    }

    public function next()
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
        return $this->collection->getItems()[$this->position - 1];
    }

    public function previous()
    {
        $this->position = $this->reverse ?
            count($this->collection->getItems()) - 1 : 0;
        return $this->collection->getItems()[$this->position + 1];
    }

    public function hasCurrent()
    {
        return isset($this->collection->getItems()[$this->position]);
    }

    public function hasNext()
    {
        return isset($this->collection->getItems()[$this->position + 1]);
    }

    public function hasPrevious()
    {
        return isset($this->collection->getItems()[$this->position - 1]);
    }
}
