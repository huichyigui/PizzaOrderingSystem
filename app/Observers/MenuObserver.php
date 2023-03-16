<?php

namespace App\Observers;

use App\Models\Menu;
use App\Models\User;
use App\Notifications\MenuOutOfStock;
use Illuminate\Support\Facades\Notification;

class MenuObserver
{
    /**
     * Handle the Menu "created" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function created(Menu $menu)
    {
        if ($menu->stock == 0) {
            Menu::where('menu_id', $menu->menu_id)
                ->update([
                    'status' => 'inactive'
                ]);
            $admin = User::where('role_level', '8')->get();
            Notification::send($admin, new MenuOutOfStock($menu));
        }
    }

    /**
     * Handle the Menu "updated" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function updated(Menu $menu)
    {
        if ($menu->stock == 0) {
            Menu::where('menu_id', $menu->menu_id)
                ->update([
                    'status' => 'inactive'
                ]);
            $admin = User::where('role_level', '8')->get();
            Notification::send($admin, new MenuOutOfStock($menu));
        }
    }

    /**
     * Handle the Menu "deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function deleted(Menu $menu)
    {
        //
    }

    /**
     * Handle the Menu "restored" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function restored(Menu $menu)
    {
        //
    }

    /**
     * Handle the Menu "force deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function forceDeleted(Menu $menu)
    {
        //
    }
}
