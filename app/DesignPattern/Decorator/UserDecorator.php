<?php
// Author: Fong Zhi Jun
namespace App\DesignPattern\Decorator;

use Illuminate\Http\Request;

abstract class UserDecorator implements DecoratorInterface
{
    protected $decoratorinterface;
    public function __construct(DecoratorInterface $decoratorinterface)
    {
        $this->decoratorinterface = $decoratorinterface;
    }
}
