<?php
// Author: Gui Hui Chyi
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Security\DatabaseSecurity;
use DOMDocument;
use Illuminate\Routing\Controller;
use XSLTProcessor;

class MenuDisplayController extends Controller
{

    public $name = 'menu';

    public function index()
    {
        return $this->searchMenu('', '', '');
    }

    public function sortMenu($sort)
    {
        return $this->searchMenu($sort, '', '');
    }

    public function filterMenu($sort = 'Latest', $filter)
    {
        return $this->searchMenu($sort, $filter, '');
    }

    public function searchMenu($sort = 'Latest', $filter = 'Any', $search = '')
    {
        $sortBy = 'created_at';
        $sortType = $sort;
        $filterType = $filter;

        switch ($sort) {
            case 'Earliest':
                $sort = 'ASC';
                break;
            case 'Latest':
                $sort = 'DESC';
                break;
            case 'Low-Price':
                $sortBy = 'price';
                $sort = 'ASC';
                break;
            case 'High-Price':
                $sortBy = 'price';
                $sort = 'DESC';
                break;
            case 'A-Z':
                $sortBy = 'name';
                $sort = 'ASC';
                break;
            case 'Z-A':
                $sortBy = 'name';
                $sort = 'DESC';
                break;
            default:
                $sort = 'DESC';
                break;
        }

        if ($filter == 'Any') {
            $filter = '';
        }

        $menuCollection = Menu::where('status', 'active')
            ->where('category', 'like', $filter . '%')
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy($sortBy, $sort)
            ->get();

        $xmlFile = $this->generateXMLFile($menuCollection);

        $categories = Menu::select('category')->distinct()->get();

        return view('menu', [
            'name' => $this->name,
            'menu' => $xmlFile,
            'categories' => $categories,
            'sort' => $sortType,
            'filter' => $filterType,
            'search' => $search
        ]);
    }

    public function generateXMLFile($menuCollection)
    {
        $filePath = "xml/menu/menu.xml";
        $dom = new DOMDocument('1.0', 'UTF-8');
        $xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="xml/menu/menu.xsl"');
        $dom->appendChild($xslt);
        $dom->formatOutput = true;
        $root = $dom->createElement('menu');

        $items = $dom->createElement('items');
        for ($i = 0; $i < $menuCollection->count(); $i++) {
            $item = $dom->createElement('item');
            $item->setAttribute('menu_id', htmlentities($menuCollection[$i]->menu_id));
            $name = $dom->createElement('name', htmlentities($menuCollection[$i]->name));
            $item->appendChild($name);
            $category = $dom->createElement('category', htmlentities($menuCollection[$i]->category));
            $item->appendChild($category);
            $image = $dom->createElement('image', htmlentities($menuCollection[$i]->image));
            $item->appendChild($image);
            $price = $dom->createElement('price', htmlentities($menuCollection[$i]->price));
            $item->appendChild($price);

            $items->appendChild($item);
        }

        //Add into root
        $root->appendChild($items);

        $dom->appendChild($root);

        //Save XML to local directory
        $dom->save($filePath);

        $xsl = new DOMDocument();
        $xsl->load('xml/menu/menu.xsl');

        //Create the processor and import the stylesheet
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xsl);

        return $proc->transformToXml($dom);
    }
}
