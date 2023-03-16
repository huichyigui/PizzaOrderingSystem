<?php
// Author: Gui Hui Chyi
namespace App\Http\Controllers;

use App\Models\Menu;
use App\DesignPattern\Iterator\IteratorCollection;
use App\Service\Iterator\IteratorCollection as IteratorIteratorCollection;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File as FacadesFile;

class MenuController extends Controller
{
    public function addMenu(Request $request)
    {
        $name = "Create Menu";

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'category' => ['required', 'string', 'min:3', 'max:255'],
            'stock' => ['required', 'integer', 'gte:0'],
            'price' => ['required', 'numeric', 'gt:0'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['required', 'file', 'mimes:jpg,png,jpeg,webp,gif', 'max:2048'],
        ]);

        $m_name = ucfirst($request->name);
        $m_category = ucfirst($request->category);
        $m_stock = $request->stock;
        $m_price = $request->price;
        $m_description = ucfirst($request->description);
        $m_image = $_FILES['image'];

        $m_id = Menu::select('menu_id')
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->get()[0]->menu_id;

        $m_id = substr($m_id, 1);
        $m_id = 'M' . (int)++$m_id;

        $uploadStatus = $this->uploadImage($m_image, $m_id);
        if ($uploadStatus['status'] == 0) {
            $imageName = $uploadStatus['filename'];

            $menu = new Menu();
            $menu->menu_id = $m_id;
            $menu->name = $m_name;
            $menu->category = $m_category;
            $menu->stock = $m_stock;
            $menu->price = $m_price;
            $menu->description = $m_description;
            $menu->image = $imageName;
            $menu->save();
        }

        return redirect()->back()->with('success', 'Menu Added Successfully!');
    }

    public function manageMenu()
    {
        $name = "Manage Menu";
        $activeIT = new IteratorCollection();
        $inactiveIT = new IteratorCollection();

        $active = Menu::where('status', 'active')
            ->orderBy('created_at', 'ASC')
            ->get();

        $inactive = Menu::where('status', 'inactive')
            ->orderBy('created_at', 'ASC')
            ->get();

        $activeIT->convertCollection($active);
        $inactiveIT->convertCollection($inactive);

        return view('/admin/a_menu_manage', [
            'name' => $name,
            'activeIT' => $activeIT->getIterator(),
            'inactiveIT' => $inactiveIT->getIterator()
        ]);
    }

    public function edit($menu_id)
    {
        $name = "Update Menu";
        try {
            $menu_id = Crypt::decrypt($menu_id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $menu = Menu::find($menu_id);
        return view('admin.a_menu_edit', compact('name', 'menu'));
    }

    public function updateMenu(Request $request, $menu_id)
    {
        $updateImage = false;

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'category' => ['required', 'string', 'min:3', 'max:255'],
            'stock' => ['required', 'integer', 'gte:0'],
            'price' => ['required', 'numeric', 'gt:0'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['nullable', 'file', 'mimes:jpg,png,jpeg,webp,gif', 'max:2048']
        ]);

        $menu = Menu::find($menu_id);

        if ($request->image) {
            $updateImage = true;
        }

        $m_id = $menu_id;
        $m_name = ucfirst($request->name);
        $m_category = ucfirst($request->category);
        $m_stock = $request->stock;
        $m_price = $request->price;
        $m_description = ucfirst($request->description);

        if ($updateImage) {

            FacadesFile::delete(public_path('img/menu/' . $menu->image));
            $m_image = $_FILES['image'];
            $uploadStatus = $this->uploadImage($m_image, $m_id);
            if ($uploadStatus['status'] == 0) {
                $imageName = $uploadStatus['filename'];

                $menu->name = $m_name;
                $menu->category = $m_category;
                $menu->stock = $m_stock;
                $menu->price = $m_price;
                $menu->description = $m_description;
                $menu->image = $imageName;
                $menu->save();
            }
        } else {
            $menu->name = $m_name;
            $menu->category = $m_category;
            $menu->stock = $m_stock;
            $menu->price = $m_price;
            $menu->description = $m_description;
            $menu->save();
        }

        return redirect('admin/manageMenu')->with('success', 'Menu Updated Successfully!');
    }

    public function softDeleteMenu($id)
    {
        if (isset($id)) {
            $menu = Menu::find($id);
            $menu->status = 'inactive';
            $menu->save();
        }
        return redirect('admin/manageMenu');
    }

    public function recoverMenu($id)
    {
        if (isset($id)) {
            $menu = Menu::find($id);
            $menu->status = 'active';
            $menu->save();
        }
        return redirect('admin/manageMenu');
    }

    function uploadImage($image, $newID)
    {
        $name = explode('.', $image['name']);
        $name[0] = $newID;
        $image['name'] = $name[0] . "." . $name[1];

        $target_dir = 'img/menu/';
        $target_file = $target_dir . basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $message = "The file " . htmlspecialchars(basename($image["name"])) . " has been uploaded.";
            $uploadOk = 0;
        } else {
            $message = "Sorry, there was an error uploading your file.";
            $uploadOk = 4;
        }

        $result = array(
            "filename" => $image['name'],
            "status" => $uploadOk,
            "msg" => $message
        );
        return ($result);
    }
}
