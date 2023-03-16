<?php
// Author: Gui Hui Chyi
namespace App\DesignPattern\Iterator;

interface IteratorInterface
{
    public function position();

    public function current();

    public function next();

    public function previous();

    public function hasCurrent();

    public function hasNext();

    public function hasPrevious();
}
