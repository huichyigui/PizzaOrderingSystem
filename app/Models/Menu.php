<?php
// Author: Gui Hui Chyi
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_id';
    public $incrementing = false;
    protected $keyType = 'string';
}
