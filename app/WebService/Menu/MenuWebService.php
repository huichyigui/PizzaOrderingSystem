<?php
// Author: Gui Hui Chyi
namespace App\WebService\Menu;

use Illuminate\Support\Facades\DB;

class MenuWebService
{
    //Function for web service
    public static function getMenu($category)
    {
        $menuCollection = DB::table('menus')
            ->orderBy('created_at', 'asc')
            ->where('status', 'active')
            ->where('category', $category)
            ->get();

        return $menuCollection;
    }
}
