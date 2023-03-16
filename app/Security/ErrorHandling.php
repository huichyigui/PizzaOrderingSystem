<?php
// Author: Beh Guo Hao
namespace App\Security;

class ErrorHandling
{
    public function outOfStock()
    {
        session()->flash('status', 'Sorry, the item quantity is either insufficient or out of stock.');
    }
}