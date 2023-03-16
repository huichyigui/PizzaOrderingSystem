<?php
// Author: Fong Zhi Jun
namespace App\DesignPattern\Decorator;

use Illuminate\Http\Request;

interface DecoratorInterface
{
  public function updateProfileDetails(Request $request);

  public function getPath();
}
