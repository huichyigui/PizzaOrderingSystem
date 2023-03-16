<?php
// Author: Fong Zhi Jun
namespace App\Http\Controllers;

use App\Repository\IUserRepository;
use Illuminate\Http\Request;
use App\DesignPattern\Decorator\UserBase;
use App\DesignPattern\Decorator\CustomerDecorator;
use App\DesignPattern\Decorator\AdminDecorator;
use DOMDocument;
use XSLTProcessor;
use DOMXPath as GlobalDOMXPath;

class UserController extends Controller
{

    public $user;

    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $admindecorator = new UserBase();
        $admindecorator = new AdminDecorator($admindecorator);

        $users = $admindecorator->getAllUsers();

        $name = "viewAllUsers";

        return view('user.index')
            ->with('users', $users)
            ->with('name', $name);
    }

    public function deleteUser($id)
    {
        $this->user->deleteUser($id);

        return redirect('/admin/viewAllUsers');
    }

    public function generateReport()
    {
        $xmlFile = $this->generateXML();

        $name = 'viewUserReport';

        $this->contructXpath("xml/menu/userreport.xml");

        $customerResult = $this->xpath->evaluate("count(//user[role_level=1])");
        $riderResult = $this->xpath->evaluate("count(//user[role_level=2])");
        $adminResult = $this->xpath->evaluate("count(//user[role_level=8])");
        $totaluser = $this->xpath->evaluate("count(//user)");

        return view('user.userreport', [
            'name' => $name,
            'userreport' => $xmlFile,
            'customerResult' => $customerResult,
            'riderResult' => $riderResult,
            'adminResult' => $adminResult,
            'totaluser' => $totaluser
        ]);
    }

    private $xpath;

    public function contructXpath($filename)
    {
        $doc = new DOMDocument();
        $doc->load($filename);
        $this->xpath = new GlobalDOMXPath($doc);
    }

    public function generateXML()
    {
        $admindecorator = new UserBase();
        $admindecorator = new AdminDecorator($admindecorator);
        $userCollection = $admindecorator->getAllUsers();

        $filePath = "xml/menu/userreport.xml";
        $dom = new DOMDocument('1.0', 'UTF-8');
        $xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="xml/menu/user.xsl"');
        $dom->appendChild($xslt);
        $dom->formatOutput = true;
        $root = $dom->createElement('list');

        $items = $dom->createElement('users');
        for ($i = 0; $i < $userCollection->count(); $i++) {
            $item = $dom->createElement('user');
            $item->setAttribute('id', htmlentities($userCollection[$i]->id));

            $name = $dom->createElement('name', htmlentities($userCollection[$i]->name));
            $item->appendChild($name);

            $email = $dom->createElement('email', htmlentities($userCollection[$i]->email));
            $item->appendChild($email);

            $address = $dom->createElement('address', htmlentities($userCollection[$i]->address));
            $item->appendChild($address);

            $phone_number = $dom->createElement('phone_number', htmlentities($userCollection[$i]->phone_number));
            $item->appendChild($phone_number);

            $role_level = $dom->createElement('role_level', htmlentities($userCollection[$i]->role_level));
            $item->appendChild($role_level);

            $email_verified_at = $dom->createElement('email_verified_at', htmlentities($userCollection[$i]->email_verified_at));
            $item->appendChild($email_verified_at);

            $items->appendChild($item);
        }

        //Add into root
        $root->appendChild($items);

        $dom->appendChild($root);

        //Save XML to local directory
        $dom->save($filePath);

        $xsl = new DOMDocument();
        $xsl->load('xml/menu/user.xsl');

        //Create the processor and import the stylesheet
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xsl);

        return $proc->transformToXml($dom);
    }
}
